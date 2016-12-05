
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
