<?php
global $dp_options;
if (! $dp_options) $dp_options = get_desing_plus_option();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php if($dp_options['use_ogp']) { ?>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<?php } else { ?>
<head>
<?php } ?>
<meta charset="<?php bloginfo('charset'); ?>">
<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
<meta name="viewport" content="width=device-width">
<title><?php wp_title('|', true, 'right'); ?></title>
<meta name="description" content="<?php seo_description(); ?>">
<?php if ($dp_options['use_ogp']) { ogp(); }; ?>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<?php if ($favicon = wp_get_attachment_image_src($dp_options['favicon'], 'full')) : ?>
<link rel="shortcut icon" href="<?php echo esc_attr($favicon[0]); ?>">
<?php endif; ?>
<?php wp_enqueue_style('style', get_stylesheet_uri(), false, version_num(), 'all'); wp_enqueue_script( 'jquery' ); if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/custom.css">
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</head>
<body id="body" <?php body_class(); ?>>

<?php if ($dp_options['use_load_icon']) { ?>
<div id="site_loader_overlay">
 <div id="site_loader_animation">
<?php   if ($dp_options['load_icon'] == 'type3') { ?>
  <i></i><i></i><i></i><i></i>
<?php   } ?>
 </div>
</div>
<div id="site_wrap">
<?php } ?>

 <div id="header">
  <div id="header_top">
   <div class="inner clearfix">
    <div id="header_logo">
     <?php header_logo(); ?>
    </div>
    <div id="header_logo_fix">
     <?php header_logo_fix(); ?>
    </div>
<?php if ($dp_options['show_search_bar_subpage'] && !is_front_page() && is_show_custom_search_form()) { ?>
    <a href="#" class="search_button"><span><?php _e('Search', 'tcd-w'); ?></span></a>
<?php } ?>
<?php if (has_nav_menu('global-menu')) { ?>
    <a href="#" class="menu_button"><span><?php _e('menu', 'tcd-w'); ?></span></a>
    <div id="global_menu">
     <?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'theme_location' => 'global-menu' , 'container' => '' ) ); ?>
    </div>
<?php } ?>
   </div>
  </div>
<?php if ($dp_options['show_search_bar_subpage'] && (!is_front_page() || $GLOBALS['custom_search_vars']) && is_show_custom_search_form()) { ?>
  <div id="header_search">
   <div class="inner">
<?php get_template_part('custom_search_form'); ?>
   </div>
  </div>
<?php } ?>
 </div><!-- END #header -->

 <div id="main_contents" class="clearfix">

