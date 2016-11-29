<style>
    .select {
        display: none;
    }
</style>
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
                    <h1 class="page-title">Blog</h1>
                </header>

                <!--Company Members-->
                <section>
                    <header><h2>Users</h2></header>
                    <div class="row">
                        <?php
                        foreach ($users_data as $row) {
                            if ($session_id == $row->id) {
                                
                            } else {
                                ?>
                                <div class="col-md-3 col-sm-3">
                                    <div class="member">
                                        <?php if (!empty($row->user_image_url)) { ?>
                                            <img src="<?php echo $row->user_image_url ?>" alt="">
                                        <?php } else { ?>
                                            <img src="<?php echo base_url() ?>images/default.gif" alt="">
                                        <?php } ?>

                                        <h4 style="width: 150px; height:70px; "><a href="<?= base_url() ?>main/user_detail/<?php echo $row->id ?>"><?php echo $row->first_name ?> <?php echo $row->last_name ?></a></h4>
                                        <!--<figure>Company CEO</figure>-->
                                        <hr>

                                        <div class="social">
                                            <?php
                                            if (!empty($follow_list) && in_array($row->id, $follow_list)) {
                                                ?>
                                                <button style="background-color: #66BD2B"  class = "btn btn-default btn-large"><span>Following</span></button>
                                            <?php } elseif (!empty($request_list) && in_array($row->id, $request_list)) { ?>
                                                <button style="background-color: silver"  class = "btn btn-default btn-large"><span>Requested</span></button>
                                                <?php
                                            } else {
                                                ?>
                                                <button style="background-color: grey" value = "<?php echo $row->id ?>" class = "btn btn-default btn-large follow ">Follow</button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <!--/.member-->
                                </div>
                                <!--/.col-md-4-->
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <!--/.row-->
                </section>
                <!--end Company Members-->

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
<script type="text/javascript" >
    $(function () {
        $(".follow").click(function () {
            var reference = this;
            var friend_id = $(this).val();
//            console.log(friend_id);
            var dataString = 'friend_id=' + friend_id;

            $.ajax({
                dataType: "json",
                type: "POST",
                url: "<?php echo base_url() ?>main/follow",
                cache: false,
                data: dataString,
                success: function (response) {
                    console.log(response);
                    if (response != '') {
                        $(reference).html('Following');
                        $(reference).css('background-color', '#66BD2B');
                        $(reference).removeClass('follow').addClass('add').off('click');

                    }
                    if (response == '') {
                        $(reference).html('Requested');
                        $(reference).css('background-color', 'silver');
                        $(reference).removeClass('follow').addClass('add').off('click');

                    }
                }
            });
        });
        $(".add").click(function () {
            var hello = $(this).val();
            console.log(hello);

        });
    });
</script>

