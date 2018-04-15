<?php $this->load->view('includes/header');?>
<body id="category">
<?php $this->load->view('includes/navigation');?>
	

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Categories</h1>



				<div class="alert alert-success display-success" style="display: none">
					<h3>Success!</h3>
					<p>New Category has been added</p>
				</div>
			</div>

			

		</div>


		<div class="row" id="remove_for_shorttime">
			<div class="col-md-6" id="category_list_div">

				<h3>Category List</h3>
				
				<table class="table table-striped" id="categories">
		                <thead>
		                    <tr>
		                        <th>Category Name</th>
		                        <th>Number of Blogs</th>
		                    </tr>
		                </thead>
		                <tbody id="show_categories">
		                	 <?php foreach($all_category as $category):?>
		                	<tr>
		                		<td><?php echo $category->category_name;?></td>

		                		<?php $blog_number = $this->category_and_blog_management_model->count_blog_by_category($category->category_id);

		                			foreach($blog_number as $b_num):
		                		?>
		                			<td><?php echo $b_num->count_all;?></td>
		                			<?php endforeach;?>
		                	</tr>
			             <?php endforeach;?>
		                 
		                </tbody>
	            </table>

			</div>


			<?php if($this->session->userdata('is_loggedin')):?>
			<div class="col-md-6">
				
				<h3>Add New Category</h3>
					
				<?php echo form_open_multipart('', 'class="category" id="addCategoryForm"');?>


				<div class="alert alert-danger display-error" style="display: none">

    			 </div>

				<div class="col-md-12">
				<br />
					<?php 
					echo form_label('Category Name', 'category');
					?>

					<?php 
						$data = array(
						        'name'          => 'category',
						        'id'            => 'category',
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
					<button type="submit" class="btn btn-primary btn-sm pull-right" name="add">Add</button>
					
				</div>

				<?php echo form_close();?>
			</div>
			<?php endif; ?>

		</div>


	</div>


<script type="text/javascript">
	$(document).ready(function(){
		
		 function removeSuccessMessage() {
    			setTimeout(function(){ 

    			$(".display-success").fadeOut("slow");
    			location.reload();
    			 }, 1000);
		}

		


		function ajaxReload(){
			ajaxRedirectTo("<?php echo base_url('main/categories')?>")
		}

		function addCategory(){


			$("#addCategoryForm").submit(function(event){
				event.preventDefault();
				//alert('submit');
				
				$.ajax({
							type: "POST",
							url : "<?php echo base_url('category_and_blog_controller/add_category_action')?>",
							dataType: "json",
							data :$('#addCategoryForm').serialize(),
							success:function(data){
								if(data.code =="200"){
									//window.location="register";
									//alert("Success: " + data.msg);
									$(".display-success").css("display","block");
									$(".display-error").css("display","none");
									$("#editForm").trigger("reset");
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



		function show_categories(){
		    $.ajax({
		        type  : 'ajax',
		        url   : '<?php echo site_url('category_And_blog_controller/categories')?>',
		        async : false,
		        dataType : 'json',
		        success : function(data){
		            var html = '';
		            var i;
		            for(i=0; i<data.length; i++){



		                html += '<tr>'+
		                  		'<td>'+data[i].category_name+'</td>'+
		                         '<td>'+data[i].count+'</td>'+
		                        '</tr>';
		            }
		            $('#show_categories').html(html);
		        }

		    });
		}



		//show_categories();
		addCategory();
		

	
	});
</script>


<?php $this->load->view('includes/footer');?>