<?php
   // Template Name: Gallery
   get_header();

   $banner = get_field('banner', 22);
   $gallery = get_field('gallery', 22);
?>

   <section class="mainBanner">
      <div class="container">
         <div class="mainBanner-cont">
            <h2><?php echo $banner ['sub_heading'] ?></h2>
            <h1><?php echo $banner ['heading'] ?></h1>
         </div>
      </div>
   </section>

   <section class="gallerySection">
      <div class="container">
         <div class="gallerySec-main">
            <?php
               $x=1; foreach( $gallery as $gal ) { ?> 

                  <a href="<?php echo $gal ['image'] ?>" data-fancybox="Gallery" class="gallerySec-imageCard">
                     <img src="<?php echo $gal ['image'] ?>" alt="Gallery Image">
                  </a>
            <?php $x++; } ?>
         </div>
      </div>
   </section>

<?php get_footer(); ?>