<?php $this->load->view('includes/header');?>
<body id="user_detail">
<?php $this->load->view('includes/navigation');?>
	

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<header>
					<h1>Edit your information Here!!</h1>
				</header>
			</div>
		</div>


		<div class="row" id="category_list_div">




			<div class="col-md-12 ">
				
				<?php 
				//user_management/register
				echo form_open_multipart('', 'class="register" id="editForm" ');?>

				 <div class="alert alert-danger display-error" style="display: none">

    			  </div>

    					<div class="alert alert-success display-success" style="display: none">
    						Success!
    						<p>Your information has been updated</p>
    					</div>
			
					<div class="col-md-12">
						<br />
						<?php 



						echo form_label('Blogger Name', 'blogger_name','class="control-label"');
						?>



						<input type="text" id="blogger_name" name="blogger_name" class="form-control" value ="">

						
						
					</div>
			

			

				<div class="col-md-12">
					<br />
					<?php 
					echo form_label('Position', 'position');
					?>

					
					<input type="text" id="position" name="position" class="form-control" value ="">
				</div>


				<div class="col-md-12">
					<br />
					<?php 
					echo form_label('Company', 'company');
					?>

					<input type="text" name="company" id="company" class="form-control" value ="">
				</div>

				<div class="col-md-12">
					<br />
					<?php 
					echo form_label('Address', 'address');
					?>

					<input type="text" name="address" id="address" class="form-control" value ="">
				</div>

				<div class="col-md-12">
					<br />
					<?php 
					echo form_label('Username', 'username');
					?>

					<input type="text" name="username" id="username" class="form-control" value ="">
				</div>

				<br />

				<div class="col-md-12">
					<br />
					<input type="password" name="password" id="password" class="form-control" value ="">
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


				<input type="hidden" name="user_id" id="user_id" value="">

				<?php echo form_close();?>
			</div>
		</div>
		
	</div>


	<script type="text/javascript">
		
		$(document).ready(function(){
			
			function show_blogger_details(){

					$.ajax({
						type: "GET",
						url : "<?php echo base_url('user_management/get_blogger_by_id_ajax_action')?>",
						dataType : "json",
						success:function(data){
							console.log(data.blogger_name);
							$('#blogger_name').val(data.blogger_name);
							$('#position').val(data.position);
							$('#company').val(data.company);
							$('#address').val(data.address);
							$('#username').val(data.username);
							$('#password').val(data.password);

							$('#user_id').val(data.user_id);
						}

					});
			}

			function removeSuccessMessage() {
    			setTimeout(function(){ 

    			$(".display-success").fadeOut("slow");
    				//location.reload();
    				 }, 3000);
			}

			function edit_blogger_details(){


				$("#editForm").submit(function(event){
					event.preventDefault();
					//alert('submit');
					
					$.ajax({
								type: "POST",
								url : "<?php echo base_url('user_management/edit_user_action')?>",
								dataType: "json",
								data :$('#editForm').serialize(),
								success:function(data){
									if(data.code =="200"){
										//window.location="register";
										//alert("Success: " + data.msg);
										$(".display-success").css("display","block");
										$(".display-error").css("display","none");
										//$("#editForm").trigger("reset");
										$("#remove_for_shorttime").css("display","none");
										removeSuccessMessage();
										
									}else{
										$(".display-error").html("<ul>" + data.msg + "</ul>");
										$(".display-error").css("display","block");
										$(".display-success").css("display","none");
									}
								}

							});
				});
			}

			show_blogger_details();
			edit_blogger_details();


		});
	</script>



<?php $this->load->view('includes/footer');?>