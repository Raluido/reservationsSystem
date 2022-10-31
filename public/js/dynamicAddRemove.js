var i = 1;
$("#dynamic-ar").click(function () {
    ++i;
    $("#dynamicAddRemove").append('<tr><td><select name="name[' + i +
        ']" placeholder="Nombre" id="fromActivity" class="form-control"></select></td><td><select name="dayOfTheWeek[' + i +
        ']" id="dayOfTheWeek" class="form-control" placeholder="Día de la semana"><option value="1">Lunes</option><option value="2">Martes</option><option value="3">Miércoles</option><option value="4">Jueves</option><option value="5">Viernes</option><option value="6">Sábado</option><option value="7">Domingo</option></select></td><td><input type="time" name="start[' + i +
        ']" placeholder="Comienzo" class="form-control" /></td><td><input type="time" name="finish[' + i +
        ']" placeholder="Fin" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
    );

    
    var activityList = document.getElementById("activitiesList").value;
    var activityListFix = JSON.parse(activityList);
    
    var select = $('select#fromActivity');
    
    $(select).children("option").remove();

    for (let i = 0; i < activityListFix.length; i++) {

        $('<option>', {
            value: activityListFix[i].id,
            text: activityListFix[i].name,
        }).appendTo(select);
    }
});
$(document).on('click', '.remove-input-field', function () {
    $(this).parents('tr').remove();
});
