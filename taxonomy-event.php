<?php 

get_header(); 

$event = get_term( get_queried_object_id() ); // get current term

?>

<main class="main main--padding-top">
    <h2 class="section-title"><?= $event -> name ?></h2>
    <section class="event">
      <div class="wrapper">
        <p class="event__description"><?= $event -> description ?></p>
      </div>
    </section>

    <section class="event-images">
      <div class="wrapper">
        <div class="images">
          <?php 
          
          ?>
          <div class="images__item">
              <img src="assets/images/about_event.png" alt="">
          </div>
        </div>
      </div>
    </section>

    <section class="packages">
      <div class="wrapper">
      <h3 class="packages__title">Prices</h3>
      <div class="packages__container">
        
        <?php 
            $eventPackages = get_terms('event', array(
                'hide_empty' => true,
                'parent' => $event -> term_id,
            ));

            foreach ($eventPackages as $key => $eventPackage):
                $args = array(
                    'tax_query' => [
                        [
                            'taxonomy' => 'event',
                            'field'    => 'id',
                            'terms'    => $eventPackage -> term_id
                        ]
                    ],
                );
                $postsResult = get_posts($args);    
        ?>
            <div class="package">
            <h3 class="package__title"><?= $postsResult[0] -> post_title ?></h3>
            <p class="package__price"><?= get_post_custom_values( 'price', $postsResult[0] -> ID )[0]; ?></p>
            <!-- <ul class="package__about"> -->
                <?= $postsResult[0] -> post_content ?>
            <!-- </ul> -->
            </div>
        <?php endforeach; ?>
      </div>
      <a href="#" class="button-link">Contact us</a>  
    </div>
    </section>
  </main>

<?php get_footer(); ?>