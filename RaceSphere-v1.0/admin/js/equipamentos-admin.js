function eleminarEquipamento(idEquipamento) {
    var confirmarEleminar = confirm("Tem certeza que deseja eleminar estes dados?");
    if (confirmarEleminar) {
            fetch(`equipamentos-admin.php?id=${idEquipamento}`, {
                            method: "DELETE"
                    })
                    .then(function(response) {
                            if (response.ok) {
                                    exibirMensagem("dados eliminados com sucesso!", "green");
                                    removerLinhaTabela(idEquipamento);
                            } else {
                                    exibirMensagem("Erro, os dados não foram eliminados!", "red");
                            }
                    })
                    .catch(function(error) {
                            exibirMensagem(error.message, "red");
                            ini_set('display_errors', 1);
                            error_reporting(E_ALL);
                    });
    }
}

document.addEventListener("click", function(event) {
    if (event.target.classList.contains("btn-delete")) {
            var idEquipamento = event.target.getAttribute("data-id");
            eleminarEquipamento(idEquipamento);
    }
});

function removerLinhaTabela(idEquipamento) {
    var tabela = document.getElementById("table-body");
    var linhas = tabela.getElementsByTagName("tr");

    for (var i = 0; i < linhas.length; i++) {
            var colunaID = linhas[i].getElementsByTagName("td")[0];
            if (colunaID.innerText == idEquipamento) {
                    tabela.removeChild(linhas[i]);
                    break;
            }
    }
}

$("#search").keyup(function() {
    var searchText = $(this).val().toLowerCase();

    $("#table-body tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(searchText) > -1)
    });
});