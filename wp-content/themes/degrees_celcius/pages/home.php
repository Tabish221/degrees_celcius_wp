<?php
   // Template Name: Home
   get_header();

   $banner = get_field('banner', 9);
   $sec1 = get_field('featured_section', 9);
   $sec2 = get_field('discover_section', 9);
   $sec3 = get_field('characters_section', 9);
   $sec4 = get_field('testimonials_section', 9);
   $sec5 = get_field('gallery_section', 9);
?>

<section class="mainBanner">
   <div class="container">
      <div class="mainBanner-cont">
         <h2><?php echo $banner['sub_heading'] ?> <span class="wave">👋</span></h2>
         <h1><?php echo $banner['heading'] ?></h1>
         <p><?php echo $banner['content'] ?></p>

         <a href="<?php $x = $sec1['button_url']; if($x == null || $x == '#'){ echo get_permalink(18); } else {echo $x; } ?>" class="themeBtn alt">
            <span class="button-text"><?php echo $banner['button_text'] ?></span>
            <div class="corner bottom-left"></div>
            <div class="corner top-right"></div>
         </a>
      </div>
   </div>
</section>

<section class="featureSection">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-md-7">
            <div class="featureSec-img">
               <?php
                  $x=1;
                  $section =  $sec1['image_group'];
                  foreach( $section as $sec ) { 
               ?> 
               <img src="<?php echo $sec['image'] ?>" alt="Featured Images">
               <?php } ?>
            </div>
         </div>

         <div class="col-md-5">
            <div class="featureSec-cont">
               <span class="fs-xs"><?php echo $sec1['sub_heading'] ?></span>
               <h4 class="fs-lg"><?php echo $sec1['heading'] ?></h4>
               <p class="fs-p1"><?php echo $sec1['content'] ?></p>

               <a href="<?php $x = $sec1['button_url']; if($x == null || $x == '#'){ echo get_permalink(18); } else {echo $x; } ?>" class="themeBtn">
                  <span class="button-text"><?php echo $sec1['button_text'] ?></span>
                  <div class="corner bottom-left"></div>
                  <div class="corner top-right"></div>
               </a>
            </div>
         </div>
      </div>
   </div>
</section>

<section class="discoverSection">
   <div class="container">
      <div class="discoverSec-hd">
         <div class="row align-items-center">
            <div class="col-md-4">
               <div class="cont">
                  <span class="fs-xs"><?php echo $sec2['sub_heading'] ?></span>
                  <h4 class="fs-lg text-white"><?php echo $sec2['heading'] ?></h4>
               </div>
            </div>

            <div class="col-md-8">
               <div class="discoverSec-hdRight">
                  <div class="discoverSec-searchBar">
                     <input type="text" placeholder="Search">
                     <button class="searchBarBtn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="31" viewBox="0 0 28 31" fill="none">
                           <path d="M26.4448 27.6443L23.9559 25.1553M1.55591 14.5776C1.55591 8.04836 6.8489 2.75537 13.3782 2.75537C19.9074 2.75537 25.2003 8.04836 25.2003 14.5776C25.2003 21.1068 19.9074 26.3999 13.3782 26.3999C6.8489 26.3999 1.55591 21.1068 1.55591 14.5776Z" stroke="currentColor" stroke-width="1.86667" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                     </button>
                  </div>

                  <div class="discoverSec-nav">
                     <ul>
                        <li data-tabing="" class="current"><a href="#">View All</a></li>
                        <?php
                           $x=1;
                           $section =  $sec2['comics_nav'];
                           foreach( $section as $sec ) { 
                        ?> 
                           <li data-tabing="<?php echo $sec['title'] ?>"><a href="#"><?php echo $sec['title'] ?></a></li>
                        <?php } ?>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="discoverSec-main">
         <div class="discoverSec-error" style="display: none;">
            <span>Result Not Found!</span>
         </div>
         <div class="row">
            <?php
               $x=1;
               $section =  $sec2['comics_card'];
               foreach( $section as $sec ) { 
            ?> 
            <div class="col-md-3" data-showing="<?php echo $sec['tabing_title'] ?>" data-dis-search="<?php echo $sec['search_tag_add'] ?>">
               <a href="#" class="w-100">
                  <div class="discoverSec-card">
                     <div class="img">
                        <img src="<?php echo $sec['image'] ?>" alt="Discover Comics">
                     </div>

                     <div class="cont">
                        <h6 class="fs-sm"><?php echo $sec['title'] ?></h6>
                     </div>
                  </div>
               </a>
            </div>
            <?php } ?>
         </div>
      </div>
   </div>
</section>

<section class="characterSection">
   <div class="container-fluid pe-0">
      <div class="container-leftPadding">
         <div class="row">
            <div class="col-md-5">
               <div class="characterSec-cont">
                  <span class="fs-xs"><?php echo $sec3['sub_heading'] ?></span>
                  <h4 class="fs-lg"><?php echo $sec3['heading'] ?></h4>
                  <p class="fs-p1"><?php echo $sec3['content'] ?></p>
                  <a href="<?php $x = $sec5['button_url']; if($x == null || $x == '#'){ echo 'wiki/'; } else {echo $x; } ?>" class="themeBtn">
                     <span class="button-text"><?php echo $sec3['button_text'] ?></span>
                     <div class="corner bottom-left"></div>
                     <div class="corner top-right"></div>
                  </a>
               </div>
            </div>

            <div class="col-md-7 pe-0">
               <div class="characterSec-right">
                  <div class="swiper characterSwiper">
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

<section class="testimonialSection">
   <div class="container">
      <div class="testimonialSec-hd">
         <span class="fs-xs"><?php echo $sec4['sub_heading'] ?></span>
         <h4 class="fs-lg"><?php echo $sec4['heading'] ?></h4>
         <p class="fs-p1"><?php echo $sec4['content'] ?></p>
      </div>
   </div>

   <div class="container-fluid px-0">
      <div class="testimonialSec-main">
         <div class="swiper testimonialSwiper">
            <div class="swiper-wrapper">
               <?php
                  $x=1;
                  $section =  $sec4['card'];
                  foreach( $section as $sec ) { 
               ?> 

               <div class="swiper-slide">
                  <div class="testimonialSec-card">
                     <div class="img">
                        <img src="<?php echo $sec['profile'] ?>" alt="Client Profile">
                     </div>

                     <div class="cont">
                        <span class="ratingStar">
                           <svg xmlns="http://www.w3.org/2000/svg" width="121" height="19" viewBox="0 0 121 19" fill="none">
                              <path d="M9.82368 0.231874L12.5214 5.71603L18.5518 6.59566C18.6283 6.60704 18.7002 6.63957 18.7592 6.68957C18.8183 6.73957 18.8622 6.80506 18.886 6.87868C18.9099 6.95229 18.9127 7.0311 18.8942 7.10622C18.8756 7.18135 18.8365 7.24981 18.7812 7.30389L14.4183 11.5718L15.4484 17.5993C15.4617 17.6755 15.4534 17.7539 15.4243 17.8256C15.3953 17.8973 15.3468 17.9594 15.2843 18.005C15.2218 18.0505 15.1478 18.0776 15.0706 18.0832C14.9935 18.0888 14.9163 18.0727 14.8479 18.0367L9.45374 15.1914L4.05961 18.0375C3.99121 18.0736 3.91405 18.0899 3.83688 18.0844C3.75972 18.0788 3.68565 18.0518 3.62309 18.0063C3.56054 17.9608 3.51201 17.8986 3.48301 17.8269C3.45401 17.7552 3.44572 17.6768 3.45907 17.6006L4.48915 11.5718L0.125087 7.30389C0.0697532 7.24981 0.0306183 7.18135 0.01209 7.10622C-0.00643837 7.0311 -0.00362419 6.95229 0.0202156 6.87868C0.0440554 6.80506 0.0879739 6.73957 0.147025 6.68957C0.206076 6.63957 0.277915 6.60704 0.35445 6.59566L6.38488 5.71603L9.0838 0.231874C9.11746 0.162379 9.17001 0.103769 9.23544 0.0627598C9.30087 0.0217505 9.37652 0 9.45374 0C9.53096 0 9.60662 0.0217505 9.67204 0.0627598C9.73747 0.103769 9.79002 0.162379 9.82368 0.231874Z" fill="#FFBE00" />
                              <path d="M35.3471 0.231874L38.0448 5.71603L44.0752 6.59566C44.1518 6.60704 44.2236 6.63957 44.2827 6.68957C44.3417 6.73957 44.3856 6.80506 44.4095 6.87868C44.4333 6.95229 44.4361 7.0311 44.4176 7.10622C44.3991 7.18135 44.3599 7.24981 44.3046 7.30389L39.9418 11.5718L40.9719 17.5993C40.9851 17.6755 40.9768 17.7539 40.9478 17.8256C40.9188 17.8973 40.8703 17.9594 40.8077 18.005C40.7452 18.0505 40.6712 18.0776 40.5941 18.0832C40.5169 18.0888 40.4398 18.0727 40.3713 18.0367L34.9772 15.1914L29.583 18.0375C29.5146 18.0736 29.4375 18.0899 29.3603 18.0844C29.2832 18.0788 29.2091 18.0518 29.1465 18.0063C29.084 17.9608 29.0354 17.8986 29.0064 17.8269C28.9775 17.7552 28.9692 17.6768 28.9825 17.6006L30.0126 11.5718L25.6485 7.30389C25.5932 7.24981 25.5541 7.18135 25.5355 7.10622C25.517 7.0311 25.5198 6.95229 25.5437 6.87868C25.5675 6.80506 25.6114 6.73957 25.6705 6.68957C25.7295 6.63957 25.8014 6.60704 25.8779 6.59566L31.9083 5.71603L34.6072 0.231874C34.6409 0.162379 34.6935 0.103769 34.7589 0.0627598C34.8243 0.0217505 34.9 0 34.9772 0C35.0544 0 35.1301 0.0217505 35.1955 0.0627598C35.2609 0.103769 35.3135 0.162379 35.3471 0.231874Z" fill="#FFBE00" />
                              <path d="M60.8706 0.231874L63.5682 5.71603L69.5987 6.59566C69.6752 6.60704 69.747 6.63957 69.8061 6.68957C69.8652 6.73957 69.9091 6.80506 69.9329 6.87868C69.9568 6.95229 69.9596 7.0311 69.941 7.10622C69.9225 7.18135 69.8834 7.24981 69.828 7.30389L65.4652 11.5718L66.4953 17.5993C66.5086 17.6755 66.5002 17.7539 66.4712 17.8256C66.4422 17.8973 66.3937 17.9594 66.3312 18.005C66.2687 18.0505 66.1946 18.0776 66.1175 18.0832C66.0404 18.0888 65.9632 18.0727 65.8948 18.0367L60.5006 15.1914L55.1065 18.0375C55.0381 18.0736 54.9609 18.0899 54.8838 18.0844C54.8066 18.0788 54.7325 18.0518 54.67 18.0063C54.6074 17.9608 54.5589 17.8986 54.5299 17.8269C54.5009 17.7552 54.4926 17.6768 54.5059 17.6006L55.536 11.5718L51.172 7.30389C51.1166 7.24981 51.0775 7.18135 51.059 7.10622C51.0404 7.0311 51.0433 6.95229 51.0671 6.87868C51.0909 6.80506 51.1348 6.73957 51.1939 6.68957C51.253 6.63957 51.3248 6.60704 51.4013 6.59566L57.4318 5.71603L60.1307 0.231874C60.1643 0.162379 60.2169 0.103769 60.2823 0.0627598C60.3477 0.0217505 60.4234 0 60.5006 0C60.5778 0 60.6535 0.0217505 60.7189 0.0627598C60.7843 0.103769 60.8369 0.162379 60.8706 0.231874Z" fill="#FFBE00" />
                              <path d="M86.394 0.231874L89.0917 5.71603L95.1221 6.59566C95.1986 6.60704 95.2705 6.63957 95.3295 6.68957C95.3886 6.73957 95.4325 6.80506 95.4563 6.87868C95.4802 6.95229 95.483 7.0311 95.4645 7.10622C95.4459 7.18135 95.4068 7.24981 95.3515 7.30389L90.9886 11.5718L92.0187 17.5993C92.032 17.6755 92.0237 17.7539 91.9947 17.8256C91.9657 17.8973 91.9171 17.9594 91.8546 18.005C91.7921 18.0505 91.7181 18.0776 91.6409 18.0832C91.5638 18.0888 91.4866 18.0727 91.4182 18.0367L86.0241 15.1914L80.6299 18.0375C80.5615 18.0736 80.4844 18.0899 80.4072 18.0844C80.33 18.0788 80.256 18.0518 80.1934 18.0063C80.1309 17.9608 80.0823 17.8986 80.0533 17.8269C80.0243 17.7552 80.016 17.6768 80.0294 17.6006L81.0595 11.5718L76.6954 7.30389C76.6401 7.24981 76.6009 7.18135 76.5824 7.10622C76.5639 7.0311 76.5667 6.95229 76.5905 6.87868C76.6144 6.80506 76.6583 6.73957 76.7173 6.68957C76.7764 6.63957 76.8482 6.60704 76.9248 6.59566L82.9552 5.71603L85.6541 0.231874C85.6878 0.162379 85.7403 0.103769 85.8058 0.0627598C85.8712 0.0217505 85.9468 0 86.0241 0C86.1013 0 86.1769 0.0217505 86.2424 0.0627598C86.3078 0.103769 86.3603 0.162379 86.394 0.231874Z" fill="#FFBE00" />
                              <path d="M111.917 0.231874L114.615 5.71603L120.646 6.59566C120.722 6.60704 120.794 6.63957 120.853 6.68957C120.912 6.73957 120.956 6.80506 120.98 6.87868C121.004 6.95229 121.006 7.0311 120.988 7.10622C120.969 7.18135 120.93 7.24981 120.875 7.30389L116.512 11.5718L117.542 17.5993C117.555 17.6755 117.547 17.7539 117.518 17.8256C117.489 17.8973 117.441 17.9594 117.378 18.005C117.316 18.0505 117.242 18.0776 117.164 18.0832C117.087 18.0888 117.01 18.0727 116.942 18.0367L111.547 15.1914L106.153 18.0375C106.085 18.0736 106.008 18.0899 105.931 18.0844C105.853 18.0788 105.779 18.0518 105.717 18.0063C105.654 17.9608 105.606 17.8986 105.577 17.8269C105.548 17.7552 105.539 17.6768 105.553 17.6006L106.583 11.5718L102.219 7.30389C102.164 7.24981 102.124 7.18135 102.106 7.10622C102.087 7.0311 102.09 6.95229 102.114 6.87868C102.138 6.80506 102.182 6.73957 102.241 6.68957C102.3 6.63957 102.372 6.60704 102.448 6.59566L108.479 5.71603L111.178 0.231874C111.211 0.162379 111.264 0.103769 111.329 0.0627598C111.395 0.0217505 111.47 0 111.547 0C111.625 0 111.7 0.0217505 111.766 0.0627598C111.831 0.103769 111.884 0.162379 111.917 0.231874Z" fill="#FFBE00" />
                           </svg>
                        </span>

                        <p class="fs-p2"><?php echo $sec['reviews_content'] ?></p>

                        <h6>
                           <?php echo $sec['title'] ?>
                           <em><?php echo $sec['designation'] ?></em>
                        </h6>
                     </div>
                  </div>
               </div>

               <?php $x++; } ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
         </div>
      </div>
   </div>
</section>

<section class="gallerySection">
   <div class="container">
      <div class="gallerySec-hd">
         <span class="fs-xs"><?php echo $sec5['sub_heading'] ?></span>
         <h4 class="fs-lg"><?php echo $sec5['heading'] ?></h4>
         <p class="fs-p1"><?php echo $sec5['content'] ?></p>
      </div>

      <div class="gallerySec-main">
         <?php
            $x=1;
            $gallery =  $sec5['gallery'];
            foreach( $gallery as $gal ) { 
         ?> 
            <a href="<?php echo $gal ['image'] ?>" data-fancybox="Gallery" class="gallerySec-imageCard">
               <img src="<?php echo $gal ['image'] ?>" alt="Gallery Image">
            </a>

         <?php $x++; } ?>
      </div>

      <div class="gallerySec-bottom">
         <a href="<?php $x = $sec5['button_url']; if($x == null || $x == '#'){ echo get_permalink(22); } else {echo $x; } ?>" class="themeBtn">
            <span class="button-text"><?php echo $sec5['button_text'] ?></span>
            <div class="corner bottom-left"></div>
            <div class="corner top-right"></div>
         </a>
      </div>
   </div>
</section>

<?php get_footer(); ?>