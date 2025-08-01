jQuery(document).ready(function ($) {
    const userId = userImageData.userId;
    const ajaxUrl = userImageData.ajaxUrl;

    const $dropArea = $('#image-drop-area');
    const $imageInput = $('#image-upload');
    const $submitBtn = $('#submit-upload');
    const $form = $('#upload-images-form');
    const $preview = $('#image-preview');
    const $progress = $('#progress');
    const $loadingPopup = $('#loading-popup');
    const $loadingBar = $('#loading-bar');

    // ----------------------------
    // Drag & Drop Events
    // ----------------------------
    $dropArea.on('dragover', function (e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).addClass('drag-over');
    });

    $dropArea.on('dragleave', function (e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).removeClass('drag-over');
    });

    $dropArea.on('drop', function (e) {
        e.preventDefault();
        e.stopPropagation();
        const files = e.originalEvent.dataTransfer.files;
        $imageInput[0].files = files;
        $(this).removeClass('drag-over');
    });

    // ----------------------------
    // Submit Image Upload Form
    // ----------------------------
    $form.on('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(this);
        formData.append('action', 'upload_user_images');
        formData.append('user_id', userId);

        $loadingPopup.show(); // Show the loading popup
        $loadingBar.css('width', '0%');

        $.ajax({
            url: ajaxUrl,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $progress.html('<p>Uploading...</p>');
            },
            xhr: function () {
                const xhr = new XMLHttpRequest();
                xhr.upload.addEventListener('progress', function (e) {
                    if (e.lengthComputable) {
                        const percent = (e.loaded / e.total) * 100;
                        $loadingBar.css('width', percent + '%');
                    }
                }, false);
                return xhr;
            },
            success: function (response) {
                if (response.success) {
                    $progress.html('<p>Images uploaded successfully!</p>');
                    renderImages(response.data.images);
                    $loadingPopup.hide();
                } else {
                    $progress.html('<p>Error uploading images.</p>');
                    $loadingPopup.hide();
                }
            },
            error: function () {
                $progress.html('<p>Network error or invalid response.</p>');
                $loadingPopup.hide();
            }
        });
    });

    // ----------------------------
    // Load Saved Images
    // ----------------------------
    function loadSavedImages() {
        $.ajax({
            url: ajaxUrl,
            type: 'POST',
            data: {
                action: 'get_saved_images',
                user_id: userId
            },
            success: function (response) {
                if (response.success) {
                    const imagesArray = Object.values(response.data.images);
                    if (imagesArray.length === 0) {
                        $('#no-images-message').show(); // Show message if no images exist
                    } else {
                        $('#no-images-message').hide(); // Hide the message
                        renderImages(imagesArray);
                    }
                } else {
                    $('#no-images-message').show(); // Show message if there's an error
                }
            },
            error: function () {
                console.log('Error in AJAX request');
            }
        });
    }

    // ----------------------------
    // Render Images in DOM
    // ----------------------------
    function renderImages(images) {
        let imagesHTML = '';
        images.forEach(imageURL => {
            imagesHTML += `
                <div class="image-preview-item">
                    <img src="${imageURL}" alt="Image" />
                    <button class="delete-image" data-url="${imageURL}"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="30px" height="30px"> <path d="M20.5001 6H3.5" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/> <path d="M9.5 11L10 16" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/> <path d="M14.5 11L14 16" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/> <path d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6" stroke="#1C274C" stroke-width="1.5"/> <path d="M18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5M18.8334 8.5L18.6334 11.5" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/> </svg></button>
                </div>
            `;
        });
        $preview.html(imagesHTML);
    }

    // ----------------------------
    // Delete Image
    // ----------------------------
    $preview.on('click', '.delete-image', function () {
        const imageURL = $(this).data('url');

        if (confirm("Are you sure you want to delete this image?")) {
            $.ajax({
                url: ajaxUrl,
                type: 'POST',
                data: {
                    action: 'delete_user_image',
                    image_url: imageURL,
                    user_id: userId
                },
                success: function (response) {
                    if (response.success) {
                        alert('Image deleted successfully!');
                        loadSavedImages();
                    } else {
                        alert('Error deleting image!');
                    }
                }
            });
        }
    });

    // ----------------------------
    // Initial Execution
    // ----------------------------
    loadSavedImages();
});



jQuery(document).ready(function ($) {
    const userId = userImageData.userId;
    const ajaxUrl = userImageData.ajaxUrl;

    const $dropArea = $('#image-drop-area_company');
    const $imageInput = $('#image-upload_company');
    const $submitBtn = $('#submit-upload_company');
    const $form = $('#upload-images-form_company');
    const $preview = $('#image-preview_company');
    const $progress = $('#progress_company');
    const $loadingPopup = $('#loading-popup_company');
    const $loadingBar = $('#loading-bar_company');

    // ----------------------------
    // Drag & Drop Events
    // ----------------------------
    $dropArea.on('dragover', function (e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).addClass('drag-over');
    });

    $dropArea.on('dragleave', function (e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).removeClass('drag-over');
    });

    $dropArea.on('drop', function (e) {
        e.preventDefault();
        e.stopPropagation();
        const files = e.originalEvent.dataTransfer.files;
        $imageInput[0].files = files;
        $(this).removeClass('drag-over');
    });

    // ----------------------------
    // Submit Image Upload Form
    // ----------------------------
    $form.on('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(this);
        formData.append('action', 'upload_user_images_company');
        formData.append('user_id', userId);

        $loadingPopup.show(); // Show the loading popup
        $loadingBar.css('width', '0%');

        $.ajax({
            url: ajaxUrl,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $progress.html('<p>Uploading...</p>');
            },
            xhr: function () {
                const xhr = new XMLHttpRequest();
                xhr.upload.addEventListener('progress', function (e) {
                    if (e.lengthComputable) {
                        const percent = (e.loaded / e.total) * 100;
                        $loadingBar.css('width', percent + '%');
                    }
                }, false);
                return xhr;
            },
            success: function (response) {
                if (response.success) {
                    $progress.html('<p>Images uploaded successfully!</p>');
                    renderImages(response.data.images);
                    $loadingPopup.hide();
                } else {
                    $progress.html('<p>Error uploading images.</p>');
                    $loadingPopup.hide();
                }
            },
            error: function () {
                $progress.html('<p>Network error or invalid response.</p>');
                $loadingPopup.hide();
            }
        });
    });

    // ----------------------------
    // Load Saved Images
    // ----------------------------
    function loadSavedImagesCompany() {
        $.ajax({
            url: ajaxUrl,
            type: 'POST',
            data: {
                action: 'get_saved_images_company',
                user_id: userId
            },
            success: function (response) {
                if (response.success) {
                    const imagesArray = Object.values(response.data.images);
                    if (imagesArray.length === 0) {
                        $('#no-images-message').show(); // Show message if no images exist
                    } else {
                        $('#no-images-message').hide(); // Hide the message
                        renderImages(imagesArray);
                    }
                } else {
                    $('#no-images-message').show(); // Show message if there's an error
                }
            },
            error: function () {
                console.log('Error in AJAX request');
            }
        });
    }

    // ----------------------------
    // Render Images in DOM
    // ----------------------------
    function renderImages(images) {
        let imagesHTML = '';
        images.forEach(imageURL => {
            imagesHTML += `
                <div class="image-preview-item">
                    <img src="${imageURL}" alt="Image" />
                    <button class="delete-image" data-url="${imageURL}"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="30px" height="30px"> <path d="M20.5001 6H3.5" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/> <path d="M9.5 11L10 16" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/> <path d="M14.5 11L14 16" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/> <path d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6" stroke="#1C274C" stroke-width="1.5"/> <path d="M18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5M18.8334 8.5L18.6334 11.5" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/> </svg></button>
                </div>
            `;
        });
        $preview.html(imagesHTML);
    }

    // ----------------------------
    // Delete Image
    // ----------------------------
    $preview.on('click', '.delete-image', function () {
        const imageURL = $(this).data('url');

        if (confirm("Are you sure you want to delete this image?")) {
            $.ajax({
                url: ajaxUrl,
                type: 'POST',
                data: {
                    action: 'delete_user_image__company',
                    image_url: imageURL,
                    user_id: userId
                },
                success: function (response) {
                    if (response.success) {
                        alert('Image deleted successfully!');
                        renderImages();
                    } else {
                        alert('Error deleting image!');
                    }
                }
            });
        }
    });

    // ----------------------------
    // Initial Execution
    // ----------------------------
    loadSavedImagesCompany();
});