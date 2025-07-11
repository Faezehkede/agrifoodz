<?php
/**
 * Template Name: Buyer List
 * Template Post Type: page
 */

get_header(); ?>

<div class="buyers-detail container">

    <div class="buyer-rfqs">
        <h3>RFQs</h3>
        <button>Categories</button>
    </div>

    <div class="buyer-newsletter">
        <div class="buyer-newsletter-img">
            <img src="<?php echo AGRIFOODZ_ASSETS; ?>/images/email.gif" alt="Email">
        </div>
        <div class="buyer-newsletter-text">
            <div class="buyer-newsletter-img-mobile">
                <img src="<?php echo AGRIFOODZ_ASSETS; ?>/images/email.gif" alt="Email">
                <div>
                <h2>Trade smart!</h2>
                <p>Get the top "RFQ" wholesale buyers contact list for free!</p>
                </div>
            </div>
            <div>
                <input type="text" placeholder="Your Email">
                <button class="disabled">
                    Send me
                </button>
            </div>
        </div>
    </div>

    <div class="buyer-newproduct">
        <svg width="100px" height="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 33 32" fill="#000000">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
                <g>
                    <path fill="#828282" d="M1.5,32h21c0.827,0,1.5-0.673,1.5-1.5V23c0-0.01-0.005-0.018-0.006-0.028 c0.055-0.035,0.112-0.068,0.166-0.105l7.986,7.986C32.244,30.951,32.372,31,32.5,31s0.256-0.049,0.354-0.146 c0.195-0.195,0.195-0.512,0-0.707l-7.913-7.913C26.205,21.047,27,19.366,27,17.5c0-2.297-1.201-4.316-3.006-5.472 C23.995,12.018,24,12.01,24,12V9.5c0-0.017-0.008-0.031-0.009-0.047c-0.002-0.023-0.008-0.043-0.013-0.065 c-0.017-0.071-0.046-0.135-0.09-0.191c-0.007-0.009-0.006-0.02-0.013-0.029l-8-9c-0.003-0.003-0.007-0.003-0.01-0.006 c-0.06-0.065-0.137-0.108-0.223-0.134c-0.019-0.006-0.036-0.008-0.056-0.011C15.557,0.012,15.53,0,15.5,0h-14 C0.673,0,0,0.673,0,1.5v29C0,31.327,0.673,32,1.5,32z M26,17.5c0,3.033-2.468,5.5-5.5,5.5S15,20.533,15,17.5s2.468-5.5,5.5-5.5 S26,14.467,26,17.5z M16,1.815L22.387,9H16.5C16.28,9,16,8.58,16,8.25V1.815z M1,1.5C1,1.224,1.225,1,1.5,1H15v7.25 C15,9.059,15.655,10,16.5,10H23v1.501C22.23,11.179,21.386,11,20.5,11c-1.838,0-3.496,0.77-4.679,2H5.5C5.224,13,5,13.224,5,13.5 S5.224,14,5.5,14h9.532c-0.565,0.879-0.922,1.901-1.006,3H5.5C5.224,17,5,17.224,5,17.5S5.224,18,5.5,18h8.525 c0.084,1.099,0.442,2.121,1.006,3H5.5C5.224,21,5,21.224,5,21.5S5.224,22,5.5,22h10.25c0.021,0,0.039-0.009,0.06-0.012 C16.994,23.225,18.657,24,20.5,24c0.886,0,1.73-0.179,2.5-0.502V30.5c0,0.276-0.225,0.5-0.5,0.5h-21C1.22,31,1,30.78,1,30.5V1.5z"></path>
                    <path fill="#828282" d="M5.5,10h6c0.276,0,0.5-0.224,0.5-0.5S11.776,9,11.5,9h-6C5.224,9,5,9.224,5,9.5S5.224,10,5.5,10z"></path>
                    <path fill="#828282" d="M5.5,26h13c0.276,0,0.5-0.224,0.5-0.5S18.776,25,18.5,25h-13C5.224,25,5,25.224,5,25.5S5.224,26,5.5,26z"></path>
                </g>
            </g>
        </svg>
        <p>No buyer found!</p>
        <p>Register your product to see the buyers.</p>
        <a href="<?php echo home_url('/register'); ?>">New Product</a>
    </div>

</div>

<?php get_footer(); ?>