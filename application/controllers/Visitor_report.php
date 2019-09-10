<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visitor_report extends CI_Controller {
    
    public function __construct(){
         //if user is not logged in then redirect to Login Page       
        parent::__construct();
        if($this->session->userdata('user_type')!="Visitor"){
                return redirect('home');
            }
         $this->load->model('mymodel');
    }
    public function index()
	{
        $rpt=$this->mymodel->get_all_report_data($this->session->userdata('user_name'));           
        $data = array('rpt' => $rpt);
		$this->load->view('visitor/reports',$data);
	}
}