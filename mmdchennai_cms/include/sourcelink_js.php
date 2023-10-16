<script src="vendors/scripts/core.js"></script>
<script src="vendors/scripts/script.min.js"></script>
<script src="vendors/scripts/process.js"></script>
<script src="vendors/scripts/layout-settings.js"></script>

<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
<!-- <script src="src/plugins/dialog/sweetalert2.min.js"></script>
<script src="src/plugins/dialog/dialog-active.js"></script> -->
<!-- buttons for Export datatable -->
<script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>
<script src="src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
<script src="src/plugins/datatables/js/buttons.print.min.js"></script>
<script src="src/plugins/datatables/js/buttons.html5.min.js"></script>
<script src="src/plugins/datatables/js/buttons.flash.min.js"></script>
<script src="src/plugins/datatables/js/pdfmake.min.js"></script>
<script src="src/plugins/datatables/js/vfs_fonts.js"></script>
<!-- Datatable Setting js -->
<script src="vendors/scripts/datatable-setting.js"></script>
<script src="vendors/scripts/dashboard.js"></script>
<script src="vendors/scripts/tinymce/jquery.tinymce.min.js"></script>
<script src="vendors/scripts/tinymce/custom.tinymce.js"></script>
<script src="vendors/scripts/tinymce/tinymce.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.js" integrity="sha512-Fq/wHuMI7AraoOK+juE5oYILKvSPe6GC5ZWZnvpOO/ZPdtyA29n+a5kVLP4XaLyDy9D1IBPYzdFycO33Ijd0Pg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="src/plugins/sha512/sha512.min.js"></script>
<script src="src/plugins/sha512/sha512.js"></script>
<!-- add sweet alert js & css in footer -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script src="src/plugins/sweetalert2/sweetalert2.all.js"></script>
<script src="src/plugins/sweetalert2/sweet-alert.init.js"></script>
<script src="src/plugins/jquery-ui/jquery-ui.min.js" ></script>


<div class="modal animated fade" id="uploadmodal" role="dialog" tabindex="-1" data-keyboard="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style=" border-bottom: 1px solid #e8e8e8;">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-2">
                            <img src="vendors/images/logo.gif" alt="MMD Logo">
                        </div>
                        <div class="col-lg-9">
                            <h3 class="text-center">Select Document</h3>
                        </div>
                        <div class="col-lg-1">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                    </div>
                </div>


                <span hidden id="StatusType"></span>
                <span id="get_foldername" hidden></span>


            </div>
            <div class="modal-body scroll-content" style="padding-top:10px;overflow-y: overlay;overflow-x: overlay;">
                <div class="row">
                    <!-- <div class="col-lg-12">
                        <div class="col-lg-2">
                            <button class="btn btn-success notika-btn-success pull-left" data-toggle="modal" data-target="#mediamodal" style="margin-left:10px;"><i class="icofont icofont-plus"> </i> Add New</button>
                        </div>
                        

                        <div class="col-lg-3">
                            <div class="container mb-3 mt-3">
                                <button class="btn btn-default btn-grid" title="Grid View"><i class="fa fa-th"></i></button>
                                <button class="btn btn-default btn-list" title="List View"><i class="fa fa-list-ul"></i></button>
                            </div>
                           
                        </div>
                    </div> -->
                </div>
                <div class="row" style="padding-top:15px;">
                    <div class="col-lg-12" id="get_media">

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</body>
<script>
    $(document).ready(function() {
        tynymce();
    });

    function tynymce() {

        tinymce.init({
            selector: '.tinymce',
            browser_spellcheck: true,
            file_picker_types: 'image',
            relative_urls: false,
            // menubar: false,

            convert_urls: false,
            document_base_url: 'https://rtionline.tn.gov.in/mmdchennai/mmdchennai_cms/uploads/media/',
            images_upload_base_path: 'https://rtionline.tn.gov.in/mmdchennai/mmdchennai_cms/uploads/media/',
            // images_upload_base_path: 'http://localhost:8080/niotadmin/uploads',
            images_upload_credentials: true,
            // a11y_advanced_options: true,
            images_upload_url: {
                "location": "https://rtionline.tn.gov.in/mmdchennai/mmdchennai_cms/uploads/media/"
            },
            file_picker_callback: function(callback, value, meta) {
                // Provide file and text for the link dialog
                if (meta.filetype == 'file') {
                    callback('mypage.html', {
                        text: 'My text'
                    });
                }

                // Provide image and alt text for the image dialog
                if (meta.filetype == 'image') {
                    callback('https://rtionline.tn.gov.in/mmdchennai/mmdchennai_cms/uploads/media/', {
                        alt: 'My alt text'
                    });
                }

                // Provide alternative source and posted for the media dialog
                if (meta.filetype == 'media') {
                    callback('movie.mp4', {
                        source2: 'alt.ogg',
                        poster: 'image.jpg'
                    });
                }
            },
            content_style: 'th,tr { min-width: 50%; max-width: 100%; }',
            // table_advtab: false,
            // table_row_advtab: false,
            // table_cell_advtab: false,
            // table_grid: false,
            // table_style_by_css: false,
            // tableclass: false,
            // invalid_styles: {
            //     'table': 'width height',
            //     'tr': 'width height',
            //     'th': 'width height',
            //     'td': 'width height'
            // },
            // object_resizing : ":not(table)",
            //             table_default_attributes: {},
            // table_default_styles: {},
            // resize: false,
            // images_upload_credentials: true,
            // images_file_types: 'jpg,svg,webp',
            // images_upload_handler: function(blobInfo, success, failure) {
            //     setTimeout(function() {
            //         /* no matter what you upload, we will turn it into TinyMCE logo :)*/
            //         success({
            //             location: 'http://localhost:8080/niotadmin/uploads'
            //         });
            //     }, 2000);
            // },
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
            plugins: 'advlist autolink  lists link image  charmap anchor searchreplace visualblocks code insertdatetime media  codesample table preview',
            toolbar: "preview undo redo | fontfamily styleselect fontsizeselect | bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | codesample action section button | custom_button | table tabledelete | tableprops tablerowprops tablecellprops | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol superscript subscript ",
            // content_css: [window.location.origin+"/assets/css/custom_css_tinymce.css"],
            font_formats: "Segoe UI=Segoe UI;Arial=arial,helvetica,sans-serif;Courier New=courier new,courier,monospace;AkrutiKndPadmini=Akpdmi-n",
            fontsize_formats: "8px 9px 10px 11px 12px 14px 16px 18px 20px 22px 24px 26px 28px 30px 32px 34px 36px 38px 40px 42px 44px 46px 48px 50px 52px 54px 56px 58px 60px 62px 64px 66px 68px 70px 72px 74px 76px 78px 80px 82px 84px 86px 88px 90px 92px 94px 94px 96px",
            // advlist_bullet_styles: 'square',
            codesample_languages: [{
                    text: 'HTML/XML',
                    value: 'markup'
                },
                {
                    text: 'JavaScript',
                    value: 'javascript'
                },
                {
                    text: 'CSS',
                    value: 'css'
                },
                {
                    text: 'PHP',
                    value: 'php'
                },
                {
                    text: 'Ruby',
                    value: 'ruby'
                },
                {
                    text: 'Python',
                    value: 'python'
                },
                {
                    text: 'Java',
                    value: 'java'
                },
                {
                    text: 'C',
                    value: 'c'
                },
                {
                    text: 'C#',
                    value: 'csharp'
                },
                {
                    text: 'C++',
                    value: 'cpp'
                }
            ],
            table_style_by_css: false,
            height: 400,
            statusbar: false,
            setup: function(editor) {
                editor.ui.registry.addButton('custom_button', {
                    text: 'Add Button',
                    onAction: function() {
                        // Open a Dialog
                        editor.windowManager.open({
                            title: 'Add custom button',
                            body: {
                                type: 'panel',
                                items: [{
                                    type: 'input',
                                    name: 'button_label',
                                    label: 'Button label',
                                    flex: true
                                }, {
                                    type: 'input',
                                    name: 'button_href',
                                    label: 'Button href',
                                    flex: true
                                }, {
                                    type: 'selectbox',
                                    name: 'button_target',
                                    label: 'Target',
                                    items: [{
                                            text: 'None',
                                            value: ''
                                        },
                                        {
                                            text: 'New window',
                                            value: '_blank'
                                        },
                                        {
                                            text: 'Self',
                                            value: '_self'
                                        },
                                        {
                                            text: 'Parent',
                                            value: '_parent'
                                        }
                                    ],
                                    flex: true
                                }, {
                                    type: 'selectbox',
                                    name: 'button_rel',
                                    label: 'Rel',
                                    items: [{
                                            text: 'No value',
                                            value: ''
                                        },
                                        {
                                            text: 'Alternate',
                                            value: 'alternate'
                                        },
                                        {
                                            text: 'Help',
                                            value: 'help'
                                        },
                                        {
                                            text: 'Manifest',
                                            value: 'manifest'
                                        },
                                        {
                                            text: 'No follow',
                                            value: 'nofollow'
                                        },
                                        {
                                            text: 'No opener',
                                            value: 'noopener'
                                        },
                                        {
                                            text: 'No referrer',
                                            value: 'noreferrer'
                                        },
                                        {
                                            text: 'Opener',
                                            value: 'opener'
                                        }
                                    ],
                                    flex: true
                                }, {
                                    type: 'selectbox',
                                    name: 'button_style',
                                    label: 'Style',
                                    items: [{
                                            text: 'Success',
                                            value: 'success'
                                        },
                                        {
                                            text: 'Info',
                                            value: 'info'
                                        },
                                        {
                                            text: 'Warning',
                                            value: 'warning'
                                        },
                                        {
                                            text: 'Error',
                                            value: 'error'
                                        }
                                    ],
                                    flex: true
                                }]
                            },
                            extended_valid_elements: 'table[class="table table-bordered table-striped hover"]',
                            style_formats: [{
                                title: 'Unstyled list',
                                selector: 'ul,ol,li',
                                classes: 'list-none'
                            }],
                            onSubmit: function(api) {

                                var html = '<a rel="noopener"  href="' + api.getData().button_href + '" class="btn btn-' + api.getData().button_style + '" rel="' + api.getData().button_rel + '" target="' + api.getData().button_target + '">' + api.getData().button_label + '</a>';

                                // insert markup
                                editor.insertContent(html);

                                // close the dialog
                                api.close();
                            },
                            buttons: [{
                                    text: 'Close',
                                    type: 'cancel',
                                    onclick: 'close'
                                },
                                {
                                    text: 'Insert',
                                    type: 'submit',
                                    primary: true,
                                    enabled: false
                                }
                            ]
                        });
                    }
                });
            },
            // automatic_uploads: true,
            // file_picker_types: 'image',
            // file_browser_callback : false,
            // file_picker_callback: function(cb, value, meta) {
            //     var input = document.createElement('input');
            //     input.setAttribute('type', 'file');
            //     input.setAttribute('accept', 'image/*');

            //     /*
            //       Note: In modern browsers input[type="file"] is functional without
            //       even adding it to the DOM, but that might not be the case in some older
            //       or quirky browsers like IE, so you might want to add it to the DOM
            //       just in case, and visually hide it. And do not forget do remove it
            //       once you do not need it anymore.
            //     */

            //     input.onchange = function() {
            //         var file = this.files[0];

            //         var reader = new FileReader();
            //         reader.onload = function() {
            //             /*
            //               Note: Now we need to register the blob in TinyMCEs image blob
            //               registry. In the next release this part hopefully won't be
            //               necessary, as we are looking to handle it internally.
            //             */
            //             // var id = 'blobid' + (new Date()).getTime();
            //             // var blobCache = tinymce.activeEditor.editorUpload.blobCache;
            //             // var base64 = reader.result.split(',')[1];
            //             // var blobInfo = blobCache.create(id, file, base64);
            //             // blobCache.add(blobInfo);

            //             /* call the callback and populate the Title field with the file name */
            //             cb(blobInfo.blobUri(), {
            //                 title: file.name
            //             });
            //         };
            //         reader.readAsDataURL(file);
            //         console.log(file, blobInfo);
            //     };

            //     input.click();
            // },
        });
    }

    function get_media() {
        var status = $('#sltmedia').val();

        data = {
            status: status
        }
        $.ajax({
            type: 'POST',
            // contentType: "application/json",
            // dataType: "json",
            url: 'webservice/get_modal_media.php',
            data: data,
            success: function(response, textStatus, xhr) {

                console.log(response);

                $("#get_media").html(response);

            },
            complete: function(xhr) {

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                var response = XMLHttpRequest;
                swal("Error :Archive!", "Please try again", "error");

            }
        });
    }

    function get_newmedia() {

        var status = $('#sltmedia').val();

        data = {
            status: status,

        }

        $.ajax({
            type: 'POST',
            // contentType: "application/json",
            // dataType: "json",
            url: 'webservice/get_modal_newmedia.php',
            data: data,
            success: function(response, textStatus, xhr) {

                console.log(response);

                $("#get_media").html(response);

            },
            complete: function(xhr) {

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                var response = XMLHttpRequest;
                swal("Error !", "Please try again", "error");

            }
        });
    }
</script>