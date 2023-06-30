$(document).ready(function () {    
    // Validate dia Etapa
    $("#diaEtapaCheck").hide();
$("#diaEtapaCheck").css("color", "red");
let diaEtapaError = true;
$("#diaEtapa").keyup(function () {
    validateDiaEtapa();
});
function validateDiaEtapa() {
    const diaEtapa = document.getElementById("diaEtapa");
    let dataEtapa = new Date(`${diaEtapa.value}T00:00`);
    if(dataEtapa == "Invalid Date"){
        $("#diaEtapaCheck").show();
        $("#diaEtapaCheck").html("Por favor insira a data de inicio do evento");
        diaEtapa.classList.add("is-invalid");
        diaEtapaError = false;
        return false;
    }else{
        $("#diaEtapaCheck").hide();
        diaEtapa.classList.remove("is-invalid");
        diaEtapaError = true;
    }
}
// Validate hora inicio
$("#horaInicioCheck").hide();
$("#horaInicioCheck").css("color", "red");
let horaInicioError = true;
$("#horaInicio").keyup(function () {
    validateHoraInicio();
});
function validateHoraInicio() {
    const horaInicio = document.getElementById("horaInicio");
    let horaInicioEtapa = horaInicio.value
    const horaFim = document.getElementById("horaFim");
    let horaFimEtapa = horaFim.value
    if(horaInicioEtapa == ""){
        $("#horaInicioCheck").show();
        $("#horaInicioCheck").html("Por favor insira a hora de inicio do evento");
        horaInicio.classList.add("is-invalid");
        horaInicioError = false;
        return false;
    }
    else if(horaFimEtapa<horaInicioEtapa){
        $("#horaInicioCheck").show();
        $("#horaInicioCheck").html("Hora Inicio deve ser menor que a hora de fim");
        horaInicio.classList.add("is-invalid");
        horaInicioError = false;
        return false;
    }else{
        $("#horaInicioCheck").hide();
        horaInicio.classList.remove("is-invalid");
        $("#horaFimCheck").hide();
        horaFim.classList.remove("is-invalid");
        horaInicioError = true;
    }
}

// Validate hora fim
$("#horaFimCheck").hide();
$("#horaFimCheck").css("color", "red");
let horaFimError = true;
$("#horaFim").keyup(function () {
    validateHoraFim();
});
function validateHoraFim() {
    const horaFim = document.getElementById("horaFim");
    let horaFimEtapa = horaFim.value
    const horaInicio = document.getElementById("horaInicio");
    let horaInicioEtapa = horaInicio.value
    if(horaFimEtapa == ""){
        $("#horaFimCheck").show();
        $("#horaFimCheck").html("Por favor insira a hora de fim do evento");
        horaFim.classList.add("is-invalid");
        horaFimError = false;
        return false;
    }else if(horaFimEtapa<horaInicioEtapa){
        $("#horaFimCheck").show();
        $("#horaFimCheck").html("Hora Fim deve ser maior que a hora de inicio");
        horaFim.classList.add("is-invalid");
        horaFimError = false;
        return false;
    }else{
        $("#horaFimCheck").hide();
        horaFim.classList.remove("is-invalid");
        $("#horaInicioCheck").hide();
        horaInicio.classList.remove("is-invalid");
        horaFimError = true;
    }
}
$("#editar2").click(function () {
    validateDiaEtapa();
    validateHoraInicio();
    validateHoraFim();
    if (
        diaEtapaError == true &&
        horaInicioError == true &&
        horaFimError == true
    ) {
        return true;
    } else {
        return false;
    }
});
})