<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen_Child
 * @since Twenty Fifteen Child 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<!--<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php /*bloginfo( 'pingback_url' ); */?>">-->

    <link href="<?php echo get_template_directory_uri(); ?>-child/css/slick.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>-child/css/develop.css" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="swraper">

    <div class="header"> <!--header div start-->
        <div class="headerin">
            <div class="slogo">
                <h1 class="site-title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/twentyfifteen-child/img/slogo.png" alt="<?php bloginfo( 'name' ); ?>" />
                    </a>
                </h1>
                </div>
            <div class="navarea">
               
                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'mainnav' ,'container' => false,'link_after' => '<span></span>',) ); ?>
                <ul class="socialnav">
                    <li><a href="#">All Feeds<span></span></a></li>
                    <li class="active"><a href="#">Facebook<span><img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/twentyfifteen-child/img/sfb.png" alt=""/></span></a></li>
                    <li><a href="#">Twitter<span><img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/twentyfifteen-child/img/stw.png" alt=""/></span></a></li>
                    <li><a href="#">Google+<span><img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/twentyfifteen-child/img/sgplus.png" alt=""/></span></a></li>
                    <li><a href="#">Pinterest<span><img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/twentyfifteen-child/img/spin.png" alt=""/></span></a></li>
                    <li><a href="#">LinkedIn<span><img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/twentyfifteen-child/img/sin.png" alt=""/></span></a></li>
                    <li><a href="#">Multi Select<span><img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/twentyfifteen-child/img/smulti.png" alt=""/></span></a></li>
                    <li><a href="#">Add<span>+</span></a></li>
                </ul>
            </div>
        </div>
    </div> <!--header div end-->
    <div class="smain-container">