<?php

/**
 * Template Name: About Us
 * Template Post Type: page
 */

get_header();
?>

<section class="page-banner">
  <div class="container">
    <div class="page-banner-content">
      <div class="page-banner-title">
        <?php 
        $hero = get_field('hero_about', 'option');
        if( $hero && $hero['title'] ): 
        ?>
          <h1><?php echo esc_html($hero['title']); ?></h1>
        <?php else: ?>
          <h1>About Agrifoodz</h1>
        <?php endif; ?>
      </div>
      <div class="page-banner-img">
        <?php 
        if( $hero && $hero['image'] ): 
          $image = $hero['image'];
          $image_url = $image['url'];
          $image_alt = $image['alt'];
        ?>
          <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
        <?php else: ?>
          <img src="<?php echo AGRIFOODZ_ASSETS; ?>/images/page-title (5).webp" alt="Page Title">
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<section class="about-us">
  <div class="container">
    <?php 
    $about_sections = get_field('about_us_section', 'option');
    if( $about_sections ): 
      foreach( $about_sections as $section ): 
    ?>
      <div class="row about-us-content">
        <div class="about-img">
          <?php if( $section['image_1'] ): 
            $image_1 = $section['image_1'];
            $image_1_url = $image_1['url'];
            $image_1_alt = $image_1['alt'];
          ?>
            <img src="<?php echo esc_url($image_1_url); ?>" alt="<?php echo esc_attr($image_1_alt); ?>">
          <?php else: ?>
            <img src="<?php echo AGRIFOODZ_ASSETS; ?>/images/about-img.webp" alt="About Us">
          <?php endif; ?>
          
          <?php if( $section['image_2'] ): 
            $image_2 = $section['image_2'];
            $image_2_url = $image_2['url'];
            $image_2_alt = $image_2['alt'];
          ?>
            <img src="<?php echo esc_url($image_2_url); ?>" alt="<?php echo esc_attr($image_2_alt); ?>">
          <?php else: ?>
            <img src="<?php echo AGRIFOODZ_ASSETS; ?>/images/about-img1.webp" alt="About Us">
          <?php endif; ?>
        </div>
        <div class="about-text">
          <?php if( $section['title'] ): ?>
            <h2><?php echo esc_html($section['title']); ?></h2>
          <?php else: ?>
            <h2>Welcome to Agrifoodz – Your Trusted B2B Marketplace for Food & Agricultural Products</h2>
          <?php endif; ?>
          
          <?php if( $section['description'] ): ?>
            <div class="description-content">
              <?php echo $section['description']; ?>
            </div>
          <?php else: ?>
            <p>At Agrifoodz , we are on a mission to transform how food and agricultural businesses connect, trade, and grow.
              As a dedicated B2B platform, we specialize in bridging the gap between verified suppliers and serious buyers across the global food and agri industry.</p>
            <h3>Who We Are</h3>
            <p>We are a team of professionals with deep expertise in digital marketing, agriculture, and international trade.
              Our platform serves as a dynamic online hub for farmers, producers, exporters, wholesalers,
              and importers to showcase their products, find business partners, and close deals with confidence.</p>
          <?php endif; ?>
          
          <?php if( $section['button_text'] && $section['button_url'] ): ?>
            <button class="btn"><a href="<?php echo esc_url($section['button_url']); ?>"><?php echo esc_html($section['button_text']); ?></a></button>
          <?php else: ?>
            <button class="btn"><a href="#">Subscribe</a></button>
          <?php endif; ?>
        </div>
      </div>
    <?php 
      endforeach; 
    else: 
    ?>
      <div class="row about-us-content">
        <div class="about-img">
          <img src="<?php echo AGRIFOODZ_ASSETS; ?>/images/about-img.webp" alt="About Us">
          <img src="<?php echo AGRIFOODZ_ASSETS; ?>/images/about-img1.webp" alt="About Us">
        </div>
        <div class="about-text">
          <h2>Welcome to Agrifoodz – Your Trusted B2B Marketplace for Food & Agricultural Products</h2>
          <p>At Agrifoodz , we are on a mission to transform how food and agricultural businesses connect, trade, and grow.
            As a dedicated B2B platform, we specialize in bridging the gap between verified suppliers and serious buyers across the global food and agri industry.</p>
          <h3>Who We Are</h3>
          <p>We are a team of professionals with deep expertise in digital marketing, agriculture, and international trade.
            Our platform serves as a dynamic online hub for farmers, producers, exporters, wholesalers,
            and importers to showcase their products, find business partners, and close deals with confidence.</p>
          <button class="btn"><a href="#">Subscribe</a></button>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>

<div class="join-us-box container">
  <?php 
  $join_us = get_field('join_us_right_now', 'option');
  if( $join_us && $join_us['title'] ): 
  ?>
    <h3><?php echo esc_html($join_us['title']); ?></h3>
  <?php else: ?>
    <h3>Join Us Right Now</h3>
  <?php endif; ?>
  
  <?php if( $join_us && $join_us['description'] ): ?>
    <p><?php echo esc_html($join_us['description']); ?></p>
  <?php else: ?>
    <p>Become a part of our community and stay updated.</p>
  <?php endif; ?>
  
  <?php if( $join_us && $join_us['button_text'] && $join_us['button_link'] ): ?>
    <a href="<?php echo esc_url($join_us['button_link']); ?>"><?php echo esc_html($join_us['button_text']); ?></a>
  <?php else: ?>
    <a href="<?php echo home_url('/register'); ?>">Join Us</a>
  <?php endif; ?>
</div>

<section class="what-we-do">
  <div class="container">
    <div class="row">
      <div class="what-we-do-img">
        <?php 
        $what_we_do = get_field('what_we_do_at_agrifoodz', 'option');
        if( $what_we_do && $what_we_do['image_1'] ): 
          $image_1 = $what_we_do['image_1'];
          $image_1_url = $image_1['url'];
          $image_1_alt = $image_1['alt'];
        ?>
          <img src="<?php echo esc_url($image_1_url); ?>" alt="<?php echo esc_attr($image_1_alt); ?>">
        <?php else: ?>
          <img src="<?php echo AGRIFOODZ_ASSETS; ?>/images/about-img2.webp" alt="Why Us Image">
        <?php endif; ?>
      </div>
      <div class="what-we-do-content">
        <?php if( $what_we_do && $what_we_do['title'] ): ?>
          <h2><?php echo esc_html($what_we_do['title']); ?></h2>
        <?php else: ?>
          <h2>What We Do At Agrifoodz?</h2>
        <?php endif; ?>
        
        <?php if( $what_we_do && $what_we_do['description'] ): ?>
          <p><?php echo esc_html($what_we_do['description']); ?></p>
        <?php else: ?>
          <p>We offer a reliable and efficient marketplace where businesses can:</p>
        <?php endif; ?>
        
        <div class="what-we-do-boxs">
          <?php 
          if( $what_we_do && $what_we_do['feild'] ): 
            $counter = 1;
            foreach( $what_we_do['feild'] as $field ): 
          ?>
            <div class="what-we-do-box">
              <div class="box-number">
                <span><?php echo $counter; ?></span>
              </div>
              <div class="box-content">
                <h3><?php echo esc_html($field['title']); ?></h3>
              </div>
            </div>
          <?php 
            $counter++;
            endforeach; 
          else: 
          ?>
            <div class="what-we-do-box">
              <div class="box-number">
                <span>1</span>
              </div>
              <div class="box-content">
                <h3>List and promote food and agricultural products</h3>
              </div>
            </div>
            <div class="what-we-do-box">
              <div class="box-number">
                <span>2</span>
              </div>
              <div class="box-content">
                <h3>Find qualified buyers or suppliers with ease</h3>
              </div>
            </div>
            <div class="what-we-do-box">
              <div class="box-number">
                <span>3</span>
              </div>
              <div class="box-content">
                <h3>Negotiate and manage inquiries directly via our secure platform</h3>
              </div>
            </div>
            <div class="what-we-do-box">
              <div class="box-number">
                <span>4</span>
              </div>
              <div class="box-content">
                <h3>Build global trade relationships in key markets</h3>
              </div>
            </div>
          <?php endif; ?>
        </div>
        
        <?php if( $what_we_do && $what_we_do['image_2'] ): 
          $image_2 = $what_we_do['image_2'];
          $image_2_url = $image_2['url'];
          $image_2_alt = $image_2['alt'];
        ?>
          <img src="<?php echo esc_url($image_2_url); ?>" alt="<?php echo esc_attr($image_2_alt); ?>">
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<section class="about-contents">
  <div class="container">
    <div class="about-content">
      <div class="why-us">
        <?php 
        $why_choose_us = get_field('why_choose_us', 'option');
        if( $why_choose_us && $why_choose_us['title'] ): 
        ?>
          <h2><?php echo esc_html($why_choose_us['title']); ?></h2>
        <?php else: ?>
          <h2>Why Choose Us</h2>
        <?php endif; ?>
        
        <?php if( $why_choose_us && $why_choose_us['description'] ): ?>
          <ul class="why-us-listed">
            <li><?php echo esc_html($why_choose_us['description']); ?></li>
          </ul>
        <?php else: ?>
          <ul class="why-us-listed">
            <li>Verified Members & Listings</li>
            <li>User-Friendly Interface</li>
            <li>Global Visibility & SEO Optimization</li>
            <li>Real-Time Communication Tools</li>
            <li>Tailored B2B Services & Support</li>
          </ul>
        <?php endif; ?>
      </div>
      
      <div class="our-vision">
        <h2>Our Vision</h2>
        <p>To be the leading online B2B platform that fosters transparency, efficiency, and growth in the global food and agricultural supply chain.</p>
      </div>
      
      <div class="final-part">
        <h2>Let's Grow Together</h2>
        <p>Whether you are a grower looking to expand your reach or a buyer searching for quality products at competitive prices,
          Agrifoodz is here to support your success every step of the way.</p>
      </div>
    </div>
    
    <div class="about-content-img">
      <?php 
      if( $why_choose_us && $why_choose_us['image'] ): 
        $image = $why_choose_us['image'];
        $image_url = $image['url'];
        $image_alt = $image['alt'];
      ?>
        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
      <?php else: ?>
        <img src="<?php echo AGRIFOODZ_ASSETS; ?>/images/about-img3.webp" alt="About Image">
      <?php endif; ?>
    </div>
  </div>
</section>
<!-- Footer -->
<?php get_footer(); ?>