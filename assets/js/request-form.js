let categoryStack = [];

function openCategoryModal() {
  categoryStack = [];
  jQuery('#category-modal').show();
  jQuery('#category-search').val('');
  jQuery('#back-button').hide();
  loadCategories(0);
}

function closeCategoryModal() {
  jQuery('#category-modal').hide();
  jQuery('#category-search').val('');
  jQuery('#category-levels').html('');
}

function loadCategories(parentId, label = 'Top Level') {
  jQuery('#category-levels').html('<p class="loading-message">Loading...</p>');
  jQuery('#back-button').toggle(categoryStack.length > 0);

  jQuery.ajax({
    url: ajax_object.ajax_url,
    method: 'POST',
    data: {
      action: 'get_child_categories',
      parent_id: parentId
    },
    success: function (response) {
      let data;
      try {
        data = typeof response === "object" ? response : JSON.parse(response);
      } catch (e) {
        console.error("خطا در پارس کردن پاسخ:", response);
        return;
      }

      renderCategories(data.categories, parentId, label);
    }
  });
}

function renderCategories(categories, parentId, label) {
  jQuery('#category-levels').empty();

  if (!categories.length) {
    if (parentId === 0) {
      jQuery('#category-levels').html('<p>No categories found.</p>');
      return;
    }

    categoryStack.push({ id: parentId, label: label });

    const breadcrumb = categoryStack.map(item => item.label).join(' > ');
    jQuery('#selected_category_id').val(parentId);
    jQuery('#category_name').val(breadcrumb);

    closeCategoryModal();
    return;
  }

  categoryStack.push({ id: parentId, label: label });

  categories.forEach(cat => {
    const item = jQuery(`<div class="category-item ${cat.has_children ? 'parent' : ''}">${cat.name}</div>`);
    item.click(() => loadCategories(cat.id, cat.name));
    jQuery('#category-levels').append(item);
  });
}


function goBack() {
  categoryStack.pop();
  const previous = categoryStack.length ? categoryStack[categoryStack.length - 1] : { id: 0, label: 'Top Level' };
  categoryStack.pop();
  loadCategories(previous.id, previous.label);
}

// AJAX ارسال فرم
jQuery('#request-form').on('submit', function (e) {
  e.preventDefault();

  const formData = jQuery(this).serialize();
  jQuery.post(ajax_object.ajax_url, {
    action: 'handle_request_form_ajax',
    data: formData
  }, function (response) {
    jQuery('#form-result').html('<p style="color:green;">Your request was submitted and is pending approval.</p>');
    jQuery('#request-form')[0].reset();
    jQuery('#category_name').val('');
  });
});
