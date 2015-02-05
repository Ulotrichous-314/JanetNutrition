<?php get_header(); ?>
        <div id="main">
            <div id="content">
            <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                    <div <?php post_class() ?>>
                            <h1><?php the_title(); ?></h1>
                            <?php the_content(); ?>
                    </div>
            <?php endwhile; ?>
            <?php else: ?>
                    <h2><?php _e('Nothing Found','jn') ?></h2>
                    <p><a href="<?php echo get_option('home'); ?>"><?php _e('Return to homepage','jn') ?></a></p>
            <?php endif; ?>
            </div><!-- #content -->
        </div><!-- #main -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
