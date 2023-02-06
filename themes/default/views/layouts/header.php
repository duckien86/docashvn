<div id="header">
    <div class="space_10"></div>
    <div class="container">
        <div class="col-md-2" style="width:auto">
            <a href="<?= Yii::app()->controller->createUrl('site/index'); ?>" title="">
                <img src="<?= Yii::app()->theme->baseUrl ?>/images/logo.png" class="logo" alt="">
            </a>
            <p style="color:#0084CB;font-weight:bolder;text-align:center;">Since 1997</p>
        </div>

        <div class="col-md-10" style="margin: unset;padding: unset;">
            <div class="col-md-9" style="margin: unset;padding: unset;">
                <p class="title-md">ĐẠI HỌC QUỐC GIA HÀ NỘI - KHOA LUẬT</p>
                <p class="title-lg">TRUNG TÂM NGHIÊN CỨU VÀ HỖ TRỢ PHÁP LÝ (LERES)</p>
                <p class="title" style="color: #0084CB;font-size:18px;">CENTER FOR LEGAL RESEARCH AND SERVICES</p>
            </div>
            <div class="col-md-3" style="margin: unset;padding: unset;">
                <form class="navbar-form" style="margin: unset;padding: unset;" role="search" action="<?= '' //Yii::app()->controller->createUrl('products/search', array('q' => '1')); 
                                                                                                        ?>" method="post">
                    <?php echo CHtml::hiddenField("YII_CSRF_TOKEN", Yii::app()->request->csrfToken);
                    ?>
                    <div class="input-group add-on">
                        <input class="form-control" placeholder="Tìm kiếm" name="WProduct[keyword]" id="WProduct_keyword" type="text">

                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <div class="language">
                    <ul>
                        <li class="language">
                            <a href="<?= Yii::app()->controller->createUrl('site/index'); ?>" title="">
                                <!-- <img src="<?= Yii::app()->theme->baseUrl ?>/images/vn.jpg" alt=""> -->
                                Tiếng Việt
                            </a>
                        </li>
                        <li class="language">
                            <a href="<?= Yii::app()->controller->createUrl('site/index'); ?>" title="">
                                <!-- <img src="<?= Yii::app()->theme->baseUrl ?>/images/en.jpg" alt=""> -->
                                English
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>