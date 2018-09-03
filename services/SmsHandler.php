<?php

use SMS\SMSErrorCode;
use SMS\MessageServiceIf;
use SMS\TSMSSendParams;
use SMS\TSMSSendText;
use Thrift\Exception\TApplicationException;
use In\Sms;

class SmsHandler extends BaseHandler implements MessageServiceIf
{
    public function send(TSMSSendParams $msg)
    {
        $result = Sms\Sms::sendSms($msg->mobile, $msg->key, [], "in", $msg->channel);
        $log = sprintf("requst method: %s, mobile: %s", __FUNCTION__, $msg->mobile, $msg->key);
        $this->app->logger->info($log);
        $data = array(
            "mobile" => $msg->mobile,
            "key" => $msg->key,
            "success" => $result['success'] ?: 0,
            "error_code" => $result["error_code"],
        );
        $data['code'] = isset($result['code']) ? $result['code'] : 0;
        $data['channel'] = isset($result['info']['channel']) ? $result['info']['channel'] : '';
        return new TSMSSendText($data);
    }
}
