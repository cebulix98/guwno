function initializeTooltip() {
    $('[data-toggle="tooltip"]').tooltip({
        boundary: 'window',
        container: 'body'
    });
}

function initializePopover() {
    $('[data-toggle="popover"]').popover({
        container: 'body'
    });
}

function DeleteElement() {
    $txt = MESSAGES.confirm_delete;
    if (window.confirm($txt)) {
        return true;
    }
    return false;
}

function LeaveClub() {
    $txt = MESSAGES.confirm_leave_club;
    if (window.confirm($txt)) {
        return true;
    }
    return false;
}

function initializeSlick() {
    $('.slick-carousel').slick({
        infinite: true,
        arrows: true,
        slidesToShow: 5,
        slidesToScroll: 5,
        responsive: [
            {
                breakpoint: 1280,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    infinite: true,
                }
            },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    infinite: true,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    infinite: false,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    infinite: false,
                }
            }
        ]
    });
}


$(function () {
    $('.collapse-arrow-toggle').click(function () {
        $("i", this).toggleClass("fa fa-angle-up fa fa-angle-down");
    });
});

$(document).ready(function () {
    // initializeTooltip();
    // initializePopover();
});



$('img').on("error", function () {
    $(this).attr('src', '/storage/placeholders/placeholder.png');
});

function InitializeTinymce() {
    tinymce.init({
        mode: "specific_textareas",
        editor_selector: 'editor_textarea',
        language_url: 'http://tinymce.cachefly.net/4.2/langs/pl.js',
        automatic_uploads: true,
        plugins: ['code advlist autolink lists link image imagetools preview table toc media paste importcss searchreplace autolink directionality visualblocks visualchars fullscreen template charmap hr pagebreak nonbreaking anchor toc insertdatetime wordcount textpattern noneditable help quickbars visualblocks'],
        toolbar: ['undo redo paste pastetext | formatselect fontselect fontsizeselect | ' +
            'bold italic underline strikethrough backcolor forecolor hr nonbreaking | image charmap media link anchor template insertdatetime | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | pagebreak | fullscreen code preview | ltr rtl toc | wordcount' ,
        ],
        file_picker_types: 'image',
        file_picker_callback: function (cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');

            /*
              Note: In modern browsers input[type="file"] is functional without
              even adding it to the DOM, but that might not be the case in some older
              or quirky browsers like IE, so you might want to add it to the DOM
              just in case, and visually hide it. And do not forget do remove it
              once you do not need it anymore.
            */

            input.onchange = function () {
                var file = this.files[0];

                var reader = new FileReader();
                reader.onload = function () {
                    /*
                      Note: Now we need to register the blob in TinyMCEs image blob
                      registry. In the next release this part hopefully won't be
                      necessary, as we are looking to handle it internally.
                    */
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);

                    /* call the callback and populate the Title field with the file name */
                    cb(blobInfo.blobUri(), {
                        title: file.name
                    });
                };
                reader.readAsDataURL(file);
            };

            input.click();
        }
    });
}

function InitializeSimpleTinymce() {
    tinymce.init({
        mode: "specific_textareas",
        editor_selector: 'editor_simple_textarea',
        language_url: 'http://tinymce.cachefly.net/4.2/langs/pl.js',
        automatic_uploads: true,
        plugins: ['code advlist autolink lists link image imagetools preview table toc media paste importcss searchreplace autolink directionality visualblocks visualchars fullscreen template charmap hr pagebreak nonbreaking anchor toc insertdatetime wordcount textpattern noneditable help quickbars visualblocks'],
        toolbar: ['fullscreen code preview'],
        file_picker_types: 'image',
        file_picker_callback: function (cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');

            input.onchange = function () {
                var file = this.files[0];

                var reader = new FileReader();
                reader.onload = function () {
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);

                    /* call the callback and populate the Title field with the file name */
                    cb(blobInfo.blobUri(), {
                        title: file.name
                    });
                };
                reader.readAsDataURL(file);
            };

            input.click();
        }
    });
}
