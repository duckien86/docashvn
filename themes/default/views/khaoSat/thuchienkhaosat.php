<?php
/* @var $this TaikhoanController */
/* @var $model Taikhoan */

$this->breadcrumbs=array(
	'Nhân viên'=>array('index'),
	'Thực hiện khảo sát',
);

// $this->menu=array(
// 	array('label'=>'List Taikhoan', 'url'=>array('index')),
// 	array('label'=>'Manage Taikhoan', 'url'=>array('admin')),
// );
?>

<!-- <h1>Upload Nhân viên</h1> -->
<?php //echo CHtml::beginForm(); ?>

<?php //$this->renderPartial('_form', array('model'=>$model)); ?>
<div class="x_panel">
    <div class="x_title">
        <!-- <h2><?= Yii::t('adm/label', 'list_categories') ?></h2> -->
        <div class="clearfix" >
            <h2>Khảo sát</h2>
        </div>
    </div>
   
    <div class="clearfix"></div>
    <button onclick="goBack()" class="btn btn-success"><< Trở lại</button>
</div>
<div class="x_panel">
    <div class="x_content">
        <form method="post" action="<?php echo (Yii::app()->createUrl("/khaoSat/lamkhaosat")); ?>" enctype="multipart/form-data" id="uploadForm">
         <!--    <div class="item form-group">
                <div class="col-md-12 col-sm-12">
                   <div class="media-body">
                    <h4 class="title" href="#">1. Bạn có thể giới thiệu đôi chút về bản thân mình?</h4>
                    <p>Ngoài cách hỏi trên, NTD cũng có thể sử dụng một số mẫu câu hỏi với cùng mục đích như: Bạn có những ưu điểm gì? Bạn có phải là một người hoạt ngôn không? (Khai thác thông tin dựa trên CV ứng tuyển của ứng viên) Bạn có muốn thay đổi gì một trong những tính cách của bản thân không? Bạn có điểm yếu không? Hãy chia sẻ cho chúng tôi biết cách bạn khắc phục điểm yếu của mình.</p>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="radio">
                    <label>
                    <input type="radio" checked="" value="option1" id="optionsRadios1" name="optionsRadios"> Đáp án 1
                    </label>
                    </div>
                    <div class="radio">
                    <label>
                    <input type="radio" checked="" value="option1" id="optionsRadios1" name="optionsRadios"> Đáp án 2
                    </label>
                    </div>
                    <div class="radio">
                    <label>
                    <input type="radio" checked="" value="option1" id="optionsRadios1" name="optionsRadios"> Đáp án 3
                    </label>
                    </div>
                </div>
            </div> -->
            <input type="hidden" name="idKhaoSat" value="<?php echo ($model->id);?>" />
            <?php

            foreach ($cauhoiNoiDungs as $noidungs) {
                # code...
                if($noidungs[0]["type"] == "1")  {
                    ?>
                    <div class="col-md-12 col-sm-12">
                       <div class="media-body">
                        <h4 class="title" href="#"><?php echo $noidungs[0]["ten_cau_hoi"];?></h4>
                        <p><?php echo $noidungs[0]["noi_dung"];?></p>
                        </div>
                    </div>
                <div class="col-md-12 col-sm-12">
                    <?php
                    $dapans = json_decode($noidungs[0]["dap_an"]);
                    foreach ($dapans as $dapan) {
                        # code...
                       ?>
                        <div class="radio">
                            <label>
                                <input type="radio" value="<?php echo $dapan;?>" name="cauhoi[<?php echo $noidungs[0]['id'];?>]"> <?php echo $dapan;?>
                            </label>
                        </div>
                       <?php


                    }
                    ?>
                   
                    <!-- <div class="radio">
                    <label>
                    <input type="radio" checked="" value="option1" id="optionsRadios1" name="optionsRadios"> Đáp án 2
                    </label>
                    </div>
                    <div class="radio">
                    <label>
                    <input type="radio" checked="" value="option1" id="optionsRadios1" name="optionsRadios"> Đáp án 3
                    </label>
                    </div> -->
                </div>
                    <?php
                }

            }
            ?>

           
             
            <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                   <input type="submit" class="btn btn-primary" value="Gửi"> 
                </div>
            </div>
        </form>
         <div class="ln_solid"></div>
        
                        
</div>
<?php //echo CHtml::endForm(); ?>
<script>
    $("#uploadExcel").click(function(event) {
        event.preventDefault();
        if ($('#excelFile').get(0).files.length === 0) {
            alert("Chưa có file");
        } else {
            $("#uploadForm").submit();
        }
           
    });
        
</script>
<script>
function goBack() {
  window.history.back();
}
</script>