<?php
    get_header();
    $dp_options = get_desing_plus_option();
?>

<?php get_template_part('breadcrumb'); ?>

<div id="main_col">

<?php if (is_category()) { ?>
 <h2 id="archive_headline" class="headline rich_font"><?php echo single_cat_title('', false); ?></h2>

<?php } elseif (is_tag() || is_tax($dp_options['introduce_tag_slug'])) { ?>
 <h2 id="archive_headline" class="headline rich_font"><?php echo single_tag_title('', false); ?></h2>

<?php } elseif (is_search()) { ?>
<?php if ( have_posts() ) : ?>
 <h2 id="archive_headline" class="headline rich_font"><?php printf(__('Search results for %s', 'tcd-w'), get_search_query()); ?></h2>
<?php else: ?>
 <h2 id="archive_headline" class="headline rich_font"><?php _e('Search results','tcd-w'); ?></h2>
<?php endif; ?>

<?php } elseif (is_day()) { ?>
 <h2 id="archive_headline" class="headline rich_font"><?php printf(__('Archive for &#8216; %s &#8217;', 'tcd-w'), get_the_time(__('F jS, Y', 'tcd-w'))); ?></h2>

<?php } elseif (is_month()) { ?>
 <h2 id="archive_headline" class="headline rich_font"><?php printf(__('Archive for &#8216; %s &#8217;', 'tcd-w'), get_the_time(__('F, Y', 'tcd-w'))); ?></h2>

<?php } elseif (is_year()) { ?>
 <h2 id="archive_headline" class="headline rich_font"><?php printf(__('Archive for &#8216; %s &#8217;', 'tcd-w'), get_the_time(__('Y', 'tcd-w'))); ?></h2>

<?php } elseif (is_author()) { ?>
<?php global $wp_query; $curauth = $wp_query->get_queried_object(); //get the author info ?>
 <h2 id="archive_headline" class="headline rich_font"><?php printf(__('Archive for the &#8216; %s &#8217;', 'tcd-w'), $curauth->display_name ); ?></h2>

<?php } elseif (is_home()) { ?>
 <h2 id="archive_headline" class="headline rich_font"><?php echo esc_html($dp_options['blog_archive_headline']); ?></h2>
<?php if ($dp_options['blog_archive_desc']) { ?>
 <p id="archive_desc"><?php echo str_replace(array("\r\n", "\r", "\n"), '<br>', esc_html($dp_options['blog_archive_desc'])); ?></p>
<?php } ?>

<?php } ?>

<?php if ( have_posts() ) : ?>
 <ol id="post_list" class="clearfix">

<?php while ( have_posts() ) : the_post(); ?>
  <li class="article">
   <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
    <div class="image">
     <?php if (has_post_thumbnail()) { the_post_thumbnail('size2'); } else { ?><img src="<?php echo get_template_directory_uri(); ?>/img/common/no_image2.gif" title="" alt="" /><?php } ?>
    </div>
    <h3 class="title js-ellipsis"><?php the_title(); ?></h3>
    <?php
        $metas = array();
        if ($post->post_type == 'post') {
          if ($dp_options['show_categories']) {
            foreach(explode('-', $dp_options['show_categories']) as $cat) {
              if ($cat == 1) {
                $terms = get_the_terms($post->ID, 'category');
                if ($terms && !is_wp_error($terms)) {
                  $term = array_shift($terms);
                  $metas[] = '<li class="cat"><span class="cat-category" data-href="'.get_term_link($term).'" title="'.esc_attr($term->name).'">'.esc_html($term->name).'</span></li>';
                }
              } elseif (!empty($dp_options['use_category'.$cat])) {
                $terms = get_the_terms($post->ID, $dp_options['category'.$cat.'_slug']);
                if ($terms && !is_wp_error($terms)) {
                  $term = array_shift($terms);
                  $metas[] = '<li class="cat"><span class="cat-'.esc_attr($dp_options['category'.$cat.'_slug']).'" data-href="'.get_term_link($term).'" title="'.esc_attr($term->name).'">'.esc_html($term->name).'</span></li>';
                }
              }
            }
          }
          if ($dp_options['show_date']) {
            $metas[] = '<li class="date"><time class="entry-date updated" datetime="'.get_the_modified_time('c').'">'.get_the_time('Y.m.d').'</time></li>';
          }

        } elseif ($post->post_type == $dp_options['introduce_slug']) {
          if ($dp_options['show_introduce_categories']) {
            foreach(explode('-', $dp_options['show_introduce_categories']) as $cat) {
              if (!empty($dp_options['use_introduce_category'.$cat])) {
                $terms = get_the_terms($post->ID, $dp_options['introduce_category'.$cat.'_slug']);
                if ($terms && !is_wp_error($terms)) {
                  $term = array_shift($terms);
                  $metas[] = '<li class="cat"><span class="cat-'.esc_attr($dp_options['introduce_category'.$cat.'_slug']).'" data-href="'.get_term_link($term).'" title="'.esc_attr($term->name).'">'.esc_html($term->name).'</span></li>';
                }
              }
            }
          }
          if ($dp_options['show_date_introduce']) {
            $metas[] = '<li class="date"><time class="entry-date updated" datetime="'.get_the_modified_time('c').'">'.get_the_time('Y.m.d').'</time></li>';
          }

        } elseif ($post->post_type == $dp_options['news_slug'] && $dp_options['show_date_news']) {
          $metas[] = '<li class="date"><time class="entry-date updated" datetime="'.get_the_modified_time('c').'">'.get_the_time('Y.m.d').'</time></li>';
        }

        if ($metas) {
          echo '<ul class="meta clearfix">'.implode('', $metas).'</ul>';
        }
    ?>
   </a>
  </li>
<?php endwhile; ?>

 </ol><!-- END #post_list -->
<?php else: ?>
 <p class="no_post"><?php _e('There is no registered post.', 'tcd-w'); ?></p>
<?php endif; ?>

<?php get_template_part('navigation'); get_template_part('navigation2'); ?>

</div><!-- END #main_col -->

<?php get_footer(); ?>
