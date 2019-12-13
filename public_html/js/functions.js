function myFunction() {

    var x = document.getElementById("sidebar");
    if (x.style.display == "none") {
      x.style.display = "block";
      x.style.width = "40%";
      x.style.backgroundColor = "#ccc";

    } else {
      x.style.display = "none";
    }
  }
