<?php
namespace SMS;
/**
 * Autogenerated by Thrift Compiler (0.9.1)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;


interface MessageServiceIf {
  public function send(\SMS\TSMSSendParams $params);
}

class MessageServiceClient implements \SMS\MessageServiceIf {
  protected $input_ = null;
  protected $output_ = null;

  protected $seqid_ = 0;

  public function __construct($input, $output=null) {
    $this->input_ = $input;
    $this->output_ = $output ? $output : $input;
  }

  public function send(\SMS\TSMSSendParams $params)
  {
    $this->send_send($params);
    return $this->recv_send();
  }

  public function send_send(\SMS\TSMSSendParams $params)
  {
    $args = new \SMS\MessageService_send_args();
    $args->params = $params;
    $bin_accel = ($this->output_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
    if ($bin_accel)
    {
      thrift_protocol_write_binary($this->output_, 'send', TMessageType::CALL, $args, $this->seqid_, $this->output_->isStrictWrite());
    }
    else
    {
      $this->output_->writeMessageBegin('send', TMessageType::CALL, $this->seqid_);
      $args->write($this->output_);
      $this->output_->writeMessageEnd();
      $this->output_->getTransport()->flush();
    }
  }

  public function recv_send()
  {
    $bin_accel = ($this->input_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_read_binary');
    if ($bin_accel) $result = thrift_protocol_read_binary($this->input_, '\SMS\MessageService_send_result', $this->input_->isStrictRead());
    else
    {
      $rseqid = 0;
      $fname = null;
      $mtype = 0;

      $this->input_->readMessageBegin($fname, $mtype, $rseqid);
      if ($mtype == TMessageType::EXCEPTION) {
        $x = new TApplicationException();
        $x->read($this->input_);
        $this->input_->readMessageEnd();
        throw $x;
      }
      $result = new \SMS\MessageService_send_result();
      $result->read($this->input_);
      $this->input_->readMessageEnd();
    }
    if ($result->success !== null) {
      return $result->success;
    }
    if ($result->user_exception !== null) {
      throw $result->user_exception;
    }
    if ($result->system_exception !== null) {
      throw $result->system_exception;
    }
    if ($result->unknown_exception !== null) {
      throw $result->unknown_exception;
    }
    throw new \Exception("send failed: unknown result");
  }

}

// HELPER FUNCTIONS AND STRUCTURES

class MessageService_send_args {
  static $_TSPEC;

  public $params = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'params',
          'type' => TType::STRUCT,
          'class' => '\SMS\TSMSSendParams',
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['params'])) {
        $this->params = $vals['params'];
      }
    }
  }

  public function getName() {
    return 'MessageService_send_args';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::STRUCT) {
            $this->params = new \SMS\TSMSSendParams();
            $xfer += $this->params->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('MessageService_send_args');
    if ($this->params !== null) {
      if (!is_object($this->params)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('params', TType::STRUCT, 1);
      $xfer += $this->params->write($output);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class MessageService_send_result {
  static $_TSPEC;

  public $success = null;
  public $user_exception = null;
  public $system_exception = null;
  public $unknown_exception = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        0 => array(
          'var' => 'success',
          'type' => TType::STRUCT,
          'class' => '\SMS\TSMSSendText',
          ),
        1 => array(
          'var' => 'user_exception',
          'type' => TType::STRUCT,
          'class' => '\SMS\SMSUserException',
          ),
        2 => array(
          'var' => 'system_exception',
          'type' => TType::STRUCT,
          'class' => '\SMS\SMSSystemException',
          ),
        3 => array(
          'var' => 'unknown_exception',
          'type' => TType::STRUCT,
          'class' => '\SMS\SMSUnknownException',
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['success'])) {
        $this->success = $vals['success'];
      }
      if (isset($vals['user_exception'])) {
        $this->user_exception = $vals['user_exception'];
      }
      if (isset($vals['system_exception'])) {
        $this->system_exception = $vals['system_exception'];
      }
      if (isset($vals['unknown_exception'])) {
        $this->unknown_exception = $vals['unknown_exception'];
      }
    }
  }

  public function getName() {
    return 'MessageService_send_result';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 0:
          if ($ftype == TType::STRUCT) {
            $this->success = new \SMS\TSMSSendText();
            $xfer += $this->success->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 1:
          if ($ftype == TType::STRUCT) {
            $this->user_exception = new \SMS\SMSUserException();
            $xfer += $this->user_exception->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRUCT) {
            $this->system_exception = new \SMS\SMSSystemException();
            $xfer += $this->system_exception->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::STRUCT) {
            $this->unknown_exception = new \SMS\SMSUnknownException();
            $xfer += $this->unknown_exception->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('MessageService_send_result');
    if ($this->success !== null) {
      if (!is_object($this->success)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('success', TType::STRUCT, 0);
      $xfer += $this->success->write($output);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->user_exception !== null) {
      $xfer += $output->writeFieldBegin('user_exception', TType::STRUCT, 1);
      $xfer += $this->user_exception->write($output);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->system_exception !== null) {
      $xfer += $output->writeFieldBegin('system_exception', TType::STRUCT, 2);
      $xfer += $this->system_exception->write($output);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->unknown_exception !== null) {
      $xfer += $output->writeFieldBegin('unknown_exception', TType::STRUCT, 3);
      $xfer += $this->unknown_exception->write($output);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class MessageServiceProcessor {
  protected $handler_ = null;
  public function __construct($handler) {
    $this->handler_ = $handler;
  }

  public function process($input, $output) {
    $rseqid = 0;
    $fname = null;
    $mtype = 0;

    $input->readMessageBegin($fname, $mtype, $rseqid);
    $methodname = 'process_'.$fname;
    if (!method_exists($this, $methodname)) {
      $input->skip(TType::STRUCT);
      $input->readMessageEnd();
      $x = new TApplicationException('Function '.$fname.' not implemented.', TApplicationException::UNKNOWN_METHOD);
      $output->writeMessageBegin($fname, TMessageType::EXCEPTION, $rseqid);
      $x->write($output);
      $output->writeMessageEnd();
      $output->getTransport()->flush();
      return;
    }
    $this->$methodname($rseqid, $input, $output);
    return true;
  }

  protected function process_send($seqid, $input, $output) {
    $args = new \SMS\MessageService_send_args();
    $args->read($input);
    $input->readMessageEnd();
    $result = new \SMS\MessageService_send_result();
    try {
      $result->success = $this->handler_->send($args->params);
    } catch (\SMS\SMSUserException $user_exception) {
      $result->user_exception = $user_exception;
        } catch (\SMS\SMSSystemException $system_exception) {
      $result->system_exception = $system_exception;
        } catch (\SMS\SMSUnknownException $unknown_exception) {
      $result->unknown_exception = $unknown_exception;
    }
    $bin_accel = ($output instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
    if ($bin_accel)
    {
      thrift_protocol_write_binary($output, 'send', TMessageType::REPLY, $result, $seqid, $output->isStrictWrite());
    }
    else
    {
      $output->writeMessageBegin('send', TMessageType::REPLY, $seqid);
      $result->write($output);
      $output->writeMessageEnd();
      $output->getTransport()->flush();
    }
  }
}

