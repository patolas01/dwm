//made by Daniel Ribeiro
$(document).ready(function () {
    $("#contaexiste").hide();
    $("#contaexiste").css('color', 'red')
    // Validate Username
    $("#usercheck").hide();
    $("#usercheck").css("color", "red");
    let usernameError = true;
    $("#usernames").keyup(function () {
        validateUsername();
    });
 
    function validateUsername() {
        const nomeUser = document.getElementById("usernames");
        let usernameValue = $("#usernames").val();
        if (usernameValue.length == "") {
            $("#usercheck").show();
            $("#usercheck").html("Por favor insira o nome");
            nomeUser.classList.add("is-invalid");
            usernameError = false;
            return false;
        } else if (usernameValue.length < 6 || usernameValue.length > 16) {
            $("#usercheck").show();
            $("#usercheck").html("Tamanho do nome deve estar entre 6 a 16 caractéres");
            nomeUser.classList.add("is-invalid");
            usernameError = false;
            return false;
        } else {
            $("#usercheck").hide();
            nomeUser.classList.remove("is-invalid");
            let usernameError = true;
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
        const pass1 = document.getElementById("password");
        let passwordValue = $("#password").val();
        if (passwordValue.length == "") {
            $("#passcheck").show();
            $("#passcheck").html(
                "Por favor insira a palavra passe"
            );
            pass1.classList.add("is-invalid");
            passwordError = false;
            
        }
        if (passwordValue.length < 6 || passwordValue.length > 16) {
            $("#passcheck").show();
            $("#passcheck").html(
                "Tamanho da password deve estar entre 6 a 16 caractéres"
            );
            pass1.classList.add("is-invalid");
            $("#passcheck").css("color", "red");
            passwordError = false;
            
        } else {
            pass1.classList.remove("is-invalid");
            $("#passcheck").hide();
            passwordError = true;
        }
         const pass2 = document.getElementById("confirmPassword");
         let confirmPasswordValue = $("#confirmPassword").val();
         if (confirmPasswordValue!=passwordValue) {
             $("#confirmPasscheck").show();
             $("#confirmPasscheck").html(
                 "Palavra-passe deve coincidir"
             );
             pass2.classList.add("is-invalid");
             $("#confirmPasscheck").css("color", "red");
             confirmPasswordError = false;
             return false;
         } else {
             pass2.classList.remove("is-invalid");
             $("#confirmPasscheck").hide();
             confirmPasswordError = true;
         }
    }

     // Validate Confirm Password
     $("#confirmPasscheck").hide();
     let confirmPasswordError = true;
     $("#confirmPassword").keyup(function () {
         validateConfirmPassword();
     });
     function validateConfirmPassword() {
        let passwordValue = $("#password").val();
         const pass2 = document.getElementById("confirmPassword");
         let confirmPasswordValue = $("#confirmPassword").val();
         if (confirmPasswordValue!=passwordValue) {
             $("#confirmPasscheck").show();
             $("#confirmPasscheck").html(
                 "Palavra-passe deve coincidir"
             );
             pass2.classList.add("is-invalid");
             $("#confirmPasscheck").css("color", "red");
             confirmPasswordError = false;
             return false;
         } else {
             pass2.classList.remove("is-invalid");
             $("#confirmPasscheck").hide();
             confirmPasswordError = true;
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
            emailError == true &&
            confirmPasswordError == true
        ) {
            return true;
        } else {
            return false;
        }
    });
});