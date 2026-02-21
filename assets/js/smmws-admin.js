jQuery(document).ready(function($) {
    // Initialize color pickers
    $('.smmws-color-picker').wpColorPicker();

    // Media uploader for logo
    var mediaUploader;
    $('#smmws-upload-logo').on('click', function(e) {
        e.preventDefault();

        if (mediaUploader) {
            mediaUploader.open();
            return;
        }

        mediaUploader = wp.media({
            title: smmws_admin_vars.select_logo,
            button: {
                text: smmws_admin_vars.use_as_logo
            },
            multiple: false,
            library: {
                type: 'image'
            }
        });

        mediaUploader.on('select', function() {
            var attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#smmws_logo').val(attachment.url);
            $('#smmws-logo-preview').html('<img src="' + attachment.url + '" alt="Logo preview" style="max-width: 200px; max-height: 100px; display: block;">');
            $('#smmws-remove-logo').show();
        });

        mediaUploader.open();
    });

    $('#smmws-remove-logo').on('click', function(e) {
        e.preventDefault();
        $('#smmws_logo').val('');
        $('#smmws-logo-preview').html('');
        $(this).hide();
    });
});
