/* delete the place holder */
var username_input = document.getElementById('username'),
    password_input = document.getElementById('password');

username_input.onfocus = function() { this.placeholder = ''; };
username_input.onblur = function() { this.placeholder = 'Username'; };
password_input.onfocus = function() { this.placeholder = '' };
password_input.onblur = function() { this.placeholder = "Password"; };

/* show the password */
var show_pass = document.getElementById("show_or_hidden");
show_pass.onclick = function() {
    if (password_input.getAttribute('type') === "password") {
        password_input.setAttribute('type', 'text');
        show_pass.style.opacity = '1';
    } else {
        password_input.setAttribute('type', 'password');
        show_pass.style.opacity = '0.6';
    }

};