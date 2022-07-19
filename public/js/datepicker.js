var data = document.getElementById("checkeddata");
// var data1 = document.getElementById("checkeddata1");
// var data2 = document.getElementById("checkeddata2");

var events = JSON.parse(data.value);

// console.log(events);

var today = new Date();

// Setup our datepicker
$("#datepicker").datepicker({
    dateFormat: "yy-mm-dd",
    maxDate: 15,
    minDate: today,
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
            if (
                events[date][0]["Estado"] == "Sin plazas" &&
                events[date][0]["Estado "] == "Sin plazas"
            ) {
                elements.each(function (index) {
                    if ($(this).text() == day) {
                        $(this).css("background", "red");
                    }
                });
            } else
                elements.each(function (index) {
                    if ($(this).text() == day) {
                        $(this).css("background", "green");
                    }
                });
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
    var dateObj = events[date];
    // If no events exist for the selected date
    if (!dateObj) {
        return $("#dateevents").html("<h2>" + date + ": No Events</h2>");
    }

    // If we've made it this far, we have events!
    $("#dateevents").html("<h2>" + date + ": Horas disponibles</h2>");
    // Cycle over every event for this date
    $.each(dateObj, function (index, event) {
        // Build a list for each event
        var $list = $("<div>");
        // Add all event details to list
        $.each(event, function (name, desc) {
            $("<div>")
                .html(name + ": " + desc)
                .appendTo($list);
        });
        // Place list in container
        $list.appendTo("#dateevents");
    });
}

// var events2 = {
//     "2022-07-29": [
//         {
//             title: "Friday!!!!",
//             description: "Weekend is starting!!!",
//         },
//     ],
//     "2022-07-26": [
//         {
//             title: "Friday!!!!",
//             description: "Weekend is starting!!!",
//         },
//     ],
//     "2022-07-25": [
//         {
//             title: "Friday!!!!",
//             description: "Weekend is starting!!!",
//         },
//     ],
// };

// console.log((events2["2022-07-29"][0]["title"]));
