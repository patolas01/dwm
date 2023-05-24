$(document).ready(function () {
        document.getElementById("insert-button").addEventListener("click", function (event) {
                event.preventDefault();
                document.getElementById("insert-form").submit();
        });

        // Ao enviar o formulário de inserir
        $("#insert-form").submit(function (event) {
                event.preventDefault();

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

                $("#table-body").append("<tr><td>" + id_carro + "</td><td>" + marca_carro + "</td><td>" + modelo_carro + "</td><td>" + ano_carro + "</td><td>" + trac_carro + "</td><td>" + caixa_carro + "</td><td>" +
                        comb_carro + "</td><td>" + cilind_carro + "</td><td>" + hp_carro + "</td><td>" + desc_carro + "</td><td>" + idcarrofoto + "</td><td><button class='btn btn-danger btn-delete'>Excluir</button> <button class='btn btn-primary btn-edit'>Editar</button></td></tr>");

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
        });
});