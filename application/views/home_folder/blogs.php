<?php $this->load->view('includes/header');?>
<body id="blog">

<?php //main body begin?>

<?php $this->load->view('includes/navigation');?>
	

	<div class="container" id="blog">
		<div class="col-md-12">
					<h1>Blogs</h1>



					<div class="alert alert-success display-success" style="display: none">
						<h3>Success!</h3>
						<p>New Blog has been added</p>
					</div>
		</div>


		<div class="row" id="remove_for_shorttime">
			<div class="col-md-6" id="category_list_div">

				<h3>Blog List</h3>
				
				<table class="table table-striped" id="categories">
		                <thead>
		                    <tr>
		                        <th>Blog Name</th>
		                         <th>Category Name</th>
		                        <th>Blog By</th>
		                        <th>Date Issued</th>
		                    </tr>
		                </thead>
		                <tbody id="show_blogs">
		                
		                </tbody>
	            </table>

			</div>


			<?php if($this->session->userdata('is_loggedin')):?>
			<div class="col-md-6">
				
				<h3>Add New Blog</h3>
					
				<?php echo form_open_multipart('', 'class="category" id="addBlogForm"');?>


				<div class="alert alert-danger display-error" style="display: none">

    			 </div>

				<div class="col-md-12">
					<br />
						<?php 
						echo form_label('Category', 'category');
						?>

						<select name="category" id="category" name="category" class="form-control" >
							<option value="" >---Please choose a category---</option>
						</select>
				</div>

				


				<div class="col-md-12">
					<br />
						<?php 
						echo form_label('Blog Name', 'blog');
						?>

						<?php 
							$data = array(
							        'name'          => 'blog',
							        'id'            => 'blog',
							        'value'         => '',
							        'maxlength'     => '100',
							        'size'          => '',
							       	
							        'class'         => 'form-control',
							);

							echo form_input($data);
						?>
				</div>

				<div class="col-md-12">
					<br />
						<?php 
						echo form_label('Blog Description', 'description');
						?>

						<textarea class="form-control" id="description" name="description">
							
						</textarea>
				</div>




				<br />

				

				<div class="col-md-12">
					<br />
					<input type="hidden" name="blogger_id" id="blogger_id" value="<?php echo $this->session->userdata('user_id');?>">
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
    			 }, 2000);
		}

		

		function optionCategories(){

			    $.ajax({

                    url: '<?php echo base_url('category_and_blog_controller/categories')?>',

                    type: "GET",

                    dataType: "json",

                    success:function(data) {

                       // $('select[name="category"]').empty();
                         $.each(data, function(key, value) {

                            $('select[name="category"]').append('<option value="'+ value.category_id +'">'+ value.category_name +'</option>');

                        });

                    }

                });
		}


		function addBlog(){


			$("#addBlogForm").submit(function(event){
				event.preventDefault();
				//alert('submit');
				//alert($('#addBlogForm').serialize());
				$.ajax({
							type: "POST",
							url : "<?php echo base_url('category_and_blog_controller/add_blog_action')?>",
							dataType: "json",
							data :$('#addBlogForm').serialize(),
							success:function(data){
								if(data.code =="200"){
									//window.location="register";
									//alert("Success: " + data.msg);
									$(".display-success").css("display","block");
									$(".display-error").css("display","none");
									$("#addBlogForm").trigger("reset");
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

		function parseJsonDate(jsonDateString){
   			 return new Date(parseInt(jsonDateString.replace('/Date(', '')));
		}

		//var displayDate = $.datepicker.formatDate("mm/dd/yy", date);

		function show_blogs(){
		    $.ajax({
		        type  : 'ajax',
		        url   : '<?php echo site_url('category_And_blog_controller/blogs')?>',
		        async : false,
		        dataType : 'json',
		        success : function(data){
		            var html = '';
		            var i;
		            var e = "";
		            var displayDate = "";
		            for(i=0; i<data.length; i++){
		            	//displayDate = $.datepicker.formatDate("mm/dd/yy", data[i].blog_post_date);
		            	//displayDate = new Date(data[i].blog_post_date);
		            	//e = Date.parse(data[i].blog_post_date)
		            	displayDate = new Date(e);

		                html += '<tr>'+

		                  		'<td>'+data[i].blog_name+'</td>'+
		                         '<td>'+data[i].category_name+'</td>'+
		                         '<td>'+data[i].blogger_name+'</td>'+
		                         '<td>'+data[i].blog_post_date+'</td>'+
		                        '</tr>';
		            }
		            $('#show_blogs').html(html);
		        }

		    });
		}


		optionCategories();
		show_blogs();
		addBlog();
		

	
	});
</script>



<?php $this->load->view('includes/footer');?>