<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Management_Model extends CI_Model {
      function __construct() {
        parent::__construct();
    }
    


   public function create_new_blogger($data){
        $this->db->insert('tbl_users',$data);
    }


    public function update_blogger_details($user_id,$data){
      $this->db->where('user_id', $user_id);
      $this->db->update('tbl_users', $data);
    }


    public function get_blogger($username,$password){

        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        //$this->db->where('is_active',$active);

        $query = $this->db->get();

        $result_set = $query->result();

        return $result_set;
    }

    public function get_blogger_by_id($id){

        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->where('user_id',$id);
       
        //$this->db->where('is_active',$active);

        $query = $this->db->get();

        $result_set = $query->result();

        return $result_set;
    }


    public function get_all_blogger(){

        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->order_by('user_id','DESC');
       
        //$this->db->where('is_active',$active);

        $query = $this->db->get();

        $result_set = $query->result();

        return $result_set;
    }
}
?>