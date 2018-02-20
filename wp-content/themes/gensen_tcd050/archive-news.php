<?php
    get_header();
    $dp_options = get_desing_plus_option();
?>

<?php get_template_part('breadcrumb'); ?>

<div id="main_col" class="clearfix">

 <div id="left_col">
      <?php $terms = get_terms('area', array('hide_empty' => false, 'parent' => 0));
      foreach ($terms as $term) {
        $name = $term->name;
        echo '<br>';
        echo $name;
        $terms2 = get_terms('area', array('hide_empty' => false, 'parent' => $term->term_id));
        foreach ($terms2 as $term2) {
          $cldName = $term2->name;
          echo ' ';
          echo $cldName;
        }
      }
      ?>
<br><br>
<br><br>
<?php // タームに紐づく投稿の一覧を表示
$taxonomy_slug = 'area'; // カスタムタクソノミーのスラッグを指定
$post_type_slug = 'introduce'; // 投稿タイプのスラッグを指定
$terms = get_terms($taxonomy_slug, array('hide_empty' => false, 'parent' => 0));
foreach ($terms as $term) {
  echo '<br><br><h1>'.esc_html($term->name).'</h1>'; // ターム名を表示
  $terms2 = get_terms('area', array('hide_empty' => false, 'parent' => $term->term_id));
  foreach ( $terms2 as $value ) {
?>
<?php
    echo '<br><h2>'.esc_html($value->name).'</h2>'; // ターム名を表示
    $term_slug = $value->slug; // タームに紐づく投稿一覧のクエリを設定
    $args = array(
    'post_type' => $post_type_slug, // 投稿タイプの指定
    $taxonomy_slug => $term_slug , // タクソノミーからタームを指定
    'posts_per_page' => -1, // タームに紐づく投稿を全てを表示
    'post_status' => 'publish' // 公開済みの投稿を表示
    );
    $myquery = new WP_Query($args);
?>
  <?php if ( $myquery->have_posts()): ?>
    <ul>
      <?php while($myquery->have_posts()): $myquery->the_post(); ?>
      <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
      <?php endwhile; ?>
    </ul>
  <?php endif; ?>
  <?php wp_reset_postdata(); ?>
<?php }} // ループの終了 ?>



<?php if ( have_posts() ) : ?>
  <div id="recent_news">
   <h2 class="headline rich_font"><?php echo esc_html($dp_options['introduce_label']); ?></h2>
   <ol<?php if ($dp_options['show_date_news']) echo ' class="show_date"'; ?>>
<?php while ( have_posts() ) : the_post(); ?>
    <li class="clearfix">
     <a href="<?php the_permalink() ?>">
      <h3 class="title"><?php the_title(); ?></h3>
      <?php if ($dp_options['show_date_news']){ ?><p class="date"><?php the_time('Y.m.d'); ?></p><?php } ?>
     </a>
    </li>
<?php endwhile; ?>
   </ol>
  </div><!-- END #recent_news -->
<?php else: ?>
  <p class="no_post"><?php _e('There is no registered post.', 'tcd-w'); ?></p>
<?php endif; ?>

<?php get_template_part('navigation'); ?>

 </div><!-- END #left_col -->

<?php get_sidebar(); ?>

</div><!-- END #main_col -->

<?php get_footer(); ?>
