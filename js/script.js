$(document).ready( function () {
    $('#siglas').DataTable({
    	"bJQueryUI": true,
        "oLanguage": {
            "sProcessing":   "Processando...",
            "sLengthMenu":   "Mostrar _MENU_ registros",
            "sZeroRecords":  "Não foram encontrados resultados",
            "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
            "sInfoFiltered": "",
            "sInfoPostFix":  "",
            "sSearch":       "Buscar:",
            "sUrl":          "",
            "oPaginate": {
                "sFirst":    "Primeiro",
                "sPrevious": "Anterior",
                "sNext":     "Seguinte",
                "sLast":     "Último"
            }
        },
        "order": [[0, "desc"]],
        "columnDefs": [{
            "orderable": false,
            "targets": [4]
	    }],
        "scrollY": 400
    });
} );

$("#alert").fadeTo(3500, 500).slideUp(500, function(){
    $("#alert").slideUp(500);
});

function confirmInsert(formId) {
    var palavra = $("#"+formId+"_palavra").val().replace(/ /g,'');
    var abreviacao = $("#"+formId+"_abreviacao").val().replace(/ /g,'');
    if (palavra == "" || abreviacao == "") {
        alert("Preecha todos os campos!");
        $("#"+formId+"_palavra").val("");
        $("#"+formId+"_abreviacao").val("");
        return false;
    } else {
        if (confirm('Salvar dados?')) {
            return true;
        } else {
            return false;
        }
    }
}

function editSigla(cd_sigla) {
	$.ajax({
        type: "POST",
        url: "macanha/inc/edit_palavra.php",
        data: {"cd_sigla": cd_sigla},
        dataType: "html",
        success: function(result){
            $("#modal").html(result);
            $("#modalEdit").modal("toggle");
            $("#edit_tipo").selectpicker("refresh");
        }
    });
}

function removeSigla(cd_sigla) {
	if (confirm("Deseja remover sigla?")) {
		$.ajax({
		    type: "POST",
		    url: "macanha/mac_delete.php",
		    data: {"cd_sigla": cd_sigla},
		    dataType: "html",
		    success: function(result){
		        element = $("#sigla_"+cd_sigla);
				element.fadeOut();
		    	setTimeout(function(){
		    		element.remove();
				}, 1000);
				toastr["success"]("Operação concluída!", "Sigla removida com sucesso.");
		    }
		});
	}
}