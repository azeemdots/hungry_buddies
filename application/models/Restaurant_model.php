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
    public function get_featured_restaurant_location($country,$city)
    {
        
    }
    
    
    //--------------------get popular restaurant-----------------------------------------------
    public function get_popular_restaurant_location($country,$city)
    {
        
    }
    
    
    
    
    
}
