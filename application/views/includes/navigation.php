<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="<?php echo site_url();?>">Central City Blog</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav" id="nav">
	       
	        <li><a href="<?php  echo site_url()?>blogs">Blogs</a></li>
	        <li><a href="<?php  echo site_url()?>categories">Categories</a></li>
	        <li><a href="<?php  echo site_url()?>users">Users</a></li>
			
			
			<?php if($this->session->userdata('is_loggedin')){?>

				<?php foreach($blogger_detail as $detail){
					$blogger_name = $detail->blogger_name;
				}?>
				<li><a href="<?php  echo site_url()?>main/edit_user_detail" title="<?php echo $blogger_name;?>" data-tooltip="tooltip" data-placement="bottom">Your Account</a></li>

				<li><a href="<?php  echo site_url()?>main/your_blog" title="" data-tooltip="tooltip" >Your Blog</a></li>
				<li><a href="<?php  echo site_url()?>main/logout">Logout</a></li>	
			<?php }else{ ?>
			<li><a href="<?php  echo site_url()?>register">Register</a></li>
			<li><a href="<?php  echo site_url()?>login">Login</a></li>	 
			<?php }?>      
	      </ul>
	    
	      
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>