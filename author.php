


<?php
// Include the header
get_header();
?>
<div class="container mt-5 mb-5 text-black bg-white p-5 rounded">
  <div class="row author-profile">
    <div class="col-sm-12 col-md-6 col-lg-6 border-end">
      <?php echo get_avatar(get_the_author_meta("ID") , 200) ?>
      <p class="my-2 fst-italic"><?php the_author_meta("nickname") ?></p>
      <!-- start diplay the author posts -->
      <?php
        $query_args = array(
          "author"=>get_the_author_meta("ID") ,
          "posts per page"=>3
        );
        $author_query = new WP_Query($query_args) ;

      ?>
      <div class="row">
        <?php
        	if($author_query->have_posts()){ // start the condition
        		while ($author_query->have_posts()) { // start etirate posts if it exist
        			$author_query->the_post();
        ?>
          <div class="col-sm-4">
            <div class=" m-2 p-3 rounded">
              <h5>
                <a class="text-decoration-none text-info" href="<?php the_permalink() ?>">
                  <?php the_title() ?>
                </a>
              </h5>
              <?php the_post_thumbnail('' , ["class"=>"w-50 h-auto"]  )?>
            </div>
          </div>
        <?php
        	} // end etirate posts is exist
          wp_reset_postdata();
        }//end of condiion
        ?>
      </div>
      <!-- end of displaying author posts -->
    </div>
    <div class="col-sm-12 col-md-6 col-lg-6 auther-info">
      <div class="mb-5">
        <h3 class="my-3 text-body"><?php the_author_meta("first_name");echo " " ;the_author_meta("last_name") ?></h3>
        <p class="lh-5 text-secondary"><?php  the_author_meta('description') ?></p>
      </div>
      <hr>
      <div class="row">
        <div class="col-sm-6 col-md-6">
          <div class="bg-secondary text-center p-3 rounded m-2 text-white posts-count">
            posts <span class="d-block"><?php echo count_user_posts(get_the_author_meta("ID")) ; ?></span>
          </div>
        </div>
        <div class="col-sm-6 col-md-6">
          <div class="bg-secondary text-center p-3 rounded m-2 text-white commenst-count">
            <?php
              $args = array(
                'user_id' => get_the_author_meta("ID"),   // Use user_id.
                'count'   => true // Return only the count.
              );
              $comments_count = get_comments( $args );
            ?>
            coments <span class="d-block"><?php echo $comments_count ?></span>
          </div>
        </div>
        <div class="col-sm-6 col-md-6">
          <div class="bg-secondary text-center p-3 rounded m-2 text-white total-post-view">
             view <span class="d-block">100</span>
          </div>
        </div>
        <div class="col-sm-6 col-md-6">
          <div class="bg-secondary text-center p-3 rounded m-2 text-white commenst-count">
            view <span class="d-block">100</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
















  <?php get_footer() ?>
