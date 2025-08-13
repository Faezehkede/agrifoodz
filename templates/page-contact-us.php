<?php

/**
 * Template Name: Contact Us
 * Template Post Type: page
 */

get_header();
?>

<section class="page-banner">
    <div class="container">
        <div class="page-banner-content">
            <div class="page-banner-title">
                <?php
                $hero_contact = get_field('hero_contact', 'option');
                if ($hero_contact && $hero_contact['title']):
                ?>
                    <h1><?php echo esc_html($hero_contact['title']); ?></h1>
                <?php else: ?>
                    <h1>Contact Us</h1>
                <?php endif; ?>
            </div>
            <div class="page-banner-img">
                <?php
                if ($hero_contact && $hero_contact['image']):
                    $image = $hero_contact['image'];
                    $image_url = $image['url'];
                    $image_alt = $image['alt'];
                ?>
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                <?php else: ?>
                    <img src="<?php echo AGRIFOODZ_ASSETS; ?>/images/page-title (3).webp" alt="Page Title">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section class="contact-content">
    <div class="container">
        <div class="contact-part">
            <?php
            if ($hero_contact && $hero_contact['subtitle']):
            ?>
                <h3><?php echo esc_html($hero_contact['subtitle']); ?></h3>
            <?php else: ?>
                <h3>" Global B2B for food and Agriculture products "</h3>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="contact-form-map">
    <div class="container">
        <?php
        $form_map = get_field('form-map', 'option');
        if ($form_map):
        ?>
            <div class="map">
                <?php if ($form_map['map_shortcode']): ?>
                    <?php echo do_shortcode($form_map['map_shortcode']); ?>
                <?php else: ?>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d83327.3714840184!2d-123.2063040744417!3d49.25781819008981!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x548673f143a94fb3%3A0xbb9196ea9b81f38b!2sVancouver%2C%20BC%2C%20Canada!5e0!3m2!1sen!2s!4v1751111884546!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <?php endif; ?>
            </div>

            <div class="contact-form">
                <?php if ($form_map['form_shortcode']): ?>
                    <?php echo do_shortcode($form_map['form_shortcode']); ?>
                <?php else: ?>
                    <form id="contact-form">
                        <div class="form-group">
                            <input type="text" name="firstname" placeholder="Your First Name">
                        </div>
                        <div class="form-group">
                            <input type="text" name="lastname" placeholder="Your Last Name">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <input type="text" name="subject" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <textarea name="message" placeholder="Message"></textarea>
                        </div>
                        <button type="submit">Send Message</button>
                    </form>
                <?php endif; ?>

                <?php if ($form_map['description']): ?>
                    <div class="form-description">
                        <?php echo $form_map['description']; ?>
                    </div>
                <?php endif; ?>

                <?php if ($form_map['button_text'] && $form_map['button_url']): ?>
                    <a href="<?php echo esc_url($form_map['button_url']); ?>" class="btn">
                        <?php echo esc_html($form_map['button_text']); ?>
                    </a>
                <?php endif; ?>
            </div>

            <div class="form-images">
                <?php if ($form_map['image_1']):
                    $image_1 = $form_map['image_1'];
                    $image_1_url = $image_1['url'];
                    $image_1_alt = $image_1['alt'];
                ?>
                    <img src="<?php echo esc_url($image_1_url); ?>" alt="<?php echo esc_attr($image_1_alt); ?>">
                <?php endif; ?>

                <?php if ($form_map['image_2']):
                    $image_2 = $form_map['image_2'];
                    $image_2_url = $image_2['url'];
                    $image_2_alt = $image_2['alt'];
                ?>
                    <img src="<?php echo esc_url($image_2_url); ?>" alt="<?php echo esc_attr($image_2_alt); ?>">
                <?php endif; ?>
            </div>
        <?php else: ?>
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d83327.3714840184!2d-123.2063040744417!3d49.25781819008981!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x548673f143a94fb3%3A0xbb9196ea9b81f38b!2sVancouver%2C%20BC%2C%20Canada!5e0!3m2!1sen!2s!4v1751111884546!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <div class="contact-form">
                <form id="contact-form">
                    <div class="form-group">
                        <input type="text" name="firstname" placeholder="Your First Name">
                    </div>
                    <div class="form-group">
                        <input type="text" name="lastname" placeholder="Your Last Name">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Your Email">
                    </div>
                    <div class="form-group">
                        <input type="text" name="subject" placeholder="Subject">
                    </div>
                    <div class="form-group">
                        <textarea name="message" placeholder="Message"></textarea>
                    </div>
                    <button type="submit">Send Message</button>
                </form>
            </div>
        <?php endif; ?>
    </div>
</section>

<section class="contact-info">
    <div class="container">
        <div class="row">
            <?php
            $call_to_actions = get_field('call_to_action', 'option');
            if ($call_to_actions):
                foreach ($call_to_actions as $action):
            ?>
                    <div class="info-box">
                        <div class="box-info-title">
                            <i class="circle"></i>
                            <i class="circle"></i>
                            <i class="circle"></i>
                            <span><?php echo esc_html($action['subtitle']); ?></span>
                            <i class="circle"></i>
                            <i class="circle"></i>
                            <i class="circle"></i>
                        </div>
                        <span class="info-box-img">
                            <?php if ($action['icon']):
                                $icon = $action['icon'];
                                $icon_url = $icon['url'];
                                $icon_alt = $icon['alt'];
                            ?>
                                <img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr($icon_alt); ?>" width="35px" height="35px">
                            <?php else: ?>
                                <!-- Default icon will be used based on CSS -->
                            <?php endif; ?>
                        </span>
                        <?php if ($action['title']): ?>
                            <h4><?php echo esc_html($action['title']); ?></h4>
                        <?php endif; ?>

                        <?php if ($action['description']): ?>
                            <div class="action-description">
                                <?php echo $action['description']; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php
                endforeach;
            else:
                ?>
                <div class="info-box">
                    <div class="box-info-title">
                        <i class="circle"></i>
                        <i class="circle"></i>
                        <i class="circle"></i>
                        <span>CALL US</span>
                        <i class="circle"></i>
                        <i class="circle"></i>
                        <i class="circle"></i>
                    </div>
                    <span class="info-box-img">
                        <svg width="35px" height="35px" viewBox="0 0 1024 1024" fill="#000000" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M737.6 934.4c-342.4 0-624.8-258.4-656.8-600.8v-0.8c-0.8-5.6-1.6-12.8-2.4-19.2 0-4.8-0.8-10.4-0.8-14.4 0.8-70.4 36-135.2 95.2-175.2 30.4-20.8 
                                66.4-32.8 103.2-34.4h12.8c63.2 0 123.2 28 163.2 76.8 44 52.8 58.4 123.2 40.8 192-17.6 68-69.6 121.6-138.4 144l-22.4 7.2 14.4 18.4c63.2 80 140 143.2 228.8 
                                188.8l18.4 9.6 4.8-20c16-72 80.8-125.6 158.4-129.6h8c94.4 0 173.6 72 181.6 164.8 2.4 25.6-1.6 51.2-9.6 76-22.4 62.4-77.6 107.2-144 116.8-4.8 0.8-8.8 
                                0.8-13.6 1.6-13.6-2.4-28-1.6-41.6-1.6zM117.6 328c30.4 324 296.8 568 620 568 12.8 0 26.4-0.8 40-1.6h3.2c2.4 0 4.8 0 7.2-0.8 52.8-7.2 96-43.2 114.4-92 
                                7.2-19.2 9.6-39.2 8-60-5.6-72-69.6-130.4-141.6-130.4h-6.4c-62.4 4-115.2 46.4-130.4 105.6-5.6 20.8-27.2 36.8-50.4 
                                36.8-8 0-15.2-1.6-21.6-4.8-110.4-56-204.8-140.8-274.4-244-4-5.6-4-12.8-1.6-18.4 3.2-6.4 9.6-11.2 16.8-12 74.4-4.8 139.2-56 157.6-125.6 15.2-56.8 
                                2.4-115.2-33.6-158.4-33.6-40-82.4-63.2-134.4-63.2H280c-30.4 1.6-60 12-84.8 28.8-48.8 32-78.4 86.4-78.4 144V312c-0.8 4.8 0 10.4 0.8 16z" fill=""></path>
                            </g>
                        </svg>
                    </span>
                    <h4>Call Phone</h4>
                    <p>+1 778-806-9965</p>
                </div>
                <div class="info-box">
                    <div class="box-info-title">
                        <i class="circle"></i>
                        <i class="circle"></i>
                        <i class="circle"></i>
                        <span>WRITE FOR US</span>
                        <i class="circle"></i>
                        <i class="circle"></i>
                        <i class="circle"></i>
                    </div>
                    <span class="info-box-img">
                        <svg viewBox="0 0 1024 1024" width="35px" height="35px" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M885.746 741.427H514.972l-105.37 105.395c-0.788 0.764-1.77 1.09-2.623 1.726-0.787 0.59-1.333 1.42-2.228 1.922-0.416 0.218-0.875 0.218-1.29 
                                0.416-1.53 0.742-3.08 1.158-4.718 1.55-1.224 0.284-2.404 0.614-3.627 0.7-1.551 
                                0.11-3.037-0.086-4.566-0.306-1.376-0.195-2.709-0.35-4.042-0.786-1.2-0.416-2.292-1.028-3.43-1.64-1.551-0.808-2.971-1.683-4.304-2.862-0.35-0.306-0.787-0.414-1.114-0.72-0.547-0.548-0.745-1.268-1.224-1.836-0.72-0.875-1.66-1.508-2.25-2.492L314.28 
                                741.427H169.847c-49.419 0-89.487-40.07-89.487-89.485V226.875c0-49.42 40.07-89.487 89.487-89.487h715.9c49.42 0 89.486 40.069 89.486 89.487v425.067c0.001 49.417-40.067 89.485-89.487 89.485zM307.07 
                                729.26c-1.222-2.054-1.77-4.284-2.25-6.511 0.612 3.451 1.9 6.555 3.89 9.284l-1.64-2.773z m4.895-26.938c-0.59 0.524-1.202 0.938-1.726 1.506 0.502-0.546 1.158-1.006 1.726-1.506z 
                                m-7.669 17.87c-0.087-1.18 0.153-2.338 0.264-3.518-0.088 0.832-0.482 1.53-0.482 2.382 0 0.393 0.197 0.742 0.218 1.136z m2.316-10.988c-0.307 0.61-0.656 1.158-0.917 1.812 0.24-0.635 
                                0.61-1.203 0.917-1.812z m623.878-482.33c0-24.71-20.033-44.743-44.744-44.743H169.847c-24.71 0-44.744 20.034-44.744 44.743V651.94c0 24.71 20.035 44.743 44.744 44.743h156.602c-0.326 
                                0-0.612 0.174-0.938 0.195 8.04-0.327 16.015 3.344 20.318 10.597l51.821 87.435 91.74-91.76c4.609-4.587 10.66-6.663 16.69-6.464h379.667c24.711 0 
                                44.744-20.034 44.744-44.743V226.874zM317.01 698.934c0.896-0.416 1.813-0.612 2.73-0.896-0.916 0.285-1.856 0.48-2.73 0.896z m412.133-225.97c-24.71 0-44.744-20.032-44.744-44.743 
                                0-24.71 20.032-44.744 44.744-44.744 24.71 0 44.743 20.034 44.743 44.744s-20.034 44.744-44.743 44.744z m-201.347 0c-24.71 0-44.744-20.032-44.744-44.743 0-24.71 20.035-44.744 
                                44.744-44.744s44.744 20.034 44.744 44.744-20.036 44.744-44.744 44.744z m-201.347 0c-24.71 0-44.744-20.032-44.744-44.743 0-24.71 20.035-44.744 
                                44.744-44.744s44.743 20.034 44.743 44.744-20.033 44.744-44.743 44.744z" fill="#333333"></path>
                            </g>
                        </svg>
                    </span>
                    <h4>Email Us</h4>
                    <p>Info@agrifoodz.com</p>
                    <p>Support@agrifoodz.com</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>