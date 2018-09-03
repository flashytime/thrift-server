<?php
namespace Jiuyan;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SyslogHandler;
use Monolog\Formatter\LineFormatter;

class App {
    protected $env = null;
    public $logger = null;
    protected $config = null;
    protected $server = null;

    public function run()
    {
        $this->server->serve();
    }

    public function setServer($server)
    {
        $this->server = $server;
    }

    public function setConfig($config)
    {
        $this->config = $config;
    }

    public function setLogger()
    {
        $this->logger = new Logger($this->config['name']);
        $this->setLoggerStream();
        $this->setLoggerProcess();
    }

    public function setLoggerStream()
    {
        $stream = new StreamHandler($this->config['log']['message']);
        $formatter = new LineFormatter("%now% %level_name% [%pid%]: host => %host% ## %message% %context%\n", "Y-m-d H:i:s.u", true);
        $stream->setFormatter($formatter);
        $this->logger->pushHandler($stream, Logger::WARNING);
        if ($this->inProduction()) {
            $sysStream = new SyslogHandler('sms', 'local0');
            $this->logger->pushHandler($sysStream);
        }
    }

    public function setLoggerProcess()
    {
        $this->logger->pushProcessor(
            function (array $record) {
                $record['now'] = substr($record['datetime']->format('Y-m-d H:i:s.u'), 0, -3);
                $record['pid'] = getmypid();
                $record['host'] = swoole_get_local_ip()['en0'];
                return $record;
            }
        );
    }

    public function initErrorReporting()
    {
        // 报告所有的级别的错误
        error_reporting(-1);
        ini_set('display_errors', 'Off');
    }

    public function initDefaultTimezone()
    {
        date_default_timezone_set($this->config['timezone']);
    }

    public static function getEnv()
    {
        return $this->env = getenv('IN_ENV') ?: 'production';
    }

    public function inProduction()
    {
        return $this->env == 'production';
    }
}
