<!-- Cropping modal -->
<div class="modal fade" id="avatar-modal-anews" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog"
     tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form class="avatar-form"
                  action="<?php echo Yii::app()->createUrl('aImageProgress/CropImage', array('dir_upload' => (isset($dir_upload)) ? $dir_upload : '')); ?>"
                  enctype="multipart/form-data" method="post">
                <input type="hidden" name="YII_CSRF_TOKEN" value="<?php echo Yii::app()->request->csrfToken ?>"/>
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">&times;</button>
                    <h4 class="modal-title" id="avatar-modal-label">Chọn ảnh</h4>
                </div>
                <div class="modal-body">
                    <div class="avatar-body">
                        <!-- Upload image and data -->
                        <div class="avatar-upload">
                            <input class="avatar-src" name="avatar_src" type="hidden">
                            <input class="avatar-data" name="avatar_data" type="hidden">
                            <input class="avatar-input" id="avatarInput" name="avatar_file" type="file">
                        </div>

                        <!-- Crop and preview -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="avatar-wrapper"></div>
                            </div>
                            <!--                        <div class="avatar-preview preview-lg"></div>-->
                            <!--                        <div class="avatar-preview preview-md"></div>-->
                            <!--                        <div class="avatar-preview preview-sm"></div>-->
                        </div>

                        <div class="row avatar-btns">
                            <!-- <div class="col-md-9">
                                 <div class="btn-group">
                                     <button class="btn btn-primary" data-method="rotate" data-option="-90" type="button"
                                             title="Rotate -90 degrees">Rotate Left
                                     </button>
                                     <button class="btn btn-primary" data-method="rotate" data-option="-15"
                                             type="button">-15deg
                                     </button>
                                     <button class="btn btn-primary" data-method="rotate" data-option="-30"
                                             type="button">-30deg
                                     </button>
                                     <button class="btn btn-primary" data-method="rotate" data-option="-45"
                                             type="button">-45deg
                                     </button>
                                 </div>
                                 <div class="btn-group">
                                     <button class="btn btn-primary" data-method="rotate" data-option="90" type="button"
                                             title="Rotate 90 degrees">Rotate Right
                                     </button>
                                     <button class="btn btn-primary" data-method="rotate" data-option="15" type="button">
                                         15deg
                                     </button>
                                     <button class="btn btn-primary" data-method="rotate" data-option="30" type="button">
                                         30deg
                                     </button>
                                     <button class="btn btn-primary" data-method="rotate" data-option="45" type="button">
                                         45deg
                                     </button>
                                 </div>
                             </div>-->
                            <div class="col-md-12">
                                <button class="pull-right btn btn-primary avatar-save" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="modal-footer">
                  <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
                </div> -->
            </form>
            <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
        </div>
    </div>
</div>
<!-- /.modal -->

<!-- Loading state -->

<link href="<?php echo Yii::app()->theme->baseUrl ?>/cropper_image/dist/cropper.min.css" rel="stylesheet">
<link href="<?php echo Yii::app()->theme->baseUrl ?>/cropper_image/css/main.css" rel="stylesheet">


