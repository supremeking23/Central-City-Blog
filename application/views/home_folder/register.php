<?php $this->load->view('includes/header');?>
<body id="register">
<?php $this->load->view('includes/navigation');?>
	

	
	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<header>
					<h1>Register Here!!</h1>
				</header>
			</div>
		</div>
		
		<div class="row">




			<div class="col-md-12 ">
				
				<?php 
				//user_management/register
				echo form_open_multipart('', 'class="register" id="registerForm" ');?>

				 <div class="alert alert-danger display-error" style="display: none">

    			  </div>

    					<div class="alert alert-success display-success" style="display: none">
    						Success!
    						<p>You can now login to your account</p>
    					</div>
			
					<div class="col-md-12">
						<br />
						<?php 



						echo form_label('Blogger Name', 'blogger_name','class="control-label"');
						?>



						<?php 
							$data = array(
							        'name'          => 'blogger_name',
							        'id'            => 'blogger_name',
							        'value'         => '',
							        //'minlength'     => '2',
							        'size'          => '',
							       	//'required'      => 'required',
							        'class'         => 'form-control',
							        
							);

							echo form_input($data);
						?>

						
						<div id="error_name"></div>
					</div>
			

			

				<div class="col-md-12">
					<br />
					<?php 
					echo form_label('Position', 'position');
					?>

					<?php 
						$data = array(
						        'name'          => 'position',
						        'id'            => 'position',
						        'value'         => '',
						        'maxlength'     => '100',
						        'size'          => '',
						       	
						        'class'         => 'form-control',
						);

						echo form_input($data);
					?>
					<div id="error_position"></div>
				</div>


				<div class="col-md-12">
					<br />
					<?php 
					echo form_label('Company', 'company');
					?>

					<?php 
						$data = array(
						        'name'          => 'company',
						        'id'            => 'company',
						        'value'         => '',
						        'maxlength'     => '100',
						        'size'          => '',
						       	
						        'class'         => 'form-control',
						);

						echo form_input($data);
					?>
					<div id="error_company"></div>
				</div>

				<div class="col-md-12">
					<br />
					<?php 
					echo form_label('Address', 'address');
					?>

					<?php 
						$data = array(
						        'name'          => 'address',
						        'id'            => 'address',
						        'value'         => '',
						        'maxlength'     => '100',
						        'size'          => '',
						      
						        'class'         => 'form-control',
						);

						echo form_input($data);
					?>
					<div id="error_address"></div>
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
					<div id="error_username"></div>
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
					<div id="error_password"></div>
				</div>


				<div class="col-md-12">
					<br />
					
					<?php 

						$data = array(
							'name' => 'submit',
							'value' => 'Submit',
							'class' => 'btn btn-primary btn-sm',
						);

						echo form_submit($data);?>
					
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

	
	$('#registerForm').submit(function(event){
	
			event.preventDefault();

			/*var registerData = $('#registerForm').serialize();
			
			alert(registerData);

			$.post('user_management.php',registerData + '&ajaxRequest=1',function(msg){

			});*/


			var blogger_name = $('#blogger_name').val();
			var position = $('#position').val();
			var company = $('#company').val();
			var address = $('#address').val();
			var username = $('#username').val();
			var password = $('#password').val();


			//registerData = $('#registerForm').serialize() or  {blogger_name:blogger_name,position:position,company:company, address:address,username:username,password:password};
			
			//alert('submit');

			function removeSuccessMessage() {
    			setTimeout(function(){ 

    			$(".display-success").fadeOut("slow");

    				 }, 3000);
			}

			$.ajax({
				type: "POST",
				url : "<?php echo base_url('user_management/register_action')?>",
				dataType: "json",
				data :$('#registerForm').serialize(),
				success:function(data){
					if(data.code =="200"){
						//window.location="register";
						//alert("Success: " + data.msg);
						$(".display-success").css("display","block");
						$(".display-error").css("display","none");
						$("#registerForm").trigger("reset");
						
						removeSuccessMessage();
						
					}else{
						$(".display-error").html("<ul>" + data.msg + "</ul>");
						$(".display-error").css("display","block");
						$(".display-success").css("display","none");
					}
				}

			});




			//alert(registerData);
		});


		
	});


</script>


<?php $this->load->view('includes/footer');?>