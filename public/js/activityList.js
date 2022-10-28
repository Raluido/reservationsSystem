var activityList = document.getElementById("activitiesList").value;
var select = $("select#fromActivity");
  
  let counter = 0;
  for (let i = 0; i < activityList.length; i++) {
    console.log(activityList[i].id);
  }
  
  console.log(activityList); // 6

// let objectsLen = 0;
// for (let i = 0; i < activityList.length; i++) {

//    // if entity is object, increase objectsLen by 1, which is the stores the total number of objects in array.
//    if (activityList[i] instanceof Object) {
//       objectsLen++;
//    }
// }

// var optGroup = $('<optgroup/>', { label: key })

// for (var i; i < _.size(obj.activityList); i++) {
//     var activities = activityList[i].name;
// }
