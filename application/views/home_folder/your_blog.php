<?php $this->load->view('includes/header');?>
<body id="user_blog">
<?php $this->load->view('includes/navigation');?>
	

	<div class="container">
		<h1>Your blog</h1>

		<div id="blog-posts" style="">
			
			
			  

    	</div>

	</div>

	<script>

		function loadBlogs(){

			 $.ajax({
		        type  : 'GET',
		        url   : '<?php echo site_url('category_And_blog_controller/your_blogs')?>/' + <?php echo $this->session->userdata('user_id')?>,
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

		                html += '<div class="blog-post col-md-12" style="border: 1px solid black;margin: 10px 10px 20px 10px;padding: 6px 10px;">'+
		                		 '<div class="pull-right">'+data[i].blog_post_date+'</div>' +
		                		 '<h3 class="">' + data[i].blog_name + ' <small>By: '+data[i].blogger_name + '</small></h3>' +
		                		  '<p>Category: ' + data[i].category_name + '</p>' +
		                  		  '<p>' + data[i].blog_description + '</p>' +
		                        '</div>';
		            }
		            $('#blog-posts').html(html);
		        }

		    });
		}

		window.onscroll = function(){
			//loadBlogs();
			//alert(1);
		}
		loadBlogs();
	</script>



<?php $this->load->view('includes/footer');?>