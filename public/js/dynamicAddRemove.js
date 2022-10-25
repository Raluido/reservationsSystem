var i = 0;
$("#dynamic-ar").click(function () {
    ++i;
    $("#dynamicAddRemove").append('<tr><td><input type="text" name="name[' + i +
        ']" placeholder="Nombre" class="form-control" /></td><td><input type="text" name="dayOfTheWeek[' + i +
        ']" placeholder="Día de la semana" class="form-control" /></td><td><input type="time" name="start[' + i +
        ']" placeholder="Comienzo" class="form-control" /></td><td><input type="time" name="finish[' + i +
        ']" placeholder="Fin" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
    );
});
$(document).on('click', '.remove-input-field', function () {
    $(this).parents('tr').remove();
});