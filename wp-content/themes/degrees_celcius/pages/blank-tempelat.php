<?php
// Template Name: Blank Template
get_header();
?>

    <section class="mainBanner">
        <div class="container">
            <div class="mainBanner-cont">
            <h1><?php echo the_title(); ?></h1>
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