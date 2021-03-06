<article <?php post_class('press-item'); ?> id="post-<?php the_ID(); ?>">
  <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

  <?php
    $post_terms = wp_get_post_terms($post->ID, 'presstype');
    if ($post_terms) :
      echo '<div class="press-type">';
      echo 'Type: ' . $post_terms[0]->description;
      echo '</div>';
    endif;
  ?>

  <?php
    if (has_post_thumbnail()) :
      $image_id = get_post_thumbnail_id($post->ID);
      $img_src = wp_get_attachment_image_url($image_id, 'large');
      $img_srcset = wp_get_attachment_image_srcset($image_id, 'large');
      $img_sizes = wp_get_attachment_image_sizes($image_id, 'large');
      $img_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
      $img_title = get_the_title($image_id);
      echo '<img src="'. esc_url($img_src) .'" srcset="'. esc_attr($img_srcset) .'" sizes="'. esc_attr($img_sizes) .'" alt="'. esc_attr($img_alt) .'" title="'. esc_attr($img_title) .'">';
    endif;
  ?>
  <?php the_excerpt(); ?>
</article>
