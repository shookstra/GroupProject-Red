var daySelect = document.querySelectorAll('.modalBtn');// gets modalBtn select for open
//var daySelect = document.getElementById('modalBtn');
var closeBtn = document.querySelectorAll('.closeBtn');// gets closeBtn select for close
var modal = document.querySelector('#simpleModal');
var namedate = document.getElementById("jsname");
//var name = document.querySelector('.modalBtn>name');

// cycles through and adds each days click for open
for(var i = 0; i < daySelect.length; i++){
daySelect[i].addEventListener('click', openModal);
}

// cycles through and adds each days click for close
for(var j = 0; j < closeBtn.length; j++){
closeBtn[j].addEventListener('click', closeModal);
}

//to close modal if click outside the window
window.onclick = outsideClick;

//function to open modal
function openModal(e){
    var name = e.srcElement.getAttribute('name');
    //var name = daySelect.getAttribute('name');
    //var name = e.srcElement.attributes;
    console.log(name);
    //namedate.setAttribute("day", name);
    namedate.innerHTML = name;
    modal.style.display = 'block';
    e.preventDefault();
    
    
    
}

//function to close modal
function closeModal(){

    modal.style.display = 'none';
}



//function to close modal
function outsideClick(e){
    if(e.target == modal){

    modal.style.display = 'none';
    
    }
    
}

function showUser(str) {
    var testDay = document.getElementById("jsname").innerHTML;
    if (str == "") {
        document.getElementById("tutor_schedule").innerHTML = "";//this is where it prints to
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
        xmlhttp.open("GET","views/schedule.php?q="+str+"&test="+testDay,true);//url string that is used to set up the query/getuser.php is the name of the php file that the information is printed from/will need to change to a POST instead of a get
        xmlhttp.send();
    }
}

function showAppointment(btn){
    var testDay = document.getElementById("jsname").innerHTML;
    if (btn == "") {
        document.getElementById("tutor_schedule").innerHTML = "";//this is where it prints to
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
        xmlhttp.open("GET","models/accept_appointment.php?btn="+btn+"&test="+testDay, true);//url string that is used to set up the query/getuser.php is the name of the php file that the information is printed from/will need to change to a POST instead of a get
        xmlhttp.send();
    }
}

function getTextArea(send) {
  var meetType = document.getElementById("meetTypeRadio").value;
  var details = document.getElementById("details").value;
  
  if (send == "") {
        document.getElementById("tutor_schedule").innerHTML = "";//this is where it prints to
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
        xmlhttp.open("GET","models/appointment_information.php?send="+send+"&details="+details+"&meetType="+meetType, true);//url string that is used to set up the query/getuser.php is the name of the php file that the information is printed from/will need to change to a POST instead of a get
        xmlhttp.send();
    }
  
}

function submit_appointment(appointment){
    if (appointment == "") {
        document.getElementById("tutor_schedule").innerHTML = "";//this is where it prints to
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
        xmlhttp.open("GET","models/appointment_information.php?appointment="+appointment, true);//url string that is used to set up the query/getuser.php is the name of the php file that the information is printed from/will need to change to a POST instead of a get
        xmlhttp.send();
    }
}




