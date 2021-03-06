<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitaeb6927911d1cb885e026822f27367f2
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
            'PhpAmqpLib\\' => 11,
        ),
        'M' => 
        array (
            'Monolog\\' => 8,
        ),
        'I' => 
        array (
            'In\\' => 3,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'PhpAmqpLib\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-amqplib/php-amqplib/PhpAmqpLib',
        ),
        'Monolog\\' => 
        array (
            0 => __DIR__ . '/..' . '/monolog/monolog/src/Monolog',
        ),
        'In\\' => 
        array (
            0 => __DIR__ . '/..' . '/jiuyan/sms/In',
        ),
    );

    public static $prefixesPsr0 = array (
        'T' => 
        array (
            'Thrift\\' => 
            array (
                0 => __DIR__ . '/..' . '/packaged/thrift/src',
            ),
        ),
    );

    public static $classMap = array (
        'BaseHandler' => __DIR__ . '/../..' . '/services/BaseHandler.php',
        'Jiuyan\\App' => __DIR__ . '/../..' . '/base/App.php',
        'Jiuyan\\Server' => __DIR__ . '/../..' . '/server/Server.php',
        'Jiuyan\\Socket' => __DIR__ . '/../..' . '/server/Socket.php',
        'SMS\\MessageServiceClient' => __DIR__ . '/../..' . '/thrift/packages/SMS/MessageService.php',
        'SMS\\MessageServiceIf' => __DIR__ . '/../..' . '/thrift/packages/SMS/MessageService.php',
        'SMS\\MessageServiceProcessor' => __DIR__ . '/../..' . '/thrift/packages/SMS/MessageService.php',
        'SMS\\MessageService_send_args' => __DIR__ . '/../..' . '/thrift/packages/SMS/MessageService.php',
        'SMS\\MessageService_send_result' => __DIR__ . '/../..' . '/thrift/packages/SMS/MessageService.php',
        'SMS\\SMSErrorCode' => __DIR__ . '/../..' . '/thrift/packages/SMS/Types.php',
        'SMS\\SMSSystemException' => __DIR__ . '/../..' . '/thrift/packages/SMS/Types.php',
        'SMS\\SMSUnknownException' => __DIR__ . '/../..' . '/thrift/packages/SMS/Types.php',
        'SMS\\SMSUserException' => __DIR__ . '/../..' . '/thrift/packages/SMS/Types.php',
        'SMS\\TSMSSendParams' => __DIR__ . '/../..' . '/thrift/packages/SMS/Types.php',
        'SMS\\TSMSSendText' => __DIR__ . '/../..' . '/thrift/packages/SMS/Types.php',
        'SmsHandler' => __DIR__ . '/../..' . '/services/SmsHandler.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitaeb6927911d1cb885e026822f27367f2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitaeb6927911d1cb885e026822f27367f2::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitaeb6927911d1cb885e026822f27367f2::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitaeb6927911d1cb885e026822f27367f2::$classMap;

        }, null, ClassLoader::class);
    }
}
