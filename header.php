<!DOCTYPE html>
<?php $contact1=get_option("jn_contact_1"); ?>
<?php $contact2=get_option("jn_contact_2"); ?>
<head>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="page">
        <header>
            <div id="header-logo">
                <a><img src="<?php echo get_bloginfo('template_url') ?>/images/janetlogo.png"></a>
            </div>
            <div id="header-title">
                <!--<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>-->
                <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
            </div>
            <div id="header-contacts">
                <p><?php echo $contact1; ?></p>
                <p><?php echo $contact2; ?></p>
            </div>
        </header>
        <a class="toggleMenu" href="#">Menu</a>
        <nav id="nav">
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
<!--            <ul>
                <li><a href="">one</a>
                    <ul>
                        <li><a>Another one</a></li>
                        <li><a>Another</a>
                            <ul>
                                <li><a>Yet again</a></li>
                                <li><a>...</a></li>
                                <li><a>Hello, me again!</a></li>
                            </ul>
                        </li>
                        <li><a>Another one</a></li>
                    </ul>
                </li>
                <li><a>two</a></li>
                <li><a>three</a></li>
                <li><a>four</a></li>
            </ul>-->
        </nav>