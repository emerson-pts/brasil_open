var cms = {
	init: function(){
		cms.mount();
		cms.createWysing();
		cms.createDatePicker();
		cms.createTimePicker();
		cms.sidebarScroll();
		cms.dataTable();
		cms.tooltip();
	},

	mount: function(){
		/* TESTEING
		$('#upload').bind('click', cms.photos);
		*/

		$('.many').bind('change', cms.manyFiles);
		$('.simple').bind('change', cms.singleFiles);
	},

	tooltip: function(){
		$('body').tooltip({selector: '[data-toggle=tooltip]'});
	},

	sidebarScroll: function(){
		$("#sidebar").niceScroll({
			styler:"fb",
			cursorcolor:"#e8403f", 
			cursorwidth: '3', 
			cursorborderradius: '10px', 
			background: '#404040', 
			spacebarenabled:false, 
			cursorborder: ''
		});
    
    	$("html").niceScroll({
    		styler:"fb",
    		cursorcolor:"#e8403f", 
    		cursorwidth: '6', 
    		cursorborderradius: '10px', 
    		background: '#404040', 
    		spacebarenabled:false,  
    		cursorborder: '', 
    		zindex: '1000'
    	});

	},

	addModal: function(){
		var _height = $(window).height();
		var _posX = $(window).width() / 2;
		var _posY = $(window).height() / 2;

		$('#windows-ajax').height(_height);

		$('.content-ajax').css({
			top: _posY,
			left: _posX
		});

		$('#windows-ajax').fadeIn();
	},

	removeModal: function(){
		$('#windows-ajax').fadeOut();
	},

	photos: function(el){
		var id = $(el.currentTarget).attr('id');
		$('.' + id).trigger('click');
	},

	singleFiles: function(el){
		var source = $(el.currentTarget).val().replace('C:\\fakepath\\', '');
		$(el.currentTarget).parents('label').find('.simple-upload').next('.name-file').text(source);
	},

	manyFiles: function(el){
		var source = $(el.currentTarget).val().replace('C:\\fakepath\\', '');
		$(el.currentTarget).parents('label').find('.name-file').text($('input[type=file]').get(0).files.length + ' arquivo(s) para upload.');
	},

 	createWysing: function () {
        $.each($('textarea'), function (i, el) {
            $(el).wysihtml5({
                "font-styles": false,
                "emphasis": true,
                "lists": true,
                "html": false,
                "link": true, 
                "image": false,
                "color": false
            });
        });
    },
	
	createDatePicker: function(){
        $.each($('.datepicker'), function (i, el) {
            $(el).datepicker({
				format: 'dd/mm/yyyy',
				autoclose: false
            });
        });
	},
	
	createTimePicker: function(){
        $.each($('.timepicker'), function (i, el) {
            $(el).timepicker({
				minuteStep: 5,
				defaultTime: false,
				showMeridian: false	
			});
        });
	},

	dataTable: function(){
	    $('#dataTable').dataTable({
	       "oLanguage": {
	          "sProcessing": "Aguarde enquanto os dados são carregados ...",
	          "sLengthMenu": "Mostrar _MENU_ registros por pagina",
	          "sZeroRecords": "Nenhum registro correspondente ao criterio encontrado",
	          "sInfoEmtpy": "Exibindo 0 a 0 de 0 registros",
	          "sInfo": "Exibindo de _START_ a _END_ de _TOTAL_ registros",
	          "sInfoFiltered": "",
	          "sSearch": "Procurar",
	          "oPaginate": {
	             "sFirst":    "Primeiro",
	             "sPrevious": "Anterior",
	             "sNext":     "Próximo",
	             "sLast":     "Último"
	          }
	        },
	        "bSortClasses": false,
	        "bStateSave": true,
			aaSorting : [[0, 'desc', 'desc']]
	    });
	},

	singleRoot: function(){
		var host = 'http://' + window.location.host + '/';
		var url = host;

		window.location.href = url;
	},


	singlePage: function(){
		var host = 'http://' + window.location.host + '/';
		var pathname = window.location.pathname.split('/')[1];
		var url = host + pathname;

		window.location.href = url;
	},

	manyPage: function(){
		var host = 'http://' + window.location.host + '/';
		var foldername = window.location.pathname.split('/')[1] + '/';
		var pathname = window.location.pathname.split('/')[2];
		var url = host + foldername + pathname;

		window.location.href = url;
	},

	redirRoot: function(){
		var timer = setInterval(function(){

			window.clearInterval(timer);

			setTimeout(function(){

				cms.singleRoot();

			}, 1000);
		}, 2000);
	},

	redirSingle: function(){
		var timer = setInterval(function(){

			window.clearInterval(timer);

			setTimeout(function(){

				cms.singlePage();

			}, 1000);
		}, 2000);
	},

	redirMany: function(){
		var timer = setInterval(function(){

			window.clearInterval(timer);

			setTimeout(function(){

				cms.manyPage();

			}, 1000);
		}, 2000);
	},

	update: function(){
		var timer = setInterval(function(){

			window.clearInterval(timer);

			setTimeout(function(){

				location.reload();

			}, 500);
		}, 1000);
	},

	closeRoot: function(){
		$('#modal, #galleryModal').on('hidden.bs.modal', function (e) {
			cms.redirRoot();
		});
	},

	closeSingle: function(){
		$('#modal, #galleryModal').on('hidden.bs.modal', function (e) {
			cms.redirSingle();
		});
	},

	closeMany: function(){
		$('#modal, #galleryModal').on('hidden.bs.modal', function (e) {
			cms.redirMany();
		});
	},

	reload: function(){
		$('#modal, #galleryModal').on('hidden.bs.modal', function (e) {
			cms.update();
		});
	},

	getDate: function(){
		var today = new Date();
		var day = today.getDate();
		var month = today.getMonth() + 1;
		var year = today.getFullYear();

		var full_day =  day < 10 ? '0' + day : day;
		var full_month = month < 10 ? '0' + month : month;

		return full_day + '/' + full_month + '/' + year;
	},

	getHours: function(){
		var today = new Date();
	    var hours = today.getHours();
	    var minutes = today.getMinutes();

		full_hours = hours < 10 ? '0' + hours : hours;
		full_minutes = minutes < 10 ? '0' + minutes : minutes;

		return full_hours + ':' + full_minutes;
	},

	setPhone: function(event){
  		var target, phone, element;
  		target = (event.currentTarget) ? event.currentTarget : event.srcElement;
  		phone = target.value.replace(/\D/g, '');
  		element = $(target);
  		element.unsetMask();
  		if(phone.length > 10) {
  			element.setMask('(99) 99999-9999');
  		} else { 
  			element.setMask('(99) 9999-99999');
  		}
	}
};

trace = function(param, type) {
	try {
        console[type == undefined ? 'log' : type](param);
    } catch (e) { };
};

$(document).ready(cms.init);