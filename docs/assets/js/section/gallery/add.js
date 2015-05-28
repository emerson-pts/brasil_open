var add = {
	init: function(){
		add.getData();
		add.mount();
	},

	mount: function(){
		$('#addGallery').bind('click', add.gallery);
		$('#save').bind('click', add.validate);
	},

	getData: function(){
		var id = $('#hidden_id').val();
		var slug = $('#path_name').val();

		$('#highlights_id').val(id);
		$('#slug').val(slug);
	},

	gallery: function(){
		$('#galleryModal').modal('show');
	},

	validate: function(){
		var regexVain = /^\s*$/;
		var regexImage = RegExp("[a-zA-Z0-9-_\.]+\.(jpg|png)$");
	
		var field = $('#many').val();
		var images = $('input[type=file]').get(0).files;

		if(regexVain.test(field)){
			$('#galleryModal').find('.result > p').removeClass('hide');
			$('#galleryModal').find('.result > p').empty().html('Você deve selecionar os arquivos para <strong>upload</strong>!');
			return false;

		} else if(!regexVain.test(field)){
			for (var i = 0; i < images.length; i++){
				if(!regexImage.test(images[i].name)) {
					$('#galleryModal').find('.result > p').removeClass('hide');
					$('#galleryModal').find('.result > p').empty().html('É somente permitido arquivo <strong>.jpg</strong> ou <strong>.png</strong>!</span class="text-muted"><span><em>e.g.  "imagem.jpg"</em>');
					return false;
		        }
			}
		}

        add.save();
		return true;
	},

	save: function(){
		var data = new FormData($('form')[1]);
		$.ajax({
			url: '/gallery/save_gallery',
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

					$('#galleryModal').find('.result > p').removeClass('hide');
					$('#galleryModal').find('.result > p').empty().html('<span class="text-primary">Registro salvo com Sucesso!</span>');

				} else {

					$('#galleryModal').find('.result > p').removeClass('hide');
					$('#galleryModal').find('.result > p').empty().html('Ocorreu um erro ao salvar os dados!');

				}

				cms.reload();
			},
			error: function(){

				cms.removeModal();

				$('#galleryModal').find('.result > p').removeClass('hide');
				$('#galleryModal').find('.result > p').empty().html('Ocorreu um erro ao salvar os dados!<br>Enre em contato com o suporte.');

				cms.closeSingle();

			},
			complete: function(){
				// APENAS CALLBACK
			}
		});
	}
};

$(document).ready(add.init);