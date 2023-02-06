<?php

/**
 * @var $form TbActiveForm
 * @var $model
 * @var $attribute string
 * @var $folder
 * @var $accept string
 * @var $upload_url string
 * @var $itemGroupCssClass
 */

if (!isset($itemGroupCssClass)) {
    $itemGroupCssClass = 'form-group';
}
if (!isset($accept)) {
    $accept = '*';
}
$DS = DIRECTORY_SEPARATOR;
$url = !empty($model->$attribute) ? $model->$attribute : Yii::app()->theme->baseUrl . $DS . 'images' . $DS . 'upload-icon.png';
$id = CHtml::activeId($model, $attribute);
$name = CHtml::activeName($model, $attribute);
?>

<div class="<?php echo $itemGroupCssClass ?>">
    <?php echo $form->labelEx($model, $attribute); ?>
    <?php echo $form->hiddenField($model, $attribute) ?>

    <input type="file" id="fileChooser_<?php echo $id ?>" accept="<?php echo $accept ?>" class="hidden">

    <a onclick="$('#fileChooser_<?php echo $id ?>').trigger('click');" class="btn btn-default text-center" style="display: block">
        <img id="preview_<?php echo $id ?>" src="<?php echo  $url ?>" style="height: auto; max-width: 90%" />
    </a>

    <?php echo $form->error($model, $attribute) ?>
</div>

<script>
    $(document).ready(function() {
        $('#fileChooser_<?php echo $id ?>').on('change', function() {
            if (this.files && this.files[0]) {
                var self = this;
                var formData = new FormData();
                formData.append('<?php echo $name ?>', this.files[0]);
                formData.append('attribute', '<?php echo $attribute ?>');
                formData.append('YII_CSRF_TOKEN', '<?php echo Yii::app()->request->csrfToken ?>');
                $.ajax({
                    url: '<?php echo $upload_url ?>',
                    type: 'POST',
                    dataType: 'json',
                    data: formData,
                    processData: false, // tell jQuery not to process the data
                    contentType: false, // tell jQuery not to set contentType
                    success: function(result) {
                        console.log(result);
                        if (result.success) {
                            $('#preview_<?php echo $id ?>').attr('src', result.data.url);
                            $('#<?php echo $id ?>').val(result.data.url);
                        } else {
                            alert(result.error.<?php echo $attribute ?>);
                        }
                    }
                });
            }
        });
    });
</script>