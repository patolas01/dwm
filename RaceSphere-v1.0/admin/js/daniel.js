$(document).ready(function () {
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

          form.classList.add('was-validated')
        }, false)
      })
  })()
  //editProvas
  var opcao2 = $('select#selectCategoria option:selected').val();
  if (opcao2 == "wrc") {
    $("#id_circuitos").hide();
  }
  else {
    $("#id_circuitos").show();
  }
  $('#selectCategoria').change(function () {
    var opcao = $('select#selectCategoria option:selected').val();
    if (opcao == "wrc") {
      $("#id_circuitos").hide();
    }
    else {
      $("#id_circuitos").show();
    }
  });
  const datafim = document.getElementById("data_fim");
  const datainicio = document.getElementById("data_inicio");
  datafim.addEventListener("blur", () => {
    let inicio = new Date (datainicio.value)
    let fim = new Date (datafim.value)
    if (inicio >= fim) {
      $("#datafimcheck").show();
            $("#datafimcheck").html("Data final tem de ser maior que a data de inicio");
            datafimError = false;
            return false;
        } else {
            $("#datafimcheck").hide();
            datafimError = true;
        }
  });
  $("#botaoeditar").click(function () {
    if (
        datafimError == true
    ) {
        return true;
    } else {
        return false;
    }
});
})