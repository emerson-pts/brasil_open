var section = {
	init: function(){
		section.mount();
	},

	mount: function(){
		$('#publish').bind('click', section.validate);
	},

	validate: function(){
        var regexVain = /^\s*$/;

		var title = $('#title').val();
		var description = $('#description').val();

		if(regexVain.test(title)){
			$('#modal .modal-header').find('h4').empty().html('Oops!');
			$('#modal').find('p').empty().html('<span class="text-primary">Digite corretamente o campo <strong>título</strong>!</span><span class="text-muted"><em>e.g. "Samuel Ipsum"</em></span>');
			$('#modal').modal('show');
			return false;
			
		} else if(regexVain.test(description)){
			$('#modal .modal-header').find('h4').empty().html('Oops!');
			$('#modal').find('p').empty().html('<span class="text-primary">Digite corretamente o campo <strong>descrição</strong>!</span><span><em>e.g.  "You think water moves fast? You should see ice."</em></span>');
			$('#modal').modal('show');
			return false;
		}

		section.publish();
		return true;
	},

	publish: function(){
		var data = new FormData($('#create')[0]);
		$.ajax({
			url: '/gallery/edit_album',
			type:'POST',
			global: true,
			dataType: "json",
			cache: false,
			processData: false,
			contentType: false,
			data:data,
			beforeSend: function(data){
				cms.addModal();
			},
			success: function(data){
				$r = data.return;

				cms.removeModal();

				if($r){

					$('#modal .modal-header').find('h4').empty().html('Sucesso!');
					$('#modal').find('p').empty().html('<span class="text-primary">Registro atualizado com Sucesso!</span>');
 
				} else {

					$('#modal .modal-header').find('h4').empty().html('Oops!');
					$('#modal').find('p').empty().html('<span class="text-primary">Ocorreu um erro ao salvar os dados!</span>');
				}

				$('#modal').modal('show');
				cms.closeSingle();
				
			},
			error: function(){

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
};

$(document).ready(section.init);