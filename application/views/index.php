<?php
$folder_name = $folder_name;
$page_name = $file_name;
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <?php include 'top.php'; ?>
        <title>Hungry Buddies</title>
    </head>
    <!-- Navigation-->
    <?php include $header_name . '.php'; ?>
    <!-- end Navigation-->
    <!-- Page Canvas-->
    <div id="page-canvas">
        <!--Off Canvas Navigation-->
        <?php include $nav_name . '.php'; ?>
        <!--end Off Canvas Navigation-->
        <?php include $folder_name . '/' . $page_name . '.php'; ?>
    </div>
    <!-- end Page Canvas-->
    <!--Page Footer-->
    <footer id="page-footer">
        <div class="inner">
            <div class="footer-top">
                        
 
 <div class="container">
 <div class="row">

  <div class="col-md-2">
   <ul style="list-style: none;">
    <li><strong>Business</strong></li>
    <li>Add a Restaurant</li>
    <li>Claim your Listing</li>
    <li>Business Login</li>
    <li>Guidelines</li>
    <li>Advertise</li>
   </ul>
  </div>
  <div class="col-md-2">
   <ul style="list-style: none;">
    <li><strong>About (Bitesup)</strong></li>
    <li>Bitesup (About us)</li>
    <li>Mobile Apps</li>
    <li>Developers</li>
    <li>Bitesup Blog</li>
    <li>Feedback</li>
    
    
   </ul>
  </div>
     <div class="col-md-2" style="float:right;">
   <ul class="list-inline">
    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
    <li><a href="#"><i class="fa fa-skype"></i></a></li>
   
    
    
   </ul>
  </div>
     
     
  <div class="clearfix"></div>
 </div>
</div>
      
      <div class="container">
 <div class="row">
  <div class="col-md-12">
   <ul class="list-inline" style="list-style: none;">
    <li><strong>Privacy</strong> </li>
    <li><strong>Term</strong></li>
    <li><strong>CSR</strong></li>
    <li><strong>Security</strong></li>
    <li><strong>Sitemap </strong></li>
    <li><strong>Contact Us</strong></li>
   
   </ul>
  </div><!-- col-12 -->
 </div><!-- row -->
</div>
           
<!-- container -->
                <!--/.container-->
            </div>
            <!--/.footer-top-->
            <div class="footer-bottom">
                <div class="container">
                    <span class="left">(C) Bites Up, All rights reserved</span>
                    <span class="right">
                        <a href="#page-top" class="to-top roll"><i class="fa fa-angle-up"></i></a>
                    </span>
                </div>
            </div>
            <!--/.footer-bottom-->
        </div>
    </footer>
    <!--end Page Footer-->
</div>
<!-- end Inner Wrapper -->
</div>
<!-- end Outer Wrapper-->
<?php include 'bottom.php'; ?>
<!--[if lte IE 9]>
       <script type="text/javascript" src="assets/js/ie-scripts.js"></script>
       <![endif]-->
</body>
</html>



