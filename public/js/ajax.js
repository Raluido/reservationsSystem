function checkitout() {
    var checkdate = document.getElementById(daterange);
    alert(daterange);
    $.ajax({
        url: "padelReservations/getcheckdate/" + checkdate,
        type: "get",
        dataType: "json",
        data: {},
        success: function (data) {
            alert("success");
        },
    });
}
