<!-- SCRIPT FOR FOOTER DATE FILTER -->
@if(isset($actionRoute))
<script>
    const dateItems = document.querySelectorAll('.date-item');
    const sortItems = document.querySelectorAll('.sort-item');
    let dateInterval;
    let sortValue;

    //ADD CLICK EVENT TO EACH DATE OPTIONS IN DATE FILTER

    // dateItems.forEach((item) => {
    //     item.addEventListener('click', (event) => {
    //         event.preventDefault();
    //         dateInterval = event.target.getAttribute('data-interval');
    //         console.log("Selected value:", dateInterval);

    //         //POINT THE LINK TO THE SELECTED DATE
    //         window.location.href = `{{$actionRoute}}?interval=${dateInterval}`;
    //     });
    // });

    
    function handleFilterChange(change) {
        const filter = document.getElementById("dateFilter").getAttribute('data-interval');
        if (filter === "custom") {
            document.getElementById("customDateModal").style.display = "flex";
        } else {
            window.location.href = `{{$actionRoute}}?interval=${change}`;
        }
    }
</script>
@endif


<!-- SCRIPT FOR GENERATE PDF -->\
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/4.9.124/pdf.min.mjs"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>
<script src="https://unpkg.com/jspdf-autotable@3.8.4/dist/jspdf.plugin.autotable.js"></script>

<script>
    function checkCurrentDashboard(){
        const titleInLink = window.location.pathname;
        if(titleInLink == "/kuwago-one" || titleInLink == "/kuwago-two"){
            return "Dashboard"
        }
        else if(titleInLink == "/kuwago-one/sales" || titleInLink == "/kuwago-two/sales")
        {
            return "Sales";
        }
        else if(titleInLink == "/kuwago-one/expenses" || titleInLink == "/kuwago-two/expenses"){
            return "Expenses";
        }
        else if(titleInLink == "/uddesign"){
            return "UD Dashboard"
        }
        else if(titleInLink == "/uddesign/sales"){
            return "UD Sales"
        }
        else if(titleInLink == "/uddesign/expenses"){
            return "UD Expenses";
        }
        else if(titleInLink == "/executive"){
            return "Executive";
        }
        else {
            return "Null"
        }
    }

    function getTitle(){
        const titleInLink = window.location.pathname;
        if(titleInLink == "/kuwago-one" ){
            return "Kuwago One Summary";
        }
        else if(titleInLink == "/kuwago-two"){
            return "Kuwago Two Summary";
        }
        else if(titleInLink == "/kuwago-one/sales"){
            return "Kuwago One Sales";
        }
        else if(titleInLink == "/kuwago-two/sales")
        {
            return "Kuwago Two Sales";
        }
        else if(titleInLink == "/kuwago-one/expenses"){
            return "Kuwago One Expenses";
        }
        else if(titleInLink == "/kuwago-two/expenses"){
            return "Kuwago Two Expenses";
        }
        else if(titleInLink == "/uddesign"){
            return "UdDesign Summary";
        }
        else if(titleInLink == "/uddesign/sales"){
            return "UdDesign Sales";
        }
        else if(titleInLink == "/uddesign/expenses"){
            return "UdDesign Expenses"
        }
        else if(titleInLink == "/executive"){
            return "Executive Summary"
        }
        else {
            return "Null"
        }
    }
    function executiveGeneratePDF(){
        const title = getTitle()

        const salesChart = document.getElementById('SalesChart');
        const profitChart = document.getElementById('ProfitChart');
        const expenseChart = document.getElementById('ExpenseChart');
        const topDishesChart = document.getElementById('TopDishesChart');

        const totalSalesActual = document.getElementById('totalSalesActual');
        const totalSalesPred = document.getElementById('totalSalesPred');

        const totalProfitActual = document.getElementById('totalProfitActual');
        const totalProfitPred = document.getElementById('totalProfitPred');

        const totalExpenseActual = document.getElementById('totalExpenseActual');
        const totalExpensePred = document.getElementById('totalExpensePred');

        const topDishesActual = document.getElementById('topDishesActual');
        const topDishesPred = document.getElementById('topDishesPred');
        
        const salesChartref = Chart.getChart(salesChart);
        const profitChartref = Chart.getChart(profitChart);
        const expenseChartref = Chart.getChart(expenseChart);
        const topDishesChartref = Chart.getChart(topDishesChart);

        salesChartref.options.plugins.bgColor.applyBackground = true;
        salesChartref.update();
        profitChartref.options.plugins.bgColor.applyBackground = true;
        profitChartref.update();
        expenseChartref.options.plugins.bgColor.applyBackground = true;
        expenseChartref.update();
        topDishesChartref.options.plugins.bgColor.applyBackground = true;
        topDishesChartref.update();

        setTimeout(() => {
            const salesChartImage = salesChart.toDataURL('image/jpeg', 1.0);
            const profitChartImage = profitChart.toDataURL('image/jpeg', 1.0);
            const expensesChartImage = expenseChart.toDataURL('image/jpeg', 1.0);
            const topDishesChartImage = topDishesChart.toDataURL('image/jpeg', 1.0);

            let pdf = new jsPDF('portrait');
            
            pdf.setFontSize(27);
            pdf.setFont('Arial', 'bold');
            pdf.text(15, 15, title);
            pdf.setFontSize(13);
            pdf.setFont('Arial', 'normal');
            
            pdf.text(40, 27, "Overall Sales");
            pdf.addImage(salesChartImage, 'JPEG', 15, 30, 90, 45);
            pdf.text(140, 27, "Overall Profit");
            pdf.addImage(profitChartImage, 'JPEG', 108, 30, 90, 45);
            pdf.text(40, 85, "Overall Expenses");
            pdf.addImage(expensesChartImage, 'JPEG', 15, 89, 90, 45);
            pdf.text(140, 85, "Kuwago Orders");
            pdf.addImage(topDishesChartImage, 'JPEG', 108, 89, 90, 45);

            // Set font size
            pdf.setFontSize(15);

            // Define your table data
            const overallSalesTable = [
                ["Overall Sales", "Prediction"],
                [totalSalesActual.innerText, totalSalesPred.innerText.split(":")[1]?.trim()]
            ];

            // Define your table data
            const overallProfitTable = [
                ["Overall Profit", "Prediction"],
                [totalProfitActual.innerText, totalProfitPred.innerText.split(":")[1]?.trim()]
            ];

            // Define your table data
            const overallExpensesTable = [
                ["Overall Expenses", "Prediction"],
                [totalExpenseActual.innerText, totalExpensePred.innerText.split(":")[1]?.trim()]
            ];

            // Define your table data
            const overallTopDishesTable = [
                ["Kuwago Orders", "Prediction"],
                [topDishesActual.innerText.split(":")[1]?.trim(), topDishesPred.innerText.split(":")[1]?.trim()]
            ];


            let overallSales_x = 20;
            let overallSales_y = 142;
            const cellPadding = 4;  // Padding for the text inside cells
            const cellWidth = 40;  // Cell width
            const cellHeight = 10; // Cell height
            const overallSalesColumns = overallSalesTable[0].length;

            let overallProfit_x = 115;
            let overallProfit_y = 142;
            const overallProfitColumns = overallProfitTable[0].length;

            let overallExpense_x = 20;
            let overallExpense_y = 170;
            const overallExpenseColumns = overallExpensesTable[0].length;

            let overallOrders_x = 115;
            let overallOrders_y = 170;
            const overallOrdersColumns = overallTopDishesTable[0].length;

            // Set font size
            pdf.setFontSize(12);

            // Loop through rows and cells
            overallSalesTable.forEach((row, rowIndex) => {
            row.forEach((cell, cellIndex) => {

                    // Set bold font for the first row (header)
                    if (rowIndex === 0) {
                        pdf.setFont("Arial", "bold");
                    } else {
                        pdf.setFont("Arial", "normal");
                    }

                    // Add the text in each cell with padding
                    pdf.text(cell, overallSales_x + (cellIndex * cellWidth) + cellPadding, overallSales_y + (rowIndex * cellHeight) + cellPadding);

                    // Draw a border around each cell
                    pdf.rect(overallSales_x + (cellIndex * cellWidth), overallSales_y + (rowIndex * cellHeight), cellWidth, cellHeight);
                });
            });

            // Draw a border around the entire table (optional, for clarity)
            pdf.rect(overallSales_x, overallSales_y, overallSalesColumns * cellWidth, overallSalesTable.length * cellHeight);
            
            // Loop through rows and cells
            overallProfitTable.forEach((row, rowIndex) => {
            row.forEach((cell, cellIndex) => {

                    // Set bold font for the first row (header)
                    if (rowIndex === 0) {
                        pdf.setFont("Arial", "bold");
                    } else {
                        pdf.setFont("Arial", "normal");
                    }

                    // Add the text in each cell with padding
                    pdf.text(cell, overallProfit_x + (cellIndex * cellWidth) + cellPadding, overallProfit_y + (rowIndex * cellHeight) + cellPadding);

                    // Draw a border around each cell
                    pdf.rect(overallProfit_x + (cellIndex * cellWidth), overallProfit_y + (rowIndex * cellHeight), cellWidth, cellHeight);
                });
            });

            // Draw a border around the entire table (optional, for clarity)
            pdf.rect(overallProfit_x, overallProfit_y, overallProfitColumns * cellWidth, overallProfitTable.length * cellHeight);
            
            // Loop through rows and cells
            overallExpensesTable.forEach((row, rowIndex) => {
            row.forEach((cell, cellIndex) => {

                    // Set bold font for the first row (header)
                    if (rowIndex === 0) {
                        pdf.setFont("Arial", "bold");
                    } else {
                        pdf.setFont("Arial", "normal");
                    }

                    // Add the text in each cell with padding
                    pdf.text(cell, overallExpense_x + (cellIndex * cellWidth) + cellPadding, overallExpense_y + (rowIndex * cellHeight) + cellPadding);

                    // Draw a border around each cell
                    pdf.rect(overallExpense_x + (cellIndex * cellWidth), overallExpense_y + (rowIndex * cellHeight), cellWidth, cellHeight);
                });
            });

            // Draw a border around the entire table (optional, for clarity)
            pdf.rect(overallExpense_x, overallExpense_y, overallExpenseColumns * cellWidth, overallExpensesTable.length * cellHeight);
            
            // Loop through rows and cells
            overallTopDishesTable.forEach((row, rowIndex) => {
            row.forEach((cell, cellIndex) => {

                    // Set bold font for the first row (header)
                    if (rowIndex === 0) {
                        pdf.setFont("Arial", "bold");
                    } else {
                        pdf.setFont("Arial", "normal");
                    }

                    // Add the text in each cell with padding
                    pdf.text(cell, overallOrders_x + (cellIndex * cellWidth) + cellPadding, overallOrders_y + (rowIndex * cellHeight) + cellPadding);

                    // Draw a border around each cell
                    pdf.rect(overallOrders_x + (cellIndex * cellWidth), overallOrders_y + (rowIndex * cellHeight), cellWidth, cellHeight);
                });
            });

            // Draw a border around the entire table (optional, for clarity)
            pdf.rect(overallOrders_x, overallOrders_y, overallOrdersColumns * cellWidth, overallTopDishesTable.length * cellHeight);

            pdf.text(15, 245, 'Date Created: ');
            pdf.text(15, 260, 'Prepared By: ');
            pdf.text(15, 275, 'Approved By: ');
            pdf.text(25, 282, 'Jann Alfred A. Quinto, MSIB Dean, SITE');

            pdf.save('executive_totals.pdf');

            salesChartref.options.plugins.bgColor.applyBackground = false;
            salesChartref.update();
            profitChartref.options.plugins.bgColor.applyBackground = false;
            profitChartref.update();
            expenseChartref.options.plugins.bgColor.applyBackground = false;
            expenseChartref.update();
            topDishesChartref.options.plugins.bgColor.applyBackground = false;
            topDishesChartref.update();

        }, 100)
    }


    function udDashboardGeneratePDF(){
        const title = getTitle()

        const printingChart = document.getElementById('PrintingChart');
        const merchChart = document.getElementById('MerchChart');

        const totalSales = document.getElementById('totalSales');
        const salesPhoto = document.getElementById('salesPhoto');
        const salesMerch = document.getElementById('salesMerch');
        const salesDeals = document.getElementById('salesDeals');

        const totalExpenses = document.getElementById('totalExpenses');
        const expensesPhoto = document.getElementById('expensesPhoto');
        const expensesMerch = document.getElementById('expensesMerch');
        const expensesDeals = document.getElementById('expensesDeals');


        const totalProfit = document.getElementById('totalProfit');
        const profitPhoto = document.getElementById('profitPhoto');
        const profitMerch = document.getElementById('profitMerch');
        const profitDeals = document.getElementById('profitDeals');

        const targetSales = document.getElementById('targetSales');

        const printingChartref = Chart.getChart(printingChart);
        const merchChartref = Chart.getChart(merchChart);

        printingChartref.options.plugins.bgColor.applyBackground = true;
        printingChartref.update();
        merchChartref.options.plugins.bgColor.applyBackground = true;
        merchChartref.update();

        setTimeout(() => {
            const printingChartImage = printingChart.toDataURL('image/jpeg', 1.0);
            const merchChartImage = merchChart.toDataURL('image/jpeg', 1.0);

            let pdf = new jsPDF('portrait');
            
            pdf.setFontSize(27);
            pdf.setFont('Arial', 'bold');
            pdf.text(15, 15, title);
            pdf.setFontSize(13);
            pdf.setFont('Arial', 'normal');

            pdf.text(15, 25, 'Printing/Photocopy Sales, Profit, and Expenses');
            pdf.addImage(printingChartImage, 'JPEG', 45, 30, 120, 50);
            pdf.text(15, 90, 'UdD Merch Sales, Profit, and Expenses');
            pdf.addImage(merchChartImage, 'JPEG', 45, 95, 120, 50);

            // Set font size
            pdf.setFontSize(15);

            // Define your table data
            const totalSalesTable = [
                ["Total Sales"]
                ["Print/Photo", "UdD Merch", "Custom Deals", "Total Sales"],
                [salesPhoto.innerText.split(":")[1]?.trim(), salesMerch.innerText.split(":")[1]?.trim(), salesDeals.innerText.split(":")[1]?.trim(), totalSales.innerText],
            ];

            const totalExpensesTable = [
                ["Print/Photo", "UdD Merch", "Custom Deals", "Total Expenses"],
                [expensesPhoto.innerText.split(":")[1]?.trim(), expensesMerch.innerText.split(":")[1]?.trim(), expensesDeals.innerText.split(":")[1]?.trim(), totalExpenses.innerText],
            ];

            const totalProfitTable = [
                ["Print/Photo", "UdD Merch", "Custom Deals", "Total Profit"],
                [profitPhoto.innerText.split(":")[1]?.trim(), profitMerch.innerText.split(":")[1]?.trim(), profitDeals.innerText.split(":")[1]?.trim(), totalProfit.innerText],
            ];

            const targetSalesTable = [
                ["Target Sales"],
                [targetSales.innerText]
            ];
        

           // Starting position for the table
            let totalSales_x = 35;
            let totalSales_y = 150;
            const cellPadding = 4;  // Padding for the text inside cells
            const cellWidth = 35;  // Cell width
            const cellHeight = 10; // Cell height
            const salesColumns = totalSalesTable[0].length; // Number of columns (assuming all rows have the same number of columns)
            
            let totalExpenses_x = 35;
            let totalExpenses_y = 200;
            const expensesColumns = totalExpensesTable[0].length;

            let totalProfit_x = 35;
            let totalProfit_y = 175;
            const profitColumns = totalProfitTable[0].length;

            let targetSales_x = 140;
            let targetSales_y = 225;
            const targetSalesColumns = targetSalesTable[0].length;

            // Set font size
            pdf.setFontSize(12);

            // Loop through rows and cells
            totalSalesTable.forEach((row, rowIndex) => {
            row.forEach((cell, cellIndex) => {

                    // Set bold font for the first row (header)
                    if (rowIndex === 0) {
                        pdf.setFont("Arial", "bold");
                    } else {
                        pdf.setFont("Arial", "normal");
                    }

                    // Add the text in each cell with padding
                    pdf.text(cell, totalSales_x + (cellIndex * cellWidth) + cellPadding, totalSales_y + (rowIndex * cellHeight) + cellPadding);

                    // Draw a border around each cell
                    pdf.rect(totalSales_x + (cellIndex * cellWidth), totalSales_y + (rowIndex * cellHeight), cellWidth, cellHeight);
                });
            });

            // Draw a border around the entire table (optional, for clarity)
            pdf.rect(totalSales_x, totalSales_y, salesColumns * cellWidth, totalSalesTable.length * cellHeight);
            
            // Loop through rows and cells
            totalProfitTable.forEach((row, rowIndex) => {
            row.forEach((cell, cellIndex) => {

                    // Set bold font for the first row (header)
                    if (rowIndex === 0) {
                        pdf.setFont("Arial", "bold");
                    } else {
                        pdf.setFont("Arial", "normal");
                    }

                    // Add the text in each cell with padding
                    pdf.text(cell, totalProfit_x + (cellIndex * cellWidth) + cellPadding, totalProfit_y + (rowIndex * cellHeight) + cellPadding);

                    // Draw a border around each cell
                    pdf.rect(totalProfit_x + (cellIndex * cellWidth), totalProfit_y + (rowIndex * cellHeight), cellWidth, cellHeight);
                });
            });

            // Draw a border around the entire table (optional, for clarity)
            pdf.rect(totalProfit_x, totalProfit_y, profitColumns * cellWidth, totalProfitTable.length * cellHeight);


            // Loop through rows and cells
            totalExpensesTable.forEach((row, rowIndex) => {
            row.forEach((cell, cellIndex) => {

                    // Set bold font for the first row (header)
                    if (rowIndex === 0) {
                        pdf.setFont("Arial", "bold");
                    } else {
                        pdf.setFont("Arial", "normal");
                    }

                    // Add the text in each cell with padding
                    pdf.text(cell, totalExpenses_x + (cellIndex * cellWidth) + cellPadding, totalExpenses_y + (rowIndex * cellHeight) + cellPadding);

                    // Draw a border around each cell
                    pdf.rect(totalExpenses_x + (cellIndex * cellWidth), totalExpenses_y + (rowIndex * cellHeight), cellWidth, cellHeight);
                });
            });

            // Draw a border around the entire table (optional, for clarity)
            pdf.rect(totalExpenses_x, totalExpenses_y, expensesColumns * cellWidth, totalExpensesTable.length * cellHeight);
            
            // Loop through rows and cells
            targetSalesTable.forEach((row, rowIndex) => {
            row.forEach((cell, cellIndex) => {

                    // Set bold font for the first row (header)
                    if (rowIndex === 0) {
                        pdf.setFont("Arial", "bold");
                    } else {
                        pdf.setFont("Arial", "normal");
                    }

                    // Add the text in each cell with padding
                    pdf.text(cell, targetSales_x + (cellIndex * cellWidth) + cellPadding, targetSales_y + (rowIndex * cellHeight) + cellPadding);

                    // Draw a border around each cell
                    pdf.rect(targetSales_x + (cellIndex * cellWidth), targetSales_y + (rowIndex * cellHeight), cellWidth, cellHeight);
                });
            });

            // Draw a border around the entire table (optional, for clarity)
            pdf.rect(targetSales_x, targetSales_y, targetSalesColumns * cellWidth, targetSalesTable.length * cellHeight);

            pdf.text(15, 245, 'Date Created: ');
            pdf.text(15, 260, 'Prepared By: ');
            pdf.text(15, 275, 'Approved By: ');
            pdf.text(25, 282, 'Jann Alfred A. Quinto, MSIB Dean, SITE');

            pdf.save('ud_dashboard_totals.pdf');

            printingChartref.options.plugins.bgColor.applyBackground = false;
            printingChartref.update();

            merchChartref.options.plugins.bgColor.applyBackground = false;
            merchChartref.update();

        }, 100);
    }

    function udExpensesGeneratePDF(){
        const title = getTitle()

        const myChart = document.getElementById('myChart');
        const myChartref = Chart.getChart(myChart);
        const expenseCategoryChart = document.getElementById('expenseCategoryChart');
        const expenseCategoryChartref = Chart.getChart(expenseCategoryChart);

        const budgetAllocated = document.getElementById('budgetAllocated');
        const totalExpenses = document.getElementById('totalExpenses');
        const totalExpenseAmount = document.getElementById('totalExpenseAmount');


        myChartref.options.plugins.bgColor.applyBackground = true;
        myChartref.update();
        expenseCategoryChartref.options.plugins.bgColor.applyBackground = true;
        expenseCategoryChartref.update();

        setTimeout(() => {
            const myChartImage = myChart.toDataURL('image/jpeg', 1.0);
            const expenseCategoryChartImage = expenseCategoryChart.toDataURL('image/jpeg', 1.0);

            let pdf = new jsPDF('portrait');
            
            pdf.setFontSize(27);
            pdf.setFont('Arial', 'bold');
            pdf.text(15, 15, title);
            pdf.setFontSize(15);
            pdf.setFont('Arial', 'normal');
            
            pdf.text(42, 32, 'Expense Trends');
            pdf.addImage(myChartImage, 'JPEG', 15, 35, 85, 40);
            pdf.text(130, 32, 'Expense by Category');
            pdf.addImage(expenseCategoryChartImage, 'JPEG', 110, 35, 85, 40);
            
            // Set font size
            pdf.setFontSize(15);

            // Define your table data
            const tableData = [
                ["Budget Allocated", "Total Expenses", "Total Expense Amount"],
                [budgetAllocated.innerText, totalExpenses.innerText, totalExpenseAmount.innerText.split(":")[1]?.trim()],
            ];
            
            

           // Starting position for the table
            let x = 22;
            let y = 85;
            const cellPadding = 4;  // Padding for the text inside cells
            const cellWidth = 55;  // Cell width
            const cellHeight = 10; // Cell height
            const numColumns = tableData[0].length; // Number of columns (assuming all rows have the same number of columns)

            // Set font size
            pdf.setFontSize(12);

            // Loop through rows and cells
            tableData.forEach((row, rowIndex) => {
            row.forEach((cell, cellIndex) => {

                    // Set bold font for the first row (header)
                    if (rowIndex === 0) {
                        pdf.setFont("Arial", "bold");
                    } else {
                        pdf.setFont("Arial", "normal");
                    }

                    // Add the text in each cell with padding
                    pdf.text(cell, x + (cellIndex * cellWidth) + cellPadding, y + (rowIndex * cellHeight) + cellPadding);

                    // Draw a border around each cell
                    pdf.rect(x + (cellIndex * cellWidth), y + (rowIndex * cellHeight), cellWidth, cellHeight);
                });
            });

            // Draw a border around the entire table (optional, for clarity)
            pdf.rect(x, y, numColumns * cellWidth, tableData.length * cellHeight);
            
            pdf.text(15, 245, 'Date Created: ');
            pdf.text(15, 260, 'Prepared By: ');
            pdf.text(15, 275, 'Approved By: ');
            pdf.text(25, 282, 'Jann Alfred A. Quinto, MSIB Dean, SITE');

            pdf.save('ud_expenses_totals.pdf');
            
            myChartref.options.plugins.bgColor.applyBackground = false;
            myChartref.update();
            expenseCategoryChartref.options.plugins.bgColor.applyBackground = false;
            expenseCategoryChartref.update();
        }, 100);
    }

    function udSalesGeneratePDF(){
        const title = getTitle()
        
        const donutChart = document.getElementById('donutChart');
        const donutChartref = Chart.getChart(donutChart);
        const myChart2 = document.getElementById('myChart2');
        const myChart2ref = Chart.getChart(myChart2);
        const printCategoryChart = document.getElementById('printCategoryChart');
        const printCategoryChartref = Chart.getChart(printCategoryChart);
        const categoryChart = document.getElementById('categoryChart');
        const categoryChartref = Chart.getChart(categoryChart);
        const topDishesChart = document.getElementById('topDishesChart');
        const topDishesChartref = Chart.getChart(topDishesChart);

        const totalSales = document.getElementById('totalSales');
        const printPhoto = document.getElementById('printPhoto');
        const udMerch = document.getElementById('udMerch');
        const customDeals = document.getElementById('customDeals');
        
        donutChartref.options.plugins.bgColor.applyBackground = true;
        donutChartref.update();
        myChart2ref.options.plugins.bgColor.applyBackground = true;
        myChart2ref.update();
        printCategoryChartref.options.plugins.bgColor.applyBackground = true;
        printCategoryChartref.update();
        categoryChartref.options.plugins.bgColor.applyBackground = true;
        categoryChartref.update();
        topDishesChartref.options.plugins.bgColor.applyBackground = true;
        topDishesChartref.update();

        setTimeout(() => {
            const donutChartImage = donutChart.toDataURL('image/jpeg', 1.0);
            const myChart2Image = myChart2.toDataURL('image/jpeg', 1.0);
            const printCategoryChartImage = printCategoryChart.toDataURL('image/jpeg', 1.0);
            const categoryChartImage = categoryChart.toDataURL('image/jpeg', 1.0);
            const topDishesChartImage = topDishesChart.toDataURL('image/jpeg', 1.0);
            let pdf = new jsPDF('portrait');
            
            pdf.setFontSize(27);
            pdf.setFont('Arial', 'bold');
            pdf.text(15, 15, title);

            pdf.setFontSize(15);
            pdf.setFont('Arial', 'normal');
            pdf.text(25, 25, 'Payment Methods');
            pdf.addImage(donutChartImage, 'JPEG', 25, 30, 45, 50);
            pdf.text(90, 25, 'Sales Trends');
            pdf.addImage(myChart2Image, 'JPEG', 90, 30, 110, 50);
            pdf.text(15, 88, 'Sales by Category');
            pdf.addImage(printCategoryChartImage, 'JPEG', 15, 93, 68, 55);
            pdf.addImage(categoryChartImage, 'JPEG', 90, 93, 110, 55);
            pdf.text(15, 158, 'Top-Selling Products');
            pdf.addImage(topDishesChartImage, 'JPEG', 45, 163, 110, 55);

            // Define your table data
            const tableData = [
                ["Print/Photo", "UdD Merch", "Custom Deals", "Total Sales"],
                [printPhoto.innerText.split(":")[1]?.trim(), udMerch.innerText.split(":")[1]?.trim(), customDeals.innerText.split(":")[1]?.trim(), totalSales.innerText],
            ];

            // Set font size
            pdf.setFontSize(15);

           // Starting position for the table
            let x = 32;
            let y = 225;
            const cellPadding = 4;  // Padding for the text inside cells
            const cellWidth = 36;  // Cell width
            const cellHeight = 10; // Cell height
            const numColumns = tableData[0].length; // Number of columns (assuming all rows have the same number of columns)

            // Set font size
            pdf.setFontSize(12);

            // Loop through rows and cells
            tableData.forEach((row, rowIndex) => {
            row.forEach((cell, cellIndex) => {
                    // Set bold font for the first row (header)
                    if (rowIndex === 0) {
                        pdf.setFont("Arial", "bold");
                    } else {
                        pdf.setFont("Arial", "normal");
                    }

                    // Add the text in each cell with padding
                    pdf.text(cell, x + (cellIndex * cellWidth) + cellPadding, y + (rowIndex * cellHeight) + cellPadding);

                    // Draw a border around each cell
                    pdf.rect(x + (cellIndex * cellWidth), y + (rowIndex * cellHeight), cellWidth, cellHeight);
                });
            });

            // Draw a border around the entire table (optional, for clarity)
            pdf.rect(x, y, numColumns * cellWidth, tableData.length * cellHeight);
            
            pdf.text(15, 245, 'Date Created: ');
            pdf.text(15, 260, 'Prepared By: ');
            pdf.text(15, 275, 'Approved By: ');
            pdf.text(25, 282, 'Jann Alfred A. Quinto, MSIB Dean, SITE');

            pdf.save('ud_sales_totals.pdf');
            
            donutChartref.options.plugins.bgColor.applyBackground = false;
            donutChartref.update();

            myChart2ref.options.plugins.bgColor.applyBackground = false;
            myChart2ref.update();

            printCategoryChartref.options.plugins.bgColor.applyBackground = false;
            printCategoryChartref.update();

            categoryChartref.options.plugins.bgColor.applyBackground = false;
            categoryChartref.update();
            
            topDishesChartref.options.plugins.bgColor.applyBackground = false;
            topDishesChartref.update();

        }, 100);
    }

    function dashboardGeneratePDF()
    {
        const title = getTitle();

        const canvas = document.getElementById('myChart');
        const totalSales = document.getElementById('totalSales');
        const totalOrders = document.getElementById('totalOrders');
        const totalExpenses = document.getElementById('totalExpenses');
        const totalProfit = document.getElementById('totalProfit');
        const targetSales = document.getElementById('targetSales');

        const myChart = Chart.getChart(canvas)
        
        myChart.options.plugins.bgColor.applyBackground = true;
        myChart.update();

        setTimeout(() => {
            const canvasImage = canvas.toDataURL('image/jpeg', 1.0);
            let pdf = new jsPDF('portrait');
            
            pdf.setFont('Arial', 'bold');
            pdf.setFontSize(27);
            pdf.text(15, 15, title);
            //console.log(pdf.internal.pageSize.getWidth);
            pdf.addImage(canvasImage, 'JPEG',  25, 25, 160, 75);

            // Define your table data
            const tableData = [
                ["Total Sales", "Total Profit", "Total Expenses", "Total Orders", "Target Sales"],
                [totalSales.innerText, totalProfit.innerText, totalExpenses.innerText, totalOrders.innerText, targetSales.innerText],
            ];

            // Set font size
            pdf.setFontSize(15);

           // Starting position for the table
            let x = 15;
            let y = 110;
            const cellPadding = 4;  // Padding for the text inside cells
            const cellWidth = 36;  // Cell width
            const cellHeight = 10; // Cell height
            const numColumns = tableData[0].length; // Number of columns (assuming all rows have the same number of columns)

            // Set font size
            pdf.setFontSize(12);

            // Loop through rows and cells
            tableData.forEach((row, rowIndex) => {
            row.forEach((cell, cellIndex) => {
                    // Set bold font for the first row (header)
                    if (rowIndex === 0) {
                        pdf.setFont("Arial", "bold");
                    } else {
                        pdf.setFont("Arial", "normal");
                    }

                    // Add the text in each cell with padding
                    pdf.text(cell, x + (cellIndex * cellWidth) + cellPadding, y + (rowIndex * cellHeight) + cellPadding);

                    // Draw a border around each cell
                    pdf.rect(x + (cellIndex * cellWidth), y + (rowIndex * cellHeight), cellWidth, cellHeight);
                });
            });

            // Draw a border around the entire table (optional, for clarity)
            pdf.rect(x, y, numColumns * cellWidth, tableData.length * cellHeight);
            
            pdf.text(15, 245, 'Date Created: ');
            pdf.text(15, 260, 'Prepared By: ');
            pdf.text(15, 275, 'Approved By: ');
            pdf.text(25, 282, 'Jann Alfred A. Quinto, MSIB Dean, SITE');

            pdf.save('dashboard_totals.pdf');

            myChart.options.plugins.bgColor.applyBackground = false;
            myChart.update();    
            
        },100)
    }

    function salesGeneratePDF(){
        const title = getTitle();

        const mychart1 = document.getElementById('myChart1');
        const myChart1ref = Chart.getChart(mychart1);

        const mychart2 = document.getElementById('myChart2');
        const myChart2ref = Chart.getChart(mychart2);

        const catergoryChart = document.getElementById('categoryChart');
        const catergoryChartref = Chart.getChart(catergoryChart);

        const topDishesChart = document.getElementById('topDishesChart');
        const topDishesChartref = Chart.getChart(topDishesChart);

        const leastSelling = document.getElementById('leastSelling');

        myChart1ref.options.plugins.bgColor.applyBackground = true;
        myChart1ref.update();

        myChart2ref.options.plugins.bgColor.applyBackground = true;
        myChart2ref.update();
        
        catergoryChartref.options.plugins.bgColor.applyBackground = true;
        catergoryChartref.update();

        topDishesChartref.options.plugins.bgColor.applyBackground = true;
        topDishesChartref.update();
            
        setTimeout(() => {
            const myChart1Canvas = myChart1.toDataURL('image/jpeg', 1.0);
            const myChart2Canvas = mychart2.toDataURL('image/jpeg', 1.0);
            const catergoryChartCanvas = catergoryChart.toDataURL('image/jpeg', 1.0);
            const topDishesChartCanvas = topDishesChart.toDataURL('image/jpeg', 1.0);
                
            let pdf = new jsPDF('portrait');
            
            pdf.setFontSize(27);
            pdf.setFont('Arial', 'bold');
            pdf.text(15, 15, title);
            pdf.setFontSize(15);
            pdf.setFont('Arial', 'normal');
            pdf.text(41, 26, 'Total Sales');
            pdf.addImage(myChart1Canvas, 'JPEG', 37, 30, 35, 40);
            pdf.text(135, 26, 'Sales Trend');
            pdf.addImage(myChart2Canvas, 'JPEG', 106, 30, 90, 40);
            pdf.text(37 , 81, 'Sales by Category');
            pdf.addImage(catergoryChartCanvas, 'JPEG', 15, 85, 90, 40);
            pdf.text(128 , 81, 'Top-Selling Products');
            pdf.addImage(topDishesChartCanvas, 'JPEG', 106, 85, 90, 40);
            
            const listItems = [...leastSelling.querySelectorAll("li")].map(li => li.innerText);

            // Define your table data
            const tableData = [
                ["Least-Selling Products"],
                ...listItems.map(item => [item])
            ];

            // Set font size
            pdf.setFontSize(15);

           // Starting position for the table
            let x = 80;
            let y = 135;
            const cellPadding = 4;  // Padding for the text inside cells
            const cellWidth = 50;  // Cell width
            const cellHeight = 10; // Cell height
            const numColumns = tableData[0].length; // Number of columns (assuming all rows have the same number of columns)

            // Set font size
            pdf.setFontSize(12);

            // Loop through rows and cells
            tableData.forEach((row, rowIndex) => {
            row.forEach((cell, cellIndex) => {
                    // Set bold font for the first row (header)
                    if (rowIndex === 0) {
                        pdf.setFont("Arial", "bold");
                    } else {
                        pdf.setFont("Arial", "normal");
                    }

                    // Add the text in each cell with padding
                    pdf.text(cell, x + (cellIndex * cellWidth) + cellPadding, y + (rowIndex * cellHeight) + cellPadding);

                    // Draw a border around each cell
                    pdf.rect(x + (cellIndex * cellWidth), y + (rowIndex * cellHeight), cellWidth, cellHeight);
                });
            });

            // Draw a border around the entire table (optional, for clarity)
            pdf.rect(x, y, numColumns * cellWidth, tableData.length * cellHeight);
            
            pdf.text(15, 245, 'Date Created: ');
            pdf.text(15, 260, 'Prepared By: ');
            pdf.text(15, 275, 'Approved By: ');
            pdf.text(25, 282, 'Jann Alfred A. Quinto, MSIB Dean, SITE');

            pdf.save('sales_totals.pdf');

            myChart1ref.options.plugins.bgColor.applyBackground = false;
            myChart1ref.update();
            myChart2ref.options.plugins.bgColor.applyBackground = false;
            myChart2ref.update();
            catergoryChartref.options.plugins.bgColor.applyBackground = false;
            catergoryChartref.update();
            topDishesChartref.options.plugins.bgColor.applyBackground = false;
            topDishesChartref.update();

        },500)
    }

    function expensesGeneratePDF(){
        const title = getTitle();

        const myChart = document.getElementById('myChart');
        const myChartref = Chart.getChart(myChart);

        const expensesCategory = document.getElementById('expenseCategoryChart');
        const expensesCategoryref = Chart.getChart(expensesCategory);

        const budgetAllocated = document.getElementById('budgetAllocated');
        const totalExpenses = document.getElementById('totalExpenses');
        const totalExpenseAmount = document.getElementById('totalExpenseAmount');

        myChartref.options.plugins.bgColor.applyBackground = true;
        myChartref.update();

        expensesCategoryref.options.plugins.bgColor.applyBackground = true;
        expensesCategoryref.update();

        setTimeout(() => {
            const myChartCanvas = myChart.toDataURL('image/jpeg', 1.0);
            const expensesCategoryCanvas =expensesCategory.toDataURL('image/jpeg', 1.0);

            let pdf = new jsPDF('portrait');
            pdf.setFontSize(27);
            pdf.setFont('Arial', 'bold');
            pdf.text(15, 15, title);
            pdf.setFontSize(15);
            pdf.setFont('Arial', 'normal');
            pdf.text(42, 32, 'Expense Trends');
            pdf.addImage(myChartCanvas, 'JPEG', 15, 35, 85, 40);
            pdf.text(130, 32, 'Expense by Category');
            pdf.addImage(expensesCategoryCanvas, 'JPEG', 110, 35, 85, 40);
            
            // Set font size
            pdf.setFontSize(15);

            // Define your table data
            const tableData = [
                ["Budget Allocated", "Total Expenses", "Total Expense Amount"],
                [budgetAllocated.innerText, totalExpenses.innerText, totalExpenseAmount.innerText.split(":")[1]?.trim()],
            ];
            
            

           // Starting position for the table
            let x = 22;
            let y = 85;
            const cellPadding = 4;  // Padding for the text inside cells
            const cellWidth = 55;  // Cell width
            const cellHeight = 10; // Cell height
            const numColumns = tableData[0].length; // Number of columns (assuming all rows have the same number of columns)

            // Set font size
            pdf.setFontSize(12);

            // Loop through rows and cells
            tableData.forEach((row, rowIndex) => {
            row.forEach((cell, cellIndex) => {

                    // Set bold font for the first row (header)
                    if (rowIndex === 0) {
                        pdf.setFont("Arial", "bold");
                    } else {
                        pdf.setFont("Arial", "normal");
                    }

                    // Add the text in each cell with padding
                    pdf.text(cell, x + (cellIndex * cellWidth) + cellPadding, y + (rowIndex * cellHeight) + cellPadding);

                    // Draw a border around each cell
                    pdf.rect(x + (cellIndex * cellWidth), y + (rowIndex * cellHeight), cellWidth, cellHeight);
                });
            });

            // Draw a border around the entire table (optional, for clarity)
            pdf.rect(x, y, numColumns * cellWidth, tableData.length * cellHeight);
            
            pdf.text(15, 245, 'Date Created: ');
            pdf.text(15, 260, 'Prepared By: ');
            pdf.text(15, 275, 'Approved By: ');
            pdf.text(25, 282, 'Jann Alfred A. Quinto, MSIB Dean, SITE');

            pdf.save('expenses_totals.pdf');

            myChartref.options.plugins.bgColor.applyBackground = false;
            myChartref.update();

            expensesCategoryref.options.plugins.bgColor.applyBackground = false;
            expensesCategoryref.update();
        }, 500);
    }

    function generatePDF() {      
        console.log(checkCurrentDashboard()); 
        if(checkCurrentDashboard() == "Dashboard"){
            dashboardGeneratePDF(); 
        }
        else if(checkCurrentDashboard() == "Sales"){
            salesGeneratePDF();
        }
        else if(checkCurrentDashboard() == "Expenses"){
            expensesGeneratePDF();
        }else if(checkCurrentDashboard() == "UD Dashboard"){
            udDashboardGeneratePDF();
        }
        else if(checkCurrentDashboard() == "UD Sales"){
            udSalesGeneratePDF();
        }
        else if(checkCurrentDashboard() == "UD Expenses"){
            udExpensesGeneratePDF();
        }else if(checkCurrentDashboard() == "Executive"){
            executiveGeneratePDF();
        }
    }
</script>



<!-- SCRIPT FOR DYNAMIC STYLING PER BUSINESSES -->
<!-- DYNAMIC STYLING FOR BODY, BUSINESS DROPDOWN, DB CARDS, DATE FILTER -->
<script>
    const currentPath = window.location.pathname;
    console.log(currentPath);

    const dashboardsBody = document.querySelector('.dashboards-body');
    const dropdownBusinessBtn = document.querySelector('.dropdown-business-btn');
    const dashboardCards = document.querySelectorAll('.dashboard-card');
    const dashboardTiles = document.querySelectorAll('.main-dashboard-tile');
    const navDropdownMenu = document.querySelector('.dropdown-business-menu');
    const navDropdownMenuItem = document.querySelectorAll('.business-item');
    const dateFilterMenu = document.querySelector('.date-dropdown-menu');
    const dateFilterItem = document.querySelectorAll('.date-item');

    const promoText = document.querySelectorAll('.promo-date-text');


    document.addEventListener('DOMContentLoaded', () => {
        switch (true) {
            case currentPath.includes("/kuwago-one"):

                dashboardsBody.style.background = "url('/assets/images/k1-bg-img.png') no-repeat center center fixed";
                dropdownBusinessBtn.style.setProperty('--nav-dropdown-bg-image', "url('/assets/images/k1-bg-img.png')");
                dropdownBusinessBtn.style.setProperty('--dropdown-filter', "blur(20px) brightness(150%)");
                navDropdownMenu.style.setProperty('--nav-dropdown-menu', "rgba(61, 39, 22, 0.8)");
                dateFilterMenu.style.setProperty('--date-dropdown-menu', "rgba(61, 39, 22, 0.8)");

                // GENERAL DB CARDS
                dashboardCards.forEach(function(card) {
                    card.style.setProperty('--db-card-bg-image', "url('/assets/images/k1-bg-img.png')");
                    card.style.setProperty('--db-card-filter', "blur(30px) brightness(100%)");
                })

                // ALL DB CARDS
                dashboardTiles.forEach(function(tile) {
                    tile.style.setProperty('--main-tile-img', "url('/assets/images/k1-bg-img.png')");
                    tile.style.setProperty('--main-tile-filter', "blur(30px) brightness(100%)");
                })

                // NAV BUSINESSES DROPDOWN ITEMS
                navDropdownMenuItem.forEach(function(menuItem) {
                    menuItem.style.setProperty('--nav-dropdown-hover', "rgb(43, 27, 15)");
                    menuItem.style.setProperty('--nav-dropdown-active', "rgb(182, 119, 71)");
                })

                // DATE FILTER DROPDOWN ITEMS
                dateFilterItem.forEach(function(dateItem) {
                    dateItem.style.setProperty('--date-dropdown-hover', "rgb(43, 27, 15)");
                    dateItem.style.setProperty('--date-dropdown-active', "rgb(182, 119, 71)");
                })

                // PROMO TEXT
                promoText.forEach(function(text) {
                    text.style.color = "rgb(66, 47, 10)";
                })

                break;

            case currentPath.includes("/kuwago-two"):

                dashboardsBody.style.background = "url('/assets/images/k2-bg-img.png') no-repeat center center fixed";
                dropdownBusinessBtn.style.setProperty('--nav-dropdown-bg-image', "url('/assets/images/k2-bg-img.png')");
                dropdownBusinessBtn.style.setProperty('--dropdown-filter', "blur(20px) brightness(130%) contrast(90%)");
                navDropdownMenu.style.setProperty('--nav-dropdown-menu', "rgba(112, 114, 101, 0.9)");
                dateFilterMenu.style.setProperty('--date-dropdown-menu', "rgba(112, 114, 101, 0.9)");

                // GENERAL DB CARDS
                dashboardCards.forEach(function(card) {
                    card.style.setProperty('--db-card-bg-image', "url('/assets/images/k2-bg-img.png')");
                    card.style.setProperty('--db-card-filter', "blur(30px) brightness(110%)");
                })

                // ALL DB CARDS
                dashboardTiles.forEach(function(tile) {
                    tile.style.setProperty('--main-tile-img', "url('/assets/images/k2-bg-img.png')");
                    tile.style.setProperty('--main-tile-filter', "blur(30px) brightness(110%)");
                })

                // NAV BUSINESSES DROPDOWN ITEMS
                navDropdownMenuItem.forEach(function(menuItem) {
                    menuItem.style.setProperty('--nav-dropdown-hover', "rgb(61, 62, 56)");
                    menuItem.style.setProperty('--nav-dropdown-active', "rgb(177,178,168)");
                })

                // DATE FILTER DROPDOWN ITEMS
                dateFilterItem.forEach(function(dateItem) {
                    dateItem.style.setProperty('--date-dropdown-hover', "rgb(61, 62, 56)");
                    dateItem.style.setProperty('--date-dropdown-active', "rgb(177,178,168)");
                })

                // PROMO TEXT
                promoText.forEach(function(text) {
                    text.style.color ="rgb(0, 0, 0)";
                })

                break;

            case currentPath.includes("/uddesign"):

                dashboardsBody.style.background = "url('/assets/images/uddesign-bg-img.png') no-repeat center center fixed";
                dropdownBusinessBtn.style.setProperty('--nav-dropdown-bg-image', "url('/assets/images/uddesign-bg-img.png')");
                dropdownBusinessBtn.style.setProperty('--dropdown-filter', "blur(20px) brightness(150%) contrast(90%)");
                navDropdownMenu.style.setProperty('--nav-dropdown-menu', "rgba(60, 69, 75, 0.9)");
                dateFilterMenu.style.setProperty('--date-dropdown-menu', "rgba(60, 69, 75, 0.9)");

                // GENERAL DB CARDS
                dashboardCards.forEach(function(card) {
                    card.style.setProperty('--db-card-bg-image', "url('/assets/images/uddesign-bg-img.png')");
                    card.style.setProperty('--db-card-filter', "blur(20px) brightness(120%) contrast(85%)");
                })

                // ALL DB CARDS
                dashboardTiles.forEach(function(tile) {
                    tile.style.setProperty('--main-tile-img', "url('/assets/images/uddesign-bg-img.png')");
                    tile.style.setProperty('--main-tile-filter', "blur(30px) brightness(110%)");
                })

                // NAV BUSINESSES DROPDOWN ITEMS
                navDropdownMenuItem.forEach(function(menuItem) {
                    menuItem.style.setProperty('--nav-dropdown-hover', "rgb(114, 131, 142)");
                    menuItem.style.setProperty('--nav-dropdown-active', "rgb(177,178,168)");
                })

                // DATE FILTER DROPDOWN ITEMS
                dateFilterItem.forEach(function(dateItem) {
                    dateItem.style.setProperty('--date-dropdown-hover', "rgb(114, 131, 142");
                    dateItem.style.setProperty('--date-dropdown-active', "rgb(177,178,168)");
                })

                break;

                case currentPath.includes("/executive"):

                    dashboardsBody.style.background = "url('/assets/images/maindb-bg-img.png') no-repeat center center fixed";
                    dropdownBusinessBtn.style.setProperty('--nav-dropdown-bg-image', "url('/assets/images/maindb-bg-img.png')");
                    dropdownBusinessBtn.style.setProperty('--dropdown-filter', "blur(20px) brightness(120%) contrast(90%)");
                    navDropdownMenu.style.setProperty('--nav-dropdown-menu', "rgba(48,49,40, 0.9)");
                    dateFilterMenu.style.setProperty('--date-dropdown-menu', "rgba(48,49,40, 0.9)");

                    // GENERAL DB CARDS
                    dashboardCards.forEach(function(card) {
                        card.style.setProperty('--db-card-bg-image', "url('/assets/images/maindb-bg-img.png')");
                        card.style.setProperty('--db-card-filter', "blur(20px) brightness(120%) contrast(85%)");
                    })

                    // ALL DB CARDS
                    dashboardTiles.forEach(function(tile) {
                        tile.style.setProperty('--main-tile-img', "url('/assets/images/uddesign-bg-img.png')");
                        tile.style.setProperty('--main-tile-filter', "blur(30px) brightness(110%)");
                    })

                    // NAV BUSINESSES DROPDOWN ITEMS
                    navDropdownMenuItem.forEach(function(menuItem) {
                        menuItem.style.setProperty('--nav-dropdown-hover', "rgb(114, 131, 142)");
                        menuItem.style.setProperty('--nav-dropdown-active', "rgb(177,178,168)");
                    })

                    // DATE FILTER DROPDOWN ITEMS
                    dateFilterItem.forEach(function(dateItem) {
                        dateItem.style.setProperty('--date-dropdown-hover', "rgb(114, 131, 142");
                        dateItem.style.setProperty('--date-dropdown-active', "rgb(177,178,168)");
                    })

                    break;
        }
    });
</script>