<?php

/**
 * Template Name: Buyer Dashboard
 * Template Post Type: page
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <div id="dashboard-sidebar">
    <!-- Sidebar -->
    <aside class="sidebar">
      <div class="logo">Agrifoodz</div>
      <div class="user-info">
        <div class="user-avatar"></div>
        <div class="user-name">Pars Avesta</div>
        <div class="user-country">Iran</div>
      </div>
      <div class="role-switch">

        <button id="supplierBtn" class="role"><a href="./supplier-dashboard.html">Supplier</a></button>
        <button id="buyerBtn" class="role active">Buyer</button>
      </div>
      <nav class="nav-menu">
        <ul class="sidebar-nav">
          <li><a href="#" class="tab-link active" data-tab="myAgrifoodz">My Rexcer</a></li>
          <li><a href="#" class="tab-link" data-tab="newRFQ">New RFQ</a></li>
          <li><a href="#" class="tab-link" data-tab="messages">Messages</a></li>
          <li><a href="#" class="tab-link" data-tab="suggestedSuppliers">Suggested Suppliers</a></li>
          <li><a href="#" class="tab-link" data-tab="verification">Verification</a></li>
          <li><a href="#" class="tab-link" data-tab="saved">Saved</a></li>
          <li><a href="#" class="tab-link" data-tab="feedback">Feedback</a></li>
        </ul>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="dashboard dashboard-content">
      <header class="dashboard-header">
        <a href="./" class="return-home">
          <span>
            <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#fff">
              <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
                <path d="M22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 
                    20.7881C2 19.5763 2 17.6258 2 13.725V12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 
                    2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274"
                  stroke="#fff" stroke-width="1.5" stroke-linecap="round"></path>
                <path d="M15 18H9" stroke="#fff" stroke-width="1.5" stroke-linecap="round"></path>
              </g>
            </svg>
          </span>
        </a>
        <span>Pars Avesta</span>
      </header>
      <!-- tabs -->

      <div class="tab-panel active" id="myAgrifoodz">
        <div id="buyerContent" class="role-content">
          <div class="main-profile-detail">
            <section class="profile-card">
              <div class="profile-info">
                <div class="avatar">
                  <img src="<?php echo AGRIFOODZ_ASSETS; ?>/images/user-img1.webp">
                </div>
                <div>
                  <div class="name">Pars Avesta</div>
                  <div class="role">Buyer</div>
                </div>
              </div>
            </section>

            <section class="profile-verfying">
              <div class="profile-strength">
                <span>Profile strength: <strong>Weak</strong></span>
                <div class="strength-bar">
                  <div class="progress" style="width: 20%;"></div>
                </div>
              </div>
              <div class="verification-box">
                <div class="Verify-text">
                  <p>Verify your account</p>
                  <p>Be the most reliable buyer for sellers by verifying your identity.</p>
                </div>
                <button class="btn-verify">Get Verified</button>
              </div>
            </section>

            <section class="quick-links">
              <a href="#" class="quick-link-suppliers">Suppliers</a>
              <a href="#" class="quick-link-rfqs">My RFQs</a>
              <a href="#" class="quick-link-saved">Saved</a>
            </section>

            <section class="important-links">
              <a href="#" class="edit-profile">
                <span>
                  <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                      <path d="M11 15C10.1183 15 9.28093 14.8098 8.52682 14.4682C8.00429 14.2315 7.74302 14.1131 7.59797 14.0722C7.4472 14.0297 7.35983 14.0143 7.20361 
                                14.0026C7.05331 13.9914 6.94079 14 6.71575 14.0172C6.6237 14.0242 6.5425 14.0341 6.46558 14.048C5.23442 14.2709 4.27087 15.2344 4.04798 16.4656C4 
                                16.7306 4 17.0485 4 17.6841V19.4C4 19.9601 4 20.2401 4.10899 20.454C4.20487 20.6422 4.35785 20.7951 4.54601 20.891C4.75992 21 5.03995 21 5.6 21H8.4M15 
                                7C15 9.20914 13.2091 11 11 11C8.79086 11 7 9.20914 7 7C7 4.79086 8.79086 3 11 3C13.2091 3 15 4.79086 15 7ZM12.5898 21L14.6148 20.595C14.7914 20.5597 
                                14.8797 20.542 14.962 20.5097C15.0351 20.4811 15.1045 20.4439 15.1689 20.399C15.2414 20.3484 15.3051 20.2848 15.4324 20.1574L19.5898 16C20.1421 
                                15.4477 20.1421 14.5523 19.5898 14C19.0376 13.4477 18.1421 13.4477 17.5898 14L13.4324 18.1574C13.3051 18.2848 13.2414 18.3484 13.1908 18.421C13.1459 
                                18.4853 13.1088 18.5548 13.0801 18.6279C13.0478 18.7102 13.0302 18.7985 12.9948 18.975L12.5898 21Z" stroke="#000000" stroke-width="0.72"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                    </g>
                  </svg>
                </span>
                <p>Edit profile</p>
              </a>
              <a href="#" class="verification-link">
                <span>
                  <svg width="25px" height="25px" viewBox="-2.4 -2.4 28.80 28.80" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#000000" stroke-width="1.44">
                      <path d="M4.39254 16.2614C2.64803 13.1941 1.66074 9.71783 1.51646 6.15051C1.50127 5.77507 1.70918 5.42812 2.04153 5.25282L11.5335 0.246091C11.8254 
                                0.0920859 12.1746 0.0920859 12.4665 0.246091L21.9585 5.25282C22.2908 5.42812 22.4987 5.77507 22.4835 6.15051C22.3393 9.71783 21.352 13.1941 19.6075 
                                16.2614C17.8618 19.3307 15.4169 21.8869 12.4986 23.7001C12.1931 23.8899 11.8069 23.8899 11.5014 23.7001C8.58313 21.8869 6.13817 19.3307 4.39254 16.2614Z"
                        fill="#ffffff"></path>
                      <path d="M8.25 12.75L11.25 15L17.25 9" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </g>
                    <g id="SVGRepo_iconCarrier">
                      <path d="M4.39254 16.2614C2.64803 13.1941 1.66074 9.71783 1.51646 6.15051C1.50127 5.77507 1.70918 5.42812 2.04153 5.25282L11.5335 
                                0.246091C11.8254 0.0920859 12.1746 0.0920859 12.4665 0.246091L21.9585 5.25282C22.2908 5.42812 22.4987 5.77507 22.4835 6.15051C22.3393 9.71783 21.352 13.1941 
                                19.6075 16.2614C17.8618 19.3307 15.4169 21.8869 12.4986 23.7001C12.1931 23.8899 11.8069 23.8899 11.5014 23.7001C8.58313 21.8869 6.13817 19.3307 4.39254 
                                16.2614Z" fill="#ffffff"></path>
                      <path d="M8.25 12.75L11.25 15L17.25 9" stroke="#000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path>
                    </g>
                  </svg>
                </span>
                <p>Verification</p>
              </a>
              <a href="#" class="support-link">
                <span>
                  <svg width="25px" height="25px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="#000000" stroke-width="0.7" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#000000">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                      <title id="supportIconTitle">Support</title>
                      <path d="M18,9 L16,9 C14.8954305,9 14,9.8954305 14,11 L14,13 C14,14.1045695 
                                14.8954305,15 16,15 L16,15 C17.1045695,15 18,14.1045695 18,13 L18,9 C18,4.02943725 13.9705627,0 9,0 C4.02943725,0 0,4.02943725 0,9 L0,13 
                                C1.3527075e-16,14.1045695 0.8954305,15 2,15 L2,15 C3.1045695,15 4,14.1045695 4,13 L4,11 C4,9.8954305 3.1045695,9 2,9 L0,9" transform="translate(3 3)"></path>
                      <path d="M21,14 L21,18 C21,20 20.3333333,21 19,21 C17.6666667,21 16,21 14,21"></path>
                    </g>
                  </svg>
                </span>
                <p>Support</p>
              </a>
            </section>

          </div>
        </div>
      </div>

      <div class="tab-panel" id="newRFQ">
        <div class="category-list-wrapper">
          <div class="category-list-header" id="category-list-header">
            <h3>What product are you searching <span>to buy</span>?</h3>
            <div class="category-search-input-wrapper">
              <svg width="30px" height="30px" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" fill="transparent" stroke="#000" stroke-width="3">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                  <path class="a" d="M42.5011,42.5,35.15,34.7245a17.244,17.244,0,1,0-7.0752,4.4212"></path>
                </g>
              </svg>
              <input type="text" id="category-search" placeholder="Search product category">
            </div>
          </div>

          <div class="category-wrapper">

            <ul class="main-categories" id="main-list"></ul>
            <ul class="sub-categories" id="sub-list"></ul>

            <div id="form">
              <h3>Please enter the required product information.</h3>

              <div class="first-raw">
                <label for="type">Type of <span class="orange">Dyeing & Finishing</span></label>
                <span>E.g: Plastic Water Bottle</span>
                <input type="text" id="type" placeholder="Enter type of Dyeing & Finishing">
              </div>

              <div class="second-raw">
                <label for="amount">Requirement amount (<span style="color:red">*</span>)</label>
                <span>E.g: 50000</span>
                <div class="inline-input">
                  <input type="text" id="amount" placeholder="Enter quantity">
                  <span>Piece</span>
                </div>
              </div>

              <div class="radio-group">
                <label>Have you sourced <span class="orange">Dyeing & Finishing</span> before?</label>
                <div class="radio-option">
                  <input type="radio" id="sourced-yes" name="sourced" value="yes">
                  <label for="sourced-yes">Yes</label>
                </div>
                <div class="radio-option">
                  <input type="radio" id="sourced-no" name="sourced" value="no">
                  <label for="sourced-no">No</label>
                </div>
              </div>

              <div class="radio-group">
                <label>What are you looking for?</label>
                <div class="radio-option">
                  <input type="radio" id="option1" name="looking-for" value="source">
                  <label for="option1">Receive price and source</label>
                </div>
                <div class="radio-option">
                  <input type="radio" id="option2" name="looking-for" value="price">
                  <label for="option2">Receive price only</label>
                </div>
              </div>

              <div class="button-group">
                <button class="back-button" id="back-button">&#8592; Back</button>
                <button class="submit-button" disabled>Submit RFQ</button>
              </div>
            </div>

          </div>

        </div>
      </div>

      <div class="tab-panel" id="messages">Here are your messages</div>
      <div class="tab-panel" id="suggestedSuppliers">List of suggested suppliers</div>


      <div class="tab-panel" id="verification">

        <div class="upload-id-container">
          <h2>Upload your ID (Passport) following the correct sample</h2>
          <p>Make sure the photo of your passport isn’t blurry and that it clearly shows your face.</p>

          <div class="sample-gallery">
            <div class="sample-item valid">
              <img src="<?php echo AGRIFOODZ_ASSETS; ?>/images/sample-3-compact.webp" alt="Correct passport sample" />
              <p>All information is clearly visible.</p>
            </div>
            <div class="sample-item invalid">
              <img src="<?php echo AGRIFOODZ_ASSETS; ?>/images/sample-2-compact.webp" alt="Blurry passport" />
              <p>The photo is blurry.</p>
            </div>
            <div class="sample-item invalid">
              <img src="<?php echo AGRIFOODZ_ASSETS; ?>/images/sample-1-compact.webp" alt="Cropped passport" />
              <p>Passport is cropped.</p>
            </div>
            <div class="sample-item invalid">
              <img src="<?php echo AGRIFOODZ_ASSETS; ?>/images/sample-4-compact.webp" alt="Covered passport" />
              <p>Part of passport is covered.</p>
            </div>
          </div>

          <div class="upload-box">
            <input type="file" id="fileInput" accept="image/jpeg, image/png" hidden />
            <!--  -->
            <div class="upload-area" id="uploadArea" onclick="document.getElementById('fileInput').click()">
              <i class="upload-icon">
                <svg width="35px" height="35px" viewBox="0 0 48 48" id="a" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                  <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                  <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                  <g id="SVGRepo_iconCarrier">
                    <path class="b" d="m19.83,8.77l-2.77,2.84H6.29c-.9886,0-1.79.8014-1.79,1.79v23.22c0,.9902.7998,1.7945,1.79,1.8h35.42c.9902-.0055,1.79-.8098,1.79-1.8V13.4c0-.9886-.8014-1.79-1.79-1.79h-10.77l-2.77-2.84h-8.34Zm18.9162,5.58c1.1645,0,2.1086.8954,2.1086,2s-.944,2-2.1086,2c-1.1584-.1133-1.9995-1.1063-1.8801-2.2051.1024-.9423.8878-1.6873,1.8801-1.7949Z"></path>
                    <g>
                      <circle class="b" cx="24" cy="26.2231" r="8.5069"></circle>
                      <g>
                        <polygon class="b" points="26.4543 21.9723 21.5457 21.9723 19.0914 26.2231 21.5457 30.4739 26.4543 30.4739 
                            28.9086 26.2231 26.4543 21.9723"></polygon>
                        <line class="b" x1="28.9086" y1="26.2231" x2="31.3693" y2="30.4852"></line>
                        <line class="b" x1="16.6372" y1="21.9723" x2="19.0914"
                          y2="26.2231"></line>
                        <line class="b" x1="24" y1="17.7163" x2="21.5457" y2="21.9722"></line>
                        <line class="b" x1="26.4543" y1="30.4741" x2="24" y2="34.73"></line>
                        <line class="b" x1="21.5457" y1="30.4741" x2="16.6304" y2="30.4741"></line>
                        <line class="b" x1="26.4543" y1="21.9722" x2="31.3693" y2="21.9722"></line>
                      </g>
                    </g>
                  </g>
                </svg>
              </i>
              <p><strong>Add photo</strong></p>
              <p><small>JPEG or PNG only</small></p>
            </div>

            <button class="upload-btn" id="submitBtn" disabled>Save & continue</button>
          </div>

        </div>

      </div>


      <div class="tab-panel" id="saved">Saved products and RFQs</div>


      <div class="tab-panel" id="feedback">
        <div class="feedback-container">
          <h2>How would you describe your experience with Rexcer?</h2>
          <p class="description">Your feedback is used to improve Rexcer</p>

          <div class="emoji-list" id="emojiList">
            <!-- Emojis will be dynamically inserted here -->
          </div>

          <div id="emojiText" class="emoji-label">Average</div>

          <textarea id="opinionBox" placeholder="Write your opinion"></textarea>
          <button onclick="submitFeedback()">Submit</button>
        </div>
      </div>

    </main>

    <!-- Floating Button -->
    <button class="floating-support-btn">
      <i class="icon-headset"></i>
    </button>
  </div>

<?php wp_footer(); ?>
</body>

</html>