function closeForm() {
  var se = (document.getElementById("se").style.display = "none");
}
function checkareas() {
  if (screen.width < 422) {
    document.querySelector("#resp").style.display = "none";
  }
}
function openForm() {
  if (screen.width >= 768) {
    document.getElementById("se").style.display = "block";
  } else if (screen.width <= 768) {
    window.open("https://www.google.com");
  }
}
function checkInput() {
  var s = document.getElementsByClassName("resultii")[0];
  var ca = s.options[s.selectedIndex].value;
  console.log(ca);
  if (ca == "SPOTIFY" || ca == "NETFLIX") {
    document.getElementsByTagName("select")[1].style.display = "none";
  } else {
    document.getElementsByTagName("select")[1].style.display = "block";
  }
}
