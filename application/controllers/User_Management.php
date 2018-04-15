<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Management extends CI_Controller {

	function __construct() {

        parent::__construct();
       
        date_default_timezone_set('Asia/Taipei');

         $this->load->helper(array('form', 'url'));

        //for reading.. retrieving
        $this->load->model('user_management_model');

     

        //library
        $this->load->library('form_validation');
    }

	public function register_action(){
        
        $errorMSG = "";

        //,position:position,company:company, address:address,username:username,password:password
        if(empty($this->input->post("blogger_name"))){
            $errorMSG .= "<li>Blogger Name is required</li>";
        }else{
            $blogger_name = $this->input->post("blogger_name");
        }


         if(empty($this->input->post("position"))){
            $errorMSG .= "<li>Position is required</li>";
        }else{
            $position = $this->input->post("position");
        }


         if(empty($this->input->post("company"))){
            $errorMSG .= "<li>Company is required</li>";
        }else{
            $company = $this->input->post("company");
        }


         if(empty($this->input->post("address"))){
            $errorMSG .= "<li>Address is required</li>";
        }else{
            $address = $this->input->post("address");
        }


         if(empty($this->input->post("username"))){
            $errorMSG .= "<li>Username is required</li>";
        }else{
            $username = $this->input->post("username");
        }


         if(empty($this->input->post("password"))){
            $errorMSG .= "<li>Password is required</li>";
        }else{
            $password = $this->input->post("password");
        }


        if(empty($errorMSG)){
            //save to database

            $msg = "Blogger Name: " . $blogger_name . ", Position: " . $position . ", Company: " . $company . ", Address: " . $address . ", Username: " . $username . ",Password: " . $password;
            //$msg = "Blogger Name: " . $blogger_name;

            $data = array(
                'blogger_name' => $blogger_name,
                'position' => $position,
                'company' => $company,
                'address' => $address,
                'username' => $username,
                'password' => $password,
            );

            $this->user_management_model->create_new_blogger($data);

            echo json_encode(['code'=>200, 'msg'=>$msg]);
            exit;


        }else{


            // view error
            echo json_encode(['code' => 404, 'msg' =>$errorMSG]);
        }


      /*  if($errorMSG){
            //save to database

            // view error
            echo json_encode(['code' => 404, 'msg' =>$errorMSG]);
            
        }else{

            $msg = "Blogger Name: " . $blogger_name . ", Position: " . $position . ", Company: " . $company . ", Address: " . $address . ", Username: " . $username . ",Password: " . $password;
            //$msg = "Blogger Name: " . $blogger_name;
            echo json_encode(['code'=>200, 'msg'=>$msg]);

            //exit;

        }*/


      


    }



    public function edit_user_action(){


        $errorMSG = "";

        //,position:position,company:company, address:address,username:username,password:password
        if(empty($this->input->post("blogger_name"))){
            $errorMSG .= "<li>Blogger Name is required</li>";
        }else{
            $blogger_name = $this->input->post("blogger_name");
        }


         if(empty($this->input->post("position"))){
            $errorMSG .= "<li>Position is required</li>";
        }else{
            $position = $this->input->post("position");
        }


         if(empty($this->input->post("company"))){
            $errorMSG .= "<li>Company is required</li>";
        }else{
            $company = $this->input->post("company");
        }


         if(empty($this->input->post("address"))){
            $errorMSG .= "<li>Address is required</li>";
        }else{
            $address = $this->input->post("address");
        }


         if(empty($this->input->post("username"))){
            $errorMSG .= "<li>Username is required</li>";
        }else{
            $username = $this->input->post("username");
        }


         if(empty($this->input->post("password"))){
            $errorMSG .= "<li>Password is required</li>";
        }else{
            $password = $this->input->post("password");
        }

        $user_id = $this->input->post("user_id");

        if(empty($errorMSG)){
            //save to database

            $msg = "Blogger Name: " . $blogger_name . ", Position: " . $position . ", Company: " . $company . ", Address: " . $address . ", Username: " . $username . ",Password: " . $password;
            //$msg = "Blogger Name: " . $blogger_name;

            $data = array(
                'blogger_name' => $blogger_name,
                'position' => $position,
                'company' => $company,
                'address' => $address,
                'username' => $username,
                'password' => $password,
            );

            $this->user_management_model->update_blogger_details($user_id,$data);

            echo json_encode(['code'=>200, 'msg'=>$msg]);
            exit;


        }else{


            // view error
            echo json_encode(['code' => 404, 'msg' =>$errorMSG]);

           // echo $this->input->post("password");
        }

        $data['all_bloggers'] = $this->user_management_model->get_all_blogger();

        

    }


    public function get_blogger_by_id_ajax_action(){

        $user_id = $this->session->userdata('user_id');

        $blogger_data = $this->user_management_model->get_blogger_by_id($user_id);

       /* $b_data = array();
 
        foreach($blogger_data as $blogger_d){
            $datas = array();

            $datas['user_id'] = $blogger_d->user_id;
            $datas['blogger_name'] = $blogger_d->blogger_name;
            $datas['position'] = $blogger_d->position;
            $datas['company'] = $blogger_d->company;
            $datas['address'] = $blogger_d->address;
            $datas['username'] = $blogger_d->username;
            $datas['password'] = $blogger_d->password;

            //merget the vent array into the return array
            array_push($b_data, $datas);
        }

        echo json_encode($b_data);
        */

        foreach($blogger_data as $b_data){

            $user_id = $b_data->user_id;
            $blogger_name = $b_data->blogger_name;
            $position= $b_data->position;
            $company = $b_data->company;
            $address = $b_data->address;
            $username = $b_data->username;
            $password = $b_data->password;


        }
       

        //['user_id' => $user_id, 'blogger_name' =>$blogger_name]
       

        echo json_encode(
            [
                'user_id' => $user_id,
                'blogger_name' =>$blogger_name,
                'position' => $position,
                'company' => $company,
                'address' =>$address,
                'username' => $username,
                'password' => $password
            ]
        );
    }



    public function get_all_blogger_ajax_action(){

    }



    public function login_action(){

        $errorMSG = "";


        if(empty($this->input->post("username"))){
            $errorMSG .= "<li>Username is required</li>";
        }else{
            $username = $this->input->post("username");
        }


         if(empty($this->input->post("password"))){
            $errorMSG .= "<li>Password is required</li>";
        }else{
            $password = $this->input->post("password");
        }


        if(empty($errorMSG)){
           

           $msg = "";

           //check if the credential has a match in the database

           $login_blogger = $this->user_management_model->get_blogger($username,$password);

           if($login_blogger){

            foreach($login_blogger as $blogger_detail){
               
               $user_id =  $blogger_detail->user_id;
               $blogger_name =  $blogger_detail->blogger_name;
            }

            $msg = "Welcome " . $blogger_name;
            //has match
             echo json_encode(['code'=>"has_match", 'msg'=>$msg]);

             //set session

             $user_data =array(
                'user_id' =>$user_id,
                'blogger_name' => $blogger_name,
                'is_loggedin' => TRUE,

             );

             $this->session->set_userdata($user_data);

             //echo json_encode($data);
           }else{

            $msg = "Username or Password doesnt match";
            echo json_encode(['code'=>"has_no_match", 'msg'=>$msg]);

           }

        }else{


            // view error
            echo json_encode(['code' => "required_error_message", 'msg' =>$errorMSG]);
        }


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
