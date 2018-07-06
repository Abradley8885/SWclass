// Events on the login Page
/* ********************************* */

// Select the DOM elements
var elUsername = document.getElementById('username'); // form text input
var elPassword = document.getElementById('password'); // form text input
var elUsernameMsg = document.getElementById('userfeedback'); // Text feedback on user name input
var elPasswordMsg = document.getElementById('passwordfeedback')// Text feedback on password input

// Functions to call
function checkUsername(minlength) {   // Function with parameter, without event object passed
  if(elUsername.value.length < minlength && elUsername.value.length > 0) {
    elUsernameMsg.innerHTML = 'min ' + minlength.toString() + ' characters';
  } else if (elUsername.value.length > minlength){
    elUsernameMsg.innerHTML = 'Username: OK'; // OK message
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
    elPasswordMsg.innerHTML = 'min ' + minlength.toString() + ' characters';;
  } else if (elPassword.value.length > minlength) {
    // If Password is at least minlength characters long,
    // check to make sure it has at least one upper case character
    // and one number
    for(i = 0; i < elPassword.value.length; i++) {
      character = elPassword.value.charAt(i);
      if (character == character.toUpperCase()) {
        upperCase = true;
      }
      if (!isNaN(character * 1)) {
        number = true;
      }
    }
    if (upperCase == false || number == false) {
      elPasswordMsg.innerHTML = '1 upper case, 1 number';
    } else {
      elPasswordMsg.innerHTML = 'Password: OK';
    }

  } else {  // Password field is clear
    elPasswordMsg.innerHTML = ''; // Clear any previous error message
  }
}

// Add event listeners to the elements
elUsername.addEventListener('blur', function() {checkUsername(7)}, false);  // Blur event occurs when user click off this element
elPassword.addEventListener('blur', function(e){checkPassword(e, 7)}, false);
