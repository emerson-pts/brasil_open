var section = {
	init: function(){
		$.mask.masks.phone = {mask: '(99) 9999-9999'};
		section.mount();
		section.joy();
	},

	mount: function(){
		$('#phone, #cell_phone').bind('focusout', section.setMask);
	},

	setMask: function(event){
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