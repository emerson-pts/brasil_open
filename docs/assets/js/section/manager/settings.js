var section = {
	init: function() {
		section.joy();
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