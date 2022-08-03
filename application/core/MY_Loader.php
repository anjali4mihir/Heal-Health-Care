<?php
class MY_Loader extends CI_Loader {
    public function template($template_name, $vars = array())
    {
        $this->view('admin/template/header');
        $this->view('admin/template/sidebar');
        $this->view($template_name, $vars);
        $this->view('admin/template/footer');
    }
    public function ptemplate($template_name, $vars = array())
    {
        $this->view('partner/ptemplate/header');
        $this->view('partner/ptemplate/sidebar');
        $this->view($template_name, $vars);
        $this->view('partner/ptemplate/footer');
    }
}

?>