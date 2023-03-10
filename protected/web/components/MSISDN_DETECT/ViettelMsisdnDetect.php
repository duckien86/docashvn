<?php

    class ViettelMsisdnDetect
    {
        public $channel_code = 'VIETTEL';

        public static function detect()
        {
            if (!Yii::app()->request->isAjaxRequest && Yii::app()->request->getRequestType() == 'GET') { // avoid ajax request
                if (!isset(Yii::app()->session['session_data']->current_msisdn) || Yii::app()->session['session_data']->current_msisdn == '') { // customer's phonenumber is not detected

                    $generator       = new PaymentCentech();

                    if (!isset($_GET['data'])) { // avoid repeat redirect
                        $service_id = 199;
                        $url        = WCustomers::createPaymentLink(Yii::app()->session['session_data']->current_msisdn, 'DETECTION', $service_id);
                        Yii::app()->getController()->redirect($url);

                    } else {
                        $data_encrypted = $_GET['data'];
                        $signature      = $_GET['signature'];
                        $generator->decryptDetection(Yii::app()->params->cp_id, $data_encrypted, $signature);
                    }
                } else {
                    $generator      = new PaymentCentech();
                    $data_encrypted = $_GET['data'];
                    $signature      = $_GET['signature'];
                    $pay_return     = $generator->decryptDetection(Yii::app()->params->cp_id, $data_encrypted, $signature);
                   

                    if (is_array($pay_return)) {
                        if (isset($pay_return['cmd']) && $pay_return['cmd'] != PaymentCentech::DETECTION) {

                            if (isset($pay_return['responsecode']) && $pay_return['responsecode'] == PaymentCentech::PAYMENTSUCCESS) {
                                if (isset($pay_return['cmd']) && $pay_return['cmd'] == PaymentCentech::REGISTER) {
                                    Yii::app()->session['session_data']->reg_success[] = $pay_return['serviceid'];
                                    $package_name = WCustomers::getPackage($pay_return['serviceid'])['package_name'];
                                    $desc                                              = "B???n ???? ????ng k?? th??nh c??ng d???ch v??? CiTV [$package_name].\\nVui l??ng ki???m tra tin nh???n trong m??y ??i???n tho???i";
                                    $url = Yii::app()->createUrl('site/customer');
                                    echo "<script>alert('$desc'); location.href='".$url."'</script>";

                                } elseif (isset($pay_return['cmd']) && $pay_return['cmd'] == PaymentCentech::CANCEL) {
                                    $desc = "H???y d???ch v??? th??nh c??ng";
                                } else {
                                    $desc = "Thao t??c th??nh c??ng";
                                }
                            } else {
                                if (isset($pay_return['cmd']) && $pay_return['cmd'] == PaymentCentech::CANCEL) {
                                    $desc = "H???y d???ch v??? kh??ng th??nh c??ng";
                                }else{
                                    $desc = "????ng k?? kh??ng th??nh c??ng do thu?? bao kh??ng ????? ??i???u ki???n. Chi ti???t LH 18006389 (mi???n ph??)";
                                }

                            }

                            echo "<script>alert('$desc');</script>";
                        }
                    }
                }
            }
        }
    }

?>