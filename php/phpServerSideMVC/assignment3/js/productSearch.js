/**
 * 159339Assignment3
 * XIN WANG 15397438
 * Tianxiang Han 13064237
 * Zhen Cheng 13040788
 */
$(document).ready(function () {
    var productSearch = function (element) {
        var url = "../Product/searchByName?productName=" + element.val();
        $.getJSON(url, function (data) {
            var tbl_body = "";
            $.each(data, function () {
                var tbl_row = "";
                $.each(this, function (k, v) {
                    tbl_row += "<td>" + v + "</td>";
                });
                tbl_body += "<tr>" + tbl_row + "</tr>";
            });
            if (tbl_body == "") {
                $("table tbody").html("Item not found!");
            }
            else {
                $("table tbody").html(tbl_body);
            }
        });
    };

    $("input").on('input', function () {
        productSearch($(this));
    });
});