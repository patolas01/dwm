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
//Addusers
const nomeProva = document.getElementById("nome_prova");
const localProva = document.getElementById("local_prova");
const fim1= document.getElementById("data_fim_addProvas");
const inicio1 = document.getElementById("data_inicio_AddProvas");
nomeProva.addEventListener("blur", () => {
  var valorInputNome = $('#nome_prova').val();
  if(valorInputNome==""){
    $("#NomeCheck").show();
    $("#NomeCheck").html("Este campo não pode ficar a branco");
    NomeError=false;
    return false;
  }else{
    $("#NomeCheck").hide();
    NomeError=true;
  }
})
localProva.addEventListener("blur", () => {
  var valorInputLocal = $('#local_prova').val();
  if(valorInputLocal==""){
    $("#LocalCheck").show();
    $("#LocalCheck").html("Este campo não pode ficar a branco");
    LocalError=false;
    return false;
  }else{
    $("#LocalCheck").hide();
    LocalError=true;
  }
})
inicio1.addEventListener("blur", () => {
  let inicio2 = new Date (inicio1.value)
  if(inicio2==""){
    $("#datainiciocheck").show();
    $("#datainiciocheck").html("Data Inicio não pode estar a branco");
    datainicioError=false;
    return false;
  }else{
    $("#datainiciocheck").hide();
    datainicioError=true;
  }
})
fim1.addEventListener("blur", () => {
  let inicio2 = new Date (inicio1.value)
    let fim2 = new Date (fim1.value)
    if (inicio2 >= fim2) {
      $("#datafimcheck").show();
            $("#datafimcheck").html("Data final tem de ser maior que a data de inicio");
            datafimError2 = false;
            return false;
        } else {
            $("#datafimcheck").hide();
            datafimError2 = true;
        }
})
$("#botaoeditar2").click(function () {
  if (
      datafimError2 == true &&
      datainicioError == true &&
      LocalError == true &&
      NomeError == true
  ) {
      return true;
  } else {
      return false;
  }
})
})