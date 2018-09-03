<?php
return array(
    'sms' => array(
        'client' => 'SMS\MessageServiceClient',
        'hosts' => ['127.0.0.1'],
        'port' => 8091,
        'persist' => false,
        'receive_timeout' => 2000,
        'send_timeout' => 1000,
        'read_buf_size' => 1024,
        'write_buf_size' => 1024,
        'host_picker' => null,
    )
);
