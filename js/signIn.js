const dots = document.getElementsByClassName('dots');
const eye = document.getElementsByClassName('eye');

function togglePassword() {
    if (dots[0].type === "password" && dots[0].value) {
        dots[0].type = "text";
    } else {
        dots[0].type = "password";
    }
}

for (let i = 0; i < eye.length; i++) {
    eye[i].addEventListener('click', togglePassword, false);
}