var daySelect = document.querySelectorAll(".modalBtn"); // gets modalBtn select for open
//var daySelect = document.getElementById('modalBtn');
var closeBtn = document.querySelectorAll(".closeBtn"); // gets closeBtn select for close
var modal = document.querySelector("#simpleModal");
var namedate = document.getElementById("jsname");
//var name = document.querySelector('.modalBtn>name');

// cycles through and adds each days click for open
for (var i = 0; i < daySelect.length; i++) {
  daySelect[i].addEventListener("click", openModal);
}

// cycles through and adds each days click for close
for (var j = 0; j < closeBtn.length; j++) {
  closeBtn[j].addEventListener("click", closeModal);
}

//to close modal if click outside the window
window.onclick = outsideClick;

//function to open modal
function openModal(e) {
  var name = e.srcElement.getAttribute("name");
  //var name = daySelect.getAttribute('name');
  //var name = e.srcElement.attributes;
  console.log(name);
  //namedate.setAttribute("day", name);
  namedate.innerHTML = name;
  modal.style.display = "block";
  e.preventDefault();
}

//function to close modal
function closeModal() {
  modal.style.display = "none";
  document.getElementById("tutor_schedule").innerHTML =
    "choose the time and tutor for your session";
}

//function to close modal
function outsideClick(e) {
  if (e.target == modal) {
    modal.style.display = "none";
    document.getElementById("tutor_schedule").innerHTML =
      "choose the time and tutor for your session";
    document.getElementById("tutor_schedule").classList.add("modal-info");
  }
}

function showUser(str) {
  var testDay = document.getElementById("jsname").innerHTML;

  if (str == "") {
    document.getElementById("tutor_schedule").innerHTML = ""; //this is where it prints to
    document.getElementById("tutor_schedule").classList.remove("modal-info");
    return;
  } else {
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
    } else {
      // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("tutor_schedule").innerHTML = this.responseText;
      }
    };
    xmlhttp.open(
      "GET",
      "views/schedule.php?q=" + str + "&test=" + testDay,
      true
    ); //url string that is used to set up the query/getuser.php is the name of the php file that the information is printed from/will need to change to a POST instead of a get
    xmlhttp.send();
  }
}

function showAppointment(btn) {
  var testDay = document.getElementById("jsname").innerHTML;

  if (btn == "") {
    document.getElementById("tutor_schedule").innerHTML = ""; //this is where it prints to
    return;
  } else {
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
    } else {
      // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("tutor_schedule").innerHTML = this.responseText;
      }
    };
    xmlhttp.open(
      "GET",
      "models/details_meetType_page.php?btn=" + btn + "&test=" + testDay,
      true
    ); //url string that is used to set up the query/getuser.php is the name of the php file that the information is printed from/will need to change to a POST instead of a get
    xmlhttp.send();
  }
}

function getTextArea(send) {
  //var meetType = document.getElementById("meetTypeRadio").value;
  var meetType = document.querySelector("input[name=meeting]:checked").value;
  var e = document.querySelector("#details");
  var details = e.value;

  if (send == "") {
    document.getElementById("tutor_schedule").innerHTML = ""; //this is where it prints to
    return;
  } else {
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
    } else {
      // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("tutor_schedule").innerHTML = this.responseText;
      }
    };
    xmlhttp.open(
      "GET",
      "models/appointment_information.php?send=" +
        send +
        "&details=" +
        details +
        "&meetType=" +
        meetType,
      true
    ); //url string that is used to set up the query/getuser.php is the name of the php file that the information is printed from/will need to change to a POST instead of a get
    xmlhttp.send();
  }
}

function submit_appointment(appointment) {
  if (appointment == "") {
    document.getElementById("tutor_schedule").innerHTML = ""; //this is where it prints to
    return;
  } else {
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
    } else {
      // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("tutor_schedule").innerHTML = this.responseText;
      }
    };
    xmlhttp.open(
      "GET",
      "models/user_appointment_submission.php?appointment=" + appointment,
      true
    ); //url string that is used to set up the query/getuser.php is the name of the php file that the information is printed from/will need to change to a POST instead of a get
    xmlhttp.send();
  }
}

function ShowHideDiv(chkEnd_date) {
  var hide_box1 = document.getElementById("hide_box1");
  hide_box1.style.display = chkEnd_date.checked ? "block" : "none";

  var hide_box2 = document.getElementById("hide_box2");
  hide_box2.style.display = chkEnd_date.checked ? "block" : "none";
}

function ShowHideAvailability(hide_availability) {
  var hide_div1 = document.getElementById("hide_availability");
  hide_div1.style.display = hide_availability.checked ? "block" : "none";

}

document.onkeypress = function(event) {
  event = event || window.event;
  if (event.keyCode == 123) {
    return false;
  }
};
document.onmousedown = function(event) {
  event = event || window.event;
  if (event.keyCode == 123) {
    return false;
  }
};
document.onkeydown = function(event) {
  event = event || window.event;
  if (event.keyCode == 123) {
    return false;
  }
};



$(document).ready(function() {
  $(document).on("contextmenu", function(e) {
    return false;
  });
});
