<?php $this->load->view('includes/header');?>
<?php $this->load->view('includes/navigation');?>
<body id="user">

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				
				 <table class="table table-striped" id="bloggers">
		                <thead>
		                    <tr>
		                        <th>Blogger Name</th>
		                        <th>Position</th>
		                        <th>Company</th>
		                        <th>Address</th>
		                        <th/>Number of blog</th>
		                    </tr>
		                </thead>
		                <tbody id="show_bloggers">
		                	  <?php foreach($all_bloggers as $bloggers):?>
			                    <tr>
			                  
			                    	<td><?php echo $bloggers->blogger_name?></td>
			                    	<td><?php echo $bloggers->position?></td>
			                    	<td><?php echo $bloggers->company?></td>
			                    	<td><?php echo $bloggers->address?></td>

			                    	<?php $num_blogs = $this->category_and_blog_management_model->count_blog_by_blogger($bloggers->user_id);

			                    	?>
			                    	<?php foreach($num_blogs as $num_blog):?>
			                    	<td><?php echo $num_blog->count_all;?></td>
			                    <?php endforeach;?>


			                    </tr>
			                <?php endforeach; ?>
		                </tbody>
	            </table>
			</div>
		</div>
	</div>


<script>
	
	$(document).ready(function(){


	});
</script>




<?php $this->load->view('includes/footer');?>