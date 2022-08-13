<?php defined('BASEPATH') OR exit('No direct script access allowed');

// $config = array(
//     'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
//     '_smtp_auth'=>false,
//     'smtp_host' => 'relay-hosting.secureserver.net', 
//     'smtp_port' => 25,
//     'smtp_user' => 'support@atheal.in',
//     'smtp_pass' => 'atheal8928565643',
//     //'smtp_crypto' => 'ssl', 
//     'mailtype' => 'html',
//     'smtp_timeout' => '1',
//     'charset' => 'iso-8859-1',
//     'wordwrap' => TRUE,
// ); 

$config = array(
    'protocol' => 'imap', // 'mail', 'sendmail', or 'smtp'
    'smtp_host' => 'imap.secureserver.net', //smtpout.secureserver.net
    'smtp_port' => 993,
    'smtp_auth' => true,
    'smtp_crypto' => 'security',
    'smtp_user' => 'test@atheal.in',//support@atheal.in
    'smtp_pass' => 'Atheal@2021',//atheal8928565643
    'smtp_crypto' => 'ssl', 
    'mailtype' => 'html',
    'smtp_timeout' => '4',
    'charset' => 'iso-8859-1',
    'wordwrap' => TRUE
);
?>