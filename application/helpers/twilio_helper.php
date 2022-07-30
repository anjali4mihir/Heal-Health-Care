<?php 
 //error_reporting(E_ALL);
 // Update the path below to your autoload.php, 
 // see https://getcomposer.org/doc/01-basic-usage.md 

require APPPATH . '/third_party/twilio-php-main/src/Twilio/autoload.php';
// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;
function send_message($data){
    $sid    = "ACb6c2b0b5d9de6ac64cfa7d15395b4d0d"; 
    $token  = "46e725d60a489de76db84bc2d536f617"; 
    $twilio = new Client($sid, $token); 
    $mobilenumber=$data['mobile_number'];
    //print_r($mobilenumber);
    $body=$data['body'];
    //print_r($body);die;
    try{
        $message = $twilio->messages 
                   ->create($mobilenumber, // to 
                            array( 
                                "from" => "+18312288407",    //+14084098690   
                                "body" =>$body 
                            ) 
                );

    } catch(Exception $e){
        return $e->getCode();
      }
    
     
    
  
 
}

function checkmobilenumber($mobilenumber){
    $sid    = "ACb6c2b0b5d9de6ac64cfa7d15395b4d0d"; 
    $token  = "46e725d60a489de76db84bc2d536f617"; 
    $twilio = new Client($sid, $token);
    try{
    $phone_number = $twilio->lookups->v1->phoneNumbers("$mobilenumber")->fetch(["type" => ["carrier"]]);
    $check=$phone_number->carrier;
    $type = $check["type"];
    if(strtolower($type) !="mobile"){
        return false;
    } else{
        return true;
    }
    
    } catch(Exception $e){
        return false;
        //print_r($e->getCode());
        //return $e->getCode();
    }
}


 