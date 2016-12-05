<!--Sub Header-->
            <section class="sub-header">
                <div class="search-bar horizontal collapse" id="redefine-search-form"></div>
                <!-- /.search-bar -->
                <div class="breadcrumb-wrapper">
                    <div class="container">
                        
                        <ol class="breadcrumb">
                            <li><a href="index-directory.html"><i class="fa fa-home"></i></a></li>
                            <li><a href="#">Page</a></li>
                            <li class="active">Detail</li>
                        </ol>
                        <!-- /.breadcrumb-->
                    </div>
                    <!-- /.container-->
                </div>
                <!-- /.breadcrumb-wrapper-->
            </section>
            <!--end Sub Header-->
            
            <div id="page-content">
                <section class="container">
                    <div class="">
                        <!--Content-->
                        <div class="">
                            <header>
                                <h1 class="page-title">Search Results</h1>
                            </header>
                            <figure class="filter clearfix">
                                <div class="buttons pull-left">
                                    <a href="#" class="btn icon active" onclick="return girdsection()"><i class="fa fa-th"></i>Grid</a>
                                    <a href="#" class="btn icon" onclick="return listsection()"><i class="fa fa-th-list"></i>List</a>
                                </div>
                                <div class="pull-right">
                                    <aside class="sorting">
                                        <span>Sorting</span>
                                        <div class="form-group">
                                            <select class="framed" id="restaurant_sort" name="sort" onchange="return loadRestaurant()">
                                                <option value="0">Select Sorting Option</option>
                                                <option value="1">Date - Newest First</option>
                                                <option value="2">Date - Oldest First</option>
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </aside>
                                </div>
                            </figure>

                            <!--Listing Grid-->
                            <section class="block equal-height">
                                <div class="row">
                                    
                                    <?php 
                                    if(!empty($restaurant_keyword))
                                    {
                                      foreach($restaurant_keyword as $row)  
                                      {
                                        
                                 ?>
                            <?php
                            $imagename = "";
                            $url = @getimagesize($row->logo_url);
                            if (@!is_array($url)) {
                                $imagesname = "http://www.bitesup.com/masterbites/uploads/restaurantimages/2ibkt.jpg"; // The image doesn't exist
                            } else {
                                $imagesname = $row->logo_url;
                            }
                            ?>
                                    <div class="col-md-3 col-sm-4">
                                        <div class="item">
                                            <div class="image">
                                                <div class="quick-view"><i class="fa fa-eye"></i><span>Quick View</span></div>
                                                <a href="item-detail.html">
                                                    <div class="overlay">
                                                        <div class="inner">
                                                            <div class="content">
                                                                <h4>Description</h4>
                                                                <p><?php echo $row->description; ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item-specific">
                                                        <span title="Bedrooms"><img src="<?php echo base_url(); ?>assets/img/bedrooms.png" alt="">2</span>
                                                        <span title="Bathrooms"><img src="<?php echo base_url(); ?>assets/img/bathrooms.png" alt="">2</span>
                                                        <span title="Area"><img src="<?php echo base_url(); ?>assets/img/area.png" alt="">240m<sup>2</sup></span>
                                                        <span title="Garages"><img src="<?php echo base_url(); ?>assets/img/garages.png" alt="">1</span>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="fa fa-thumbs-up"></i>
                                                    </div>
                                                    <img src="<?php echo $imagesname; ?>" alt="" width="263" height="196">
                                                </a>
                                            </div>
                                            <div class="wrapper">
                                                <a href="item-detail.html"><h3><?php echo $row->restaurant_name; ?></h3></a>
                                                <figure><?php echo $row->city_name.",".$row->country_name; ?></figure>
                                                <div class="info">
                                                    <div class="type">
                                                        <i><?php echo $row->restaurant_reviews; ?></i>
                                                        <span>Reviews</span>
                                                    </div>
                                                    <div class="rating" data-rating="4"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.item-->
                                    </div>
                                    
                                <?php
                                    }
                                    } // end if empty sucess
                                else 
                                    { ?>
                                    
                                    <div style=" margin-left: 30px;" > Result Not Found </div>
                                         
                               <?php }
                                    ?>
                                                                      
                                </div>
                                <!--/.row-->
                            </section>
                            <!--end Listing Grid-->
                            <!--Pagination-->
<!--                            <nav>
                                <ul class="pagination pull-right">
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#" class="previous"><i class="fa fa-angle-left"></i></a></li>
                                    <li><a href="#" class="next"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </nav>-->
                            <!--end Pagination-->
                        </div>

                    </div>
                </section>
            </div



            <div id="page-content1" style="display:none;">
                <section class="container">
                    <div class="row">
                        <!--Content-->
                        <div class="col-md-9">
                            <header>
                                <h1 class="page-title">Listing</h1>
                            </header>
                            <figure class="filter clearfix">
                                <div class="buttons pull-left">
                                    <a href="#" class="btn icon active" onclick="return girdsection()"><i class="fa fa-th"></i>Grid</a>
                                    <a href="#" class="btn icon" onclick="return listsection()"><i class="fa fa-th-list"></i>List</a>
                                </div>
                                <div class="pull-right">
                                    <aside class="sorting">
                                        <span>Sorting</span>
                                        <div class="form-group">
                                            <select class="framed" id="restaurant_sort" name="sort" onchange="return loadRestaurant()">
                                              <option value="0">Select Sorting Option</option>
                                                <option value="1">Date - Newest First</option>
                                                <option value="2">Date - Oldest First</option>
                                             
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </aside>
                                </div>
                            </figure>

                            <!--Listing List-->
                            <section class="block listing">
                                <?php 
                                    if(!empty($restaurant_keyword))
                                    {
                                      foreach($restaurant_keyword as $rows)  
                                      {
                                 ?>
                            <?php
                            $imagename = "";
                            $url = @getimagesize($rows->logo_url);
                            if (@!is_array($url)) {
                                $imagesname = "http://www.bitesup.com/masterbites/uploads/restaurantimages/2ibkt.jpg"; // The image doesn't exist
                            } else {
                                $imagesname = $rows->logo_url;
                            }
                            ?>
                                <div class="item list">
                                    <div class="image">
                                        <div class="quick-view"><i class="fa fa-eye"></i><span>Quick View</span></div>
                                        <a href="item-detail.html">
                                            <div class="overlay">
                                                <div class="inner">
                                                    <div class="content">
                                                        <h4>Description</h4>
                                                        <p><?php echo $rows->description ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item-specific">
                                                <span title="Bedrooms"><img src="<?php echo base_url(); ?>assets/img/bedrooms.png" alt="">2</span>
                                                <span title="Bathrooms"><img src="<?php echo base_url(); ?>assets/img/bathrooms.png" alt="">2</span>
                                                <span title="Area"><img src="<?php echo base_url(); ?>assets/img/area.png" alt="">240m<sup>2</sup></span>
                                                <span title="Garages"><img src="<?php echo base_url(); ?>assets/img/garages.png" alt="">1</span>
                                            </div>
                                            <div class="icon">
                                                <i class="fa fa-thumbs-up"></i>
                                            </div>
                                            <img src="<?php echo $imagesname; ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="wrapper">
                                        <a href="item-detail.html"><h3><?php echo $rows->restaurant_name ?></h3></a>
                                        <figure><?php echo $rows->city_name.",".$rows->country_name ?></figure>
                                        <div class="info">
                                            <div class="type">
                                                 <i><?php echo $rows->restaurant_reviews; ?></i>
                                                        <span>Reviews</span>
                                            </div>
                                            <div class="rating" data-rating="4"></div>
                                        </div>
                                    </div>
                                </div>
                                
                                <?php
                                      }
                                    }
                                else {
                                    echo "<h2>"."Result Not Found"."</h2>";
                                }
                                ?>
                                
                                <!-- /.item-->
                            </section>
                            <!--end Listing List-->
                            <!--Pagination-->
<!--                            <nav>
                                <ul class="pagination pull-right">
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#" class="previous"><i class="fa fa-angle-left"></i></a></li>
                                    <li><a href="#" class="next"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </nav>-->
                            <!--end Pagination-->
                        </div>
                        <!--Sidebar-->
                        <div class="col-md-3" style="margin-top:100px;">
                            <aside id="sidebar">
                                <section>
                                    <header><h2>New Places</h2></header>
                                    <a href="item-detail.html" class="item-horizontal small">
                                        <h3>Cash Cow Restaurante</h3>
                                        <figure>63 Birch Street</figure>
                                        <div class="wrapper">
                                            <div class="image"><img src="<?php echo base_url(); ?>assets/img/items/1.jpg" alt=""></div>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="<?php echo base_url(); ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                    <span>Restaurant</span>
                                                </div>
                                                <div class="rating" data-rating="4"></div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--/.item-horizontal small-->
                                    <a href="item-detail.html" class="item-horizontal small">
                                        <h3>Blue Chilli</h3>
                                        <figure>2476 Whispering Pines Circle</figure>
                                        <div class="wrapper">
                                            <div class="image"><img src="<?php echo base_url(); ?>assets/img/items/2.jpg" alt=""></div>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="<?php echo base_url(); ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                    <span>Restaurant</span>
                                                </div>
                                                <div class="rating" data-rating="3"></div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--/.item-horizontal small-->
                                    <a href="item-detail.html" class="item-horizontal small">
                                        <h3>Eddie’s Fast Food</h3>
                                        <figure>4365 Bruce Street</figure>
                                        <div class="wrapper">
                                            <div class="image"><img src="<?php echo base_url(); ?>assets/img/items/3.jpg" alt=""></div>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="<?php echo base_url(); ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                    <span>Restaurant</span>
                                                </div>
                                                <div class="rating" data-rating="5"></div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--/.item-horizontal small-->
                                </section>
                                <section>
                                    <a href="#"><img src="<?php echo base_url(); ?>assets/img/ad-banner-sidebar.png" alt=""></a>
                                </section>
                                <section>
                                    <header><h2>Categories</h2></header>
                                    <ul class="bullets">
                                        <li><a href="#" >Restaurant</a></li>
                                        <li><a href="#" >Steak House & Grill</a></li>
                                        <li><a href="#" >Fast Food</a></li>
                                        <li><a href="#" >Breakfast</a></li>
                                        <li><a href="#" >Winery</a></li>
                                        <li><a href="#" >Bar & Lounge</a></li>
                                        <li><a href="#" >Pub</a></li>
                                    </ul>
                                </section>
                                <section>
                                    <header><h2>Events</h2></header>
                                    <div class="form-group">
                                        <select class="framed" name="events">
                                            <option value="">Select Your City</option>
                                            <option value="1">London</option>
                                            <option value="2">New York</option>
                                            <option value="3">Barcelona</option>
                                            <option value="4">Moscow</option>
                                            <option value="5">Tokyo</option>
                                        </select>
                                    </div>
                                    <!-- /.form-group -->
                                </section>
                            </aside>
                            <!-- /#sidebar-->
                        </div>
                        <!-- /.col-md-3-->
                        <!--end Sidebar-->
                    </div>
                </section>
            </div>
            
            
            <div id="page-content-gird-latest" style="display:none;">
               <section class="container">
                    <div class="">
                        <!--Content-->
                        <div class="">
                            <header>
                                <h1 class="page-title">Search Results</h1>
                            </header>
                            <figure class="filter clearfix">
                                <div class="buttons pull-left">
                                    <a href="#" class="btn icon active" onclick="return girdsection()"><i class="fa fa-th"></i>Grid</a>
                                    <a href="#" class="btn icon" onclick="return listsection()"><i class="fa fa-th-list"></i>List</a>
                                </div>
                                <div class="pull-right">
                                    <aside class="sorting">
                                        <span>Sorting</span>
                                        <div class="form-group">
                                            <select class="framed" id="restaurant_sort" name="sort" onchange="return loadRestaurant()">
                                                <option value="0">Select Sorting Option</option>
                                                <option value="1">Date - Newest First</option>
                                                <option value="2">Date - Oldest First</option>
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </aside>
                                </div>
                            </figure>

                            <!--Listing Grid-->
                            <section class="block equal-height">
                                <div class="row">
                                    
                                    <?php 
                                    if(!empty($latest_restaurant))
                                    {
                                      foreach($latest_restaurant as $row)  
                                      {
                                        
                                 ?>
                            <?php
                            $imagename = "";
                            $url = @getimagesize($row->logo_url);
                            if (@!is_array($url)) {
                                $imagesname = "http://www.bitesup.com/masterbites/uploads/restaurantimages/2ibkt.jpg"; // The image doesn't exist
                            } else {
                                $imagesname = $row->logo_url;
                            }
                            ?>
                                    <div class="col-md-3 col-sm-4">
                                        <div class="item">
                                            <div class="image">
                                                <div class="quick-view"><i class="fa fa-eye"></i><span>Quick View</span></div>
                                                <a href="item-detail.html">
                                                    <div class="overlay">
                                                        <div class="inner">
                                                            <div class="content">
                                                                <h4>Description</h4>
                                                                <p><?php echo $row->description; ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item-specific">
                                                        <span title="Bedrooms"><img src="<?php echo base_url(); ?>assets/img/bedrooms.png" alt="">2</span>
                                                        <span title="Bathrooms"><img src="<?php echo base_url(); ?>assets/img/bathrooms.png" alt="">2</span>
                                                        <span title="Area"><img src="<?php echo base_url(); ?>assets/img/area.png" alt="">240m<sup>2</sup></span>
                                                        <span title="Garages"><img src="<?php echo base_url(); ?>assets/img/garages.png" alt="">1</span>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="fa fa-thumbs-up"></i>
                                                    </div>
                                                    <img src="<?php echo $imagesname; ?>" alt="" width="263" height="196">
                                                </a>
                                            </div>
                                            <div class="wrapper">
                                                <a href="item-detail.html"><h3><?php echo $row->restaurant_name; ?></h3></a>
                                                <figure><?php echo $row->city_name.",".$row->country_name; ?></figure>
                                                <div class="info">
                                                    <div class="type">
                                                        <i><?php //echo $row->restaurant_reviews; ?></i>
                                                        <span>Reviews</span>
                                                    </div>
                                                    <div class="rating" data-rating="4"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.item-->
                                    </div>
                                    
                                <?php
                                    }
                                    } // end if empty sucess
                                else 
                                    { ?>
                                    
                                    <div style=" margin-left: 30px;" > Result Not Found </div>
                                         
                               <?php }
                                    ?>
                                                                      
                                </div>
                                <!--/.row-->
                            </section>
                            <!--end Listing Grid-->
                            <!--Pagination-->
<!--                            <nav>
                                <ul class="pagination pull-right">
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#" class="previous"><i class="fa fa-angle-left"></i></a></li>
                                    <li><a href="#" class="next"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </nav>-->
                            <!--end Pagination-->
                        </div>

                    </div>
                </section> 
              

                
                
                
            </div
    
     
     
            <div id="page-content-gird-old" style="display:none;">
               <section class="container">
                    <div class="">
                        <!--Content-->
                        <div class="">
                            <header>
                                <h1 class="page-title">Search Results</h1>
                            </header>
                            <figure class="filter clearfix">
                                <div class="buttons pull-left">
                                    <a href="#" class="btn icon active" onclick="return girdsection()"><i class="fa fa-th"></i>Grid</a>
                                    <a href="#" class="btn icon" onclick="return listsection()"><i class="fa fa-th-list"></i>List</a>
                                </div>
                                <div class="pull-right">
                                    <aside class="sorting">
                                        <span>Sorting</span>
                                        <div class="form-group">
                                            <select class="framed" id="restaurant_sort" name="sort" onchange="return loadRestaurant()">
                                                <option value="0">Select Sorting Option</option>
                                                <option value="1">Date - Newest First</option>
                                                <option value="2">Date - Oldest First</option>
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </aside>
                                </div>
                            </figure>

                            <!--Listing Grid-->
                            <section class="block equal-height">
                                <div class="row">
                                    
                                    <?php 
                                    if(!empty($old_restaurant))
                                    {
                                      foreach($old_restaurant as $row)  
                                      {
                                        
                                 ?>
                            <?php
                            $imagename = "";
                            $url = @getimagesize($row->logo_url);
                            if (@!is_array($url)) {
                                $imagesname = "http://www.bitesup.com/masterbites/uploads/restaurantimages/2ibkt.jpg"; // The image doesn't exist
                            } else {
                                $imagesname = $row->logo_url;
                            }
                            ?>
                                    <div class="col-md-3 col-sm-4">
                                        <div class="item">
                                            <div class="image">
                                                <div class="quick-view"><i class="fa fa-eye"></i><span>Quick View</span></div>
                                                <a href="item-detail.html">
                                                    <div class="overlay">
                                                        <div class="inner">
                                                            <div class="content">
                                                                <h4>Description</h4>
                                                                <p><?php echo $row->description; ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item-specific">
                                                        <span title="Bedrooms"><img src="<?php echo base_url(); ?>assets/img/bedrooms.png" alt="">2</span>
                                                        <span title="Bathrooms"><img src="<?php echo base_url(); ?>assets/img/bathrooms.png" alt="">2</span>
                                                        <span title="Area"><img src="<?php echo base_url(); ?>assets/img/area.png" alt="">240m<sup>2</sup></span>
                                                        <span title="Garages"><img src="<?php echo base_url(); ?>assets/img/garages.png" alt="">1</span>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="fa fa-thumbs-up"></i>
                                                    </div>
                                                    <img src="<?php echo $imagesname; ?>" alt="" width="263" height="196">
                                                </a>
                                            </div>
                                            <div class="wrapper">
                                                <a href="item-detail.html"><h3><?php echo $row->restaurant_name; ?></h3></a>
                                                <figure><?php echo $row->city_name.",".$row->country_name; ?></figure>
                                                <div class="info">
                                                    <div class="type">
                                                        <i><?php //echo $row->restaurant_reviews; ?></i>
                                                        <span>Reviews</span>
                                                    </div>
                                                    <div class="rating" data-rating="4"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.item-->
                                    </div>
                                    
                                <?php
                                    }
                                    } // end if empty sucess
                                else 
                                    { ?>
                                    
                                    <div style=" margin-left: 30px;" > Result Not Found </div>
                                         
                               <?php }
                                    ?>
                                                                      
                                </div>
                                <!--/.row-->
                            </section>
                            <!--end Listing Grid-->
                            <!--Pagination-->
<!--                            <nav>
                                <ul class="pagination pull-right">
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#" class="previous"><i class="fa fa-angle-left"></i></a></li>
                                    <li><a href="#" class="next"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </nav>-->
                            <!--end Pagination-->
                        </div>

                    </div>
                </section> 
              

                
                
                
            </div>
            
            
            
            
            
     
 <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.js"></script>

 <script>
    function girdsection()
    {
          $("#page-content").show();
          $("#page-content1").hide();
          $("#page-content-gird-latest").hide();
          $("#page-content-gird-old").hide()
          
    }
    
    function listsection()
    {
         $("#page-content1").show();
         $("#page-content").hide();
         $("#page-content-gird-latest").hide();
         $("#page-content-gird-old").hide()
        
    }
            
 </script>    
 <script>
     function loadRestaurant(){
       var res_id=document.getElementById('restaurant_sort').value;
       if(res_id==1)
       {
        $("#page-content-gird-latest").show();   
        $("#page-content1").hide();
        $("#page-content").hide();
        $('#preloader').hide();
        $("#page-content-gird-old").hide()
       }
       if(res_id==2)
       {
         $("#page-content-gird-old").show();
         $("#page-content-gird-latest").hide();   
         $("#page-content1").hide();
         $("#page-content").hide();
         $('#preloader').hide();
       }
       
   }
  
 </script>
 
 
 
 
 <script>
 $(document).ready(function(){
    $(document).on('click','.show_more',function(){
        var ID = $(this).attr('id');
        $('.show_more').hide();
        $('.loding').show();
        $.ajax({
            type:'POST',
            url:'ajax_more.php',
            data:'id='+ID,
            success:function(html){
                $('#show_more_main'+ID).remove();
                $('.tutorial_list').append(html);
            }
        }); 
    });
});    
 </script>      
           
            