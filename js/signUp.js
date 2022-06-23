const dots = document.getElementsByClassName('dots');
const phone = document.getElementById('phone');
const city = document.getElementById('city');
const eye = document.getElementsByClassName('eye');

// phone.addEventListener("keydown", function(e) {
//     const txt = this.value;
//     // prevent more than 12 characters, ignore the spacebar, allow the backspace
//     if ((txt.length == 13 || e.which == 32) & e.which !== 8) e.preventDefault();
//     // add spaces after 3 & 7 characters, allow the backspace
//     if ((txt.length == 3 || txt.length == 7 || txt.length == 10) && e.which !== 8)
//         this.value = this.value + " ";
// });
// // when the form is submitted, remove the spaces
// document.forms[0].addEventListener("submit", e => {
//     e.preventDefault();
//     const phone = e.target.elements["phone"];
//     phone.value = phone.value.replaceAll(" ", "");
//     console.log(phone.value);
//     //e.submit();
// });

city.addEventListener('click', function() {
    if(this.classList.contains('clicked')){
        this.classList.remove('clicked');
    }
    else {
        this.classList.add('clicked');
    }
});

city.addEventListener('blur', function() {
    if(this.classList.contains('clicked')){
        this.classList.remove('clicked');
    }
})

function togglePassword() {
    if ((dots[0].type === "password" && dots[0].value) || (dots[1].type === "password" && dots[1].value)) {
        dots[0].type = "text";
        dots[1].type = "text";
    } else {
        dots[0].type = "password";
        dots[1].type = "password";
    }
}

for (let i = 0; i < eye.length; i++) {
    eye[i].addEventListener('click', togglePassword, false);
}