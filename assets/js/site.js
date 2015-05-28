var site = {
	init: function(){
		$('.item:eq(0)').addClass('active');
		$('#slider-thumbs > .list-inline > li > a:eq(0)').addClass('selected');
	},

	mounth: function(){

	}
}

$(document).ready(site.init);