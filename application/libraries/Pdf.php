<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once FCPATH.'vendor/autoload.php';

class Pdf {
    public $param;
    public $pdf;
    public function __construct($param = array(''))
    {
        $this->param =$param;
        $mpdfConfig = array(
            'mode' => 'utf-8',
            'format' => 'A4',    // format - A4, for example, default ''
            'margin_left' => 0, 
            'margin_right' => 0,
            'margin_top' => 0,
            'margin_bottom' => 0,
            'orientation' => 'P'  	// L - landscape, P - portrait
        );
        $this->pdf = new \Mpdf\Mpdf($mpdfConfig);
    }
}