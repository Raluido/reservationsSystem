var i = 0;
$("#dynamic-ar1").click(function () {
    ++i;
    $("#dynamicAddRemove1").append('<tr><td><input name="name[' + i + ']" for="name" id="name" placeholder="Nombre" class="form-control" required/></td><td><input name="places[' + i + ']" for="places" id="places" placeholder="Plazas" class="form-control" required/></td><td><button type="button" class="btn btn-outline-danger remove-input-field1">Borrar</button></td></tr>'
    );
});
$(document).on('click', '.remove-input-field1', function () {
    $(this).parents('tr').remove();
});