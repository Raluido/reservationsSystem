$(document).ready(function () {
    var today = new Date();
    var day =
        today.getFullYear() +
        "/" +
        (today.getMonth() + 1) +
        "/" +
        today.getDate();
    today.setDate(today.getDate() + 15);
    var rangeFix =
        today.getFullYear() +
        "/" +
        (today.getMonth() + 1) +
        "/" +
        today.getDate();
    $('input[name="daterange"]').daterangepicker({
        autoApply: true,
        opens: "left",
        drops: "left",
        singleDatePicker: true,
        minDate: day,
        maxDate: rangeFix,
        locale: {
            format: "YYYY/MM/DD",
        },
        isInvalidDate: function (date) {
            if (date.day() == 0 || date.day() == 6) return true;
            return false;
        },
    });
    $("#button1").click(function (event) {
        startDate = $('input[name="daterange"]').data(
            "daterangepicker"
        ).startDate;
        var d = new Date(startDate),
            month = "" + (d.getMonth() + 1),
            day = "" + d.getDate(),
            year = d.getFullYear();
        var start_Date_fix = year + "-" + month + "-" + day;
        $.ajax({
            url: "/yogaReservations/getcheckdate/" + start_Date_fix,
            type: "get",
            data: {},
            datatype: "json",
            success: function (data) {
                document.getElementById("checkdate1").innerHTML = data[0][1];
                document.getElementById("checkdate2").innerHTML = data[1][1];
            },
        });
    });
});
