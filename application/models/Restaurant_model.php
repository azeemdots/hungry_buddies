<?php

class Restaurant_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function create($item) {
        $data = array(
            'name' => $item['name'],
            'logo_url' => $item['logo_url'],
            'cover_image_url' => $item['cover_image_url'],
            'description' => $item['description'],
            'phone_number' => $item['phone_number'],
            'website_address' => $item['website_address'],
            'cuisine_type_id' => $item['cuisine_type_id'],
            'server' => $item['server'],
            'price_range' => $item['price_range'],
            'payment_methods' => $item['payment_methods'],
            'country_id' => $item['country_id'],
            'city_id' => $item['city_id'],
            'longitude' => $item['longitude'],
            'latitude' => $item['latitude'],
            'min_order' => $item['min_order'],
            'delivery_charges' => $item['delivery_charges'],
            'user_id' => $item['user_id']
        );

        $this->db->insert('restaurant', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function get_by_id($id) {
        $this->db->select('*');
        $this->db->from('restaurant');
        $this->db->join("hb_countries", "restaurant.country_id = hb_countries.country_id");
        $this->db->where('restaurant.id', $id);
        $query = $this->db->get();
       // echo $this->db->last_query();exit;

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->row();
        }
    }

    function get_limited_by_restaurant_id($id) {
        $this->db->select('restaurant_menu_items.id as item_id,restaurant_menu_items.name as item_name,restaurant.name as restaurant_name,hb_countries.country_name as country_name,restaurant_menu_images.image_url as item_image,restaurant_menu_items.price as item_price,restaurant_menu_items.description as item_desc');
        $this->db->from('restaurant');
        $this->db->join("hb_countries", "restaurant.country_id = hb_countries.country_id", "LEFT");
        $this->db->join("restaurant_menu", "restaurant.id = restaurant_menu.restaurant_id", "LEFT");
        $this->db->join("restaurant_menu_items", "restaurant_menu.id = restaurant_menu_items.menu_id", "LEFT");
        $this->db->join("restaurant_menu_images", "restaurant_menu_items.id = restaurant_menu_images.item_id", "LEFT");
        $this->db->where('restaurant.id', $id);
        $this->db->group_by('restaurant_menu_items.id');
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }
    }

    function get_by_user_id($id) {
        $this->db->select('*');
        $this->db->from('restaurant');
        $this->db->where('user_id', $id);
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }
    }

    function get_all() {
    $this->db->select('*');
    $this->db->from('restaurant');
    $this->db->join("hb_countries", "restaurant.country_id = hb_countries.country_id", "LEFT");
    $this->db->join("restaurant_menu", "restaurant.id = restaurant_menu.restaurant_id", "LEFT");
    $this->db->join("restaurant_menu_items", "restaurant_menu.id = restaurant_menu_items.menu_id", "LEFT");
    $this->db->join("restaurant_menu_images", "restaurant_menu_items.id = restaurant_menu_images.item_id", "LEFT");
    $query = $this->db->get();

    if ($query->num_rows() < 1) {
        return null;
    } else {
        return $query->result();
    }
}

    function get_restaurants() {
        $this->db->select('*');
        $this->db->from('restaurant');
        $this->db->join("hb_countries", "restaurant.country_id = hb_countries.country_id", "LEFT");
        $this->db->order_by('id', 'DESC');
        $this->db->limit('3');
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }
    }

    function get_restaurant($q) {
        $this->db->select('name');
        $this->db->from('restaurant');
        $this->db->like('restaurant.name', $q);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $row_set[] = htmlentities(stripslashes($row['name'])); //build an array
            }
            echo json_encode($row_set); //format the array into json data
        } else {
            $row_set[] = "No records found";
            echo json_encode($row_set);
        }
    }

    function get_place_id($q) {
        $this->db->select('id');
        $this->db->from('restaurant');
        $this->db->where('restaurant.name', $q);
        $query = $this->db->get();
        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->row();
        }

    }

    function update($id, $item) {
        $data = array(
            'name' => $item['name'],
            'logo_url' => $item['logo_url'],
            'cover_image_url' => $item['cover_image_url'],
            'desc' => $item['desc'],
            'phone_number' => $item['phone_number'],
            'website_address' => $item['website_address'],
            'cuisine_type_id' => $item['cuisine_type_id'],
            'server' => $item['server'],
            'price_range' => $item['price_range'],
            'payment_methods' => $item['payment_methods'],
            'country_id' => $item['country_id'],
            'city_id' => $item['city_id'],
            'longitude' => $item['longitude'],
            'latitude' => $item['latitude'],
            'min_order' => $item['min_order'],
            'delivery_charges' => $item['delivery_charges']
        );

        $this->db->where('id', $id);
        $this->db->update('restaurant', $data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('restaurant');
    }


    function get_all_restaurant() {
        $this->db->select('*');
        $this->db->from('restaurant');
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }
    }

    
    
    //--------------------get popular restaurant-----------------------------------------------
    public function get_featured_restaurant_location()
    {
        $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews');
            $this->db->from('restaurant');
            $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
            $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
            $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
            $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
            $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
            $this->db->group_by('restaurant.id');
            $this->db->order_by('restaurant_reviews', 'desc');  
            $this->db->limit(4,0);
            $query = $this->db->get();

            if ($query->num_rows() < 1) {
                return null;
            } else {
                return $query->result();
            }
    }
    
    
    
    
    
    //--------------------get popular restaurant-----------------------------------------------
    public function get_featured_restaurants_location($country,$city)
    {
            $this->db->select('cuisine_type.id AS tag_id,cuisine_type.name AS tag_name,count(restaurant_cuisine_type.cuisine_type_id) as total_tags');
            $this->db->from('cuisine_type');
            $this->db->join("restaurant_cuisine_type", "cuisine_type.id=restaurant_cuisine_type.cuisine_type_id", "LEFT");
            $this->db->group_by('cuisine_type.id');
            $this->db->order_by('total_tags', 'desc');  
            $this->db->limit(20,0);
            $query = $this->db->get();

            if ($query->num_rows() < 1) {
                return null;
            } else {
                return $query->result();
            }
    }
    
    public function get_papular_restaurant_location()
    {
         $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews');
            $this->db->from('restaurant');
            $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
            $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
            $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
            $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
            $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
            $this->db->group_by('restaurant.id');
            $this->db->order_by('restaurant_reviews', 'desc');  
            $this->db->limit(4,0);
            $query = $this->db->get();

            if ($query->num_rows() < 1) {
                return null;
            } else {
                return $query->result();
            }
    }
    
    
    //--------------------get popular restaurant-----------------------------------------------
    public function get_popular_restaurants_location($country=0,$city=0)
    {
        $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews');
        $this->db->from('restaurant');
        $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
        $this->db->group_by('restaurant.id');
        $this->db->order_by('restaurant_reviews', 'desc');  
        $this->db->limit(6,0);
        $query = $this->db->get();
            if ($query->num_rows() < 1) {
                return null;
            } else {
                return $query->result();
            }
    }
    
    public function get_most_use_tags()
    {
            $this->db->select('cuisine_type.id AS tag_id,cuisine_type.name AS tag_name,count(restaurant_cuisine_type.cuisine_type_id) as total_tags');
            $this->db->from('cuisine_type');
            $this->db->join("restaurant_cuisine_type", "cuisine_type.id=restaurant_cuisine_type.cuisine_type_id", "LEFT");
            $this->db->group_by('cuisine_type.id');
            $this->db->order_by('total_tags', 'desc');  
            $this->db->limit(25,0);
            $query = $this->db->get();

            if ($query->num_rows() < 1) {
                return null;
            } else {
                return $query->result();
            }
    }
    
    
    
    public function get_most_user_by_reviews()
    {
        $this->db->select('users.id AS user_id, users.username AS username, users.first_name AS first_name, users.last_name AS last_name, users.user_image_url AS user_image, users.cover_image_url AS cover_image_url ,hb_countries.country_name as country_name,COUNT(restaurant_comments.user_id) AS user_comments');
        $this->db->from('users');
        $this->db->join("restaurant_comments", "users.id=restaurant_comments.user_id", "LEFT");
        $this->db->join("hb_countries", "hb_countries.country_id=users.country", "LEFT");
        $this->db->group_by('users.id');
        $this->db->order_by('user_comments', 'desc');  
        $this->db->limit(4,0);
        $query = $this->db->get();
            if ($query->num_rows() < 1) {
                return null;
            } else {
                return $query->result();
            }
    }
    
    
    public function get_restaurant_reviews($id)
    {
        $this->db->select('restaurant.id AS restaurant_id,restaurant_comments.id AS comments_id,restaurant_comments.date AS coments_date,restaurant_comments.comment AS rec_comments,restaurant_comments.rating AS user_rating,users.first_name AS first_name,users.last_name AS last_name,users.user_image_url AS user_image');
        $this->db->from('restaurant');
        $this->db->join("restaurant_comments", "restaurant.id=restaurant_comments.restaurant_id", "LEFT");
        $this->db->join("users", "users.id=restaurant_comments.user_id", "LEFT");
        $this->db->where('restaurant_id', $id);
        $this->db->order_by('coments_date', 'desc');  
        $query = $this->db->get();
        
            if ($query->num_rows() < 1) {
                return null;
            } else {
                return $query->result();
            }
    }
    
    public function add_user_comment($post){
     $comment = $this->input->post('review_message');
     $rating = $this->input->post('score_value');
     $date= $this->input->post('date');
     $user_id= $this->input->post('user_id');
     $restaurant_id= $this->input->post('restaurant_id');
     
     $data = array(
         'user_id' => $user_id,
         'comment' => $comment,
         'date'    => $date,
         'rating'  => $rating,
         'restaurant_id' => $restaurant_id        
     );
     
     $query= $this->db->insert('restaurant_comments', $data);
     return $query;	
     
    }
    
}
