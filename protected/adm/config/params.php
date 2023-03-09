<?php
return array(
    'hashkey'                     => 'centech',
    'project_name'                => 'DoCashVn',
    'brand_name'                  => 'Admin',
    'password_key'                => 'centech24072013',
    'pagination'                  => array(
        'defaultPageSize' => 30,
        'arrPageSize'     => array(10 => 10, 20 => 20, 30 => 30, 50 => 50, 100 => 100),
    ),
    'upload_banners_dir'          => 'banners/',
    'upload_dir' => 'uploads',
    /**
     * Cấu hình transaction group_id
     */
    'trans_group_id' => [
        // bát họ
        'bh_create' => 'Tạo mới hợp đồng',
        'bh_paid' => 'Đóng tiền họ',
        'bh_extra_paid' => 'Đóng HĐ (Tiền khác)',
        'bh_paid_cancel' => 'Hủy đóng tiền họ',
        'bh_increase_debt' => 'Nợ lãi họ',
        'bh_decrease_debt' => 'Trả nợ lãi họ',
        // cầm đồ
        'cd_create' => 'Cầm đồ',
        'cd_paid' => 'Đóng lãi',
        'cd_paid_cancel' => 'Hủy đóng lãi',
        // tín chấp
        'tc_create' => 'Cho vay',
        'tc_paid' => 'Đóng lãi',
        'tc_paid_cancel' => 'Hủy đóng lãi'
    ],

);
