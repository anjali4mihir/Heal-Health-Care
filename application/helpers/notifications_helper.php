<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ALL);
function push_notification_android($device_id,$message){
    $url = 'https://fcm.googleapis.com/fcm/send';
    $api_key = 'AAAAHtyZV5Q:APA91bE_nmtBTsjGEeN7pR40O3V81AqlZlHk3ZL00wszrYuqkwnqcp3vD50zUFAWPiwvo4zfEkr2XeXDZjtiZuka23Id5O8ahyublUuzcNaPxfqg5yKLxi2FpZ99KEF-Xm1uNqe9wZwh';
    $devicetoken=explode(',',$device_id);
    if(count($devicetoken) > 1)
    {
        $registrationIds=$devicetoken;
    } else{
        $registrationIds=array($device_id);
    }
    //log_message('debug','Device token');
    //log_message('debug',print_r($registrationIds,TRUE));
    $body = $message['body'];
    $records = $message;
    if(!isset($message['sound']) && empty($message['sound']))
    {
        $message['sound']=1;
    }
    $msg = array(
        'body'      => $body,
        'title'     => ucwords($message['type']),
        'records'   => $records,
        'request_id'=> $message['request_id'],
        'patient_id'=> $message['patient_id'],
        'vibrate'   => 1,
        'sound'     => $message['sound'],
    );


    $m = str_replace(".wav", "", $message['sound']);
    $message['sound'] = $m;

    
    $fields = array(
        'registration_ids' => $registrationIds,
        //'notification'   => $msg
        'data' => $message
    );
    
    // $fields = array(
    //         'registration_ids' => array($device_id),
    //         'notification' => array(
    //             'title' => $message['title'],
    //             'body' => $message['body'],
    //             //'records' => $message,
    //         ),
    //         'data' => array(
    //             'title' => $message['title'],
    //             "message" => $message,
    //         ),
    //     );
    $headers = array(
        'Content-Type:application/json',
        'Authorization:key='.$api_key
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);
    //print_r($result);die;
    if ($result === FALSE) {
        die('FCM Send Error: ' . curl_error($ch));
    }
    log_message('debug','Notification');
    log_message('debug',$result);
    curl_close($ch);
    
    return $result;

}
function push_notification_IOS($device_id,$arr)
{
    $device_token=explode(',',$device_id);
    if(count($device_token) >1)
    {
        $regarray=$device_token;
    } else{
        $registrationIds=$device_id;
    }
    if(!isset($arr['sound']) && empty($arr['sound']))
    {
        $arr['sound']="default";
    }
    $final=array(
        "aps"=>array(
            'alert'=>array('title'=>ucwords($arr['type']),'body'=>$arr['body']),
            'sound'=>$arr['sound']
        ),
        "records"=>$arr
    );
    $message=json_encode($final);
    $milliseconds = round(microtime(true) * 1000);
    // url (endpoint)
    $url = "https://api.push.apple.com/3/device/$device_id";

    // certificate
    $apple_cert=$_SERVER['DOCUMENT_ROOT'].'/iospemfile/ck_production.pem';
    //$apple_cert=$_SERVER['DOCUMENT_ROOT'].'/iospemfile/ck_development2.pem';
    $cert = realpath($apple_cert);
    
    // headers
    $headers = array(
        "apns-topic: com.atheal",
        "User-Agent: My Sender"
    );
    if(isset($regarray) && count($regarray) > 0)
    {
        foreach($regarray as $row)
        {
            $url = "https://api.push.apple.com/3/device/$row";
            //$url = "http://api.sandbox.push.apple.com/3/device/$row";
            run_curl($url,$headers,$message,$cert);
        }
    }
    else
    {
        $url = "https://api.push.apple.com/3/device/$registrationIds";
        //$url = "http://api.sandbox.push.apple.com/3/device/$registrationIds";
        run_curl($url,$headers,$message,$cert);
    }
    
}
function run_curl($url,$headers,$message,$cert)
{
    error_reporting(E_ALL);
    if (!defined('CURL_HTTP_VERSION_2_0')) {
        define('CURL_HTTP_VERSION_2_0', 3);
    }
    $http2ch = curl_init();
    curl_setopt($http2ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_2_0);
    curl_setopt_array($http2ch, array(
        CURLOPT_URL => "{$url}",
        CURLOPT_PORT => 443,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_POST => TRUE,
        CURLOPT_POSTFIELDS => $message,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSLCERT => $cert,
        CURLOPT_HEADER => 1
    ));
    $result = curl_exec($http2ch);
    log_message('debug','IOS');
    log_message('debug',print_r($result,true));
    $status = curl_getinfo($http2ch, CURLINFO_HTTP_CODE);
}
?>