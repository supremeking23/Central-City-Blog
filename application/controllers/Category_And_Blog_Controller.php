<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_And_Blog_Controller extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('user_management_model');
        $this->load->model('category_and_blog_management_model');
        //$this->load->library('form');
        //$this->load->helper('form');
    }



    public function add_category_action(){

        $errorMSG = "";

        //,position:position,company:company, address:address,username:username,password:password
        if(empty($this->input->post("category"))){
            $errorMSG .= "<li>Category Name is required</li>";
        }else{
            $category_name = $this->input->post("category");
        }


        if(empty($errorMSG)){
            //save to database

            $msg = "11";
            //$msg = "Blogger Name: " . $blogger_name;

            $data = array(
                'category_name' => $category_name,
                
            );

            $this->category_and_blog_management_model->create_new_category($data);

            echo json_encode(['code'=>200, 'msg'=>$msg]);
            exit;


        }else{


            // view error
            echo json_encode(['code' => 404, 'msg' =>$errorMSG]);
        }


    }


    public function add_blog_action(){

        $errorMSG = "";

        //,position:position,company:company, address:address,username:username,password:password
        if(empty($this->input->post("category"))){
            $errorMSG .= "<li>Category  is required</li>";
        }else{
            $category = $this->input->post("category");
        }


        if(empty($this->input->post("blog"))){
            $errorMSG .= "<li>Blog Name is required</li>";
        }else{
            $blog = $this->input->post("blog");
        }

        if(empty($this->input->post("description"))){
            $errorMSG .= "<li>Description is required</li>";
        }else{
            $description = $this->input->post("description");
        }


            $blogger_id = $this->input->post("blogger_id");
        



        $now = date('Y-m-d H:i:s');

        if(empty($errorMSG)){
            //save to database

            $msg = "11";
            //$msg = "Blogger Name: " . $blogger_name;
            
            $data = array(
                'category_id' => $category,
                'blog_name' => $blog,
                'blog_description' => $description,
                'blog_post_date' => $now,
                'blog_post_user' => $blogger_id,

                
            );

            $this->category_and_blog_management_model->create_new_blog($data);

            echo json_encode(['code'=>200, 'msg'=>$msg]);
            exit;


        }else{


            // view error
            echo json_encode(['code' => 404, 'msg' =>$errorMSG]);
        }
    }

    public function categories() {

        $data = $this->category_and_blog_management_model->get_all_category(); 

        echo json_encode($data);
    }



    public function blogs(){
        $data = $this->category_and_blog_management_model->get_all_blogs(); 

        echo json_encode($data);
    }



    public function your_blogs(){
            $user_id = $this->uri->segment(3);

            $data = $this->category_and_blog_management_model->bloggers_blog($user_id);

            echo json_encode($data);
    }





}
