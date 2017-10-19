$(document).ready(function(){
    var next = 1;
    $(".add-more").click(function(e){
        e.preventDefault();
        var addto = "#field";
        var addRemove = "#field";
        next = next + 1;
        var newIn = '<input class="input form-control form-control-lit" id="ltitel' + next + '" name="ltitel' + next + '" type="text" placeholder="Titel">' +
            '<input class="input form-control form-control-lit" id="lstadt' + next + '" name="lstadt' + next + '" type="text" placeholder="Stadt">' +
            '<input class="input form-control form-control-lit" id="lverlag' + next + '" name="lverlag' + next + '" type="text" placeholder="Verlag">' +
            '<input class="input form-control form-control-lit" id="lauflage' + next + '" name="lauflage' + next + '" type="text" placeholder="Auflage">' +
            '<input class="input form-control form-control-lit" id="ljahr' + next + '" name="ljahr' + next + '" type="text" placeholder="Jahr">' +
            '<input class="input form-control form-control-lit" id="lautor' + next + '" name="lautor' + next + '" type="text" placeholder="Autor">' +
            '<input class="input form-control form-control-lit" id="lseiten' + next + '" name="lseiten' + next + '" type="text" placeholder="Seiten"><br id="break' + next + '"/>';
        var newInput = $(newIn);
        var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me btn-lit" type="button">-</button>';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#field" + next).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(next);

        $('.remove-me').click(function(e){
            e.preventDefault();
            var fieldNum = this.id.charAt(this.id.length-1);
            var fieldID = "#ltitel" + fieldNum;
            var stadtID = "#lstadt" + fieldNum;
            var verlagID = "#lverlag" + fieldNum;
            var auflageID = "#lauflage" + fieldNum;
            var jahrID = "#ljahr" + fieldNum;
            var autorID = "#lautor" + fieldNum;
            var seitenID = "#lseiten" + fieldNum;
            var breakID = "#break" + fieldNum;
            $(this).remove();
            $(fieldID).remove();
            $(stadtID).remove();
            $(verlagID).remove();
            $(auflageID).remove();
            $(jahrID).remove();
            $(autorID).remove();
            $(seitenID).remove();
            $(breakID).remove();
        });
    });
});