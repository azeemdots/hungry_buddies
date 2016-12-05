
<!--Page Content-->
<div id="page-content">
    <!--Hero Image-->
    <section class="hero-image search-filter-middle height-500">
        <div class="inner">
            <div class="container">
                <h1>Find Place For Fun and Eat</h1>
                <div class="search-bar horizontal">
                    <form id="header_search" class="main-search border-less-inputs background-dark narrow" role="form" method="post" action="<?= base_url(); ?>main/search_result/">
                        <div class="input-row">
                            <div class="form-group">
                                <label for="keyword">Keyword</label>
                                <input type="text" class="form-control" id="keyword" name="keyword_search" placeholder="Enter Keyword">
                            </div>
                            <!-- /.form-group -->
                            
<!--                            <div class="form-group">
                                <label for="model">Place Type</label>
                                <select name="model" id="model" multiple title="Any" data-live-search="true">
                                    <option value="1">Restaurant</option>
                                    <option value="2">Vegetarian</option>
                                    <option value="3">Bar</option>
                                    <option value="4">Night Life</option>
                                    <option value="5">Breakfast</option>
                                    <option value="6">Fast Food</option>
                                    <option value="7">Steak & Grill</option>
                                </select>
                            </div>-->

                            <!-- /.form-group -->
                            <div class="form-group">                                
                                <label for="location">Location</label>
                                <select name="search_location" id="model" multiple title="Select your location" data-live-search="true">
                                <?php foreach($all_countries as $country ): ?>
                                    <option value="<?= $country->country_id;  ?>"> <?= $country->country_name; ?> </option>
                                    <?php endforeach;?>                                    
                                </select>
                            </div>
                            
                            <!-- /.form-group -->
                            <div class="form-group">
                                <button type="submit" name="submit" id="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                            <!-- /.form-group -->
                        </div>
                    </form>
                    <!-- /.main-search -->
                </div>
                <!-- /.search-bar -->
            </div>
        </div>
        <div class="background">
            <img src="<?= base_url() ?>assets/img/restaurant-bg.jpg" alt="">
        </div>
    </section>
    <!--end Hero Image-->
<section id="popular" class="block background-color-white">
                    <div class="container">
                        <header><h2>Popular Restaurant</h2></header>
                        <div class="owl-carousel wide carousel">
                            
                             <?php if (!empty($popular_restaurant)) { ?>
                            <?php foreach ($popular_restaurant as $rows) { ?>
                            
                            <?php
                            $imagename = "";
                            $url = @getimagesize($rows->logo_url);
                            if (@!is_array($url)) {
                                $imagesname = "http://www.bitesup.com/masterbites/uploads/restaurantimages/2ibkt.jpg"; // The image doesn't exist
                            } else {
                                $imagesname = $rows->logo_url;
                            }
                            ?>
                            <div class="slide">
                                <div class="inner">
                                    <div class="image">
                                        <div class="item-specific">
                                            <div class="inner">
                                                <div class="content">
                                                    <dl>
                                                        <dt>Like</dt>
                                                        <dd>2</dd>
                                                        <dt>Tried</dt>
                                                        <dd>2</dd>
                                                        <dt>Bookmark</dt>
                                                        <dd>2</dd>
                                                        <dt>Comments</dt>
                                                        <dd><?php echo $rows->restaurant_reviews; ?></dd>
                                                    </dl>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="<?php echo $imagesname; ?>">
                                    </div>
                                    <div class="wrapper">
                                        <a href=""><h3><?php echo  $rows->restaurant_name;?>
                                        
                                        </h3></a>
                                        <figure>
                                            <i class="fa fa-map-marker"></i>
                                            <span><?php echo $rows->city_name.",".$rows->country_name; ?></span>
                                        </figure>
                                        <div class="info">
                                            <div class="rating" data-rating="4">
                                                <aside class="reviews"><?php echo $rows->restaurant_reviews; ?> reviews</aside>
                                            </div>
                                            <div class="type">
                                                <i><img src="<?= base_url() ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                 <span><?php echo $rows->cousine_name; ?></span>
                                            </div>
                                        </div>
                                        <!--/.info-->
                                        <p><?php echo $rows->description; ?>
                                        </p>
                                        <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $rows->restaurant_id ?>" class="read-more icon">Read More</a>
                                    </div>
                                    <!--/.wrapper-->
                                </div>
                                <!--/.inner-->
                            </div>
                            
                            <?php
                            }
                          }
                            ?>
                            
                            <!--/.slide-->
                            
                            <!--/.slide-->
                        </div>
                        <!--/.owl-carousel-->
                    </div>
                    <!--/.container-->
                </section>
    <!--Featured-->
    <section id="featured" class="block equal-height">
                    <div class="container">
                        <header><h2>Featured Restaurant</h2></header>
                        <div class="row">
                             <?php if (!empty($restaurant)) { ?>
                            <?php foreach ($restaurant as $row) { ?>
                            
                            <div class="col-md-3 col-sm-3">
                                <div class="item">
                                    <div class="image">
                                        <div class="quick-view"><i class="fa fa-eye"></i><span>Quick View</span></div>
                                        <a href="">
                                            <div class="overlay">
                                                <div class="inner">
                                                    <div class="content">
                                                        <h4>Description</h4>
                                                        <p><?php echo $row->description; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item-specific">
                                                <span title="Like"><img src="assets/img/bedrooms.png" alt="">2</span>
                                                <span title="Bookmarks"><img src="assets/img/bathrooms.png" alt=""><?php echo $row->restaurant_page_visit; ?></span>
                                                <span title="tried"><img src="assets/img/area.png" alt=""><?php echo $row->restaurant_page_share; ?></span>
                                                <span title="comments"><img src="assets/img/garages.png" alt=""><?php echo $row->restaurant_reviews; ?></span>
                                            </div>
                                            <div class="icon">
                                                <i class="fa fa-thumbs-up"></i>
                                            </div>
                                            
                                             <?php
                            $imagename = "";
                            $url = @getimagesize($row->logo_url);
                            if (@!is_array($url)) {
                                $imagesname = "http://www.bitesup.com/masterbites/uploads/restaurantimages/2ibkt.jpg"; // The image doesn't exist
                            } else {
                                $imagesname = $row->logo_url;
                            }
                            ?>
                             <img src="<?php echo $imagesname; ?>" alt="" width="263" height="196">
                                        </a>
                                    </div>
                                    <div class="wrapper">
                                        <a href=""><h3><?php echo $row->restaurant_name; ?></h3></a>
                                        <figure><?php echo $row->city_name.",".$row->country_name; ?></figure>
                                        <div class="info">
                                            <div class="type">
                                                <i><img src="<?= base_url() ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                 <span><?php echo $row->cousine_name; ?></span>
                                            </div>
                                            <div class="rating" data-rating="4"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.item-->
                            </div>
                            
                            <?php
                             }
                             }
                             ?>
                            
                            
                         
                            <!--/.col-sm-4-->
                        </div>
                        <!--/.row-->
                    </div>
                    <!--/.container-->
                    <div class="background opacity-5">
                        <img src="assets/img/restaurants-bg2.jpg" alt="">
                    </div>
                </section>
    
    
    
    
    <section id="popular" class="block background-color-white">
                    <div class="container">
                        <header><h2>Most Reviewed and Comment Users</h2></header>
                        <div class="row">
                             <?php if (!empty($user_reviews)) { ?>
                            <?php foreach ($user_reviews as $user_row) { ?>
                            
                            <div class="col-md-3 col-sm-3">
                                <div class="item">
                                    <div class="image">
                                        <div class="quick-view"><i class="fa fa-eye"></i><span>Quick View</span></div>
                                        <a href="">
                                            <div class="overlay">
                                                <div class="inner">
                                                    <div class="content">
                                                        <h4>Description</h4>
                                                        <p><?php echo ucwords($user_row->first_name)."  ".ucwords($user_row->last_name); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item-specific">
                                                <span title="Like"><img src="assets/img/bedrooms.png" alt="">2</span>
                                                <span title="Bookmarks"><img src="assets/img/bathrooms.png" alt="">2</span>
                                                <span title="tried"><img src="assets/img/area.png" alt="">2</span>
                                                <span title="comments"><img src="assets/img/garages.png" alt="">1</span>
                                            </div>
                                            <div class="icon">
                                                <i class="fa fa-thumbs-up"></i>
                                            </div>
                                            
                                             <?php
                            $user_image = "";
                            $url = @getimagesize($user_row->user_image);
                            if (@!is_array($url)) {
                                $user_image = base_url()."uploads/profile_images/member-3t.jpg"; // The image doesn't exist
                            } else {
                                $user_image = $user_row->user_image;
                            }
                            ?>
                             <img src="<?php echo $user_image; ?>" alt="" width="263" height="196">
                                        </a>
                                    </div>
                                    <div class="wrapper">
                                        <a href=""><h3><?php echo ucwords($user_row->first_name)." ".ucwords($user_row->last_name); ?></h3></a>
                                        <figure><?php echo $user_row->country_name; ?></figure>
                                        <div class="info">
                                            <div class="type">
                                                <i><img src="<?= base_url() ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                 <span><?php echo $user_row->user_comments; ?> Reviews</span>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- /.item-->
                            </div>
                            
                            <?php
                             }
                             }
                             ?>
                            
                            
                         
                            <!--/.col-sm-4-->
                        </div>
                        <!--/.row-->
                    </div>
                    <!--/.container-->
                    <div class="background opacity-5">
                        <img src="assets/img/restaurants-bg2.jpg" alt="">
                    </div>
                </section>  
    
    
    
    <section id="featured" class="block equal-height">
                    <div class="container">
                        <header>
                            <h2 align="center">
                            Looking for the Food Feed? Get the app!
                            <br>
                            </h2>
                            <p align="center">Follow foodies to see their reviews and photos in your Feed, and discover great new restaurants!</p>
                            </header>
                       
                            
                             
                            <div class="slide">
                                <div class="inner">
                                    <div class="image" align="center">
                                        <img src="<?php echo base_url() ?>assets/img/feed-app.jpg">
                                        
                                        
                                    </div>
                                    
                                       
                                    <div class="wrapper" align="center">
                                        
                                        <div class="store-links col-l-10">
              <a class="pr20" target="_blank" href="">
                <img src="<?php echo base_url() ?>assets/img/applestore@2x.png" alt="Download Bitesup for iOS" height="40">
              </a>
              <a target="_blank" href="">
                <img src="<?php echo base_url() ?>assets/img/googleplay@2x.png" alt="Download Bitesup for Android" height="40">
              </a>
            </div>
                                      
                                        
                                        
                                        <!--/.info-->
                                      
                                        
                                    </div>
                                   
                                    <!--/.wrapper-->
                                </div>
                                <!--/.inner-->
                            </div>
                            
                            
                            
                            <!--/.slide-->
                            
                            <!--/.slide-->
                     
                        <!--/.owl-carousel-->
                    </div>
                    <!--/.container-->
                </section>   
    <!--end Featured-->

    <!--Popular-->

    <!--end Popular-->

    <!--Why Us-->

    <!--end Why Us-->

    <hr>

    <!--Listing-->
    <section id="listing" class="block">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-9">

                    <!--/.equal-height-->

                    <!--Categories-->
                    <section id="categories">
                        <header><h2>Categories</h2></header>
                        <ul class="categories">
<?php
if (!empty($cusine_type)) {
    foreach ($cusine_type as $category) {
        ?>
                                    <li><a href="#"><?= $category->tag_name ?></a></li>
    <?php }
} ?>

                        </ul>
                        <!--/.categories-->
                    </section>
                    <!--end Categories-->

                </div>
                <div class="col-md-3 col-sm-3">
                    
                    <section>
                        <header><h2>New Places</h2></header>
<?php if (!empty($restaurants_places)) {
    foreach ($restaurants_places as $rest) { ?>


                                <a href="item-detail.html" class="item-horizontal small">
                                    <h3><?php echo $rest->name; ?></h3>
                                    <figure><?php echo $rest->website_address; ?></figure>
                                    <div class="wrapper">
                                        
                                        
                                        
                                        <div class="image"><img src="<?php echo $rest->logo_url; ?>" alt=""></div>
                                        <div class="info">
                                            <div class="type">
                                                <i><img src="<?= base_url() ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                <span>Restaurant</span>
                                            </div>
                                            <div class="rating" data-rating="4"></div>
                                        </div>
                                    </div>
                                </a>
    <?php }
} ?>

                    </section>
                
                    <!--/#sidebar-->
                </div>
                <!--/.col-md-3-->
            </div>
            <!--/.row-->
        </div>
        <!--/.block-->
    </section>
    
    
    
    
    
                <!--end Popular-->
  
    
    
             
                
                
    
    
    
    
    
    
    <!--end Listing-->

      <hr>

    
        
       
</div>
<!-- end Page Content-->
<script src="<?= base_url() ?>assets/js/jquery.js"></script>
<script>
    $(document).on('click', '.hit_like', function () {
        var like_id = $(this).attr('id');
        var value_of_like = $(this).attr('value');
        console.log(value_of_like);
        var like_ids = like_id.split("-");
        var feed_like = like_ids[0];
        var feed_id = like_ids[1];
        console.log(feed_id);
        $data = 'feed_id=' + feed_id + '&feed_like=' + feed_like;
        $.ajax({
            type: 'post',
            url: '<?php base_url() ?>dashboard/user_like_feed',
            data: $data,
            dataType: 'json',
            success: function (data) {
                console.log(data.like);
                if (data != null) {
                    if (data.like == 0) {
                        $('#1-' + feed_id).addClass('btn-clean');
                        $('#1-' + feed_id).removeClass('btn-clean2');
                    } else {
                        $('#1-' + feed_id).removeClass('btn-clean');
                        $('#1-' + feed_id).addClass('btn-clean2');
                    }
                }



            }

        });

    });



</script>
<script>
    $(document).on('click', '.hit_tried', function () {
        var tried_id = $(this).attr('id');
        var tried_ids = tried_id.split("-");
        var feed_tried = tried_ids[0];
        var feed_id = tried_ids[1];
        console.log(feed_id);
        $data = 'feed_id=' + feed_id + '&feed_tried=' + feed_tried;
        $.ajax({
            type: 'post',
            url: '<?php base_url() ?>dashboard/user_like_feed',
            data: $data,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                if (data != null) {
                    if (data.tried == 0) {
                        $('#2-' + feed_id).addClass('btn-clean');
                        $('#2-' + feed_id).removeClass('btn-clean3');
                    } else {
                        $('#2-' + feed_id).removeClass('btn-clean');
                        $('#2-' + feed_id).addClass('btn-clean3');
                    }

                }


            }

        });

    });



</script>
<script>
    $(document).on('click', '.hit_wish', function () {
        var wish_id = $(this).attr('id');
        var wish_ids = wish_id.split("-");
        var feed_wish = wish_ids[0];
        var feed_id = wish_ids[1];
        console.log(feed_id);
        $data = 'feed_id=' + feed_id + '&feed_wish=' + feed_wish;
        $.ajax({
            type: 'post',
            url: '<?php base_url() ?>dashboard/user_like_feed',
            data: $data,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                if (data != null) {
                    if (data.wish == 0) {
                        $('#3-' + feed_id).addClass('btn-clean');
                        $('#3-' + feed_id).removeClass('btn-clean4');
                    } else {
                        $('#3-' + feed_id).removeClass('btn-clean');
                        $('#3-' + feed_id).addClass('btn-clean4');
                    }
                }

            }

        });

    });



</script>
