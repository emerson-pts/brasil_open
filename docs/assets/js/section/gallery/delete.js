var section = {
	init: function(){
		section.mount();
	},

	mount: function(){
		$('body').delegate('.btn_remove', 'click', section.exclude);
	},

	exclude: function(el){
		var data = {'album_id' : $(el.currentTarget).attr('rel')};
		$.ajax({
			url: '/gallery/delete_album',
			type: 'post',
			global: true,
			dataType: "json",
			cache: false,
			data: data,
			beforeSend: function(data){
				cms.addModal();
			},
			success: function(data){
				$r = data.return;

				cms.removeModal();

				if($r){
					$('#modal .modal-header').find('h4').empty().html('Sucesso!');
					$('#modal').find('p').empty().html('<span class="text-primary">Registro excluído com Sucesso!</span>');
					$('#modal').modal('show');

					cms.reload();

				} else {
					$('#modal .modal-header').find('h4').empty().html('Sucesso!');
					$('#modal').find('p').empty().html('<span class="text-primary">Ocorreu um erro ao excluir os dados!</span>');
					$('#modal').modal('show');

				}

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