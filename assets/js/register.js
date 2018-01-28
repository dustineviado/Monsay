$(document).ready(function() {
	$("form-baby").unbind('submit').bind("submit", function()){
		var form = $(this);

		$.ajax({
			url: form.attr('action'),
			type: 'POST',
			data: serialize(),
			dataType: 'json',
			success:function(response){
				if(response.success == true){
					$("the-message").append('<div class="alert alert-success">' + 'Data has been saved' + '</div');

					form[0].reset();
					$(".text-danger").remove();
					$(".form-group").removeClass('has-error').removeClass('has-success');

				}
				else{
					$.each(response.messages, function(index, value){
						var element = $('#' + index);
						element.closest('.form-group')
						.removeClass('has-error')
						.removeClass('has-success')
						.addClass(value.length > 0 ? 'has-error': 'has-success')
						.find('.text-danger').remove();
						$(element).after(value);
					});
				}
			}
		})
	});
});