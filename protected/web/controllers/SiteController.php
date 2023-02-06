<?php

class SiteController extends Controller
{
    public $layout = '/layouts/content_1';

    public $isMobile = FALSE;

    public function init()
    {
        parent::init();
        // mobile detect
        $detect         = new MyMobileDetect();
        $this->isMobile = $detect->isMobile();
        if ($detect->isMobile()) {
            $this->layout = '/layouts/main_mobile';
        }
    }

    public function actions()
    {
        // return external action classes, e.g.:
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class'        => 'CaptchaExtendedAction',
                'density'      => 0,
                'lines'        => 0,
                'fillSections' => 0,
                //'backColor'=>0xFFFFFF,
            ),
        );
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        $this->layout = '/layouts/content_2';
        if ($this->isMobile) {
            $this->layout = '/layouts/main_mobile';
        }
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest) {
                echo $error['message'];
            } else {
                $this->render('error', $error);
            }
        }
    }

    /**
     * Default action
     */
    public function actionIndex()
    {
        $this->redirect($this->createUrl('') . '/adm');
        $this->pageTitle = Yii::t('web/full_home', 'homepage');
        $partners        = WPartners::getListPartners();
        $criteria = new CDbCriteria();
        $criteria->compare('status', 1);
        $criteria->compare('slug', 'news');
        $criteria->compare('show_in_index', 1);
        $criteria->order = 'created_at desc';

        $news = WNews::model()->findAll($criteria);
        $photo = WNews::model()->findAllByAttributes(array('slug' => 'photo'));
        $video = WNews::model()->findAllByAttributes(array('slug' => 'video'));
        $info = WNews::model()->findAllByAttributes(array('slug' => 'info'));
        $newsHtml = $this->renderPartial('_news_index', array('news' => $news, 'photo' => $photo, 'video' => $video, 'info' => $info), true);

        $this->render('index', array(
            'news' => $newsHtml,
            'partners' => $partners
        ));
    } //end index

    /**
     * action About us
     */
    public function actionAbout()
    {
        $this->layout = '/layouts/content_2';
        if ($this->isMobile) {
            $this->layout = '/layouts/main_mobile';
        }
        $this->pageTitle = Yii::t('web/full_home', 'about');

        $this->render('about');
    }

    public function actionSalesPolicy()
    {
        $this->layout = '/layouts/content_2';
        if ($this->isMobile) {
            $this->layout = '/layouts/main_mobile';
        }
        $this->pageTitle = Yii::t('web/full_home', 'policy');

        $this->render('sales_policy');
    }

    public function actionPrivacyPolicy()
    {
        $this->layout = '/layouts/content_2';
        if ($this->isMobile) {
            $this->layout = '/layouts/main_mobile';
        }
        $this->pageTitle = Yii::t('web/full_home', 'policy');

        $this->render('privacy_policy');
    }

    /**
     * action Agency
     */
    public function actionAgency()
    {
        $this->layout = '/layouts/content_2';
        if ($this->isMobile) {
            $this->layout = '/layouts/main_mobile';
        }
        $this->pageTitle = Yii::t('web/full_home', 'agency');
        $agency          = WAgency::getListAgency();

        $this->render('agency', array(
            'agency' => $agency
        ));
    }

    /**
     * action Contact
     */
    public function actionContact()
    {
        $this->layout = '/layouts/content_2';
        if ($this->isMobile) {
            $this->layout = '/layouts/main_mobile';
        }
        $this->pageTitle = Yii::t('web/full_home', 'contact');

        $model = new ContactForm();
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'contact-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                if ($model->sendEmail($model->email, Yii::app()->params->sendEmail['username'], $model->subject, $model->subject, $model->body)) {
                    Yii::app()->user->setFlash('success', Yii::t('web/full_home', 'contact_success'));
                    $this->refresh();
                } else {
                    Yii::app()->user->setFlash('danger', Yii::t('web/full_home', 'contact_fail'));
                    $this->refresh();
                }
            }
        }
        $this->render('contact', array('model' => $model));
    }

    public function actionNews()
    {
        $this->layout = '/layouts/content_2';
        $criteria = new CDbCriteria();
        $criteria->compare('status', 1);
        $criteria->compare('slug', 'news');
        $criteria->order = 'created_at desc';
        $news = WNews::model()->findAll($criteria);
        $this->render('news', array('news' => $news));
    }

    /**
     * An pham
     */
    public function actionPublications()
    {
        $this->layout = '/layouts/content_2';
        $criteria = new CDbCriteria();
        $criteria->compare('slug', 'publications');
        $criteria->order = 'sort_index asc';
        $news = WNews::model()->findAll($criteria);

        $this->render('publications', array('news' => $news));
    }
    /**
     * An pham chi tiet
     */
    public function actionPublicationsDetail($id)
    {
        $this->layout = '/layouts/content_2';
        $news = WNews::model()->findByPk($id);
        $this->render('publications_detail', array('news' => $news));
    }
    /**
     * Tuong tac
     */
    public function actionInteractive()
    {
        $this->layout = '/layouts/content_2';

        // -----------Lấy danh sách ID câu hỏi---------
        if (Yii::app()->session['valid_infor'] == true) {
            $id = 1;
            $criteria = new CDbCriteria;
            $criteria->select = 'id_cau_hoi';
            $criteria->compare('id_khao_sat', $id);

            $khaosatcauhoiModel = new KhaoSatCauHoi();
            $dscauhoi = $khaosatcauhoiModel->findAll($criteria);

            $idsCauHoi = [];
            foreach ($dscauhoi as $cauhoi) {
                $idsCauHoi[] = $cauhoi["id_cau_hoi"];
            }
            // ------------Lấy nội dung câu hỏi-----------
            $cauhoiNoiDungs = [];
            foreach ($idsCauHoi as $idCauHoi) {
                # code...
                $criteria = new CDbCriteria;
                $criteria->select = 'id, id_nhom_cau_hoi, type, ten_cau_hoi, noi_dung, dap_an, ghi_chu';
                $criteria->compare('id', $idCauHoi);

                $cauhoiModel = new CauHoi();
                $cauhoiNoiDung = $cauhoiModel->findAll($criteria);
                $cauhoiNoiDungs[] = $cauhoiNoiDung;
                // $cauhoiNoiDung = array_filter($cauhoiNoiDungs, 'mb_strlen');
            }

            $khaosat = KhaoSat::model()->findByPk($id);

            $this->render('thuchienkhaosat', array(
                'model' => $khaosat,
                'cauhoiNoiDungs' => $cauhoiNoiDungs,
            ));
        } else {
            if (isset($_POST['InteractiveForm'])) {
                Yii::app()->session['valid_infor'] = true;
            }
            $model = new InteractiveForm();
            $this->render('interactive', array('model' => $model));
        }
    }

    public function actionEducate()
    {
        $this->layout = '/layouts/content_2';
        $news = WNews::model()->findAllByAttributes(array('slug' => 'educate'));
        $this->render('common_detail', array('news' => $news));
    }

    public function actionCourse()
    {
        $this->pageTitle = Yii::t('web/full_home', 'course');

        $this->layout = '/layouts/content_2';
        $courses = Course::model()->findAll();

        $this->render('course', array('courses' => $courses));
    }

    public function actionCourseRegister($course_id)
    {
        $this->pageTitle = 'Đăng ký ' . Yii::t('web/full_home', 'course');
        // Uncomment the following line if AJAX validation is needed
        $this->layout = '/layouts/content_2';
        $formModel = new CourseForm();
        $course = Course::model()->findByPk($course_id);

        $this->performAjaxValidation($formModel);

        if (isset($_POST['CourseForm'])) {
            $model = new CourseRegister();
            $model->course_id = $course_id;
            $model->attributes = $_POST['CourseForm'];
            if ($model->save()) {
                echo "<script>alert('Chúc mừng bạn đã đăng ký thành công.'); 
			    window.location.href='" . Yii::app()->controller->createAbsoluteUrl("site/index") . "'</script>";
            } else {
                CVarDumper::dump($model->getErrors(), 10, true);
                die;
            }
        }

        $this->render('course-register', array('model' => $formModel, 'courseModel' => $course));
    }

    public function actionFaq()
    {
        $model = new FaqForm();

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'faq-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if (isset($_POST['FaqForm'])) {
            $modelFaq = new Faq();
            $modelFaq->attributes = $_POST['FaqForm'];
            // CVarDumper::dump($modelFaq, 10, true);
            // die;
            if ($modelFaq->save()) {
                echo "<script>alert('Chúc mừng bạn đã gửi câu hỏi thành công.'); 
			    window.location.href='" . Yii::app()->controller->createAbsoluteUrl("site/index") . "'</script>";
            }
        }

        $this->layout = '/layouts/content_2';
        $this->render('faq', array('model' => $model));
    }

    /**
     * Performs the AJAX validation.
     *
     * @param CourseForm $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'course-register-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
} //end class