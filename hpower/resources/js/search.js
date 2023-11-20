// search.js
$(document).ready(function() {
    $("#btnNavbarSearch").on("click", function() {
        var searchTerm = $("#searchInput").val().toLowerCase();
        
        $(".tableau tbody tr").each(function() {
            var text = $(this).text().toLowerCase();
            if (text.indexOf(searchTerm) === -1) {
                $(this).hide();
            } else {
                $(this).show();
            }
        });
    });
});
