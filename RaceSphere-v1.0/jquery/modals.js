$('#deleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var id_noticia = button.data('id'); // Extract info from data-* attributes

    // Update the value of the input field
    $('#noticiaIDInput').val(id_noticia);

    // Update the text of the span element
    $('#noticiaId').text(id_noticia);
})