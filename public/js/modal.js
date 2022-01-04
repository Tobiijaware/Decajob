
let modal = document.getElementById("myModal");
let btn = document.getElementById("myBtn");
let span = document.getElementsByClassName("close")[0];


let loginmodal = document.getElementById("myLoginModal");
let loginbtn = document.getElementById("myLoginBtn");
let loginspan = document.getElementById("loginclose");

let forgotmodal = document.getElementById("myForgotModal");
let forgotbtn = document.getElementById("forgotbtn");
let forgotspan = document.getElementById("forgotclose");

btn.onclick = function() {
  modal.style.display = "block";
  loginmodal.style.display = "none";
  forgotmodal.style.display = "none";
  $('.container' ).addClass('blur');


}
span.onclick = function() {
    modal.style.display = "none";
    $('.container' ).removeClass('blur');

}
window.onclick = function(e) {
  if (e.target == modal) {
    modal.style.display = "none";
    $('.container' ).removeClass('blur' );
  }
}




loginbtn.onclick = function() {
    loginmodal.style.display = "block";
    modal.style.display = "none";
    forgotmodal.style.display = "none";
    $('.container' ).addClass('blur');

}
loginspan.onclick = function() {
    loginmodal.style.display = "none";
    $('.container' ).removeClass('blur' );
}
window.onclick = function(e) {
  if (e.target == loginmodal) {
    loginmodal.style.display = "none";
    $('.container' ).removeClass('blur' );
  }
}

forgotbtn.onclick = function() {
    forgotmodal.style.display = "block";
    modal.style.display = "none";
    loginmodal.style.display = "none";
    $('.container' ).addClass('blur');

}
forgotspan.onclick = function() {
    forgotmodal.style.display = "none";
    $('.container' ).removeClass('blur' );
}
window.onclick = function(e) {
  if (e.target == forgotmodal) {
    forgotmodal.style.display = "none";
    $('.container' ).removeClass('blur' );
  }
}
