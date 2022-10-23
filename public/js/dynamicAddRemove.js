var i = 0;
$("#dynamic-ar").click(function () {
    ++i;
    $("#dynamicAddRemove").append('<tr><td><input type="text" name="dayOfTheWeek[' + i +
        ']" placeholder="dayOfTheWeek" class="form-control" /></td><td><input type="time" name="start[' + i +
        ']" placeholder="start" class="form-control" /></td><td><input type="time" name="finish[' + i +
        ']" placeholder="finish" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
    );
});
$(document).on('click', '.remove-input-field', function () {
    $(this).parents('tr').remove();
});