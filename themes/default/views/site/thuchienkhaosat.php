<div class="space_40"></div>
<div class="container" style="background-color: white;padding-bottom: 50px;">
    <div class="course">
        <h2>Thực hiện khảo sát</h2>
        <form method="post" action="<?php echo (Yii::app()->createUrl("/khaoSat/lamkhaosat")); ?>" enctype="multipart/form-data" id="uploadForm">
            <input type="hidden" name="idKhaoSat" value="<?php echo ($model->id); ?>" />
            <input type="hidden" name="YII_CSRF_TOKEN" value="<?php echo Yii::app()->request->csrfToken ?>" />
            <?php
            $i = 0;
            foreach ($cauhoiNoiDungs as $noidungs) {
                if ($noidungs[0]["type"] == "1") {
                    $i++
            ?>
                    <div class="col-md-12 col-sm-12">
                        <div class="media-body">
                            <h4 class="title" href="#"><?php echo "$i. " . $noidungs[0]["ten_cau_hoi"]; ?></h4>
                            <p><?php echo $noidungs[0]["noi_dung"]; ?></p>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <?php
                        $dapans = json_decode($noidungs[0]["dap_an"]);
                        if (count($dapans) > 0) {
                            foreach ($dapans as $dapan) {
                                if (!empty($dapan)) {
                        ?>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" value="<?php echo $dapan; ?>" name="cauhoi[<?php echo $noidungs[0]['id']; ?>]"> <?php echo $dapan; ?>
                                        </label>
                                    </div>
                            <?php
                                }
                            }
                        } else {
                            ?>
                            <div>
                                <textarea rows="5" cols="100" value="" name="cauhoi[<?php echo $noidungs[0]['id']; ?>]"></textarea>
                            </div>

                        <?php
                        }
                        ?>
                    </div>
            <?php
                }
            }
            ?>

            <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                    <input type="submit" class="btn btn-primary" value="Gửi thông tin">
                </div>
            </div>
        </form>
        <div class="ln_solid"></div>
    </div>