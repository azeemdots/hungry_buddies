
<!--Page Content-->
<div id="page-content">
    <!--Hero Image-->
    <section class="hero-image search-filter-middle height-500">
        <div class="inner">
            <div class="container">
                <h1>Find Place For Fun and Eat</h1>
                <div class="search-bar horizontal">
                    <form class="main-search border-less-inputs background-dark narrow" role="form" method="post" action="?">
                        <div class="input-row">
                            <div class="form-group">
                                <label for="keyword">Keyword</label>
                                <input type="text" class="form-control" id="keyword" placeholder="Enter Keyword">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
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
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label for="location">Location</label>
                                <div class="input-group location">
                                    <input type="text" class="form-control" id="location" placeholder="Enter Location">
                                </div>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
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
                                                <span title="Bedrooms"><img src="assets/img/bedrooms.png" alt="">2</span>
                                                <span title="Bathrooms"><img src="assets/img/bathrooms.png" alt="">2</span>
                                                <span title="Area"><img src="assets/img/area.png" alt="">240m<sup>2</sup></span>
                                                <span title="Garages"><img src="assets/img/garages.png" alt="">1</span>
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
                                                        <dt>Bedrooms</dt>
                                                        <dd>2</dd>
                                                        <dt>Bathrooms</dt>
                                                        <dd>2</dd>
                                                        <dt>Area</dt>
                                                        <dd>240m<sup>2</sup></dd>
                                                        <dt>Garages</dt>
                                                        <dd>1</dd>
                                                        <dt>Build Year</dt>
                                                        <dd>1990</dd>
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
                                                <i><img src="<?php echo base_url(); ?>assets/icons/restaurants-bars/restaurants/restaurant.png"></i>
                                                <span>Restaurant</span>
                                            </div>
                                        </div>
                                        <!--/.info-->
                                        <p><?php echo $row->description; ?>
                                        </p>
                                        <a href="" class="read-more icon">Read More</a>
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
                <!--end Popular-->
    
    
    
    <section id="featured" class="block equal-height">
        <div class="container">

            <div class="row">

                <?php if (!empty($restaurant)) { ?>
                    <div class="col-lg-8">
                        <header><h2 style="margin-bottom: 95px;margin-left: 15px;">Popular Restaurants</h2></header>
                        <?php foreach ($restaurant as $row) { ?>
                            <?php
                            $imagename = "";
                            $url = @getimagesize($row->logo_url);
                            if (@!is_array($url)) {
                                $imagesname = "http://www.bitesup.com/masterbites/uploads/restaurantimages/2ibkt.jpg"; // The image doesn't exist
                            } else {
                                $imagesname = $row->logo_url;
                            }
                            ?>
                            <div class="col-md-4 col-sm-4">
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

                                            <div class="icon">
                                                <i class="fa fa-thumbs-up"></i>
                                            </div>



                                            <img src="<?php echo $imagesname; ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="wrapper">
                                        <a href="item-detail.html"><h3><?php echo $row->restaurant_name; ?></h3></a>

                                        <div class="info">
                                            <div class="type">
                                                <i><img src="<?= base_url() ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                <span>Restaurant</span>
                                            </div>
                                            <div class="rating" data-rating="4"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.item-->
                            </div>
    <?php }
} ?>
                </div>




<?php
$iterator = 0;
if (!empty($feeds)) {
    ?>
                    <div class="col-lg-8">
                        <header><h2 style="margin-bottom: 95px;margin-left: 15px;"">Feeds</h2></header>
    <?php foreach ($feeds as $row) {
        ?>
                            <article class="blog-post">

                                <header>

                                    <a href="blog-detail.html"><h3 style="font-size: 18px;margin-bottom: 0px;"><img style="height: 65px;width: 65px;border-radius: 50px;margin-right: 10px;"  src="<?php echo $row->user_image_url; ?>" alt=""><?php echo $row->first_name ?>&nbsp;<?php echo $row->last_name ?></h3></a></header>




                                <div class="owl-carousel testimonials" style="padding: 0px;">
        <?php for ($j = 0; $j < sizeof($feed_images[$iterator]); $j++) { ?>
                                        <div class="slide"><h4><img style="height: 400px;width: 900px;"  src="<?php echo $feed_images[$iterator][$j]->image_url; ?>" alt="">
                                                <div class="carousel-caption" style="padding-bottom: 0px;padding-top:0px;left: 0%;right:0%;opacity:0.6;padding-left: 25px;background-color: white;">
                                                    <div class="col-sm-6">
            <!--                                                    <img style="padding:8px;width: 78px;border-radius: 50px;float: left;"  src="--><?php //echo $row->user_image_url;  ?><!--" alt="">-->
                                                        <h1 style="text-align: left;color: black;margin-top: 5px; margin-right: 20px;"><?php echo $row->title; ?></h1><br>

                                                    </div>
                                                    <div class="col-sm-6 pull-right">
                                                        <div class="box">
                                                            <div class="icon">
                                                                <div class="image"><i class="glyphicon glyphicon-bookmark"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </h4>
                                        </div>

        <?php } $iterator++; ?>
                                </div>

                                <div class="margin">
        <?php
        if (!empty($row->like)) {
            if ($row->like == 1) {
                ?>
                                            <button   type="button" class="btn-clean2 hit_like" id="1-<?php echo $row->id; ?>"   style="cursor: pointer;" value="<?php echo $row->like; ?>">
                                                Like <i class="glyphicon glyphicon-heart"></i>
                                            </button>
                                        <?php } else { ?>

                                            <button type="button" class="btn-clean hit_like" id="1-<?php echo $row->id; ?>"   style="cursor: pointer;" value="<?php echo $row->like; ?>">
                                                Like <i class="glyphicon glyphicon-heart"></i>
                                            </button>
                                        <?php }
                                    } else { ?>
                                        <button type="button" class="btn-clean hit_like" id="1-<?php echo $row->id; ?>"   style="cursor: pointer;" value="<?php echo $row->like; ?>">
                                            Like <i class="glyphicon glyphicon-heart"></i>
                                        </button>
                                    <?php } ?>

                                    <?php
                                    if (!empty($row->tried)) {
                                        if ($row->tried == 2) {
                                            ?>
                                            <button  name="tried_vale_is" type="button" class="btn-clean3 hit_tried" id="2-<?php echo $row->id; ?>"  style="cursor: pointer;" value="<?php echo $row->tried; ?>">
                                                Tried <i class="glyphicon glyphicon-ok"></i>
                                            </button>
            <?php } else { ?>
                                            <button  name="tried_vale_is" type="button" class="btn-clean hit_tried" id="2-<?php echo $row->id; ?>"  style="cursor: pointer;" value="<?php echo $row->tried; ?>">
                                                Tried <i class="glyphicon glyphicon-ok"></i>
                                            </button>

            <?php }
        } else { ?>
                                        <button  name="tried_vale_is" type="button" class="btn-clean hit_tried" id="2-<?php echo $row->id; ?>"  style="cursor: pointer;" value="<?php echo $row->tried; ?>">
                                            Tried <i class="glyphicon glyphicon-ok"></i>
                                        </button>
                                    <?php } ?>

                                    <?php
                                    if (!empty($row->wish)) {
                                        if ($row->wish == 3) {
                                            ?>
                                            <button   type="button" class="btn-clean4 hit_wish" id="3-<?php echo $row->id; ?>"  style="cursor: pointer;" value="<?php echo $row->wish; ?>">
                                                Wish <i class="glyphicon glyphicon-star"></i>
                                            </button>
                                        <?php } else { ?>
                                            <button   type="button" class="btn-clean hit_wish" id="3-<?php echo $row->id; ?>"  style="cursor: pointer;" value="<?php echo $row->wish; ?>">
                                                Wish <i class="glyphicon glyphicon-star"></i>
                                            </button>
                                        <?php }
                                    } else { ?>
                                        <button   type="button" class="btn-clean hit_wish" id="3-<?php echo $row->id; ?>"  style="cursor: pointer;" value="<?php echo $row->wish; ?>">
                                            Wish <i class="glyphicon glyphicon-star"></i>
                                        </button>
        <?php } ?>
                                </div>





                                <figure class="meta">
                                    <a href="#" class="link-icon"><i class="fa fa-user"></i>Admin</a>
                                    <a href="#" class="link-icon"><i class="fa fa-calendar"></i><?php echo $row->datetime ?></a>

                                    <div class="tags">
                                        <a href="<?= base_url() ?>feeds/feed_detail/<?php echo $row->id ?>" class="icon">Read More <i class="fa fa-angle-right"></i></a>
                                        <!--                                    <a href="--><?//= base_url() ?><!--feeds/edit_feeds/--><?php //echo $row->id  ?><!--" class="tag article">Edit</a>-->
                                        <!--                                    <a href="--><?//= base_url() ?><!--feeds/delete_feed/--><?php //echo $row->id  ?><!--" class="tag article">Delete</a>-->
                                    </div>
                                </figure>
                                <p><?php echo $row->desc ?></p>
                                <!--<a style="float: right;" href=" " class="icon">Edit Post</a>-->

                            </article><!-- /.blog-post -->

    <?php } ?>
                    </div>
                        <?php } ?>

                                
                            
                                
                                
                                
                
            </div>




            <!--/.row-->
        </div>
        <!--/.container-->
        <div class="background opacity-5">
            <img src="<?= base_url() ?>assets/img/restaurants-bg2.jpg" alt="">
        </div>
    </section>
    
    
    
    
    
    <!--end Listing-->

    <!--    <hr>-->

    <!--    Partners
        <section id="partners" class="block">
            <div class="container">
                <header><h2>Partners</h2></header>
                <div class="logos">
                    <div class="logo"><a href="#"><img src="assets/img/logo-partner-01.png" alt=""></a></div>
                    <div class="logo"><a href="#"><img src="assets/img/logo-partner-02.png" alt=""></a></div>
                    <div class="logo"><a href="#"><img src="assets/img/logo-partner-03.png" alt=""></a></div>
                    <div class="logo"><a href="#"><img src="assets/img/logo-partner-04.png" alt=""></a></div>
                    <div class="logo"><a href="#"><img src="assets/img/logo-partner-05.png" alt=""></a></div>
                </div>
            </div>
            /.container
        </section>
        end Partners-->
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
