<?php

require_once('includes/recipes.php');

/*
 * Enqueue scripts and styles for front-end.
 *
 * @since Janet Nutrition 0.0
 */
 
function jn_scripts_styles() {
        // Loads our main stylesheet.
        wp_enqueue_style( 'jn-style', get_stylesheet_uri() );
        // Loads jQuery
	wp_enqueue_script( 'jquery' );
	// Loads javascript file
        wp_enqueue_script('jn-js-responsive', get_template_directory_uri() . '/js/responsive.js');
}
add_action( 'wp_enqueue_scripts', 'jn_scripts_styles' );

/*
 * Sets up navigation menu
 * 
 * @since Janet Nutrition 0.0
 */

function jn_menu_setup() {
    register_nav_menu('primary', __('Primary Menu', 'jn'));
}
add_action('after_setup_theme', 'jn_menu_setup');

/*
 * Function for creating post meta
 * 
 * @since Janet Nutrition 0.0
 */
 
function jn_post_meta() {
    printf( __( 'Posted on <time class="entry-date" datetime="%3$s" pubdate>%4$s</time><span class="byline"> by <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'jn' ),
        esc_url( get_permalink() ),
        esc_attr( get_the_time() ),
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date() ),
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        esc_attr( sprintf( __( 'View all posts by %s', 'jn' ), get_the_author() ) ),
        esc_html( get_the_author() )
    );
}

/*
 * Registars sidebar widgets
 * 
 * @since Janet Nutrition 0.0
 */

function jn_widgets_init() {
    register_sidebar( array(
        'name' => __('Main Sidebar', 'jn'),
        'id' => 'sidebar-1',
        'description' => __('The default sidebar to be used on pages','jn'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));
}
add_action('widgets_init','jn_widgets_init');

/*
 * Theme options page
 * 
 * @since Janet Nutrition 0.1.5
 */

function jn_admin_menu() {
    add_submenu_page('themes.php', 'Theme Settings', 'Theme Settings', 'manage_options', 'theme_settings', 'theme_settings_page');
}
add_action('admin_menu','jn_admin_menu');

function theme_settings_page() {

    
?>
    <div class="wrap">
        <?php screen_icon('themes'); ?> <h2>Theme Settings</h2>
        <?php 
        if (isset($_POST["update_settings"])) {
            // Do the saving
            $contact1 = esc_attr($_POST["contact1"]);   
            update_option("jn_contact_1", $contact1);
            $contact2 = esc_attr($_POST["contact2"]);   
            update_option("jn_contact_2", $contact2);
            $footertxt = esc_attr($_POST["footer"]);
            update_option("jn_footer_txt", $footertxt);
            echo '<div id="message" class="updated">Settings saved</div>';
        }
        $contact1 = get_option("jn_contact_1");
        $contact2 = get_option("jn_contact_2");
        $footertxt = get_option("jn_footer_txt");
        ?>
        <h3>Contact details</h3>
        <form method="POST" action="">
            <input type="hidden" name="update_settings" value="Y" />
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">
                        <label for="email">First line:</label> 
                    </th>
                    <td>
                        <input type="text" name="contact1" value="<?php echo $contact1; ?>" size="25" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="number">Second line:</label>
                    </th>
                    <td>
                        <input type="text" name="contact2" value="<?php echo $contact2; ?>" size="25" />
                    </td>
                </tr>
            </table>
            <h3>Footer Text</h3>
            <input type="text" name="footer" value="<?php echo $footertxt; ?>" size="50" />
            <p>
                <input type="submit" value="Save settings" class="button-primary"/>
            </p>
        </form>
    </div>
<?php
}


?>