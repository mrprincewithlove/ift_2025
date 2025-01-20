<?php


return [

	'page-limit' => 10,
	'default-avatar' => 'assets/img/profiles/avatar-01.jpg',

	// 'password_pattern_full' => '/^(?=.*[a-z])(?=.*[^a-zA-Z0-9])(?=.*[A-Z])(?=.*\d).{6,}$/',
    'password_pattern' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/',
    'max_login_attempts' => 3,
    'check_ip_address' => 'false',
    'mobile_format'                     => '^993[6,7][0-5][0-9]{6}$',
    'mobile_format_verification'        => '^993[6,7][0-5][0-9]{6}$',
    'mobile_format_regexp'              => '("^993[6,7][0-5][0-9]{6}$")',
//    'mobile_format' => '/^\+9936[0-5][0-9]{6}$|^\+99371[0-9]{6}$/',
    // 'mobile_format_verification' => '^9936[0-5][0-9]{6}$',
    // 'mobile_format_regexp' => '("^9936[0-5][0-9]{6}$")',
    'two_factor_code_expire_mins' => 1,
    'two_factor_code_length' => 5,
    'log_refresh_seconds' => 10,
    'on_payment_send_sms' => 'true',
    'remote_user_password_length' => 30,


    // sms server connections
    'sms_server_ip_address' => 'http://10.10.10.10/',
    'sms_email' => '',
    'sms_password' => '',


    // db backup connection
	'backup_remote_host' => '190.190.190.190',
	'backup_remote_user' => 'sql',
	'backup_remote_path' => '/var/data/backup/',
	'backup_remote_pass' => 'ssh password',
];