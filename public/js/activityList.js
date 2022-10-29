var activityList = document.getElementById("activitiesList").value;
var activityListFix = JSON.parse(activityList);

var select = $("select#fromActivity");

for (let i = 0; i < activityListFix.length; i++) {

  $('<option>', {
    value: activityListFix[i].id,
    text: activityListFix[i].name,
  }).appendTo(select);
}
