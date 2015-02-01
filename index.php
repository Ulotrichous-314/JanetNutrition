<?php get_header(); ?>
<?php get_sidebar(); ?>
    <div id="content">
        <?php if(have_posts()):while(have_posts()):the_post();?>
            <div <?php post_class() ?>>
                <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                <?php the_excerpt(); ?>
                <div class="post-meta">
                    <?php jn_post_meta();?>
                </div>
            </div>
            <?php endwhile; else: ?>
        <h2><?php _e('Nothing Found','jn') ?></h2>
        <p><?php _e('No posts were found. Sorry.','jn'); ?>
        <a href="<?php echo get_option('home'); ?>"><?php _e('Return to homepage','jn') ?></a></p>
        <?php endif; ?>
    </div>
<?php get_footer(); ?>

