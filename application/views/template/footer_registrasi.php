<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
	<script>
		// just for the demos, avoids form submit
		jQuery.validator.setDefaults({
		  	debug: true,
		  	success:  function(label){
        		label.attr('id', 'valid');
   		 	},
		});
		$( "#myform" ).validate({
		  	rules: {
			    password: "required",
		    	comfirm_password: {
		      		equalTo: "#password"
		    	}
		  	},
		  	messages: {
		  		first_name: {
		  			required: "Masukkan Nama Anda"
		  		},
		  		// last_name: {
		  		// 	required: "Please enter a lastname"
		  		// },
		  		your_email: {
		  			required: "Masukkan Email Anda"
		  		},
		  		password: {
	  				required: "Masukkan Password"
		  		},
		  		comfirm_password: {
		  			required: "Ulangi Password",
		      		equalTo: "Password Tidak Sama"
		    	}
		  	}
		});
	</script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>