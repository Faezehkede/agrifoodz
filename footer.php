<footer class="site-footer">
  <div class="container footer-container">
    <div class="row">
      <div class="footer-column">
        <?php
        $column_1 = get_field('column_1', 'option');
        if ($column_1 && $column_1['footer_logo']):
          $logo = $column_1['footer_logo'];
          $logo_url = $logo['url'];
          $logo_alt = $logo['alt'];
        ?>
          <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($logo_alt); ?>">
        <?php endif; ?>

        <?php if ($column_1 && $column_1['about']): ?>
          <p><?php echo esc_html($column_1['about']); ?></p>
        <?php endif; ?>
      </div>

      <div class="footer-column">
        <?php
        $column_2 = get_field('column_2', 'option');
        if ($column_2 && $column_2['title']):
        ?>
          <h4><?php echo esc_html($column_2['title']); ?></h4>
        <?php endif; ?>

        <?php if ($column_2 && $column_2['links']): ?>
          <ul>
            <?php foreach ($column_2['links'] as $link): ?>
              <li><a href="<?php echo esc_url($link['link_url']); ?>"><?php echo esc_html($link['link_name']); ?></a></li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      </div>

      <div class="footer-column">
        <?php
        $column_3 = get_field('column_3', 'option');
        if ($column_3 && $column_3['title']):
        ?>
          <h4><?php echo esc_html($column_3['title']); ?></h4>
        <?php endif; ?>

        <?php if ($column_3 && $column_3['links']): ?>
          <ul>
            <?php foreach ($column_3['links'] as $link): ?>
              <li><a href="<?php echo esc_url($link['link_url']); ?>"><?php echo esc_html($link['link_name']); ?></a></li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      </div>

      <div class="footer-column">
        <?php
        $column_4 = get_field('column_4', 'option');
        if ($column_4 && $column_4['title']):
        ?>
          <h4><?php echo esc_html($column_4['title']); ?></h4>
        <?php endif; ?>

        <?php if ($column_4 && $column_4['links']): ?>
          <ul>
            <?php foreach ($column_4['links'] as $link): ?>
              <li><a href="<?php echo esc_url($link['link_url']); ?>"><?php echo esc_html($link['link_name']); ?></a></li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      </div>
    </div>

    <div class="space-line">
      <div class="row">
        <span>Last Articles</span>
        <a href="<?php echo home_url('/events'); ?>">View All</a>
      </div>
    </div>

    <div class="swiper blog-list-carousel">
      <div class="swiper-wrapper">
        <?php
        // Get settings from ACF
        $food_events = get_field('food_events_exhibitions', 'option');
        $posts_per_page = isset($food_events['posts_per_page']) ? $food_events['posts_per_page'] : 6;
        $orderby = isset($food_events['product_orderby']) ? $food_events['product_orderby'] : 'date';
        $order = isset($food_events['product_order']) ? $food_events['product_order'] : 'DESC';

        // WP Query to fetch latest blog posts
        $args = array(
          'post_type' => 'post',
          'posts_per_page' => $posts_per_page,
          'orderby' => $orderby,
          'order' => $order,
        );
        $blog_query = new WP_Query($args);
        if ($blog_query->have_posts()) :
          while ($blog_query->have_posts()) : $blog_query->the_post();
        ?>
            <div class="swiper-slide">
              <article class="blog-card-list">
                <a href="<?php the_permalink(); ?>">
                  <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('medium', ['alt' => get_the_title()]); ?>
                  <?php else : ?>
                    <img src="<?php echo AGRIFOODZ_ASSETS; ?>/images/main-logo.png" alt="No image">
                  <?php endif; ?>
                  <div class="blog-content-list">
                    <h3 class="blog-title"><?php the_title(); ?></h3>
                    <p class="blog-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 10, '...'); ?></p>
                  </div>
                </a>
              </article>
            </div>
        <?php
          endwhile;
          wp_reset_postdata();
        else :
          echo '<p>No products found</p>';
        endif;
        ?>
      </div>
    </div>

    <div class="footer-bottom">
      <div class="row">
        <div class="site-rule">
          <?php
          $bottom_footer = get_field('bottom_footer', 'option');
          if ($bottom_footer && $bottom_footer['privacy_policy__terms_of_use_text'] && $bottom_footer['privacy_policy__terms_of_use_text_url']):
          ?>
            <a href="<?php echo esc_url($bottom_footer['privacy_policy__terms_of_use_text_url']); ?>" class="privecy-policy">
              <?php echo esc_html($bottom_footer['privacy_policy__terms_of_use_text']); ?>
            </a>
          <?php else: ?>
            <a href="<?php echo home_url('/privacy-policy'); ?>" class="privecy-policy">Privacy Policy</a> /
            <a href="<?php echo home_url('/terms-of-use'); ?>" class="term-of-use">Terms of Use</a>
          <?php endif; ?>
        </div>

        <div class="social-media">
          <div class="row">
            <?php
            if ($bottom_footer && $bottom_footer['social']):
              foreach ($bottom_footer['social'] as $social):
                $icon = $social['icon'];
                $icon_url = $icon['url'];
                $icon_alt = $icon['alt'];
            ?>
                <a href="<?php echo esc_url($social['url']); ?>" class="social-link">
                  <img src="<?php echo esc_html($icon_url); ?>" alt="<?php echo esc_html($icon_alt); ?>" >
                </a>
              <?php
              endforeach;
            else:
              ?>
              <!-- Default social links as fallback -->
              <a href="https://www.facebook.com/61576352588055" class="social-link">
                <svg viewBox="0 -0.5 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <!-- Facebook SVG content -->
                </svg>
              </a>
              <!-- Other default social links -->
            <?php endif; ?>
          </div>
        </div>

        <p class="copy-write">
          <?php
          if ($bottom_footer && $bottom_footer['copy_right']):
            echo esc_html($bottom_footer['copy_right']);
          else:
            echo '&copy; ' . date('Y') . ' Agrifoodz. All rights reserved.';
          endif;
          ?>
        </p>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>