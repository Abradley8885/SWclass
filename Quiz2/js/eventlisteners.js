// Events on the login Page
/* ********************************* */

// Select the DOM elements
var elUsername = document.getElementById('username'); // form text input
var elPassword = document.getElementById('password'); // form text input
var elUsernameMsg = document.getElementById('userfeedback'); // Text feedback on user name input
var elPasswordMsg = document.getElementById('passwordfeedback')// Text feedback on password input
var elSubmitMsg = document.getElementById('submitfeedback')// Text feedback on password input

var enableU = 0;
var enableP = 0;
// Functions to call
function checkUsername(minlength) {   // Function with parameter, without event object passed
  if(elUsername.value.length < minlength && elUsername.value.length > 0) {
    elUsernameMsg.innerHTML = 'min ' + minlength.toString() + ' characters';
    enableU = 0;
  } else if (elUsername.value.length > minlength){
    elUsernameMsg.innerHTML = 'Username: OK'; // OK message
    enableU = 1;
  } else {
    elUsernameMsg.innerHTML = ''; // Clear any previous error message

  }
}


function checkPassword(e, minlength) {
  var i = 0;
  var character = '';
  var upperCase = false;
  var number = false;
  if(elPassword.value.length < minlength && elPassword.value.length > 0) {
    elPasswordMsg.innerHTML = 'min ' + minlength.toString() + ' characters';
  } else if (elPassword.value.length > minlength) {
    for(i = 0; i < elPassword.value.length; i++) {
      character = elPassword.value.charAt(i);
      if (character == character.toUpperCase() && isNaN(character * 1)) {
        upperCase = true;
      }
      if (!isNaN(character * 1)) {
        number = true;
      }
    }
    if (upperCase == true && number == true) {
      elPasswordMsg.innerHTML = 'Password: OK';
      enableP = 1;
    } else {
      elPasswordMsg.innerHTML = 'Password must have at least 1 upper case character and 1 number';
      enableP = 0;

      //document.getElementById("register-submit").disabled = false;


    }

  } else {  // Password field is clear
    elPasswordMsg.innerHTML = ''; // Clear any previous error message
  }
}
function checkForm(e){
  if(enableU==1 && enableP == 1){
      document.getElementById("register-submit").disabled = false;
  }
  else{
      document.getElementById("register-submit").disabled = true;

  }
}

// Add event listeners to the elements
elUsername.addEventListener('blur', function() {checkUsername(7); checkForm(e)}, false);  // Blur event occurs when user click off this element
elPassword.addEventListener('blur', function(e){checkPassword(e, 7); checkForm(e)}, false);
