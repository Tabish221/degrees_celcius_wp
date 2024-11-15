<?php
   get_header();
   // $page_id = get_the_ID();
   // $sec1 = get_field('comic_and_chapter', $page_id);
   // $catData = get_queried_object();
?>



<?php 
   // $cat = get_categories(array('taxonomy'=>'comic'));


   
?>


<?php 
   $getComics = get_terms(['taxonomy'=>'comic', 'hide_empty'=>false]);

   if (!empty($getComics) && !is_wp_error($getComics)) { 

      foreach ($getComics as $comicsCat) {
         $meta_image = get_wp_term_image($comicsCat->term_id);
         $sec1 = get_taxonomy_field('group', $comicsCat->term_id, 'comic');
?>
    <section class="comicSection1 v1">
      <div class="container">
         <div class="row">
            <div class="col-md-6">
               <div class="comicSec-img">
                  <img src="<?php echo $meta_image; ?>" alt="Comics">
               </div>
            </div>

            <div class="col-md-6">
               <div class="comicSec-cont">
                  <span class="fs-xs">
                     <em><?php echo $sec1['tag'] ?></em>
                     <?php echo $sec1['title'] ?>
                  </span>
                  <h4 class="fs-lg"><?php echo $comicsCat->name;  ?></h4>

                  <p class="fs-p1"><?php echo $comicsCat->description;  ?></p>

                  <div class="comicSec-chapters">
                        <?php 
                           $wpcomic = array(
                              'post_type'=>'comics',
                              'post_status'=>'publish',
                              'orderby'=>'date',
                              'order'=>'ASC',
                              'tax_query' => array([
                                 'taxonomy'=>'comic',
                                 'field'=>'term_id',
                                 'terms'=>$comicsCat->term_id
                              ]),
                           );
                        
                           $comicQurey = new WP_Query($wpcomic);

                           if ($comicQurey->have_posts()) {
                        ?>
                           <h5 class="fs-md">Chapters</h5>
                           
                           <ul>
                        <?php
                           while ($comicQurey->have_posts()) {
                              $comicQurey->the_post();
                              $imagepath = wp_get_attachment_image_src(get_post_thumbnail_id() , 'large');
                        ?>
                           <li>
                              <a href="<?php echo the_permalink() ?> ">
                                 <div class="img">
                                    <img src="<?php echo $imagepath[0]; ?>" alt="Chapter #1 Icon">
                                 </div>
   
                                 <div class="cont">
                                    <h6><?php echo the_title(); ?></h6>
                                    <span><?php echo get_the_date() ?></span>
                                 </div>
                              </a>
                           </li>

                           <!-- <div class="comicSec-tags">
                              <h5 class="fs-md">Tags</h5>
         
                              <ul>
                                 <li><a href="#">Romance</a></li>
                                 <li><a href="#">Drama</a></li>
                                 <li><a href="#">Slice of Life</a></li>
                                 <li><a href="#">Angst</a></li>
                                 <li><a href="#">Sports</a></li>
                                 <li><a href="#">Coming of age</a></li>
                                 <li><a href="#">First love</a></li>
                                 <li><a href="#">Childhood friends</a></li>
                                 <li><a href="#">Double identity</a></li>
                                 <li><a href="#">Lovey dovey</a></li>
                                 <li><a href="#">Completed</a></li>
                                 <li><a href="#">Gem Only</a></li>
                              </ul>
                           </div> -->
                        <?php } ?>
                     </ul>
                     
                     <?php } else { ?>
                        <span class="fs-xs">
                           Chapters
                        </span>
                        <h4 class="fs-lg">Coming Soon</h4>
                     <?php } ?>
                  </div>
                  
                  <!-- <li>
                     <div class="img">
                        <img src="assets/images/comic/sec1/chapter2.jpg" alt="Chapter #2 Icon">
                     </div>

                     <div class="cont">
                        <h6>Chapter 2</h6>
                        <span>Dec 16, 2020</span>
                     </div>
                  </li> -->
               </div>
            </div>
         </div>
      </div>
   </section>

<?php } } get_footer(); ?>