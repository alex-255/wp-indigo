var grid = document.querySelector(".grid-parent");
var iso = new Isotope(grid, {
    // options...
    itemSelector: ".grid-item",
    // masonry: {
    //     columnWidth: 200,
    // },
});

jQuery(document).ready(function ($) {
    $(".filter-button-group").on("click", "button", function () {
        var filterValue = $(this).attr("data-filter");
        $(".grid-parent").isotope({ filter: filterValue });
    });
});
