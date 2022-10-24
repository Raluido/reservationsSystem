var i = 0;
$("#dynamic-ar1").click(function () {
    ++i;
    $("#dynamicAddRemove1").append('<tr><td><input type="text" name="name[' + i +
        ']" placeholder="Nombre" class="form-control" /></td><td><input type="text" name="places[' + i +
        ']" placeholder="Plazas" class="form-control" /></td><td>{!! Form::submit("Store", ["class" => "btn btn-succsess btn-sm"]) !!}{!! Form::close() !!}</td></tr>'
    );
});
$(document).on('click', '.remove-input-field1', function () {
    $(this).parents('tr').remove();
});