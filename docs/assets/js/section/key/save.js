var section = {
	init: function(){
		section.mount();
	},

	mount: function(){
		$('#save').bind('click', section.validate);
	},

	validate: function(){
        var regexVain = /^\s*$/;
        var regexDate = RegExp("(0[1-9]|[012][0-9]|3[01])/(0[1-9]|1[012])/[12][0-9]{3}");
        var regexPDF = RegExp("[a-zA-Z0-9-_\.]+\.(pdf)$");

		var title = $('#title').val();
		var call = $('#call').val();
		var description = $('#description').val();
		var archive = $('#simple').val();

		if(regexVain.test(title)){
			$('#modal .modal-header').find('h4').empty().html('Oops!');
			$('#modal').find('p').empty().html('<span class="text-primary">Digite corretamente o campo <strong>título</strong>!</span><span class="text-muted"><em>e.g. "Samuel Ipsum"</em></span>');
			$('#modal').modal('show');
			return false;

		} else if(regexVain.test(call)){
			$('#modal .modal-header').find('h4').empty().html('Oops!');
			$('#modal').find('p').empty().html('<span class="text-primary">Digite corretamente o campo <strong>Chamada</strong>!</span><span><em>e.g.  "You think water moves fast? You should see ice."</em></span>');
			$('#modal').modal('show');
			return false;

		} else if(regexVain.test(description)){
			$('#modal .modal-header').find('h4').empty().html('Oops!');
			$('#modal').find('p').empty().html('<span class="text-primary">Digite corretamente o campo <strong>descrição</strong>!</span><span><em>e.g.  "You think water moves fast? You should see ice."</em></span>');
			$('#modal').modal('show');
			return false;

		} else if(!regexPDF.test(archive)) {
			$('#modal').find('p').empty().html('São permitidos arquivos <strong>.pdf</strong>!');
			$('#modal').modal('show');
			return false;
        }

		section.save();
		return true;
	},

	save: function(){
		var data = new FormData($('form')[0]);
		$.ajax({
			url: '/key/save_key',
			type:'POST',
			global: true,
			dataType: "json",
			cache: false,
			processData: false,
			contentType: false,
			data:data,
			beforeSend: function(){
				cms.addModal();
			},
			success: function(data){
				$r = data.return;

				cms.removeModal();

				if($r){

					$('#modal .modal-header').find('h4').empty().html('Sucesso!');
					$('#modal').find('p').empty().html('<span class="text-primary">Registro salvo com Sucesso!</span>');

				} else {

					$('#modal .modal-header').find('h4').empty().html('Oops!');
					$('#modal').find('p').empty().html('<span class="text-primary">Ocorreu um erro ao salvar os dados!</span>');

				}

				$('#modal').modal('show');
				cms.closeSingle();
			},
			error: function(){

				cms.removeModal();

				$('#modal .modal-header').find('h4').empty().html('Oops!');
				$('#modal').find('p').empty().html('<span class="text-primary">Ocorreu um erro ao salvar os dados!<br>Enre em contato com o suporte.</span>');
				$('#modal').modal('show');

				cms.closeSingle();

			},
			complete: function(){
				// APENAS CALLBACK
			}
		});
	}
}

$(document).ready(section.init);