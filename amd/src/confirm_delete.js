export const init = (id, name) => {
  var text = "not accessed";
  if (confirm("Sure you want to delete " + name)) {
    console.log(id);
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/moodle/local/aquarium/delete_ajax.php?id=" + id, true);
    xhr.onload = function () {
      window.location.replace("/moodle/local/aquarium/manage.php");
      alert("deletion of " + name + " is completed.");
    };

    xhr.send();
  } else {
    console.log("cancelled");

    window.location.replace("/moodle/local/aquarium/manage.php");
    alert("deletion of " + name + " is cancelled.");
  }
};
