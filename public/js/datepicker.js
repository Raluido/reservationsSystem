var data = document.getElementById("checkeddata");
var events = JSON.parse(data.value);
var today = new Date();

const yyyy = today.getFullYear();
let mm = today.getMonth() + 1; // Months start at 0!
let dd = today.getDate();

if (dd < 10) dd = '0' + dd;
if (mm < 10) mm = '0' + mm;

const date = yyyy + '-' + mm + '-' + dd;

// Setup our datepicker
$("#datepicker").datepicker({
    dateFormat: "yy-mm-dd",
    maxDate: 15,
    minDate: today,
    onSet: findEvents(date),
    onSelect: findEvents,
    beforeShowDay: disableDates,
    onChangeMonthYear: function (year, month) {
        setTimeout(changeBackground, 1, year, month);
    },
});

function disableDates(date) {
    var dow = date.getDay();
    if (dow > 5 || dow < 1) return [false, ""];
    return [true, ""];
}

var d = new Date();
changeBackground(d.getFullYear(), d.getMonth() + 1);

function changeBackground(year, month) {
    for (var date in events) {
        var d = new Date(date);
        // if same day and year
        if (d.getFullYear() === year && d.getMonth() + 1 === month) {
            var day = d.getDate();
            // retrieve all elements containing day
            var elements = $("a:contains(" + day + ")");
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
                elements.each(function (index) {
                    if ($(this).text() == day) {
                        $(this).css("background", "red");
                    }
                });
            } else if (y >= 1) {
                elements.each(function (index) {
                    if ($(this).text() == day) {
                        $(this).css("background", "orange");
                    }
                });
            } else if (x >= 1) {
                elements.each(function (index) {
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
        $("#dateevents").html("<h2>" + date + ": Horas disponibles</h2>");
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

// function findEventsDefault(formattedToday) {
//     var d = new Date(formattedToday);
//     setTimeout(changeBackground, 1, d.getFullYear(), d.getMonth() + 1);

//     // Start by emptying our data container
//     $("#dateevents").empty();
//     // Potential date object
//     // If no events exist for the selected date
//     try {
//         var dateObj = [];
//         for (let index = 0; index < Object.keys(events[formattedToday][0]).length; index++) {
//             dateObj[index] = events[formattedToday][0][index];
//         }
//         $("#dateevents").html("<h2>" + formattedToday + ": Horas disponibles</h2>");
//         // Cycle over every event for this date
//         $.each(dateObj, function (index, event) {
//             // Build a list for each event
//             var $list = $("<div>");
//             // Add all event details to list
//             $.each(event, function (name, desc) {
//                 $("<div>")
//                     .html(name + ": " + desc)
//                     .appendTo($list);
//             });
//             // Place list in container
//             $list.appendTo("#dateevents");
//         });
//     } catch (error) {
//         return $("#dateevents").html("<h2>" + formattedToday + ": No hay actividades éste día</h2>");
//     }
// }
