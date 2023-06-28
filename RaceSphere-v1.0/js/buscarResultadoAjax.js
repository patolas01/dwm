function showEtapas(etapa) {
    if (etapa == "") {
      document.getElementById("resultadoEtapa").innerHTML = "";
      return;
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("resultadoEtapa").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET","buscarResultadoAjax.php?id="+etapa,true);
      xmlhttp.send();
    }
  }