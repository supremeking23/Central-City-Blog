<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('user_management_model');
        $this->load->model('category_and_blog_management_model');
        //$this->load->library('form');
        //$this->load->helper('form');
    }

	public function index(){
		//echo "workings";

       // $data = "";
        if(!$this->session->userdata('is_loggedin')){
            $data = "";
        }else{

            $user_id = $this->session->userdata('user_id');
            $data['blogger_detail'] = $this->user_management_model->get_blogger_by_id($user_id);

            /*foreach ($blogger_detail as $blogger_detail) {
                    $blogger_detail->username;
                    $blogger_detail->blogger_name;
            }*/
        }

       

		$this->load->view('home_folder/home',$data);
	}


    public function blogs(){



        

        if(!$this->session->userdata('is_loggedin')){
            $data = "";
        }else{

            $user_id = $this->session->userdata('user_id');
            $data['blogger_detail'] = $this->user_management_model->get_blogger_by_id($user_id);

            /*foreach ($blogger_detail as $blogger_detail) {
                    $blogger_detail->username;
                    $blogger_detail->blogger_name;
            }*/
        }
        //echo "workings";
        $this->load->view('home_folder/blogs',$data);
    }

    public function categories(){
        //echo "workings";

            $data['all_category'] = $this->category_and_blog_management_model->get_all_category(); 


           if(!$this->session->userdata('is_loggedin')){
           
            }else{

            $user_id = $this->session->userdata('user_id');
            $data['blogger_detail'] = $this->user_management_model->get_blogger_by_id($user_id);

            /*foreach ($blogger_detail as $blogger_detail) {
                    $blogger_detail->username;
                    $blogger_detail->blogger_name;
            }*/
            }
            $this->load->view('home_folder/categories',$data);
    }


    public function users(){
        //echo "workings";

        $data['all_bloggers'] = $this->user_management_model->get_all_blogger(); 
        
        if(!$this->session->userdata('is_loggedin')){
                //redirect('main/login');
            //$data['all_bloggers'] = $this->user_management_model->get_all_blogger(); 
        }else{

            $user_id = $this->session->userdata('user_id');
            $data['blogger_detail'] = $this->user_management_model->get_blogger_by_id($user_id);

            /*foreach ($blogger_detail as $blogger_detail) {
                    $blogger_detail->username;
                    $blogger_detail->blogger_name;
            }*/
        }
        $this->load->view('home_folder/users',$data);
    }


    public function register(){
        //echo "workings";
        $this->load->view('home_folder/register');
    }

    public function login(){
        //echo "workings";
        $this->load->view('home_folder/login');
    }


    public function logout(){

         session_destroy();
         redirect('main/index');
    }



    public function edit_user_detail(){

        if(!$this->session->userdata('is_loggedin')){
                //redirect('main/login');
            $data = "";
        }else{

            $user_id = $this->session->userdata('user_id');
            $data['blogger_detail'] = $this->user_management_model->get_blogger_by_id($user_id);

            /*foreach ($blogger_detail as $blogger_detail) {
                    $blogger_detail->username;
                    $blogger_detail->blogger_name;
            }*/
        }
        

        $this->load->view('home_folder/edit_user_details',$data);
    
    }




    public function your_blog(){

        if(!$this->session->userdata('is_loggedin')){
                //redirect('main/login');
            $data = "";
        }else{

            $user_id = $this->session->userdata('user_id');
            $data['blogger_detail'] = $this->user_management_model->get_blogger_by_id($user_id);

            /*foreach ($blogger_detail as $blogger_detail) {
                    $blogger_detail->username;
                    $blogger_detail->blogger_name;
            }*/
        }
        

        $this->load->view('home_folder/your_blog',$data);
    
    }









	 // Set array for PAGINATION LIBRARY, and show view data according to page.
   /* public function contact_info(){
        $config = array();
        $config["base_url"] = base_url() . "index.php/pagination/contact_info";
        $total_row = $this->pagination_model->record_count();
        $config["total_rows"] = $total_row;
        $config["per_page"] = 1;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = $total_row;
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';
        
        $this->pagination->initialize($config);
        if($this->uri->segment(3)){
        $page = ($this->uri->segment(3)) ;
          }
        else{
               $page = 1;
        }
        $data["results"] = $this->pagination_model->fetch_data($config["per_page"], $page);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links );
        
        // View data according to array.
        $this->load->view("pagination_view", $data);
        }
   */
}
