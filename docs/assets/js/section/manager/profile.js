var section = {
	init: function() {
		$.mask.masks.phone = {mask: '(99) 9999-9999'};
		section.mount();
		section.joy();
	},

	mount: function(){
		$('#phone,#cell_phone').bind('focusout', cms.setPhone);
	},

	joy: function(){
		$("#visualize").joyride({
			autoStart : true,
			postStepCallback : function (index, tip) {
				if (index == 1) {
					$(this).joyride('set_li', false, 1);
				}
			},
	        modal:true,
	        expose: false
		});
	}
}

$(document).ready(section.init);