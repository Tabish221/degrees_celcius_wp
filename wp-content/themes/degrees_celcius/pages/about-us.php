<?php
   // Template Name: About Us
   get_header();

   $banner = get_field('banner', 18);
   $about_content = get_field('about_content', 18);
?>

   <section class="mainBanner">
      <div class="container">
         <div class="mainBanner-cont">
            <h2><?php echo $banner['sub_heading'] ?></h2>
            <h1><?php echo $banner['heading'] ?></h1>
         </div>
      </div>
   </section>

   <section class="aboutSection">
      <div class="container">
         <div class="aboutSec-cont">
            <?php 
               $section = $about_content['content_group'];
               $x=1; foreach( $section as $sec ) { ?> 
                  <h4 class="fs-lg1"><?php echo $sec['heading']; ?></h4>

                  <?php echo $sec['content']; ?>
            <?php $x++; } ?>
         </div>
      </div>
   </section>


<?php get_footer(); ?>