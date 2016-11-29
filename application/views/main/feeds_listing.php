
<!--Sub Header-->
<section class="sub-header">
    <div class="search-bar horizontal collapse" id="redefine-search-form"></div>
    <!-- /.search-bar -->
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="redefine-search">
                <a href="#redefine-search-form" class="inner" data-toggle="collapse" aria-expanded="false" aria-controls="redefine-search-form">
                    <span class="icon"></span>
                    <span>Redefine Search</span>
                </a>
            </div>
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

<!--Page Content-->
<div id="page-content">

    <section class="container">
        <div class="row">
            <div class="col-md-9">

                <header>
                    <div class="col-md-12" style="padding: 60px;">
                        <div class="col-md-6">
                            <h1 class="page-title">Feeds</h1>
                        </div>
                        <div class="col-md-6" style="margin-top: 10px;">
                            <div class="form-group">
                                <a href="<?= base_url(); ?>feeds/add_feed" type="submit" class="btn btn-default pull-right" id="submit" >Check In&nbsp;<i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </header>

                <?php
                $iterator = 0;
                if(!empty($feeds)){
                foreach ($feeds as $row) {
                    ?>
                    <article class="blog-post">

                        <header>

                            <a href="blog-detail.html"><h3 style="font-size: 18px;margin-bottom: 0px;"><img style="height: 65px;width: 65px;border-radius: 50px;margin-right: 10px;"  src="<?php echo $row->user_image_url; ?>" alt=""><?php echo $row->first_name ?>&nbsp;<?php echo $row->last_name ?></h3></a></header>




                            <div class="owl-carousel testimonials" style="padding: 0px;">
                                <?php for ($j = 0; $j < sizeof($feed_images[$iterator]); $j++) { ?>
                                <div class="slide"><h4><img style="height: 400px;width: 900px;"  src="<?php echo $feed_images[$iterator][$j]->image_url; ?>" alt="">
                                        <div class="carousel-caption" style="padding-bottom: 0px;padding-top:0px;left: 0%;right:0%;opacity:0.6;padding-left: 25px;background-color: white;">
                                            <div class="col-sm-6"><img style="padding:8px;width: 78px;border-radius: 50px;float: left;"  src="<?php echo $row->user_image_url; ?>" alt="">
                                            <h1 style="text-align: left;color: black;margin-top: 5px;"><?php echo $row->title; ?></h1><br>
                                            <h2 style="text-align: left;color: black;margin-top: -18px;margin-bottom: 10px;"><?php echo $row->title; ?></h2>
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
                            <?php if(!empty($row->like)){
                                if($row->like == 1){
                           ?>
                            <button   type="button" class="btn-clean2 hit_like" id="1-<?php echo $row->id; ?>"   style="cursor: pointer;" value="<?php echo $row->like; ?>">
                                Like <i class="glyphicon glyphicon-heart"></i>
                            </button>
                            <?php }else{?>

                            <button type="button" class="btn-clean hit_like" id="1-<?php echo $row->id; ?>"   style="cursor: pointer;" value="<?php echo $row->like; ?>">
                                Like <i class="glyphicon glyphicon-heart"></i>
                            </button>
                            <?php }}else{?>
                            <button type="button" class="btn-clean hit_like" id="1-<?php echo $row->id; ?>"   style="cursor: pointer;" value="<?php echo $row->like; ?>">
                                Like <i class="glyphicon glyphicon-heart"></i>
                            </button>
                            <?php } ?>

                            <?php if(!empty($row->tried)){
                                if($row->tried == 2){
                            ?>
                            <button  name="tried_vale_is" type="button" class="btn-clean3 hit_tried" id="2-<?php echo $row->id; ?>"  style="cursor: pointer;" value="<?php echo $row->tried; ?>">
                                Tried <i class="glyphicon glyphicon-ok"></i>
                            </button>
                            <?php }else{?>
                                    <button  name="tried_vale_is" type="button" class="btn-clean hit_tried" id="2-<?php echo $row->id; ?>"  style="cursor: pointer;" value="<?php echo $row->tried; ?>">
                                        Tried <i class="glyphicon glyphicon-ok"></i>
                                    </button>

                            <?php }}else{ ?>
                            <button  name="tried_vale_is" type="button" class="btn-clean hit_tried" id="2-<?php echo $row->id; ?>"  style="cursor: pointer;" value="<?php echo $row->tried; ?>">
                                Tried <i class="glyphicon glyphicon-ok"></i>
                            </button>
                        <?php }?>

                        <?php if(!empty($row->wish)){
                            if($row->wish == 3){
                        ?>
                        <button   type="button" class="btn-clean4 hit_wish" id="3-<?php echo $row->id; ?>"  style="cursor: pointer;" value="<?php echo $row->wish; ?>">
                                Wish <i class="glyphicon glyphicon-star"></i>
                        </button>
                            <?php }else{ ?>
                            <button   type="button" class="btn-clean hit_wish" id="3-<?php echo $row->id; ?>"  style="cursor: pointer;" value="<?php echo $row->wish; ?>">
                                Wish <i class="glyphicon glyphicon-star"></i>
                            </button>
                            <?php }}else{?>
                            <button   type="button" class="btn-clean hit_wish" id="3-<?php echo $row->id; ?>"  style="cursor: pointer;" value="<?php echo $row->wish; ?>">
                                Wish <i class="glyphicon glyphicon-star"></i>
                            </button>
                        <?php } ?>
                        </div>





                        <figure class="meta">
                            <a href="#" class="link-icon"><i class="fa fa-user"></i>Admin</a>
                            <a href="#" class="link-icon"><i class="fa fa-calendar"></i><?php echo $row->datetime ?></a>

                                                        <div class="tags">
                                                            <a href="<?= base_url() ?>feeds/edit_feeds/<?php echo $row->id ?>" class="tag article">Edit</a>
                                                                    <a href="<?= base_url() ?>feeds/delete_feed/<?php echo $row->id ?>" class="tag article">Delete</a>
                                                        </div>
                        </figure>
                        <p><?php echo $row->desc ?>
                        </p>
                        <!--<a style="float: right;" href=" " class="icon">Edit Post</a>-->
                        <a href="<?= base_url() ?>feeds/feed_detail/<?php echo $row->id ?>" class="icon">Read More <i class="fa fa-angle-right"></i></a>
                    </article><!-- /.blog-post -->
                <?php } }?>



                <!--Pagination-->
                <nav>
                    <ul class="pagination pull-right">
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#" class="previous"><i class="fa fa-angle-left"></i></a></li>
                        <li><a href="#" class="next"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </nav>
                <!--end Pagination-->
            </div>
            <div class="col-md-3">
                <aside id="sidebar">
                    <section>
                        <header><h2>New Places</h2></header>
                        <a href="item-detail.html" class="item-horizontal small">
                            <h3>Cash Cow Restaurante</h3>
                            <figure>63 Birch Street</figure>
                            <div class="wrapper">
                                <div class="image"><img src="<?=base_url()?>assets/img/items/1.jpg" alt=""></div>
                                <div class="info">
                                    <div class="type">
                                        <i><img src="<?=base_url()?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
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
                                <div class="image"><img src="<?=base_url()?>assets/img/items/2.jpg" alt=""></div>
                                <div class="info">
                                    <div class="type">
                                        <i><img src="<?=base_url()?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
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
                                <div class="image"><img src="<?=base_url()?>assets/img/items/3.jpg" alt=""></div>
                                <div class="info">
                                    <div class="type">
                                        <i><img src="<?=base_url()?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                        <span>Restaurant</span>
                                    </div>
                                    <div class="rating" data-rating="5"></div>
                                </div>
                            </div>
                        </a>
                        <!--/.item-horizontal small-->
                    </section>
                    <section>
                        <a href="#"><img src="<?=base_url()?>assets/img/ad-banner-sidebar.png" alt=""></a>
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
        </div>
    </section>
</div>
<!-- end Page Content-->
<script src="<?= base_url() ?>assets/js/jquery.js"></script>
<script>
    $(document).on('click','.hit_like',function(){
        var like_id = $(this).attr('id');
        var value_of_like =  $(this).attr('value');
        console.log(value_of_like);
        var like_ids = like_id.split("-");
        var feed_like = like_ids[0];
        var feed_id = like_ids[1];
        console.log(feed_id);
        $data = 'feed_id=' + feed_id+'&feed_like='+feed_like;
        $.ajax({
            type:'post',
            url:'<?php base_url()?>dashboard/user_like_feed',
            data:$data,
            dataType: 'json',
            success: function (data){
                console.log(data.like);
                if(data != null){
                    if(data.like == 0){
                        $('#1-'+feed_id).addClass('btn-clean');
                        $('#1-'+feed_id).removeClass('btn-clean2');
                    }else{
                        $('#1-'+feed_id).removeClass('btn-clean');
                        $('#1-'+feed_id).addClass('btn-clean2');
                    }
                }



            }

        });

    });



</script>
<script>
    $(document).on('click','.hit_tried',function(){
        var tried_id = $(this).attr('id');
        var tried_ids = tried_id.split("-");
        var feed_tried = tried_ids[0];
        var feed_id = tried_ids[1];
        console.log(feed_id);
        $data = 'feed_id=' + feed_id+'&feed_tried='+feed_tried;
        $.ajax({
            type:'post',
            url:'<?php base_url()?>dashboard/user_like_feed',
            data:$data,
            dataType: 'json',
            success: function (data){
                console.log(data);
                if(data != null){
                    if(data.tried == 0){
                        $('#2-'+feed_id).addClass('btn-clean');
                        $('#2-'+feed_id).removeClass('btn-clean3');
                    }else{
                        $('#2-'+feed_id).removeClass('btn-clean');
                        $('#2-'+feed_id).addClass('btn-clean3');
                    }

                }


            }

        });

    });



</script>
<script>
    $(document).on('click','.hit_wish',function(){
        var wish_id = $(this).attr('id');
        var wish_ids = wish_id.split("-");
        var feed_wish = wish_ids[0];
        var feed_id = wish_ids[1];
        console.log(feed_id);
        $data = 'feed_id=' + feed_id+'&feed_wish='+feed_wish;
        $.ajax({
            type:'post',
            url:'<?php base_url()?>dashboard/user_like_feed',
            data:$data,
            dataType: 'json',
            success: function (data){
                console.log(data);
                if(data != null){
                    if(data.wish == 0){
                        $('#3-'+feed_id).addClass('btn-clean');
                        $('#3-'+feed_id).removeClass('btn-clean4');
                    }else{
                        $('#3-'+feed_id).removeClass('btn-clean');
                        $('#3-'+feed_id).addClass('btn-clean4');
                    }
                }

            }

        });

    });



</script>
