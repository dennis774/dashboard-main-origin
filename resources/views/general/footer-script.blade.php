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


<!-- SCRIPT FOR GENERATE PDF -->
<script>
    function generatePDF() {
        alert("PDF Generated!");
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