<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'BaseHandler' => $baseDir . '/services/BaseHandler.php',
    'Jiuyan\\App' => $baseDir . '/base/App.php',
    'Jiuyan\\Server' => $baseDir . '/server/Server.php',
    'Jiuyan\\Socket' => $baseDir . '/server/Socket.php',
    'SMS\\MessageServiceClient' => $baseDir . '/thrift/packages/SMS/MessageService.php',
    'SMS\\MessageServiceIf' => $baseDir . '/thrift/packages/SMS/MessageService.php',
    'SMS\\MessageServiceProcessor' => $baseDir . '/thrift/packages/SMS/MessageService.php',
    'SMS\\MessageService_send_args' => $baseDir . '/thrift/packages/SMS/MessageService.php',
    'SMS\\MessageService_send_result' => $baseDir . '/thrift/packages/SMS/MessageService.php',
    'SMS\\SMSErrorCode' => $baseDir . '/thrift/packages/SMS/Types.php',
    'SMS\\SMSSystemException' => $baseDir . '/thrift/packages/SMS/Types.php',
    'SMS\\SMSUnknownException' => $baseDir . '/thrift/packages/SMS/Types.php',
    'SMS\\SMSUserException' => $baseDir . '/thrift/packages/SMS/Types.php',
    'SMS\\TSMSSendParams' => $baseDir . '/thrift/packages/SMS/Types.php',
    'SMS\\TSMSSendText' => $baseDir . '/thrift/packages/SMS/Types.php',
    'SmsHandler' => $baseDir . '/services/SmsHandler.php',
);
