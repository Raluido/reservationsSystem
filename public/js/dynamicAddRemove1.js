var i = 0;
$("#dynamic-ar1").click(function () {
    ++i;
    $("#dynamicAddRemove1").append('<tr><td><input type="text" name="name[' + i +
        ']" placeholder="Nombre" class="form-control" /></td><td><input type="text" name="places[' + i +
        ']" placeholder="Plazas" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
    );
});
$(document).on('click', '.remove-input-field1', function () {
    $(this).parents('tr').remove();
});