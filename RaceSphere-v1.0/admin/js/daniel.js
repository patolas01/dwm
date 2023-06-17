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
  const nomeDaProva = document.getElementById("nomeProva");
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
  nomeDaProva.addEventListener("blur", () => {
  if(nomeDaProva != ""){
          $("#nomecheck").show();
          $("#nomecheck").html("Nome do evento não pode ficar a branco");
          nomeDaProvaError=true;
          return false;
  }else{
    $("#nomecheck").hide();
    nomeDaProvaError = false;
  }
});
  $("#botaoeditar").click(function () {
    if (
        datafimError == true &&
        nomeDaProvaError == true
    ) {
        return true;
    } else {
        return false;
    }
});
})