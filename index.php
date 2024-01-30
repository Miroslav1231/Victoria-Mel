<?php get_header(); ?>
<main class="main">
<section class="intro">      
    <img src="assets/images/photographer.png" class="intro__mobile-img">
    <div class="wrapper">
    <div class="intro__content">
        <div class="intro-text-content">
            <h1>Hello! i’m Victoria! <br>  Professional photographer  from Cuopio  </h1>
            <a href="#" class="button-link">Contact us</a> 
        </div>
        <?php
            $slug = 'intro-image';
            $args = array(
                'name'           => $slug,
                'post_type'      => 'post',
                'post_status'    => 'publish',
                'posts_per_page' => 1
            );
            $postsResult = get_posts($args);

            if( $postsResult ) {
                echo get_the_post_thumbnail( $postsResult[0] -> ID, 'full' , ['class' => 'intro__img'] );
            } 
        ?>
    </div>
    </h1>
    </div>
</section>

<h2 class="section-title">Portfolio</h2>
<section class="portfolio">
    <div class="wrapper">
        <div class="gallery" id="gallery">
            <?php if(have_posts()): while(have_posts()): the_post(); ?>
                <div class="gallery-item">
                    <div class="content"><?php the_post_thumbnail(); ?></div>
                </div>
            <?php endwhile; else: ?>
                <p>Portfolio is empty</p>
            <?php endif; ?>
        </div>
    </div>
</section>
</main>
<?php get_footer(); ?>