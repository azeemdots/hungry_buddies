        <!--Page Content-->
            <div id="page-content">
                <section class="container">
                    <div class="row">
                        <!--Item Detail Content-->
                        <div class="col-md-9">
                            <section class="block" id="main-content">
                                                                
                                <div class="row">
                                    <!--Detail Sidebar-->
                                    <aside class="col-md-4 col-sm-4" id="detail-sidebar">
                                        <!--Contact-->
                                        <section>
                                            <header><h3>Contact</h3></header>
                                            <address>
                                                <div><?php if(!empty($restaurant_detail->name)) { echo $restaurant_detail->name; } ?></div>
                                                <div><?php if(!empty($restaurant_detail->country_name)) { echo $restaurant_detail->country_name; } ?></div>
                                                <div><?php echo $restaurant_branch[0]->branch_name; ?></div>
                                                <figure>
                                                         <?php if(!empty($res_mobile)): ?>
                                                        <?php foreach($res_mobile as $mobile_no): ?>
                                                    <div class="info">                                                      
                                                        <i class="fa fa-mobile"></i>  
                                                        <span><?php echo $mobile_no->mobile_no; ?></span>                                                        
                                                    </div>
                                                    <?php endforeach; 
                                                              endif;?>
                                                    
                                                    <?php if(!empty($res_phone)): ?>
                                                        <?php foreach($res_phone as $phone_no): ?>
                                                    <div class="info">                                                        
                                                       <i class="fa fa-phone"></i>
                                                        <span><?php echo $phone_no->phone_no; ?></span>                                                       
                                                    </div>
                                                        <?php endforeach; 
                                                              endif;?>
                                                    
                                                    <?php if(!empty($restaurant_detail->website_address)): ?>
                                                    <div class="info">
                                                        <i class="fa fa-globe"></i>
                                                        <a href="<?php echo $restaurant_detail->website_address; ?>" target="_blank"><?php echo $restaurant_detail->website_address; ?></a>     
                                                    </div>
                                                    <?php endif; ?>
                                                </figure>
                                            </address>
                                        </section>
                                        <!--end Contact-->
                                        <!--Rating-->
                                        <section class="clearfix">
                                            <header class="pull-left"><a href="#reviews" class="roll"><h3>Rating</h3></a></header>
                                            <figure class="rating big pull-right" data-rating="4"></figure>
                                        </section>
                                        <!--end Rating-->
                                        <!--Events-->
                                        
                                        <section>
                                           <header><h2>Opening Hours</h2></header>
                                           
                                            <?php if(!empty($restaurant_timing)){ ?>                                          
                                            <ul style="list-style-type:none">
                                            
                                            <?php foreach( $restaurant_timing as $timing){ ?>    
                                                <li><b><?php echo $timing->day;  ?>:</b> <?= $timing->start_time; ?> - <?=$timing->end_time; ?></li>                                               
                                            <?php } ?>
                                            </ul>
                                            <?php } else {?>
                                                <p>Not Available</p>
                                            <?php } ?>
                                        </section>
                                        
                                          <!--sidebar categories-->
                                          <br>
                                        <section>                                         
                                           <header><h2>Categories</h2></header>
                                           <ul class="bullets">
                                               <?php
                                               if(!empty($cuisine_type)){
                                               foreach ($cuisine_type as $cuisine) { ?>
                                                   <li><?php echo $cuisine->tag_name; ?></li>
                                               <?php } } else{ ?>
                                                   <p>No Category Selected</p>
                                               <?php } ?>
                                           </ul>
                                        </section>
                                          
                                        <?php if(!empty($restaurant_tag)){ ?>
                                          <br>
                                          <section>                                         
                                           <header><h2>Restaurant Tags</h2></header>
                                           <ul class="bullets">
                                               <?php
                                              
                                               foreach ($restaurant_tag as $tag) { ?>
                                                   <li><?php echo $tag->tag; ?></li>
                                               <?php } ?>
                                           </ul>
                                        </section>
                                        <?php } ?>  

                                          <?php if(!empty($socail_acc) AND $socail_acc[0]->link !=""){ ?>
                                            <br>                                            
                                        <section>                                         
                                           <header><h2>Socia Links</h2></header>                                           
                                           <ul class="list-inline">
                                            <?php foreach($socail_acc as $social) {?>  
                                            <?php
                                            $social_class= "";
                                                if($social->social_acc_id == 1)
                                                {
                                                    $social_class = 'fa-facebook';
                                                }
                                                else if($social->social_acc_id == 2)
                                                {
                                                    $social_class = 'fa-twitter';
                                                }
                                                else if($social->social_acc_id == 3)
                                                {
                                                    $social_class = 'fa-instagram';
                                                }
                                                else if($social->social_acc_id == 4)
                                                {
                                                    $social_class = 'fa-google-plus';
                                                }
                                                else if($social->social_acc_id == 5)
                                                {
                                                    $social_class = 'fa-snapchat';
                                                }
                                                else if($social->social_acc_id == 6)
                                                {
                                                    $social_class = 'fa-youtube';
                                                }
                                                else if($social->social_acc_id == 7)
                                                {
                                                    $social_class = 'fa-pinterest';
                                                }
                                                else if($social->social_acc_id == 8)
                                                {
                                                    $social_class = 'fa-flickr';
                                                }
                                                else if($social->social_acc_id == 9)
                                                {
                                                    $social_class = 'fa-tumblr';
                                                }
                                            ?>
                                            <li><a href="<?php echo $social->link; ?>" target="_blank"><i class="fa <?php echo $social_class; ?>"></i></a></li>                                  
                                            <?php } ?>
                                           </ul>                                       
                                        </section>
                                            <?php } ?>
                                          
                                          
                                       
                                    </aside>
                                    <!--end Detail Sidebar-->
                                    <!--Content-->
                                    <div class="col-md-8 col-sm-8">
                                        <section>  

                                            <header class="page-title">
                                                <div class="title">
                                                    <h1><?php if(!empty($restaurant_detail->name)) { echo $restaurant_detail->name; } ?> </h1>                                      
                                                </div>                                   
                                            </header>

                                            <div class="restaurant-logo" style="margin-bottom: 20px;">
                                                <?php
                                                $logo_image = "";                                                
                                                if (!empty($restaurant_detail->logo_url)) {
                                                    $logo_image = $restaurant_detail->logo_url;
                                                } else {    
                                                    $logo_image = "http://www.bitesup.com/masterbites/uploads/restaurantimages/2ibkt.jpg"; // The image doesn't exist
                                                }
                                                ?>
                                                <img src="<?php echo $logo_image; ?>" alt="logo" width="200" height="150">
                                            </div>
                                      

                                           
                                            <?php if(!empty($promotion_banners)){ ?>
                                            <article class="item-gallery">
                                                
                                            <div id="cage"> 
                                                <div class="owl-carousel item-slider">
                                                    <?php
                                                    $count_banner=1;
                                                    foreach($promotion_banners as $banner){ ?>
                                                    <div class="slide"><img src="<?php echo $banner->image_url; ?>" data-hash="<?php echo $count_banner; ?>" alt=""></div>
<!--                                                <div class="slide"><img src="assets/img/items/2.jpg" data-hash="2" alt=""></div> -->
                                                    <?php 
                                                    $count_banner++; 
                                                    }//end foreach
                                                    ?>
                                                </div>
                                            </div> 

                                                <!-- /.item-slider -->
                                                <div class="thumbnails">
                                                <?php if($promotion_banners >= 5){ ?>
                                                    <span class="expand-content btn framed icon" data-expand="#gallery-thumbnails" >More<i class="fa fa-plus"></i></span>
                                                <?php } ?>    
                                                    <div class="expandable-content height collapsed show-70" id="gallery-thumbnails">
                                                        <div class="content">
                                                    <?php
                                                    $count_banner=1;
                                                    foreach($promotion_banners as $banner){ ?>
                                                            <a href="#<?php echo $count_banner; ?>" onclick="show_logo()" id="thumbnail-<?php echo $count_banner;?>" <?php if($count_banner==1){ ?>class="active"<?php } ?>><img src="<?php echo $banner->image_url; ?>" alt="" width="85" height="65"></a>
                                                        <!--<a href="#2" id="thumbnail-2"><img src="assets/img/items/2.jpg" alt=""></a> -->
                                                            
                                                       <?php 
                                                       $count_banner++;
                                                       }//end foreach ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <script type="text/javascript">
                                                function show_logo(){
                                                    $(".restaurant-logo").hide(); 
                                                    $("#cage").show();                                                     
                                                }
                                                </script>
                                                
                                            </article>
                                            <?php } //end if condition for banners ?>
                                            
                                            <!-- /.item-gallery -->
                                            
                                            <?php if(!empty($restaurant_detail->description)){ ?>
                                            <article class="block">
                                                <header><h2>Description</h2></header>
                                                <p><?php echo $restaurant_detail->description; ?></p>
                                            </article>
                                            <?php } ?>
                                            
                                            <!-- /.block -->
<!--                                            <article class="block">
                                                <header><h2>Daily Menu</h2></header>
                                                <div class="list-slider owl-carousel">
                                                    <div class="slide">
                                                        <header>
                                                            <h3><i class="fa fa-calendar"></i>Monday (today)</h3>
                                                        </header>
                                                        <div class="list-item">
                                                            <div class="left">
                                                                <h4>Chicken wings</h4>
                                                                <figure>Curabitur odio nibh, luctus non pulvinar</figure>
                                                            </div>
                                                            <div class="right">$4.50</div>
                                                        </div>
                                                         /.list-item 
                                                        <div class="list-item">
                                                            <div class="left">
                                                                <h4>Mushroom ragout</h4>
                                                                <figure>Donec a odio rutrum, hendrerit sapien</figure>
                                                            </div>
                                                            <div class="right">$3.60</div>
                                                        </div>
                                                         /.list-item 
                                                        <div class="list-item">
                                                            <div class="left">
                                                                <h4>Nice salad with tuna, beans and hard-boiled egg</h4>
                                                                <figure>Urabitur suscipit, justo eu dignissim lacinia </figure>
                                                            </div>
                                                            <div class="right">$1.20</div>
                                                        </div>
                                                         /.list-item 
                                                    </div>
                                                     /.slide 
                                                    <div class="slide">
                                                        <header>
                                                            <h3><i class="fa fa-calendar"></i>Tuesday</h3>
                                                        </header>
                                                        <div class="list-item">
                                                            <div class="left">
                                                                <h4>Chicken wings</h4>
                                                                <figure>Curabitur odio nibh, luctus non pulvinar</figure>
                                                            </div>
                                                            <div class="right">$4.50</div>
                                                        </div>
                                                         /.list-item 
                                                        <div class="list-item">
                                                            <div class="left">
                                                                <h4>Mushroom ragout</h4>
                                                                <figure>Donec a odio rutrum, hendrerit sapien</figure>
                                                            </div>
                                                            <div class="right">$3.60</div>
                                                        </div>
                                                         /.list-item 
                                                        <div class="list-item">
                                                            <div class="left">
                                                                <h4>Nice salad with tuna, beans and hard-boiled egg</h4>
                                                                <figure>Urabitur suscipit, justo eu dignissim lacinia </figure>
                                                            </div>
                                                            <div class="right">$1.20</div>
                                                        </div>
                                                         /.list-item 
                                                    </div>
                                                     /.slide 
                                                </div>
                                                 /.list-slider 
                                            </article>-->
                                            <!-- /.block -->
                                            

                                            <article class="block">
                                                <?php if(!empty($most_used_tags)){ ?>
                                                <header><h2>Features Tags</h2></header>
                                                <ul class="bullets">
                                                   <?php foreach($most_used_tags as $row) { ?>
                                                    <li><?php echo $row->tag_name; ?></li>                                                    
                                                   <?php }//end foreach ?>
                                                </ul>
                                                <?php }//End if condition ?>
                                            </article>

                                        </section>
                                        
                                           <?php // echo "<pre>"; print_r($restaurant_branch); exit; ?>                                     
                                        <!--Reviews-->
                                        <section class="block" id="reviews">
                                            <header class="clearfix">
                                                <h2 class="pull-left">Reviews</h2>
                                                <a href="#write-review" class="btn framed icon pull-right roll">Write a review <i class="fa fa-pencil"></i></a>
                                            </header>
                                      
                                            <section class="reviews">
                                                
                                            <?php if(!empty($restaurant_review)){ ?>  
                                                <?php foreach($restaurant_review as $review){ ?>
                                                <article class="review">
                                                    <figure class="author">
                                                        <?php if($review->user_image != 'NULL' AND "") { ?>
                                                        <img src="<?php echo $review->user_image; ?>" alt="">
                                                        <?php } else { ?>
                                                        <img src="<?php echo base_url(); ?>assets/img/default-avatar.png" alt="">
                                                        <?php } ?>
                                                        <?php
                                                        $doc= $review->coments_date;
                                                        $date = date('d-M-Y h:i A', strtotime($doc));
                                                        ?>
                                                        <div class="date" style="width: 130px; margin-top: 2px;"><?php echo $date; ?></div>
                                                    </figure>
                                                    <!-- /.author-->
                                                    <div class="wrapper">
                                                        <h5><?php echo $review->first_name." ".$review->last_name;  ?></h5>
                                                        <figure class="rating big color" data-rating="<?php if(!empty($review->user_rating)){ echo $review->user_rating; } ?>"></figure>
                                                        
                                                        <p style="margin-top:17px;"><?php echo $review->rec_comments; ?></p>    
                                                    </div>
                                                    <!-- /.wrapper-->
                                                </article>
                                                <?php }//End foreach ?>
                                            <?php } else { //start Else condition ?>
                                                <p>No Comment in Found in This Restaurant</p>
                                            <?php } //end else and if condition ?>
                                                
                                                                                               
                                            </section>
                                            <!-- /.reviews-->
                                        </section>
                                        <!-- /#reviews -->
                                        <!--end Reviews-->
                                        <!--Review Form-->
                                        <section id="write-review">
                                            <header>
                                                <h2>Write a Review</h2>
                                            </header>
                                            
                                            <form id="form-review" role="form" name="user_restaurant_review" method="post" action="<?php echo base_url(); ?>restaurant/add_user_review" class="background-color-white">
                                                <input type="hidden" id="user_id" name="user_id" value="30">
                                                <input type="hidden" id="date" name="date" value="<?php echo date("Y-m-d h:i:s"); ?>">
                                                <input type="hidden" id="restaurant_id" name="restaurant_id" value="<?php echo $restaurant_detail->id; ?>">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                                                                                
                                                        <div class="form-group">
                                                            <label for="form-review-message">Message</label>
                                                            <textarea class="form-control" id="review_message" name="review_message"  rows="3" required=""></textarea>
                                                        </div>
                                                        <!-- /.form-group -->
                                                        <div class="form-group">
                                                            <input type="submit" class="btn btn-default" id="submit_comment" name="submit_comment" value="Submit Review">
                                                        </div>
                                                        <!-- /.form-group -->
                                                    </div>
                                                    <div class="col-md-4">
                                                        <aside class="user-rating">
                                                            <label>Your Rating</label>
                                                            <figure class="rating active" id="rating" data-name="value"></figure>
                                                        </aside>
                                                        
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- /.main-search -->
                                        </section>
                                        <!--end Review Form-->
                                    </div>
                                    <!-- /.col-md-8-->
                                </div>
                                <!-- /.row -->
                            </section>
                            <!-- /#main-content-->
                        </div>
                        <!-- /.col-md-8-->
                        <!--Sidebar-->
                        <div class="col-md-3" style="margin-top: 50px;">
                            <aside id="sidebar">
                                                                
                               <!-- Featured Restaurant start-->    
                               <?php if(!empty($featured_restaurant)){ ?>
                                <section>
                                    <header><h2>Featured Restaurant</h2></header>
                                    <?php foreach($featured_restaurant as $featured_res) { ?>
                                    <a href="<?= base_url() ?>restaurant/restaurant_detail/<?php echo $featured_res->restaurant_id; ?>" class="item-horizontal small">
                                        <h3><?php echo $featured_res->restaurant_name; ?></h3>
                                        <figure><?php echo $featured_res->city_name .", ". $featured_res->country_name; ?></figure>
                                        <div class="wrapper">
                                            <?php
                                                $imagename = "";
                                                $url = @getimagesize($featured_res->logo_url);
                                                if (@!is_array($url)) {
                                                    $imagesname = "http://www.bitesup.com/masterbites/uploads/restaurantimages/2ibkt.jpg"; // The image doesn't exist
                                                } else {
                                                    $imagesname = $featured_res->logo_url;
                                                }
                                            ?>
                                            <div class="image"><img src="<?php echo $imagesname; ?>" alt=""></div>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="<?php echo base_url(); ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                    <span><?php echo $featured_res->cousine_name; ?></span>
                                                </div>
                                                <div class="rating" data-rating="4"></div>
                                            </div>
                                        </div>
                                    </a>
                                    <?php }// end foreach ?>                           
                                </section>    
                               <?php } ?>
                    <!-- Featured Restaurant End-->
                    
                    
                    
                    
                    <!-- Featured Reviews Start-->
                    <?php if(!empty($user_reviews)){ ?>
                            <section>
                                <header><h2>Featured Review</h2></header>
                                <?php foreach($user_reviews as $featured_rev ){ ?>
                            <?php
                            $user_image = "";
                            $url = @getimagesize($featured_rev->user_image);
                            if (@!is_array($url)) {
                                $user_image = base_url()."uploads/profile_images/member-3t.jpg"; // The image doesn't exist
                            } else {
                                $user_image = $featured_rev->user_image;
                            }
                            ?>
                                <a href="#" class="item-horizontal small">
                                    <h3><?php echo $featured_rev->first_name ." ". $featured_rev->last_name; ?></h3>
                                     <figure><?php echo $featured_rev->country_name; ?></figure>
                                    <div class="wrapper">
                                        <div class="image"><img src="<?php echo $user_image; ?>" alt=""></div>
                                        <div class="info">
                                            <div class="type">                                               
                                                <span><?php echo $featured_rev->user_comments; ?> Reviews</span>
                                            </div>
                                            <div class="rating" data-rating="4"></div>
                                            
                                        </div>
                                    </div>
                                </a>  
                                <?php } ?>
                            </section>
                    <?php } //end if ?>
                    <!-- Featured Reviews End-->
                                                      
                            </aside>
                            <!-- /#sidebar-->
                        </div>
                        <!-- /.col-md-3-->
                        <!--end Sidebar-->
                    </div><!-- /.row-->
                </section>
                <!-- /.container-->
            </div>
<!-- end Page Content-->

<script>
    /*
$(document).ready(function(){
$("#submit_comment").click(function(){
var user_id = $("#user_id").val();
var date = $("#date").val();
var restaurant_id = $("#restaurant_id").val();
var review_message = $("#review_message").val();
var rating = $("#rating").val();
// Returns successful data submission message when the entered information is stored in database.
var dataString = 'name1='+ user_id + '&email1='+ date + '&password1='+ restaurant_id + '&contact1='+ review_message + '&contact1='+ rating;
if(name==''||email==''||password==''||contact=='')
{
alert("Please Fill All Fields");
}
else
{
// AJAX Code To Submit Form.
$.ajax({
type: "POST",
url: "ajaxsubmit.php",
data: dataString,
cache: false,
success: function(result){
alert(result);
}
});
}
return false;
});
});
*/
</script>