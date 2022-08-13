<?php 

use \ConvertApi\ConvertApi;

function generateimage($filename,$returnpath,$savepath)
{
    $root = $_SERVER['DOCUMENT_ROOT'].'/imagegenerete/vendor/autoload.php';
    require_once($root);
    // ConvertApi::setApiSecret('o0vTF4UOLCu1TRo2');
    ConvertApi::setApiSecret('eO9hJxELN6mOpiIM');

    $result = ConvertApi::convert('png', [
        'File' => $filename,
        'ImageWidth' => '440',
        ], 'htm'
    );

    $result->saveFiles($savepath);
    if(isset($result->response['Files'][0]['FileName'])){
        return $result->response['Files'][0]['FileName'];
    } else {
        return false;
    }
}

?>