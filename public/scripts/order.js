var Order = function () {

	var handleCatererSelect = function() {

		$("#caterer-details").hide();

		$("select#caterer").change(function() {
			$caterer_id = $(this).val()
			$.ajax({
				type: "GET",
				url: "http://supperbuddy.cpwc.me/index.php/caterer/detail/" + $caterer_id,
				success: function (data)
				{
					$("#caterer-details").show();
					// $("#caterer-id").text(data.id);
					$("#caterer-email").text(data.email);
					$("#caterer-phone").text(data.phone);		
					$("#caterer-address").text(data.address);
					$("#caterer-description").text(data.description);
				}
			});
		});
	}

	var handleFoodSelect = function() {

		//$("#caterer-details").hide();

		$("select#food").change(function() {
			$food_id = $(this).val()
			$.ajax({
				type: "GET",
				url: "http://supperbuddy.cpwc.me/index.php/order/suborderdetails/" + $food_id,
				success: function (data)
				{
					//$("#caterer-details").show();
					// $("#caterer-id").text(data.id);
					$("#food-price").text(data.price);
					
				}
			});
		});
	}


	// var handleRegister = function () {

	// 	$('.register-form').validate({
	// 		errorElement: 'span', //default input error message container
	// 		errorClass: 'help-block', // default input error message class
	// 		focusInvalid: false, // do not focus the last invalid input
	// 		ignore: "",
	// 		rules: {

	// 			organizationname: {
	// 				required: true
	// 			},
	// 			address: {
	// 				required: true
	// 			},
	// 			email: {
	// 				required: true,
	// 				email: true
	// 			},
	// 			password: {
	// 				required: true
	// 			},
	// 			rpassword: {
	// 				equalTo: "#register_password"
	// 			},
	// 			tnc: {
	// 				required: true
	// 			}
	// 		},

	// 		messages: { // custom messages for radio buttons and checkboxes
	// 			tnc: {
	// 				required: "Please accept TNC first."
	// 			}
	// 		},

	// 		invalidHandler: function (event, validator) { //display error alert on form submit

	// 		},

	// 		highlight: function (element) { // hightlight error inputs
	// 			$(element)
	// 				.closest('.form-group').addClass('has-error'); // set error class to the control group
	// 		},

	// 		success: function (label) {
	// 			label.closest('.form-group').removeClass('has-error');
	// 			label.remove();
	// 		},

	// 		errorPlacement: function (error, element) {
	// 			if (element.attr("name") == "tnc") { // insert checkbox errors after the container
	// 				error.insertAfter($('#register_tnc_error'));
	// 			} else if (element.closest('.input-icon').size() === 1) {
	// 				error.insertAfter(element.closest('.input-icon'));
	// 			} else {
	// 				error.insertAfter(element);
	// 			}
	// 		},

	// 		submitHandler: function (form) {
	// 			form.submit();
	// 		}
	// 	});

	// 	$('.register-form input').keypress(function (e) {
	// 		if (e.which == 13) {
	// 			if ($('.register-form').validate().form()) {
	// 				$('.register-form').submit();
	// 			}
	// 			return false;
	// 		}
	// 	});
	// }

	return {
		//main function to initiate the module
		init: function () {

			handleCatererSelect();
			handleFoodSelect();
			// handleRegister();

		}

	};

}();