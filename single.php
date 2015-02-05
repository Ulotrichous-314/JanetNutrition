<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage JanetNutrition
 *
 */

get_header(); ?>

    <div id="main">
                <div id="content">
                    <?php if (have_posts()) : while ( have_posts() ) : the_post(); ?>
                    <div><?php previous_post_link('&laquo; %link'); ?> </div>
                    <div><?php next_post_link('%link &raquo'); ?></div>
                    <div <?php post_class(); ?> id="post-<?php the_ID(); ?>"></div>
                    <h2><?php the_title(); ?></h2>
                    <div><?php the_content('<p>Read the rest of this entry &raquo;</p>'); ?></div>

                    <!--// End the loop.-->
                    <?php endwhile; else:?>
                        <p>Sorry no posts matched your criteria.</p>
                    <?php endif; ?>
            </div><!-- #content -->
    </div><!-- #main -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
