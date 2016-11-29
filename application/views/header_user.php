<body onunload="" class="page-subpage page-profile navigation-top-header after" id="page-top"
      xmlns="http://www.w3.org/1999/html">
    <!-- Outer Wrapper-->
    <div id="outer-wrapper">
        <!-- Inner Wrapper -->
        <div id="inner-wrapper">
            <!-- Navigation-->
            <div class="header">
                <div class="wrapper">
                    <div class="brand">
                        <a href="<?php echo base_url() ?>dashboard"><img src="<?= base_url() ?>assets/img/logo.png" alt="logo"></a>
                    </div>
                    <div class="navigation-items">
                        <div class="wrapper">
                            <ul class="main-navigation navigation-top-header after"></ul>
                            <ul class="user-area ">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><strong><?php if(!empty($user_data)){ echo ucfirst($user_data->username); }?></strong><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                        <ul class="dropdown-menu" style="margin-top: 19px;">
                                            <li><a href="<?php echo base_url() ?>dashboard/profile">Profile</a></li>
                                            <li><a href="<?php echo base_url() ?>feeds">Feeds</a></li>
                                            <li><a href="<?php echo base_url() ?>main/users">Users</a></li>
                                            <li><a href="<?php echo base_url() ?>main/requests">Requests</a></li>
                                            <li><a href="<?php echo base_url() ?>restaurant/index">Restaurant</a></li>
                                            <li><a href="#">Managing</a></li>
                                            <li><a href="<?php echo base_url() ?>main/user_friend_list/<?=$user_data->id?>">My Buddies </a></li>

                                        </ul>
                                    </li>
                                <li><a href=""><i class="fa fa-cog"></i></a></li>
                            </ul>
                            <a href="#" class="submit-item" data-toggle="modal" data-target="">

                                <div class="icon">
                                    <i class="fa fa-plus"></i>
                                </div>
                            </a>
                            <div class="toggle-navigation">
                                <div class="icon">
                                    <div class="line"></div>
                                    <div class="line"></div>
                                    <div class="line"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end Navigation-->

