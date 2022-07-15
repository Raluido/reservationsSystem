function disableDates(date) {
    var dow = date.getDay();
    if (dow > 5 || dow < 1) return [false, ""];
    return [true, ""];
}

var events = {
    "2022-07-29": [
        {
            title: "Friday!!!!",
            description: "Weekend is starting!!!",
        },
    ],
    "2022-07-26": [
        {
            title: "Friday!!!!",
            description: "Weekend is starting!!!",
        },
    ],
    "2022-07-25": [
        {
            title: "Friday!!!!",
            description: "Weekend is starting!!!",
        },
    ],
};

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
            elements.each(function (index) {
                if ($(this).text() == day) {
                    $(this).css("background", "green");
                }
            });
        }
    }
}

var data = document.getElementById('checkeddata');

var data2 = JSON.parse(data.value);

var obj = {};

for (let i = 0; i < data2.length; i++) {
    obj.push({
      data2[i,0] : data2[i,1],
    })
  }


console.log(obj);

// Provide a function to find and display events
function findEvents(date) {
    var d = new Date(date);
    setTimeout(changeBackground, 1, d.getFullYear(), d.getMonth() + 1);

    // Start by emptying our data container
    $("#dateevents").empty();
    // Potential date object
    var dateObj = data2[date];
    // If no events exist for the selected date
    if (!dateObj) {
        return $("#dateevents").html("<h2>" + date + ": No Events</h2>");
    }
    // If we've made it this far, we have events!
    $("#dateevents").html(
        "<h2>" + date + ": " + dateObj.length + " Events Planned</h2>"
    );
    // Cycle over every event for this date
    $.each(dateObj, function (index, event) {
        // Build a list for each event
        var $list = $("<ul>");
        // Add all event details to list
        $.each(event, function (name, desc) {
            $("<li>")
                .html(name + ": " + desc)
                .appendTo($list);
        });
        // Place list in container
        $list.appendTo("#dateevents");
    });
}

