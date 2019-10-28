var daySelect = document.querySelectorAll('.modalBtn');// gets modalBtn select for open
var closeBtn = document.querySelectorAll('.closeBtn');// gets closeBtn select for close
var modal = document.querySelector('#simpleModal');

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
function openModal(){
    modal.style.display = 'block';
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

