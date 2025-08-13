<?php
/**
 * Template Name: How to Work
 * Template Post Type: page
 */

get_header();
?>

<section id="how-it-works">
    <div class="container">
        <div class="how-it-works-contents">
            <div class="how-it-works-content">
                <?php 
                $hero = get_field('hero', 'option');
                if( $hero && $hero['title'] ): 
                ?>
                    <h1><?php echo esc_html($hero['title']); ?></h1>
                <?php else: ?>
                    <h1>How AgriFoodz Work</h1>
                <?php endif; ?>
                
                <?php if( $hero && $hero['description'] ): ?>
                    <p><?php echo esc_html($hero['description']); ?></p>
                <?php else: ?>
                    <p>Connecting Sellers & Buyers in Food and Agricultural Products – Made Simple</p>
                    <p>At <strong>Agrifoodz</strong>, we make it easy for food and agri businesses to find the right partners, showcase their products,
                        and close deals with confidence. Whether you're a supplier or a buyer, here's how you can get started:</p>
                <?php endif; ?>
            </div>
            
            <div class="how-it-works-img">
                <?php 
                if( $hero && $hero['image'] ): 
                    $image = $hero['image'];
                    $image_url = $image['url'];
                    $image_alt = $image['alt'];
                ?>
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                <?php else: ?>
                    <img src="<?php echo AGRIFOODZ_ASSETS; ?>/images/page-title (4).webp" alt="Page Title">
                <?php endif; ?>
            </div>
        </div>
        
        <div class="how-steps">
            <?php 
            $steps = get_field('step', 'option');
            if( $steps ): 
                foreach( $steps as $step ): 
            ?>
                <div class="how-step">
                    <?php if( $step['title'] ): ?>
                        <h4><?php echo esc_html($step['title']); ?></h4>
                    <?php endif; ?>
                    
                    <?php if( $step['description'] ): ?>
                        <div class="step-description">
                            <?php echo $step['description']; ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if( $step['sub_title'] ): ?>
                        <p><?php echo esc_html($step['sub_title']); ?></p>
                    <?php endif; ?>
                </div>
            <?php 
                endforeach; 
            else: 
            ?>
                <div class="how-step">
                    <h4>✅ Step 1: Sign Up & Create Your Profile</h4>
                    <ul>
                        <li>Register for a free account as a supplier or Buyer.
                            <ul>
                                <li>Enter your email address</li> 
                                <li>Receive your OPT code and insert it in the box</li>
                            </ul>
                        </li>
                        <li>Fill out your business profile to build trust and improve visibility.</li>
                    </ul>
                    <p>🔒 Verified profiles gain more exposure in search results.</p>
                </div>
                <div class="how-step">
                    <h4>✅ Step 2: List or Browse Products</h4>
                    <ul>
                        <li><strong>For Suppliers: </strong>Post your food or agricultural products with clear descriptions, images, pricing, and MOQ (Minimum Order Quantity).</li>
                        <li><strong>For Buyers: </strong>Search or filter products based on category, location, price, or seller rating.</li>
                    </ul>
                    <p>📦 From dates, nuts, and dried fruits to spices, grains, and organic products – we've got you covered.</p>
                </div>
                <div class="how-step">
                    <h4>✅ Step 3: Connect & Communicate</h4>
                    <ul>
                        <li>Use our built-in messaging system to ask questions, negotiate, and discuss details securely with potential partners.</li>
                    </ul>
                    <p>💬 Real-time chat and messaging tools ensure smooth communication.</p>
                </div>
                <div class="how-step">
                    <h4>✅ Step 4: Make Business Deals</h4>
                    <ul>
                        <li>Finalize orders, set shipping terms, and complete transactions directly with the other party.</li>
                        <li>We support transparent and direct B2B deals—no middlemen.</li>
                    </ul>
                    <p>📈 Build long-term business relationships with verified, trusted partners.</p>
                </div>
                <div class="how-step">
                    <h4>✅ Step 5: Manage Everything From Your Dashboard</h4>
                    <ul>
                        <li>Access your profile, inquiries, messages, ads, and account settings in one place.</li>
                        <li>Stay organized and in control of your B2B operations.</li>
                    </ul>
                </div>
            <?php endif; ?>
            
            <div class="ready-to-grow" <?php 
                $ready_to_grow = get_field('ready_to_grow', 'option');
                if( $ready_to_grow && $ready_to_grow['background_image'] ): 
                    $bg_image = $ready_to_grow['background_image'];
                    $bg_image_url = $bg_image['url'];
                    echo 'style="background-image: url(\'' . esc_url($bg_image_url) . '\')"';
                endif; 
            ?>>
                <?php if( $ready_to_grow && $ready_to_grow['title'] ): ?>
                    <h4><?php echo esc_html($ready_to_grow['title']); ?></h4>
                <?php else: ?>
                    <h4>Ready to Grow?</h4>
                <?php endif; ?>
                
                <?php if( $ready_to_grow && $ready_to_grow['button_text'] && $ready_to_grow['button_link'] ): ?>
                    <a href="<?php echo esc_url($ready_to_grow['button_link']); ?>" class="btn btn-primary">
                        <?php echo esc_html($ready_to_grow['button_text']); ?>
                    </a>
                <?php else: ?>
                    <a href="#" class="btn btn-primary">Join Now</a>
                <?php endif; ?>
                
                <?php if( $ready_to_grow && $ready_to_grow['description'] ): ?>
                    <p class="mt-2"><?php echo esc_html($ready_to_grow['description']); ?></p>
                <?php else: ?>
                    <p class="mt-2">It's free to start listing and connecting today.</p>
                <?php endif; ?>
            </div>
        </div>
        
        <!-- Why It Works -->
        <div class="why-it-works">
            <h3 class="text-center mb-4">Why It Works</h3>
            <ul class="list-unstyled text-center">
                <?php 
                $why_it_works = get_field('why_it_works', 'option');
                if( $why_it_works ): 
                    foreach( $why_it_works as $item ): 
                ?>
                    <li>✔ <?php echo esc_html($item['title']); ?></li>
                <?php 
                    endforeach; 
                else: 
                ?>
                    <li>✔ Fast & easy registration</li>
                    <li>✔ Global exposure for your products</li>
                    <li>✔ Direct access to verified buyers & sellers</li>
                    <li>✔ Industry-specific tools for agri-food trade</li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</section>

<?php get_footer(); ?>