$(document).ready(function () {
        document.getElementById("insert-button").addEventListener("click", function (event) {
                event.preventDefault();
                document.getElementById("insert-form").submit();
        });

        // Ao enviar o formulário de inserção
        $("#insert-form").submit(function (event) {
                event.preventDefault();

                // Obter os valores dos campos
                var id_carro = $("#id_carro").val();
                var marca_carro = $("#marca_carro").val();
                var modelo_carro = $("#modelo_carro").val();
                var ano_carro = $("#ano_carro").val();
                var trac_carro = $("#trac_carro").val();
                var caixa_carro = $("#caixa_carro").val();
                var comb_carro = $("#comb_carro").val();
                var cilind_carro = $("#cilind_carro").val();
                var hp_carro = $("#hp_carro").val();
                var desc_carro = $("#desc_carro").val();
                var idcarrofoto = $("#idcarrofoto").val();
                // Obter os valores dos outros campos do formulário

                // Inserir os dados na tabela
                $("#table-body").append("<tr><td>" + id_carro + "</td><td>" + marca_carro + "</td><td>" + modelo_carro + "</td><td>" + ano_carro + "</td><td>" + trac_carro + "</td><td>" + caixa_carro + "</td><td>" +
                        comb_carro + "</td><td>" + cilind_carro + "</td><td>" + hp_carro + "</td><td>" + desc_carro + "</td><td>" + idcarrofoto + "</td><td><button class='btn btn-danger btn-delete'>Excluir</button> <button class='btn btn-primary btn-edit'>Editar</button></td></tr>");

                // Limpar os campos do formulário
                $("#id_carro").val("");
                $("#marca_carro").val("");
                $("#modelo_carro").val("");
                $("#ano_carro").val("");
                $("#trac_carro").val("");
                $("#caixa_carro").val("");
                $("#comb_carro").val("");
                $("#cilind_carro").val("");
                $("#hp_carro").val("");
                $("#desc_carro").val("");
                $("#idcarrofoto").val("");
                // Limpar os outros campos do formulário
        });





        // Ao clicar no botão de exclusão
        $("#table-body").on("click", ".btn-delete", function () {
                $(this).closest("tr").remove();
        });

        













    // Ao clicar no botão de edição
    $("#table-body").on("click", ".btn-edit", function () {
        var row = $(this).closest("tr");
        var id_carro = row.find("td:nth-child(1)").text();
        var marca_carro = row.find("td:nth-child(2)").text();
        var modelo_carro = row.find("td:nth-child(3)").text();
        // Obter os valores dos outros campos da linha

        // Preencher o formulário de edição com os valores
        $("#id_carro").val(id_carro);
        $("#marca_carro").val(marca_carro);
        $("#modelo_carro").val(modelo_carro);
        // Preencher os outros campos do formulário de edição

        // Remover a linha da tabela
        row.remove();
});

// Ao pesquisar
$("#search").keyup(function () {
        var searchText = $(this).val().toLowerCase();

        $("#table-body tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(searchText) > -1)
        });
});
});