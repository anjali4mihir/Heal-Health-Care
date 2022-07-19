<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Importexportcron extends CI_Controller {

    public function __construct() {
            parent::__construct();  
            //$this->auth->check_session();
            $this->load->model("Inventory_model");
            $this->load->model('common_model');
    }

    public function medicine_import_cron() {
            set_time_limit(0);
            ini_set('max_execution_time', '0');
            $mds = $this->Inventory_model->get_imported_medicines();
            /*echo "<br/>Total Records----".count($mds); 
            echo "<br/>mds---<pre>"; print_r($mds);
            exit;*/
            for($i=0; $i<count($mds); $i++) {
                //echo "<br/>hi----"; exit;
                //echo "<br/>mds---<pre>"; print_r($mds[$i]);
                $id = $mds[$i]->id;
                $name = $mds[$i]->name;
                $name_hn = $this->google_translate($mds[$i]->name);
                $company_name = $mds[$i]->company_name;
                $generic_name = $mds[$i]->generic_name;
                $description = $mds[$i]->description;
                $data['name_hn'] = $name_hn;

                if(($mds[$i]->company_name!='') && ($mds[$i]->company_name!=NULL)) {
                    $company_name_hn = $this->google_translate($mds[$i]->company_name);
                    $data['company_name_hn'] = $company_name_hn;
                }
                
                if(($mds[$i]->generic_name!='') && ($mds[$i]->generic_name!=NULL)) {
                    $generic_name_hn = $this->google_translate($mds[$i]->generic_name);
                    $data['generic_name_hn'] = $generic_name_hn;
                }
                
                if(($mds[$i]->description!='') && ($mds[$i]->description!=NULL)) {
                    $description_hn = $this->google_translate($mds[$i]->description);
                    $data['description_hn'] = $description_hn;
                }                
                $data['transate_state'] = '0';
                $d1 = $this->common_model->data_update("tbl_medicine", $data, array("id" => $id));
            }
            echo "<br/>medicine_import_cron Cron Executed Successfully";
            exit;
    }

    public function pathology_import_cron() {
            set_time_limit(0);
            ini_set('max_execution_time', '0');
            $mds = $this->Inventory_model->get_imported_pethology_medicines();
            //echo "<br/>mds---<pre>"; print_r($mds); exit;
            for($i=0; $i<count($mds); $i++) {
                $id = $mds[$i]->id;
                $name = $mds[$i]->name;
                $name_hn = $this->google_translate($mds[$i]->name);
                $description = $mds[$i]->description;
                $data['name_hn'] = $name_hn;
                if(($mds[$i]->description != '') && ($mds[$i]->description != NULL)) {
                    $description_hn = $this->google_translate($mds[$i]->description);
                    $data['description_hn'] = $description_hn;
                }                
                $data['transate_state'] = '0';
                $d1=$this->common_model->data_update("tbl_test_pathology", $data, array("id"=>$id));
            }
            echo "<br/>pathology_import_cron Cron Executed Successfully";
            exit;
    }

    public function radiology_import_cron() {
            set_time_limit(0);
            ini_set('max_execution_time', '0');
            $mds = $this->Inventory_model->get_imported_radiology_medicines();
            for($i=0; $i<count($mds); $i++) {
                $id = $mds[$i]->id;
                $name = $mds[$i]->name;
                $name_hn = $this->google_translate($mds[$i]->name);
                $category = $mds[$i]->category;
                $description = $mds[$i]->description;
                $data['name_hn'] = $name_hn;

                if(($mds[$i]->category!='') && ($mds[$i]->category != NULL)){
                    $category_hn = $this->google_translate($mds[$i]->category);
                    $data['category_hn'] = $category_hn;
                }
                
                if(($mds[$i]->description != '') && ($mds[$i]->description != NULL)) {
                    $description_hn = $this->google_translate($mds[$i]->description);
                    $data['description_hn'] = $description_hn;
                }
                $data['transate_state'] = '0';
                $d1=$this->common_model->data_update("tbl_report_radiology", $data, array("id"=>$id));
            }
            echo "<br/>radiology_import_cron Cron Executed Successfully";
            exit;
    }

    public function provisional_import_cron() {
            set_time_limit(0);
            ini_set('max_execution_time', '0');
            $mds = $this->Inventory_model->get_imported_provisional_medicines();
            for($i=0; $i<count($mds); $i++) {
                $id = $mds[$i]->id;
                $name = $mds[$i]->name;
                $name_hn = $this->google_translate($mds[$i]->name);
                $description = $mds[$i]->description;
                $data['name_hn'] = $name_hn;
                if(($mds[$i]->description != '') && ($mds[$i]->description != NULL)) {
                    $description_hn = $this->google_translate($mds[$i]->description);
                    $data['description_hn'] = $description_hn;
                }
                $data['transate_state'] = '0';
                $d1=$this->common_model->data_update("tbl_provisional_test", $data, array("id"=>$id));
            }
            echo "<br/>provisional_import_cron Cron Executed Successfully";
            exit;
    }

    public function google_translate($text) {
            $apiKey = 'AIzaSyAxUkgip_16Wwqo_lMI2TEjxP5oavzjgCA';
            $url = 'https://www.googleapis.com/language/translate/v2?key='.$apiKey.'&q=' . rawurlencode($text) .'&source=en&target=hi';
            $handle = curl_init($url);
            curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($handle);                 
            $responseDecoded = json_decode($response, true);
            curl_close($handle);
            if(isset($responseDecoded['error']['code'])) {
                if(($responseDecoded['error']['code'] == 400)){
                    return $text;
                }            
            }
            else{
               return $responseDecoded['data']['translations'][0]['translatedText'];
            }
    } 
}
?>