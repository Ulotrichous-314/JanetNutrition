/*
Template Name: Blog Posts
*/
<?php get_header(); ?>
    <div id="main">
        <div id="content">
            <?php query_posts('post_type=post&post_status=publish&posts_per_page=10&paged='.get_query_var('paged')); ?>
            <?php if(have_posts()):while(have_posts()):the_post();?>
                <div <?php post_class() ?>>
                    <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                    <?php the_excerpt(); ?>
                    <div class="post-meta">
                        <?php jn_post_meta();?>
                    </div>
                </div>
                <?php endwhile; ?>
            <div class="navigation">
	<span class="newer"><?php previous_posts_link(__('« Newer','example')) ?></span> <span class="older"><?php next_posts_link(__('Older »','example')) ?></span>
</div><!-- /.navigation -->
            <?php else: ?>
            <h2><?php _e('Nothing Found','jn') ?></h2>
            <p><?php _e('No posts were found. Sorry.','jn'); ?>
            <a href="<?php echo get_option('home'); ?>"><?php _e('Return to homepage','jn') ?></a></p>
            <?php endif; ?>
        </div><!-- #content -->
    </div><!-- #main -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>

