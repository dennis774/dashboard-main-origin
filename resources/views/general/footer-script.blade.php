<!-- SCRIPT FOR FOOTER DATE FILTER -->
@if(isset($actionRoute))
<script>
    const dateItems = document.querySelectorAll('.date-item');
    const sortItems = document.querySelectorAll('.sort-item');
    let dateInterval;
    let sortValue;

    //ADD CLICK EVENT TO EACH DATE OPTIONS IN DATE FILTER

    dateItems.forEach((item) => {
        item.addEventListener('click', (event) => {
            event.preventDefault();
            dateInterval = event.target.getAttribute('data-interval');
            console.log("Selected value:", dateInterval);

            //POINT THE LINK TO THE SELECTED DATE
            window.location.href = `{{$actionRoute}}?interval=${dateInterval}`;
        });
    });

    


    // function handleFilterChange() {
    //     const filter = document.getElementById("dateFilter").getAttribute('data-interval');
    //     if (filter === "custom") {
    //         document.getElementById("customDateModal").style.display = "flex";
    //     } else {
    //         window.location.href = `{{$actionRoute}}?interval=${filter}`;
    //     }
    // }
</script>
@endif


<!-- SCRIPT FOR GENERATE PDF -->\
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/4.9.124/pdf.min.mjs"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

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
            return "UD Design Summary";
        }
        else if(titleInLink == "/uddesign/sales"){
            return "UD Design Sales";
        }
        else if(titleInLink == "/uddesign/expenses"){
            return "UD Design Expenses"
        }
        else {
            return "Null"
        }
    }

    function udDashboardGeneratePDF(){
        const title = getTitle()

        const printingChart = document.getElementById('PrintingChart');
        const merchChart = document.getElementById('MerchChart');
        const totalSales = document.getElementById('totalSales');
        const totalExpenses = document.getElementById('totalExpenses');
        const totalProfit = document.getElementById('totalProfit');

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
            
            pdf.setFontSize(15);
            pdf.setFont('Times', 'Roman');
            
            pdf.text(15, 15, title);
            pdf.text(15, 25, 'Printing/Photocopy Sales, Profit, and Expenses');
            pdf.addImage(printingChartImage, 'JPEG', 45, 30, 120, 50);
            pdf.text(15, 90, 'UdD Merch Sales, Profit, and Expenses');
            pdf.addImage(merchChartImage, 'JPEG', 45, 95, 120, 50);
            pdf.text(15, 155, 'Total Sales:');
            pdf.text(42, 155, totalSales.innerText);
            pdf.text(15, 165, 'Total Profit:');
            pdf.text(42, 165, totalProfit.innerText);
            pdf.text(15, 175, 'Total Expenses:');
            pdf.text(50, 175, totalExpenses.innerText);

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

        myChartref.options.plugins.bgColor.applyBackground = true;
        myChartref.update();
        expenseCategoryChartref.options.plugins.bgColor.applyBackground = true;
        expenseCategoryChartref.update();

        setTimeout(() => {
            const myChartImage = myChart.toDataURL('image/jpeg', 1.0);
            const expenseCategoryChartImage = expenseCategoryChart.toDataURL('image/jpeg', 1.0);

            let pdf = new jsPDF('portrait');
            
            pdf.setFontSize(15);
            pdf.setFont('Times', 'Roman');
            pdf.text(15, 15, title);

            pdf.text(15, 25, 'Expense Trends');
            pdf.addImage(myChartImage, 'JPEG', 45, 30, 110, 50);
            pdf.text(15, 90, 'Expense by Category');
            pdf.addImage(expenseCategoryChartImage, 'JPEG', 45, 95, 120, 50);

            pdf.save('ud_expenses_totals.pdf');
            
            myChartref.options.plugins.bgColor.applyBackground = false;
            myChartref.update();
            expenseCategoryChartref.options.plugins.bgColor.applyBackground = false;
            expenseCategoryChartref.update();
        }, 100);
    }

    function udSalesGeneratePDF(){
        const title = getTitle()

        const myChart2 = document.getElementById('myChart2');
        const myChart2ref = Chart.getChart(myChart2);
        const printCategoryChart = document.getElementById('printCategoryChart');
        const printCategoryChartref = Chart.getChart(printCategoryChart);
        const categoryChart = document.getElementById('categoryChart');
        const categoryChartref = Chart.getChart(categoryChart);
        const topDishesChart = document.getElementById('topDishesChart');
        const topDishesChartref = Chart.getChart(topDishesChart);
        const totalSales = document.getElementById('totalSales');

        myChart2ref.options.plugins.bgColor.applyBackground = true;
        myChart2ref.update();
        printCategoryChartref.options.plugins.bgColor.applyBackground = true;
        printCategoryChartref.update();
        categoryChartref.options.plugins.bgColor.applyBackground = true;
        categoryChartref.update();
        topDishesChartref.options.plugins.bgColor.applyBackground = true;
        topDishesChartref.update();

        setTimeout(() => {
            const myChart2Image = myChart2.toDataURL('image/jpeg', 1.0);
            const printCategoryChartImage = printCategoryChart.toDataURL('image/jpeg', 1.0);
            const categoryChartImage = categoryChart.toDataURL('image/jpeg', 1.0);
            const topDishesChartImage = topDishesChart.toDataURL('image/jpeg', 1.0);
            let pdf = new jsPDF('portrait');
            
            pdf.setFontSize(15);
            pdf.setFont('Times', 'Roman');
            pdf.text(15, 15, title);
            pdf.text(15, 25, 'Sales Trends');
            pdf.addImage(myChart2Image, 'JPEG', 45, 30, 110, 50);
            pdf.text(15, 88, 'Sales by Category');
            pdf.addImage(printCategoryChartImage, 'JPEG', 15, 93, 68, 55);
            pdf.addImage(categoryChartImage, 'JPEG', 90, 93, 110, 55);
            pdf.text(15, 158, 'Top-Selling Products');
            pdf.addImage(topDishesChartImage, 'JPEG', 45, 163, 110, 55);

            pdf.text(15, 229, 'Total Sales:');
            pdf.text(43, 229.5, totalSales.innerText);

            pdf.save('ud_sales_totals.pdf');

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

        const myChart = Chart.getChart(canvas)
        
        myChart.options.plugins.bgColor.applyBackground = true;
        myChart.update();

        setTimeout(() => {
            const canvasImage = canvas.toDataURL('image/jpeg', 1.0);
            let pdf = new jsPDF('portrait');
            
            pdf.setFontSize(15);
            pdf.setFont('Times', 'Roman');
            pdf.text(15, 15, title);
            //console.log(pdf.internal.pageSize.getWidth);
            pdf.addImage(canvasImage, 'JPEG', 15, 20, 90, 40);

            pdf.text(15, 110, 'Total Sales:');
            pdf.text(42, 110, totalSales.innerText);
            pdf.text(15, 120, 'Total Profit:');
            pdf.text(42, 120, totalProfit.innerText);
            pdf.text(15, 130, 'Total Expenses:');
            pdf.text(50, 130, totalExpenses.innerText);
            pdf.text(15, 140, 'Total Orders:');
            pdf.text(47, 140, totalOrders.innerText);
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
            pdf.setFontSize(15);
            pdf.setFont('Times', 'Roman');
            pdf.text(15, 15, title);
            pdf.addImage(myChart1Canvas, 'JPEG', 15, 20, 90, 40);
            pdf.addImage(myChart2Canvas, 'JPEG', 106, 20, 90, 40);
            pdf.addImage(catergoryChartCanvas, 'JPEG', 15, 65, 90, 40);
            pdf.addImage(topDishesChartCanvas, 'JPEG', 106, 65, 90, 40);

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

        myChartref.options.plugins.bgColor.applyBackground = true;
        myChartref.update();

        expensesCategoryref.options.plugins.bgColor.applyBackground = true;
        expensesCategoryref.update();

        setTimeout(() => {
            const myChartCanvas = myChart.toDataURL('image/jpeg', 1.0);
            const expensesCategoryCanvas =expensesCategory.toDataURL('image/jpeg', 1.0);

            let pdf = new jsPDF('portrait');
            pdf.setFontSize(15);
            pdf.setFont('Times', 'Roman');
            pdf.text(15, 15, title);
            pdf.addImage(myChartCanvas, 'JPEG', 15, 20, 90, 40);
            pdf.addImage(expensesCategoryCanvas, 'JPEG', 106, 20, 90, 40);

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
                    card.style.setProperty('--db-card-filter', "blur(30px) brightness(130%)");
                })

                // ALL DB CARDS
                dashboardTiles.forEach(function(tile) {
                    tile.style.setProperty('--main-tile-img', "url('/assets/images/k1-bg-img.png')");
                    tile.style.setProperty('--main-tile-filter', "blur(30px) brightness(150%)");
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