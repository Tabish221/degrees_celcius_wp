<?php
get_header();
$page_id = get_the_ID();
$section_image = get_field('comic_and_chapter', $page_id);
$catData = get_queried_object();

$terms = wp_get_post_terms($page_id, 'comic');
?>





<?php
// $getComics = get_terms(['taxonomy'=>'comic', 'hide_empty'=>false]);

if (!empty($terms) && !is_wp_error($terms)) {

   foreach ($terms as $comicsCat) {
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
                           'post_type' => 'comics',
                           'post_status' => 'publish',
                           'orderby' => 'date',
                           'order' => 'ASC',
                           'tax_query' => array([
                              'taxonomy' => 'comic',
                              'field' => 'term_id',
                              'terms' => $comicsCat->term_id
                           ]),
                        );

                        $comicQurey = new WP_Query($wpcomic);

                        if ($comicQurey->have_posts()) {
                        ?>
                           <h5 class="fs-md">Chapters</h5>

                           <ul>
                              <?php
                              // Get the full current URL (including query strings) and sanitize it
                              $current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                              $current_url = untrailingslashit($current_url); // Remove trailing slash if any


                              while ($comicQurey->have_posts()) {
                                 $comicQurey->the_post();
                                 $imagepath = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');

                                 // Use get_the_permalink() to retrieve the permalink
                                 $category_link = untrailingslashit(get_the_permalink());
                                 // Check if the current page URL matches the category link
                                 $active_class = ($current_url == $category_link) ? 'active' : '';
                              ?>
                                 <li class="<?php echo $active_class; ?>">
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
                              <?php } ?>
                           </ul>
                     </div>

                     <?php
                           $post_tags = get_the_tags($catData->id);

                           if (!empty($post_tags)) {
                     ?>
                        <div class="comicSec-tags">
                           <h5 class="fs-md">Tags</h5>

                           <ul>
                              <?php
                              foreach ($post_tags as $tag) {
                              ?>
                                 <li><a href="#"><?php echo $tag->name ?></a></li>
                              <?php } ?>
                           </ul>
                        </div>
                     <?php } ?>

                  <?php } else { ?>
                     <span class="fs-xs">
                        Chapters
                     </span>
                     <h4 class="fs-lg">Coming Soon</h4>
                  <?php } ?>
                  </div>
               </div>
            </div>

         <?php } ?>
         <div class="chapter-viewArea">
            <?php
            $section = $section_image['group_image'];
            if ($section) {


               $x = 1;
               foreach ($section as $sec) {
            ?>
                  <div class="chapter-img">
                     <a href="<?php echo $sec['images']; ?>" data-fancybox='chapter #1'>
                        <img src="<?php echo $sec['images']; ?>" alt="Page <?php echo $x; ?>">
                     </a>
                  </div>


               <?php
                  $x++;
               }
            } else {
               ?>

               <h4 class="fs-lg">Chapter Coming Soon!</h4>

            <?php } ?>


         </div>
         </div>
      </section>

   <?php }
get_footer(); ?>