<?php
namespace Jiuyan;

use Thrift\Protocol\TBinaryProtocol;
use Thrift\Server\TServerSocket;
use Thrift\Factory\TTransportFactory;
use Thrift\Factory\TBinaryProtocolFactory;


class Server extends TServerSocket
{
    protected $app = null;
    protected $processor = null;
    protected $handler = null;
    protected $transport = null;

    private $config = array(
        'worker_num' => 1,
        'dispatch_mode' => 3,
        'open_length_check' => true,
        'package_max_length' => 8192000,
        'package_length_type' => 'N',
        'package_length_offset' => 0,
        'package_body_offset' => 4,
    );

    public function __construct($app, $config)
    {
        $this->app = $app;
        $this->loadConfig($config);
        $handler = $this->registerHandler($app);
        $this->registerProcessor($handler);

        // init thrift server
        $this->transport = $this->createTransport($config['host'], $config['port']);
        $inTransport = $outTransport = new TTransportFactory();
        $inProtocol = $outProtocol =  new TBinaryProtocolFactory(true, true);

        parent::__construct($this->processor, $this->transport, $inTransport, $outTransport, $inProtocol, $outProtocol);
    }

    public function error($message)
    {
        $this->app->logger->error($message);
    }

    public function registerProcessor($handler)
    {
        $processor = $this->config['processer'] . 'Processor';
        $this->processor = new $processor($handler);
        return $this->processor;
    }

    public function registerHandler($app)
    {
        $handler = $this->config['handler'];
        $this->handler = new $handler($app);
        return $this->handler;
    }

    public function loadConfig($config)
    {
        $this->config = array_merge($this->config, $config);
    }

    public function onReceive($serv, $fd, $from_id, $data)
    {
        $protocol = $this->createProtocol($serv, $fd, $data);
        try {
            $this->processor->process($protocol, $protocol);
        } catch (\Exception $e) {
            $this->error('CODE:' . $e->getCode() . ' MESSAGE:' . $e->getMessage() . "\n" . $e->getTraceAsString());
        }
    }

    public function createProtocol($serv, $fd, $data)
    {
        $socket = new Socket();
        $socket->setHandle($fd);
        $socket->buffer = $data;
        $socket->server = $serv;
        return new TBinaryProtocol($socket, false, false);
    }

    public function createTransport($host, $port)
    {
        return new \swoole_server($host, $port);
    }

    public function onStart()
    {
        echo "Thrift Server Running\n";
    }

    public function onShutdown()
    {
        echo "shutdown!!";
    }

    public function onClose()
    {
        echo "Fxxk Close agina";
    }

    public function serve()
    {
        $this->transport->on('workerStart', [$this, 'onStart']);
        $this->transport->on('receive', [$this, 'onReceive']);
        $this->transport->on('Shutdown', [$this, 'onShutdown']);
        $this->transport->on('Close', [$this, 'onClose']);
        $this->transport->set($this->config);
        $this->transport->start();
    }
}
