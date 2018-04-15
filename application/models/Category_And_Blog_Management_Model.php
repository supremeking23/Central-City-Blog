<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_And_Blog_Management_Model extends CI_Model {
      function __construct() {
        parent::__construct();
    }
    

    public function count_blog_by_blogger($user_id){
        $result_set = $this->db->query('SELECT COUNT(*) AS "count_all" FROM blog WHERE blog_post_user =' . $user_id);
        return $result_set->result();
    }


        public function count_blog_by_category($category_id){
        $result_set = $this->db->query('SELECT COUNT(*) AS "count_all" FROM blog WHERE category_id =' . $category_id);
        return $result_set->result();
    }


    public function get_all_category(){

        $this->db->select('*');
        $this->db->from('category');
        $this->db->order_by('category_id','DESC');
       
        //$this->db->where('is_active',$active);

        $query = $this->db->get();

        $result_set = $query->result();

        return $result_set;
    }


    public function get_all_category_and_blog_count(){

        /*$this->db->select('a.category_name,COUNT(b.blog_id) AS counts,b.blog_name');
        $this->db->from('category a');
        $this->db->join('blog b','a.category_id = b. category_id','left');
        $this->db->order_by('a.category_id','DESC');
       */
        //$this->db->where('is_active',$active);
        $sql = "SELECT a.category_id, a.category_name, b.blog_name  FROM category a left join blog b on a.category_id = b.category_id";
        $result_set = $this->db->query($sql);

        return $result_set->result();
    }




    public function create_new_category($data){
        $this->db->insert('category',$data);
    }



    public function get_all_blogs(){
        $this->db->select('a.category_name,b.blog_name,b.blog_post_date,b.blog_description,c.blogger_name');
        $this->db->from('category a');
        $this->db->join('blog b','a.category_id = b. category_id');
        $this->db->join('tbl_users c','b.blog_post_user = c. user_id');
        $this->db->order_by('a.category_id','DESC');
        
        $query = $this->db->get();

        $result_set = $query->result();

        return $result_set;
    }




    public function bloggers_blog($user_id){
 
        $this->db->select('a.category_name,b.blog_name,b.blog_post_date,b.blog_description,c.blogger_name');
        $this->db->from('category a');
        $this->db->join('blog b','a.category_id = b. category_id');
        $this->db->join('tbl_users c','b.blog_post_user = c. user_id');
        $this->db->where('user_id', $user_id);
        $this->db->order_by('a.category_id','DESC');

        $query = $this->db->get();

        $result_set = $query->result();

        return $result_set;
    
    }


    public function create_new_blog($data){
        $this->db->insert('blog',$data);
    }
 
}
?>