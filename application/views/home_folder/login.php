<?php $this->load->view('includes/header');?>
<body id="login">
<?php $this->load->view('includes/navigation');?>
	

	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<header>
					<h1>Sign In to your account</h1>
				</header>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-12 ">


				
				<?php echo form_open_multipart('', 'class="login" id="loginForm"');?>


				<div class="alert alert-danger display-error" style="display: none">

    			 </div>

				<div class="col-md-12">
				<br />
					<?php 
					echo form_label('Username', 'username');
					?>

					<?php 
						$data = array(
						        'name'          => 'username',
						        'id'            => 'username',
						        'value'         => '',
						        'maxlength'     => '100',
						        'size'          => '',
						       	
						        'class'         => 'form-control',
						);

						echo form_input($data);
					?>
				</div>

				<br />

				<div class="col-md-12">
				<br />
					<?php 
					echo form_label('Password', 'password');
					?>

					<?php 
						$data = array(
						        'name'          => 'password',
						        'id'            => 'password',
						        'value'         => '',
						        'maxlength'     => '',
						        'size'          => '',
						        
						        'class'         => 'form-control',
						);

						echo form_password($data);
					?>

				</div>


				<div class="col-md-12">
					<br />
					<button type="submit" class="btn btn-primary btn-sm" name="login">Login</button>
					
				</div>

				<?php echo form_close();?>
			</div>
		</div>

	</div>




<?php //form validation?>

<script>
	
	$(document).ready(function(){


			/*$('#loginForm').submit(function(){
				//alert('loaded');
				var abort = false;
				$(':input[required]').each(function(){
					if($(this).val === ''){
						$(this).after('<div>kailangan 2</div>');
						abort =true;
					}
				});

				if(abort){
					return false;

				}else{
					return true;
				}
			});*/

			
			$('#loginForm').submit(function(event){
			
					event.preventDefault();

					/*var registerData = $('#registerForm').serialize();
					
					alert(registerData);

					$.post('user_management.php',registerData + '&ajaxRequest=1',function(msg){

					});*/


					
					var username = $('#username').val();
					var password = $('#password').val();


					//registerData = $('#registerForm').serialize() or  {blogger_name:blogger_name,position:position,company:company, address:address,username:username,password:password};
					
					//alert('submit');

					function removeSuccessMessage() {
		    			setTimeout(function(){ 

		    			$(".display-success").fadeOut("slow");

		    				 }, 3000);
					}


					function ajaxRedirectTo(url){
						 //url = "https://www.rapidtables.com/web/dev/jquery-redirect.htm";
		     	 		$(location).attr("href", url);
					}

					$.ajax({
						type: "POST",
						url : "<?php echo base_url('user_management/login_action')?>",
						dataType: "json",
						data :$('#loginForm').serialize(),
						success:function(data){
							if(data.code =="required_error_message"){
								//window.location="register";
								//alert("Success: " + data.msg);
								$(".display-error").html("<ul>" + data.msg + "</ul>");
								$(".display-error").css("display","block");
								
								
								
								
							}else if(data.code =="has_no_match"){
								//$(".display-error").html("<ul>" + data.msg + "</ul>");
								$(".display-error").html("<p>" + data.msg + "</p>");
								$(".display-error").css("display","block");
								
							}else{
								$(".display-error").css("display","none");
								ajaxRedirectTo("<?php echo base_url()?>");
							}
						}

					});




					//alert(registerData);
				});


		
	});


</script>





<?php $this->load->view('includes/footer');?>