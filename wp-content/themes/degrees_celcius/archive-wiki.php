<?php 
   get_header(); 
   $sec3 = get_field('characters_section', 9);
?>

<section class="characterSection v1">
   <div class="container">
      <div class="">
         <div class="row">
            <div class="col-md-12">
               <div class="characterSec-cont justify-content-center align-items-center gap-4 px-5 m-auto w-75 text-center">
                  <span class="fs-xs"><?php echo $sec3['sub_heading'] ?></span>
                  <h4 class="fs-lg"><?php echo $sec3['heading'] ?></h4>
                  <p class="fs-p1"><?php echo $sec3['content'] ?></p>
               </div>
            </div>

            <div class="col-md-12">
               <div class="characterSec-right">
                  <div class="swiper characterSwiper1">
                     <div class="swiper-wrapper">

                     <?php 
                           $wpchar = array(
                              'post_type'=>'wiki',
                              'post_status'=>'publish',
                           );

                           $charwurey = new WP_Query($wpchar);

                           while ($charwurey->have_posts()) {
                              $charwurey->the_post();

                              $imagepath = wp_get_attachment_image_src(get_post_thumbnail_id() , 'large')
                           
                        ?>

                        <div class="swiper-slide">
                           <div class="characterSec-card">
                              <div class="img">
                                 <img src="<?php echo $imagepath[0] ?>" alt="Comic Character">
                              </div>

                              <div class="cont">
                                 <h6 class="fs-sm"><span><?php the_title(); ?></span></h6>
                                 <a href="<?php echo get_permalink(); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor">
                                       <path d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z" />
                                    </svg>
                                 </a>
                              </div>
                           </div>
                        </div>

                        <?php 
                           } 
                        ?>

                        <?php 
                           $wpchar = array(
                              'post_type'=>'wiki',
                              'post_status'=>'publish',
                           );

                           $charwurey = new WP_Query($wpchar);

                           while ($charwurey->have_posts()) {
                              $charwurey->the_post();

                              $imagepath = wp_get_attachment_image_src(get_post_thumbnail_id() , 'large')
                           
                        ?>

                        <div class="swiper-slide">
                           <div class="characterSec-card">
                              <div class="img">
                                 <img src="<?php echo $imagepath[0] ?>" alt="Comic Character">
                              </div>

                              <div class="cont">
                                 <h6 class="fs-sm"><span><?php the_title(); ?></span></h6>
                                 <a href="<?php echo get_permalink(); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor">
                                       <path d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z" />
                                    </svg>
                                 </a>
                              </div>
                           </div>
                        </div>

                        <?php 
                           } 
                        ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<?php get_footer(); ?>





