var test = "dfgdfg";
$("#button1").click(function (event) {
    $.ajax({
        url: "/padelReservations/test/" + test,
        type: "get",
        dataType: "json",
        data: {},
        success: function (data) {
            alert(data);
        },
    });
});
