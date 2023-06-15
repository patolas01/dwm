//made by Daniel Ribeiro
$(document).ready(function () {
 
    // Validate Username
    $("#usercheck").hide();
    let usernameError = true;
    $("#usernames").keyup(function () {
        validateUsername();
    });
 
    function validateUsername() {
        let usernameValue = $("#usernames").val();
        if (usernameValue.length == "") {
            $("#usercheck").show();
            usernameError = false;
            return false;
        } else if (usernameValue.length < 3 || usernameValue.length > 10) {
            $("#usercheck").show();
            $("#usercheck").html("Tamanho do nome deve estar entre 3 a 10 caractéres");
            usernameError = false;
            return false;
        } else {
            $("#usercheck").hide();
        }
    }
 
    // Validate Email
    const email = document.getElementById("email");
    email.addEventListener("blur", () => {
        let regex =
        /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
        let s = email.value;
        if (regex.test(s)) {
            email.classList.remove("is-invalid");
            emailError = true;
        } else {
            email.classList.add("is-invalid");
            emailError = false;
        }
    });
    // Validate telefone
    const tel = document.getElementById("telefone");
    tel.addEventListener("blur", () => {
        let regex2 =
        /^([9][1236\s])[0-9\s]*$/;
        let s2 = tel.value;
        if (regex2.test(s2)) {
            tel.classList.remove("is-invalid");
            telError = true;
        } else {
            tel.classList.add("is-invalid");
            telError = false;
        }
    });
 
    // Validate Password
    $("#passcheck").hide();
    let passwordError = true;
    $("#password").keyup(function () {
        validatePassword();
    });
    function validatePassword() {
        let passwordValue = $("#password").val();
        if (passwordValue.length == "") {
            $("#passcheck").show();
            passwordError = false;
            return false;
        }
        if (passwordValue.length < 3 || passwordValue.length > 10) {
            $("#passcheck").show();
            $("#passcheck").html(
                "Tamanho da password deve estar entre 3 a 10 caractéres"
            );
            $("#passcheck").css("color", "red");
            passwordError = false;
            return false;
        } else {
            $("#passcheck").hide();
        }
    }
 
 
    // Submit button
    $("#submitbtn").click(function () {
        validateUsername();
        validatePassword();
        validateEmail();
        if (
            usernameError == true &&
            passwordError == true &&
            telError == true &&
            emailError == true
        ) {
            return true;
        } else {
            return false;
        }
    });
});