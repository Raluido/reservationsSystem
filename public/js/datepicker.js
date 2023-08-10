var data = document.getElementById("checkeddata");
var events = JSON.parse(data.value);

var today = new Date();
const yyyy = today.getFullYear();
let mm = today.getMonth() + 1; // Months start at 0!
let dd = today.getDate();
if (dd < 10) dd = '0' + dd;  // añadir cero delante
if (mm < 10) mm = '0' + mm;
const date = yyyy + '-' + mm + '-' + dd;


// Setup our datepicker
$("#datepicker").datepicker({
    dateFormat: "yy-mm-dd",
    maxDate: 15,
    minDate: date,
    onSet: findEvents(date),
    onSelect: findEvents,
    beforeShowDay: disableDates,
    // onChangeMonthYear: function (year, month) {  // when change month|year its activated so the function settimeout and the changebackground.
    //     // setTimeout(changeBackground, 5000, year, month);
    //     changeBackground(year, month);
    // },
});

function disableDates(date) {
    var dow = date.getDay();
    if (dow > 5 || dow < 1) return [false, ""];
    return [true, ""];
}

function changeBackground(year, month) {
    for (var date in events) {
        var d = new Date(date);
        // if its the same month and year than today
        if (d.getFullYear() === year && d.getMonth() + 1 === month) {
            var day = d.getDate();
            // retrieve all elements containing day
            var elements = $("a:contains(" + day + ")");  // if every anchor (each day on datapicker) contain a the days Im passing 
            var i = 0;
            var x = 0;
            var y = 0;

            for (let index = 0; index < Object.keys(events[date][0]).length; index++) {
                if (events[date][0][index]["Estado"] == "Sin plazas") {
                    i++;
                } else if (events[date][0][index]["Estado"] == "Hay plazas") {
                    x++;
                } else if (events[date][0][index]["Estado"] == "Reservado") {
                    y++;
                }
            }

            if (i == Object.keys(events[date][0]).length) {
                elements.each(function () {
                    if ($(this).text() == day) {
                        $(this).css("background", "red");
                    }
                });
            } else if (y > 0) {
                elements.each(function () {
                    if ($(this).text() == day) {
                        $(this).css("background", "orange");
                    }
                });
            } else if (x == Object.keys(events[date][0]).length) {
                elements.each(function () {
                    if ($(this).text() == day) {
                        $(this).css("background", "green");
                    }
                });
            }
        }
    }
}

// Provide a function to find and display events
function findEvents(date) {
    var d = new Date(date);
    setTimeout(changeBackground, 1, d.getFullYear(), d.getMonth() + 1);

    // Start by emptying our data container
    $("#dateevents").empty();
    // Potential date object
    // If no events exist for the selected date
    try {
        var dateObj = [];
        for (let index = 0; index < Object.keys(events[date][0]).length; index++) {
            dateObj[index] = events[date][0][index];
        }
        $("#dateevents").html("<h5>" + date + ": Horas disponibles</h5>");
        // Cycle over every event for this date
        $.each(dateObj, function (index, event) {
            // Build a list for each event
            var $list = $("<div>");
            // Add all event details to list
            $.each(event, function (name, desc) {
                $("<div class='mb-2'>")
                    .html(name + ": " + desc)
                    .appendTo($list);
            });
            // Place list in container
            $list.appendTo("#dateevents");
        });
    } catch (error) {
        return $("#dateevents").html("<h2>" + date + ": No hay actividades éste día</h2>");
    }
}