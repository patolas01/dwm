$(document).ready(function(){
(function () {
    'use strict'
    const forms = document.querySelectorAll('.requires-validation')
    Array.from(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
          else{
            event.preventDefault();
            document.getElementById("registoAdminPressman").submit();
          }
    
          form.classList.add('was-validated')
        }, false)
      })
    })()
})