<?php

class Restaurant_search extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
    
    public function get_restaurant_by_keyword($keyword) {
        
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
            $this->db->limit(30, 0);
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
    $this->db->limit(30, 0);
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
    $this->db->limit(30, 0);
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
      $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.created_datetime as created_datetime,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name');
     $this->db->from('restaurant');
     $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
     $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
     $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
     $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
     $this->db->group_by('restaurant.id');
     $this->db->order_by('restaurant.id', 'DESC');  
     $this->db->limit(30, 0);
     $query = $this->db->get();
        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }  
    }
    
    public function  get_oldest_restaurant()
    {
     $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.created_datetime as created_datetime,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name');
     $this->db->from('restaurant');
     $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
     $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
     $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
     $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
     $this->db->group_by('restaurant.id');
     $this->db->order_by('restaurant.id', 'asc');  
     $this->db->limit(30, 0);
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
    $this->db->limit(30, 0);
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
    $this->db->limit(30, 0);
    $query = $this->db->get();
       

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }  
    }
    
    
    public function get_latest_restaurant_by_keyword($keyword) {
        
        $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.created_datetime as created_datetime,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews');
            $this->db->from('restaurant');
            $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
            $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
            $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
            $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
            $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
            $this->db->like('restaurant.name', $keyword);
            $this->db->group_by('restaurant.id');
            $this->db->order_by('restaurant.id', 'DESC');  
            $this->db->limit(30, 0);
            $query = $this->db->get();

            if ($query->num_rows() < 1) {
                return null;
            } else {
                return $query->result();
            }  
        
    }
    
    
    public function get_oldest_restaurant_by_keyword($keyword) {
        
            $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.created_datetime as created_datetime,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews');
            $this->db->from('restaurant');
            $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
            $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
            $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
            $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
            $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
            $this->db->like('restaurant.name', $keyword);
            $this->db->group_by('restaurant.id');
            $this->db->order_by('restaurant.id', 'ASC');  
            $this->db->limit(30, 0);
            $query = $this->db->get();

            if ($query->num_rows() < 1) {
                return null;
            } else {
                return $query->result();
            }  
        
    }
    
    
    
    public function get_latest_restaurant_by_location($location){
    $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews');
    $this->db->from('restaurant');
    $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
    $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
    $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
    $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
    $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
    $this->db->where('restaurant.country_id', $location);
    $this->db->group_by('restaurant.id');
    $this->db->order_by('restaurant.id', 'DESC');  
    $this->db->limit(30, 0);
    $query = $this->db->get();
   
        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }   
       
    }//end function
    
    
    
    public function get_oldest_restaurant_by_location($location){
    $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews');
    $this->db->from('restaurant');
    $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
    $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
    $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
    $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
    $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
    $this->db->where('restaurant.country_id', $location);
    $this->db->group_by('restaurant.id');
     $this->db->order_by('restaurant.id', 'ASC');  
    $this->db->limit(30, 0);
    $query = $this->db->get();
    if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }   
       
    }//end function
    
    public function get_latest_restaurant_by_keylocation( $keyword , $location ) {
        
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
     $this->db->order_by('restaurant.id', 'DESC');  
    $this->db->limit(30, 0);
    $query = $this->db->get();
       

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }   //end condition            
    }
    
    public function get_oldest_restaurant_by_keylocation( $keyword , $location ) {
        
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
     $this->db->order_by('restaurant.id', 'ASC');  
    $this->db->limit(30, 0);
    $query = $this->db->get();
       

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }   //end condition            
    }
    
    
    public function get_open_restaurant()
    {
        $current_day=date("l");        
        $where="restaurant_timing.start_time != '00:00:00' AND restaurant_timing.end_time != '00:00:00' AND restaurant_timing.status=1 AND restaurant_timing.day='$current_day'";
        $this->db->select('*');
        $this->db->from('restaurant');
        $this->db->join("restaurant_timing", "restaurant.id = restaurant_timing.restaurant_id");
        $this->db->where($where);
        $query = $this->db->get();
        if ($query->num_rows() < 1) {
           return null;
        } else {
           return $query->result();
        }
        
    }
    
    
    public function get_open_restaurant_by_keyword($keyword)
    {
         $current_day=date("l");        
        $where="restaurant_timing.start_time != '00:00:00' AND restaurant_timing.end_time != '00:00:00' AND restaurant_timing.status=1 AND restaurant_timing.day='$current_day'";
        $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,restaurant_timing.start_time as start_time ,restaurant_timing.end_time as end_time,restaurant_timing.day as day, COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews');
        $this->db->from('restaurant');
        $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
        $this->db->join("restaurant_timing", "restaurant.id = restaurant_timing.restaurant_id");
        $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
        $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
        $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
        $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
        $this->db->where($where);
        $this->db->like('restaurant.name', $keyword);
        $this->db->group_by('restaurant.id');
        $this->db->order_by('restaurant.id', 'DESC');  
        $this->db->limit(30, 0);
        $query = $this->db->get();
       

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }  
    }
    
    public function get_open_restaurant_by_location($location)
    {
       $current_day=date("l");        
       $where="restaurant.country_id=$location AND restaurant_timing.start_time != '00:00:00' AND restaurant_timing.end_time != '00:00:00' AND restaurant_timing.status=1 AND restaurant_timing.day='$current_day'";
       $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,restaurant_timing.start_time as start_time ,restaurant_timing.end_time as end_time,restaurant_timing.day as day, COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews');
       $this->db->from('restaurant');
       $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
       $this->db->join("restaurant_timing", "restaurant.id = restaurant_timing.restaurant_id");
       $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
       $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
       $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
       $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
       $this->db->where($where);
       $this->db->group_by('restaurant.id');
       $this->db->order_by('restaurant.id', 'Desc');  
       $this->db->limit(30, 0);
       $query = $this->db->get();
       if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }   
    }
    
    public function get_open_restaurant_by_keylocation($keyword , $location)
    {
        $current_day=date("l");        
        $where="restaurant.country_id=$location AND restaurant_timing.start_time != '00:00:00' AND restaurant_timing.end_time != '00:00:00' AND restaurant_timing.status=1 AND restaurant_timing.day='$current_day'";
        $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,restaurant_timing.start_time as start_time ,restaurant_timing.end_time as end_time,restaurant_timing.day as day, COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews');
        $this->db->from('restaurant');
        $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
        $this->db->join("restaurant_timing", "restaurant.id = restaurant_timing.restaurant_id");
        $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
        $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
        $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
        $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
        $this->db->where($where);
        $this->db->like('restaurant.name', $keyword);
        $this->db->group_by('restaurant.id');
        $this->db->order_by('restaurant.id', 'DESC');  
        $this->db->limit(30, 0);
        $query = $this->db->get();
        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }  
    }
    
    
    public function get_discount_restaurant_by_keyword($keyword)
    {
        $where="restaurant.restaurant_discount!='no'";
        
        $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.created_datetime as created_datetime,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews');
            $this->db->from('restaurant');
            $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
            $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
            $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
            $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
            $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
            $this->db->where($where);
            $this->db->like('restaurant.name', $keyword);
            $this->db->group_by('restaurant.id');
            $this->db->order_by('restaurant.id', 'ASC');  
            $this->db->limit(30, 0);
            $query = $this->db->get();

            if ($query->num_rows() < 1) {
                return null;
            } else {
                return $query->result();
            }  
        
    }
    
    
    public function get_discount_restaurant_by_location($location)
    {
        $where="restaurant.country_id=$location AND restaurant.restaurant_discount!='no'";
        $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews');
    $this->db->from('restaurant');
    $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
    $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
    $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
    $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
    $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
    $this->db->where($where);
    $this->db->group_by('restaurant.id');
     $this->db->order_by('restaurant.id', 'ASC');  
    $this->db->limit(30, 0);
    $query = $this->db->get();
    if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }  
        
        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }   //end condition         
        
    }
    
    public function get_discount_restaurant_by_keylocation($keyword,$location)
    {
        $where="restaurant.country_id=$location AND restaurant.restaurant_discount!='no'";
        $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews');
        $this->db->from('restaurant');
        $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
        $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
        $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
        $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
        $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
        $this->db->where($where);
        $this->db->like('restaurant.name', $keyword);
        $this->db->group_by('restaurant.id');
        $this->db->order_by('restaurant.id', 'ASC');  
        $this->db->limit(30, 0);
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }   //end condition         
    }
    
    public function get_near_restaurant_by_keyword($keyword)
    {
        $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name, (3959 * ACOS( COS( RADIANS(37) ) * COS( RADIANS( restaurant_branches.latitude ) ) * COS( RADIANS( restaurant_branches.longitude ) - RADIANS(-122) ) + SIN( RADIANS(37) ) * SIN( RADIANS( restaurant_branches.latitude ) ) ) ) AS distance,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews');
        $this->db->from('restaurant');
        $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
        $this->db->join("restaurant_branches", "restaurant.id=restaurant_branches.restaurant_id", "LEFT");
        $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
        $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
        $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
        $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
        $this->db->like('restaurant.name', $keyword);
        $this->db->group_by('restaurant.id');
        $this->db->having('distance>5');
        $this->db->order_by('distance', 'desc'); 
        $this->db->limit(30, 0);
        $query = $this->db->get();
            if ($query->num_rows() < 1) {
                return null;
            } else {
                return $query->result();
            }  
    }
    
    
    public function get_near_restaurant_by_location($location)
    {
     $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name, (3959 * ACOS( COS( RADIANS(37) ) * COS( RADIANS( restaurant_branches.latitude ) ) * COS( RADIANS( restaurant_branches.longitude ) - RADIANS(-122) ) + SIN( RADIANS(37) ) * SIN( RADIANS( restaurant_branches.latitude ) ) ) ) AS distance,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews');
     $this->db->from('restaurant');
     $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
     $this->db->join("restaurant_branches", "restaurant.id=restaurant_branches.restaurant_id", "LEFT");
     $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
     $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
     $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
     $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
     $this->db->where('restaurant.country_id', $location);
     $this->db->group_by('restaurant.id');
     $this->db->having('distance >5');
     $this->db->order_by('distance', 'desc'); 
     $this->db->limit(30,0);
     $query = $this->db->get();
    
//    echo $query; 
//    exit;
    
        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        } 
    }
    
    public function get_near_restaurant_by_keylocation($keyword,$location)
    {
        $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name, (3959 * ACOS( COS( RADIANS(37) ) * COS( RADIANS( restaurant_branches.latitude ) ) * COS( RADIANS( restaurant_branches.longitude ) - RADIANS(-122) ) + SIN( RADIANS(37) ) * SIN( RADIANS( restaurant_branches.latitude ) ) ) ) AS distance,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews');
    $this->db->from('restaurant');
    $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
    $this->db->join("restaurant_branches", "restaurant.id=restaurant_branches.restaurant_id", "LEFT");
    $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
    $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
    $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
    $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
    $this->db->where('restaurant.country_id', $location);
    $this->db->like('restaurant.name', $keyword);
    $this->db->group_by('restaurant.id');
    $this->db->having('distance >5');
    $this->db->order_by('distance', 'desc'); 
    $this->db->limit(30, 0);
    $query = $this->db->get();
       

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }   //end condition   
    }
    
}
