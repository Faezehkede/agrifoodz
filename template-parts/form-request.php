<div class="form-wrapper">
  <h2>Send one request, receive multiple offers!</h2>
  <p>Connect with thousands of suppliers and compare the best prices.</p>


  <?php echo do_shortcode('[buyer_request_form]'); ?>
  
  <!-- <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST">
    <input type="hidden" name="action" value="handle_request_form">

    <label>Product Category: *</label>
    <input type="text" name="category_name" id="category_name" readonly placeholder="Choose category..." onclick="openCategoryModal()" />
    <input type="hidden" name="selected_category_id" id="selected_category_id" />


    <label>Product Type:</label>
    <input type="text" name="type" placeholder='Example: "Camarosa"' />

    <label>Required Quantity (kg): *</label>
    <input type="text" name="quantity" required placeholder='Example: "50,000"' />

    <?php if (is_user_logged_in()) : ?>
      <button class="btn" type="submit">Contact Supplier</button>
    <?php else : ?>
      <?php echo do_shortcode('[smart_auth_popup_trigger reload="/" text="Login to continue"]'); ?>
    <?php endif; ?>

    <?php if (is_user_logged_in()) : ?>
      <button class="btn" type="submit">Send Request</button>
    <?php else : ?>
      <?php echo do_shortcode('[smart_auth_popup_trigger reload="/" text="Login to continue"]'); ?>
    <?php endif; ?>

  </form> -->

  <div id="form-result" style="margin-top:10px;"></div>
</div>


<div id="category-modal" class="category-modal" style="display:none;">
  <div class="category-modal-content">
    <span class="close-modal" onclick="closeCategoryModal()">×</span>
    <h3>Select Category</h3>

    <input type="text" id="category-search" placeholder="Search categories..." />
    <div id="back-button" class="back-button" style="display:none;" onclick="goBack()">← Back</div>
    <div id="category-levels"><p class="loading-message">Loading...</p></div>
  </div>
</div>
