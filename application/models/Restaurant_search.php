<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Restaurant_search
 *
 * @author Lenovo
 */
class Restaurant_search extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
    
    public function get_restaurant_by_keyword( $keyword ) {
        
        $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews');
            $this->db->from('restaurant');
            $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
            $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
            $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
            $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
            $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
            $this->db->like('restaurant.name', $keyword);
            $this->db->group_by('restaurant.id');
            $this->db->order_by('restaurant_id', 'desc');  
            $this->db->limit(16, 0);
            $query = $this->db->get();

            if ($query->num_rows() < 1) {
                return null;
            } else {
                return $query->result();
            }  
        
    }
    
    public function get_restaurant_by_location( $location ){
       
    $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews');
    $this->db->from('restaurant');
    $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
    $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
    $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
    $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
    $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
    $this->db->where('restaurant.country_id', $location);
    $this->db->group_by('restaurant.id');
    $this->db->order_by('restaurant_id', 'desc'); 
    $this->db->limit(16, 0);
    $query = $this->db->get();
    
//    echo $query; 
//    exit;
    
        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }   //end condition 
       
    }//end function
    
    public function get_restaurant_by_name_location( $keyword , $location ) {
        
    $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews');
    $this->db->from('restaurant');
    $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
    $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
    $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
    $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
    $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
    $this->db->where('restaurant.country_id', $location);
    $this->db->like('restaurant.name', $keyword);
    $this->db->group_by('restaurant.id');
    $this->db->order_by('restaurant_id', 'desc');  
    $this->db->limit(16, 0);
    $query = $this->db->get();
       

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }   //end condition            
    }
 /*   
    public function get_featured_restaurant_location()
    {        
        $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews');
        $this->db->from('restaurant');
        $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
        $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
        $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
        $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
        $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
        $this->db->where('restaurant.country_id', $location);
        $this->db->group_by('restaurant.id');
        $this->db->order_by('restaurant_id', 'desc');  
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }  
        
    }
*/    
    
    public function get_latest_restaurant()
    {
    $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.created_datetime as created_datetime,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews');
    $this->db->from('restaurant');
    $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
    $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
    $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
    $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
    $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
    $this->db->group_by('restaurant.id');
    $this->db->order_by('created_datetime', 'desc');  
    $this->db->limit(16, 0);
    $query = $this->db->get();
       

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }  
    }
    
    public function  get_oldest_restaurant()
    {
     $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.created_datetime as created_datetime,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews');
    $this->db->from('restaurant');
    $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
    $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
    $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
    $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
    $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
    $this->db->group_by('restaurant.id');
    $this->db->order_by('created_datetime', 'asc');  
    $this->db->limit(16, 0);
    $query = $this->db->get();
       

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }  
    }
   
    
    public function  get_maxprice_restaurant()
    {
    $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.created_datetime as created_datetime,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews');
    $this->db->from('restaurant');
    $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
    $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
    $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
    $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
    $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
    $this->db->group_by('restaurant.id');
    $this->db->order_by('restaurant_max_price', 'desc');  
    $this->db->limit(16, 0);
    $query = $this->db->get();
       

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }  
    }
    
    
    public function  get_minprice_restaurant()
    {
    $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.created_datetime as created_datetime,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews');
    $this->db->from('restaurant');
    $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
    $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
    $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
    $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
    $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
    $this->db->group_by('restaurant.id');
    $this->db->order_by('restaurant_min_price', 'desc');  
    $this->db->limit(16, 0);
    $query = $this->db->get();
       

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }  
    }
    
}
