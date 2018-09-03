<?php
return array(
    'host' => '0.0.0.0',
    'daemonize' => 1,  # supervisor 不能监控守护进程，切莫配置为1
    'port' => 8091,
    'worker_num' => 1,
    'dispatch_mode' => 3,
    'open_length_check' => true,
    'package_max_length' => 8192000,
    'package_length_type' => 'N',
    'package_length_offset' => 0,
    'package_body_offset' => 4,
    'heartbeat_idle_time' => 300,
    'heartbeat_check_interval' => 120,
    'processer' => 'SMS\\MessageService',
    'handler' => 'SmsHandler'
);
