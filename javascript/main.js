$(document).ready(function(){
	$('#s-form').on("submit", function(e){
		e.preventDefault();
		var name = $.trim($('#s-name').val()),   //.trim fonksiyonu string'in baş ve sondaki boşlukları siler.
			surname = $.trim($('#s-surname').val()),	
			phone = $.trim($('#s-phone').val()),
			email = $.trim($('#s-email').val()),
			unique = $.trim($('#s-unique').val()),
			password = $.trim($('#s-password').val()),
			message = $('#s-message');


		if ((name != "") && (surname != "") &&  (phone != "") && (email != "") && (unique != "") && (password != "")) {
			if (hk_email(email)) {
				if (hk_phoneNo(phone)) {
					$.ajax({
						url: "./part/signup_part.php",
						data: {name:name,surname:surname,phone:phone,email:email,unique:unique,password:password},
						type: "post",
						beforeSend: function(){
							message.html("<img src='images/ajax.gif'>");
						},
						complete: function(data){
							
							var json = $.parseJSON(data.responseText);		
							if (json.type == "Error") {
								message.removeClass('text-green').addClass('text-red').html(json.message);
							}else{
								message.removeClass('text-red').addClass('text-green').html(json.message);
								window.location='login.php';
							}
						}
					});
				}else{
					message.removeClass("text-green").addClass("text-green").text("Invalid Phone Number.");	
				}
			}else{
				message.removeClass("text-green").addClass("text-green").text("Invalid Email Address.");	
			}
		}else{
			message.removeClass("text-green").addClass("text-red").text("Fill in all the Fields.");
		}
	});


	$('#l-form').submit(function(e){
		e.preventDefault();
		var email = $('#l-email').val(),
			password = $('#l-password').val(),
			message = $('#l-message');

		if ((email != "") && (password != "")) {
			$.ajax({
				url: "./part/login_part.php",
				data: {email:email,password:password},
				type: "post",
				beforeSend: function(){
					message.html("<img src='images/ajax.gif'>");
				},
				complete: function(data){
					var json = $.parseJSON(data.responseText);
					if (json.type == "Error") {
						message.addClass('text-red').text(json.message);
					}else{
						message.removeClass("text-red").addClass('text-red').text(json.message);
					
						if(json.message=="Welcome"){window.location = 'index.php';}
					}
				}
			});
		}else{
			message.addClass('text-red').text("Fill in all the fields");
		}
	});


	$("#add-to-list").click(function(){
		var book_id = $('#p-id').val(),
			message = $("#add-to-list-message");
		$.ajax({
			url: "./part/add_to_list_part.php",
			data: {book_id:book_id},
			type: "post",
			beforeSend: function(){
				message.html("<img src='images/ajax.gif'>");
			},
			complete: function(data){
				var json = $.parseJSON(data.responseText);
				if (json.type == "success") {
					message.removeClass('text-red').addClass('text-green').html(json.message);
					hk_update_book_cout("#cart-count");
				}else{
					message.removeClass('text-green').addClass('text-red').html(json.message);
				}
			}
		});
	});

	$('.remove-from-list_part').click(function(){
		var list_id = $(this).attr('id'),
			message = $('#list-message');

		$.ajax({
			url: "./part/remove_from_list_part.php",
			type: "post",
			data: {list_id:list_id},
			beforeSend: function(){
				message.html("<img src='images/ajax.gif'>");
			},
			complete: function(data){
				var json = $.parseJSON(data.responseText);
				if (json.type == "success") {
					window.location.reload();
				}else{ 
					message.addClass('text-red').html(json.message);
				}
			}
		});
	});

	$('#place_order_form').submit(function(event){
		event.preventDefault();
		var name = $.trim($('#order_name').val()),
			email = $.trim($('#order_email').val()),
			mobile = $.trim($('#order_mobile').val()),
			city = $.trim($('#order_city').val()),
			pincode = $.trim($('#order_pincode').val()),
			address = $.trim($('#order_address').val()),
			message = $('#order_message'),
			product_id_stack = $.trim($('#product-id-stack').val());

			if ((name == "") || (email == "") || (mobile == "") || (city == "") || (pincode == "") || (address == "")) {
				message.addClass('text-red').html("Fill in all the fields.");
			}else{
				if (hk_email(email)) {
					if (hk_phoneNo(mobile)) {
						
							$.ajax({
								url: "./part/buy_part.php",
								data: {product_id_stack:product_id_stack,name:name,email:email,mobile:mobile,city:city,pincode:pincode,address:address},
								type: "post",
								beforeSend: function(){
									message.html("<img src='images/ajax.gif'>");
								},
								complete: function(data){
									var json = $.parseJSON(data.responseText);
									if (json.type == "success") {
										message.removeClass("text-red").addClass('text-green').html("Your Order Has Been Placed");
										window.location = "user.php";									
									}else{
										message.addClass('text-red').html(json.message);
									}
								}
							});
						 
					}else{
						message.addClass('text-red').html("Invalid mobile number");	
					}
				}else{
					message.addClass('text-red').html("Invalid email address.");
				}
			}
	});

	var height = $(document).height();
	$('#admin-left').css("height", height);
});