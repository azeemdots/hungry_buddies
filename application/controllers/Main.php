<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class main extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('restaurant_model');
        $this->load->model('cuisine_type_model');
        $this->load->model('user_preference_model');
        $this->load->model('user_selected_tags_model');
        $this->load->model('restaurant_search');
        $this->load->model('hb_countries_model');
    }

    public function index() {        
        $data['folder_name'] = 'main';
        $data['file_name'] = 'index';
        $data['header_name'] = 'header';
        $data['nav_name'] = 'nav_main';
        $data['restaurant'] = $this->restaurant_model->get_featured_restaurant_location();
        $data['cusine_type'] = $this->restaurant_model->get_most_use_tags();
        $data['popular_restaurant'] = $this->restaurant_model->get_papular_restaurant_location();
        $data['popular_restaurants'] = $this->restaurant_model->get_popular_restaurants_location();
        $data['restaurants_places'] = $this->restaurant_model->get_restaurants();
        $data['user_reviews']= $this->restaurant_model->get_most_user_by_reviews();
        $data['all_countries'] = $this->hb_countries_model->get_all();
        //$data['categories'] = $this->cuisine_type_model->get_all();
        $this->load->view('index', $data);
    }

    public function register() {
        $data['folder_name'] = 'main';
        $data['header_name'] = 'header';
        $data['nav_name'] = 'nav_main';
        $data['file_name'] = 'register';       
        if ($this->input->post('register_user')) {
            $this->load->model('ion_auth_model');
            $data = $_POST;
            $data['user_type_id'] = '2';
            $email = strtolower($this->input->post('email'));
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            if ($this->ion_auth->email_check(strtolower($this->input->post('email')))) {
                $this->session->set_flashdata('error', "Email already exists");
                redirect('main/register');
            }
            if ($this->ion_auth->username_check(strtolower($this->input->post('username')))) {
                $this->session->set_flashdata('error', "Username already exists");
                redirect('main/register');
            }
            $upload_path = 'uploads/userimages/';
            if (!is_dir($upload_path)) {
                mkdir($upload_path, 0777, TRUE);
            }
            if (!empty($_FILES['user_image']['name']) && $_FILES['user_image']['error'] == 0) {
                $type = explode(".", $_FILES['user_image']['name']);
                $_FILES['user_image']['name'] = $this->random_string() . "." . $type[1];
                move_uploaded_file($_FILES['user_image']['tmp_name'], $upload_path . $_FILES['user_image']['name']);
                $data['user_image_url'] = base_url() . $upload_path . $_FILES['user_image']['name'];
            }
            $upload_path2 = 'uploads/coverimages/';
            if (!is_dir($upload_path2)) {
                mkdir($upload_path2, 0777, TRUE);
            }
            if (!empty($_FILES['cover_image']['name']) && $_FILES['cover_image']['error'] == 0) {
                $type = explode(".", $_FILES['cover_image']['name']);
                $_FILES['cover_image']['name'] = $this->random_string() . "." . $type[1];
                move_uploaded_file($_FILES['cover_image']['tmp_name'], $upload_path2 . $_FILES['cover_image']['name']);
                $data['cover_image_url'] = base_url() . $upload_path2 . $_FILES['cover_image']['name'];


            }
            $data['is_block'] = '0';
            $data['date_created'] = date('y-m-d h:i:s');
            $register_id = $this->ion_auth->register($username, $password, $email, $data, array('2'));
            $tags = $this->input->post('tags');
            $exp_tags = explode(',', $tags);
            foreach ($exp_tags as $row) {
                $this->user_selected_tags_model->create($register_id, $row);
            }
            $this->user_preference_model->create($register_id);
            $errors_array = $this->ion_auth->errors_array();
            $messages_array = $this->ion_auth->messages_array();
            if (!empty($errors_array[0])) {
                $this->session->set_flashdata('error', $errors_array[0]);
            } elseif (!empty($messages_array[0])) {
                $this->session->set_flashdata('message', "Signed Up successfully please verify your account through link sent to your email address");
            }
            redirect('login');
        }
        $this->load->view('index', $data);
    }

    public function requests() {
        $data['folder_name'] = 'main';
        $data['file_name'] = 'requests';
        $data['header_name'] = 'header_user';
        $data['nav_name'] = 'nav_main';
        $this->load->model('user_friend_request_model');
        $id = $this->session->userdata('user_id');
        $data['session_id'] = $this->session->userdata('user_id');
        $data['user_data'] = $this->ion_auth->user()->row();
        $data['requests_user'] = $this->user_friend_request_model->get_friend_request($id);
        $this->load->view('index', $data);
    }

    public function users() {
        $data['folder_name'] = 'main';
        $data['file_name'] = 'users';
        $data['header_name'] = 'header_user';
        $data['nav_name'] = 'nav_main';
        $this->load->model('user_friend_list_model');
        $this->load->model('user_friend_request_model');
        $user_id = $this->session->userdata('user_id');
        $data['session_id'] = $this->session->userdata('user_id');
        $friends_request_data = $this->user_friend_request_model->get_by_logged_id($user_id);
        if (!empty($friends_request_data)) {
            foreach ($friends_request_data as $row) {
                $request_list[] = $row->friend_request_id;
            }
            $data['request_list'] = $request_list;
        } else {
            $data['request_list'] = '';
        }
        $friends_data = $this->user_friend_list_model->get_by_logged_id($user_id);
        if (!empty($friends_data)) {
            foreach ($friends_data as $row) {
                $follow_list[] = $row->friend_user_id;
            }
            $data['follow_list'] = $follow_list;
        } else {
            $data['follow_list'] = '';
        }
        $data['users_data'] = $this->ion_auth->users()->result();
        $data['user_data'] = $this->ion_auth->user()->row();

        $this->load->view('index', $data);
    }

    public function user_detail() {
        $data['folder_name'] = 'main';
        $data['header_name'] = 'header_user';
        $data['nav_name'] = 'nav_main';
        $this->load->model('user_preference_model');
        $this->load->model('user_friend_request_model');
        $this->load->model('user_friend_list_model');
        $user_id = $this->uri->segment(3);
        $id = $this->session->userdata('user_id');
        $user_profile_setting = $this->user_preference_model->get_profile_setting($user_id);
        $friends_request_data = $this->user_friend_request_model->get_friend_list($user_id, $id);
        if (!empty($friends_request_data)) {
            $data['request_list'] = 'yes';
        } else {
            $data['request_list'] = '';
        }
        $friends_data = $this->user_friend_list_model->get_friend_list($user_id, $id);
        if (!empty($friends_data)) {
            $data['follow_list'] = 'yes';
        } else {
            $data['follow_list'] = '';
        }
        $data['get_following'] = $this->user_friend_list_model->get_followings($user_id);
        $data['get_follower'] = $this->user_friend_list_model->get_follower($user_id);
        $data['profile_setting'] = $user_profile_setting->profile_setting;
        $data['user_data'] = $this->ion_auth->user($id)->row();
        $data['user_data_detail'] = $this->ion_auth->user($user_id)->row();
        $data['file_name'] = 'user_detail_public';
        $this->load->view('index', $data);
    }

    public function accept_request() {
        $this->load->model('user_friend_list_model');
        $this->load->model('user_friend_request_model');
        $user_id = $this->session->userdata('user_id');
        $requested_friend_id = $this->input->post('friend_id');
        $this->user_friend_request_model->accept_request($requested_friend_id, $user_id);
        $this->user_friend_list_model->create($user_id, $requested_friend_id);
    }

    public function cancel_request() {
        $this->load->model('user_friend_request_model');
        $user_id = $this->session->userdata('user_id');
        $requested_friend_id = $this->input->post('friend_id');
        $this->user_friend_request_model->cancel_request($requested_friend_id, $user_id);
    }

    public function follow() {
        $this->load->model('user_friend_list_model');
        $this->load->model('user_friend_request_model');
        $this->load->model('user_preference_model');
        $user_id = $this->session->userdata('user_id');
        $requested_friend_id = $this->input->post('friend_id');
        $statement = $this->user_preference_model->get_profile_setting($requested_friend_id);
        if ($statement->profile_setting === 'Public') {
            $friend_id = $this->user_friend_list_model->create($requested_friend_id, $user_id);
            if (!empty($friend_id)) {
                $data = $this->user_friend_list_model->get_follower($requested_friend_id, $user_id);
                header('Content-Type: application/json');
                echo json_encode($data);
            }
        } elseif ($statement->profile_setting === 'Private') {
            $requested_id = $this->user_friend_request_model->create($requested_friend_id, $user_id);
            if (!empty($requested_id)) {
                header('Content-Type: application/json');
                echo json_encode('');
            }
        }
    }

    public function about_us() {
        $data['folder_name'] = 'main';
        $data['file_name'] = 'about_us';
        if ($this->ion_auth->logged_in()) {
            $data['header_name'] = 'header_user';
        } else {
            $data['header_name'] = 'header';
        }
        $data['nav_name'] = 'nav_main';
        $data['user_data'] = $this->ion_auth->user()->row();
        $this->load->view('index', $data);
    }
    
    
    public function congralution() {
        $data['folder_name'] = 'main';
        $data['file_name'] = 'cogralate_us';
        if ($this->ion_auth->logged_in()) {
            $data['header_name'] = 'header_user';
        } else {
            $data['header_name'] = 'header';
        }
        $data['nav_name'] = 'nav_main';
        $data['user_data'] = $this->ion_auth->user()->row();
        $this->load->view('index', $data);
    }
    

    public function blog_detail() {
        $data['folder_name'] = 'main';
        $data['file_name'] = 'blog_detail';
        $this->load->view('index', $data);
    }

    public function blog_listing() {
        $data['folder_name'] = 'main';
        $data['file_name'] = 'blog_listing';
        $this->load->view('index', $data);
    }

    public function company_detail() {
        $data['folder_name'] = 'main';
        $data['file_name'] = 'company_detail';
        $this->load->view('index', $data);
    }

    public function contact() {
        $data['folder_name'] = 'main';
        $data['file_name'] = 'contact';
        if ($this->ion_auth->logged_in()) {
            $data['header_name'] = 'header_user';
        } else {
            $data['header_name'] = 'header';
        }
        $data['nav_name'] = 'nav_main';
        $data['user_data'] = $this->ion_auth->user()->row();
        $this->load->view('index', $data);
    }

    public function index_directory() {
        $data['folder_name'] = 'main';
        $data['file_name'] = 'index_directory';
        $this->load->view('index', $data);
    }

    public function random_string($length = 5) {
        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));

        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }

        return $key;
    }

    public function user_friend_list(){
        $data['folder_name'] = 'main';
        $data['file_name'] = 'my_buddies';
        $data['header_name'] = 'header_user';
        $data['nav_name'] = 'nav_main';
        $this->load->model('user_friend_list_model');
        $user_id = $this->session->userdata('user_id');

        $data['session_id'] = $this->session->userdata('user_id');

        $friends_data = $this->user_friend_list_model->get_by_logged_id($user_id);


        if (!empty($friends_data)) {
            foreach ($friends_data as $row) {
                $follow_list[] = $row->friend_user_id;
            }
            $data['follow_list'] = $follow_list;
        } else {
            $data['follow_list'] = '';
        }

        $data['users_data'] = $this->ion_auth->users()->result();
        $data['user_data'] = $this->ion_auth->user()->row();

        $this->load->view('index', $data);
    }


    public function unfollow_user_friend(){

        $user_id = $this->session->userdata('user_id');

        if($this->input->post('friend_id')) {
            $friend_id = $this->input->post('friend_id');
            $this->load->model('user_friend_list_model');
            $this->user_friend_list_model->delete_user_friend($user_id, $friend_id);
            $this->load->model('user_friend_list_model');
            $data['session_id'] = $this->session->userdata('user_id');
            $friends_data = $this->user_friend_list_model->get_by_logged_id($user_id);

            if (!empty($friends_data)) {
                foreach ($friends_data as $row) {
                    $follow_list[] = $row->friend_user_id;
                }
                $data['follow_list'] = $follow_list;
            } else {
                $data['follow_list'] = '';
            }
            $data['users_data'] = $this->ion_auth->users()->result();
            //$data['user_data'] = $this->ion_auth->user()->row();
            $this->session->set_flashdata('success', "Unfollow Successfully ");
            $view = $this->load->view('main/my_buddies_unfollow', $data,true);
            print_r($view);
        }


    }
    
    
    
    public function welcome_user()
    {
        $data['folder_name'] = 'main';
        $data['file_name'] = 'register_success';
        $data['header_name'] = 'header';
        $data['nav_name'] = 'nav_main';
        $this->load->view('index', $data);
    }

    public function search_result() {
        
            $data['keyword']= $this->input->post('keyword_search');
            $data['location']= $this->input->post('search_location');
            $data['folder_name'] = 'main';
            $data['file_name'] = 'search_restaurant';
            $data['header_name'] = 'header_inner';
            $data['nav_name'] = 'nav_main';  
            
            if(isset($data['keyword'])) {
            $data['restaurant_keyword']= $this->restaurant_search->get_restaurant_by_keyword($data['keyword']);
            $data['latest_restaurant']= $this->restaurant_search->get_latest_restaurant_by_keyword($data['keyword']);
            $data['old_restaurant']= $this->restaurant_search->get_oldest_restaurant_by_keyword($data['keyword']);
            $data['open_restaurant']= $this->restaurant_search->get_open_restaurant_by_keyword($data['keyword']);
            $data['discount_restaurant']= $this->restaurant_search->get_discount_restaurant_by_keyword($data['keyword']);
            $data['near_restaurant']= $this->restaurant_search->get_near_restaurant_by_keyword($data['keyword']);
            }
            
            if($data['location']){
            $data['restaurant_keyword']= $this->restaurant_search->get_restaurant_by_location($data['location']);
            $data['latest_restaurant']= $this->restaurant_search->get_latest_restaurant_by_location($data['location']);
            $data['old_restaurant']= $this->restaurant_search->get_oldest_restaurant_by_location($data['location']);
            $data['open_restaurant']= $this->restaurant_search->get_open_restaurant_by_location($data['location']);
            $data['discount_restaurant']= $this->restaurant_search->get_discount_restaurant_by_location($data['location']);
            $data['near_restaurant']= $this->restaurant_search->get_near_restaurant_by_location($data['location']);
            }
            if (isset($data['keyword']) AND isset($data['location'])){
            $data['restaurant_keyword']= $this->restaurant_search->get_restaurant_by_name_location( $data['keyword'], $data['location'] );
            $data['latest_restaurant']= $this->restaurant_search->get_latest_restaurant_by_keylocation($data['keyword'], $data['location']);
            $data['old_restaurant']= $this->restaurant_search->get_oldest_restaurant_by_keylocation($data['keyword'], $data['location']);
            $data['open_restaurant']= $this->restaurant_search->get_open_restaurant_by_keylocation($data['keyword'], $data['location']);
            $data['discount_restaurant']= $this->restaurant_search->get_discount_restaurant_by_keylocation($data['keyword'], $data['location']);
            $data['near_restaurant']= $this->restaurant_search->get_near_restaurant_by_keylocation($data['keyword'], $data['location']);
            }
            
            $this->load->view('index', $data); 
                                       
    }
    
    
    


    public function restaurants_sort()
    {
        $keyword= $this->input->post('restaurant_sort');
            
        if($keyword==1)
        {
           $data['restaurant_search']= $this->restaurant_search->get_latest_restaurant();
        }
        else if($keyword==2)
        {
           
            $data['restaurant_search']= $this->restaurant_search->get_oldest_restaurant();
        }
      else if($keyword==3)
        {
        
            $data['restaurant_search']= $this->restaurant_search->get_maxprice_restaurant();
        }
       else if($keyword==4)
        {
           $data['restaurant_search']= $this->restaurant_search->get_minprice_restaurant();
        } 
        
            $data['folder_name'] = 'main';
            $data['file_name'] = 'search_restaurant';
            $data['header_name'] = 'header_inner';
            $data['nav_name'] = 'nav_main'; 
            $this->load->view('index', $data); 
    }

    

     public function restaurant_sort()
    { 
       $this->load->model('restaurant_search');
       $data['restaurant_keyword']= $this->restaurant_search->get_latest_restaurant();
       $data['folder_name'] = 'main';
       $data['file_name'] = 'search_restaurant';
       $data['header_name'] = 'header_inner';
       $data['nav_name'] = 'nav_main'; 
       $view=$this->load->view('index', $data,True); 
      
      
    }
}
