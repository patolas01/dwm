//Addusers
$(document).ready(function () {
// Validate Nome Prova
$("#nomeCheck").hide();
$("#nomeCheck").css("color", "red");
let nomeError = true;
$("#nome_prova").keyup(function () {
    validateNome();
});
function validateNome() {
    const nomeProva = document.getElementById("nome_prova");
    let nomeValue = $("#nome_prova").val();
    if (nomeValue.length == "") {
        $("#nomeCheck").show();
        $("#nomeCheck").html("Por favor insira o nome do evento");
        nomeProva.classList.add("is-invalid");
        nomeError = false;
        return false;
    } else if (nomeValue.length < 6 || nomeValue.length > 16) {
        $("#nomeCheck").show();
        $("#nomeCheck").html("Tamanho do nome deve estar entre 6 a 16 caractéres");
        nomeProva.classList.add("is-invalid");
        nomeError = false;
        return false;
    } else {
        $("#nomeCheck").hide();
        nomeProva.classList.remove("is-invalid");
        nomeError = true;
    }
}
// Validate Local Prova
$("#localCheck").hide();
$("#localCheck").css("color", "red");
let localError = true;
$("#local_prova").keyup(function () {
    validateLocal();
});
function validateLocal() {
    const localProva = document.getElementById("local_prova");
    let localValue = $("#local_prova").val();
    if (localValue.length == "") {
        $("#localCheck").show();
        $("#localCheck").html("Por favor insira o país do evento");
        localProva.classList.add("is-invalid");
        localError = false;
        return false;
    } else if (localValue.length < 6 || localValue.length > 16) {
        $("#localCheck").show();
        $("#localCheck").html("Tamanho do local deve estar entre 6 a 16 caractéres");
        localProva.classList.add("is-invalid");
        localError = false;
        return false;
    } else {
        $("#localCheck").hide();
        localProva.classList.remove("is-invalid");
        localError = true;
    }
}
// Validate Inicio Prova
$("#datainiciocheck").hide();
$("#datainiciocheck").css("color", "red");
let inicioError = true;
$("#data_inicio_AddProvas").keyup(function () {
    validateInicioProva();
});
function validateInicioProva() {
    const inicioProva = document.getElementById("data_inicio_AddProvas");
    const fimProva = document.getElementById("data_fim_AddProvas");
    let inicioValue = $("#data_inicio_AddProvas").val();
    let fimValue = $("#data_fim_AddProvas").val();
    let inicioData = new Date(`${inicioProva.value}T00:00`);
    let fimData = new Date (`${fimProva.value}T00:00`);
    if(inicioData == "Invalid Date"){
        $("#datainiciocheck").show();
        $("#datainiciocheck").html("Por favor insira a data de inicio do evento");
        inicioProva.classList.add("is-invalid");
        inicioError = false;
        return false;
    }else if(inicioData>=fimData){
        $("#datainiciocheck").show();
        $("#datainiciocheck").html("Data inicio de evento tem de ser menor que a data de fim do evento");
        inicioProva.classList.add("is-invalid");
        inicioError = false;
        return false;
    }else{
        $("#datainiciocheck").hide();
        inicioProva.classList.remove("is-invalid");
        inicioError = true;
    }
}

// Validate Fim Prova
$("#datafimcheck").hide();
$("#datafimcheck").css("color", "red");
let fimError = true;
$("#data_fim_AddProvas").keyup(function () {
    validateFimProva();
});
function validateFimProva() {
    const inicioProva = document.getElementById("data_inicio_AddProvas");
    const fimProva = document.getElementById("data_fim_AddProvas");
    let inicioValue = $("#data_inicio_AddProvas").val();
    let fimValue = $("#data_fim_AddProvas").val();
    let inicioData = new Date(`${inicioProva.value}T00:00`);
    let fimData = new Date (`${fimProva.value}T00:00`);
    if(fimData == "Invalid Date"){
        $("#datafimcheck").show();
        $("#datafimcheck").html("Por favor insira a data de fim do evento");
        fimProva.classList.add("is-invalid");
        fimError = false;
        return false;
    }else if(inicioData>=fimData){
        $("#datafimcheck").show();
        $("#datafimcheck").html("Data fim de evento tem de ser maior que a data de inicio do evento");
        fimProva.classList.add("is-invalid");
        fimError = false;
        return false;
    }else{
        $("#datafimcheck").hide();
        fimProva.classList.remove("is-invalid");
        fimError = true;
    }
}
//select categoria
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
//submit
$("#botaoeditar2").click(function () {
    validateNome();
    validateLocal();
    validateInicioProva();
    validateFimProva();
    if (
        nomeError == true &&
        localError == true &&
        inicioError == true &&
        fimError == true
    ) {
        return true;
    } else {
        return false;
    }
});
})