<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visitor extends CI_Controller {
    
	public function home()
	{
        $totVisitors=$this->mymodel->count_data('visitordetails');  
        $totAdmins=$this->mymodel->count_data('admindetails');   
        $totPcs=$this->mymodel->count_data_with_condition('pcdetails','systemtype','Desktop');
        $totLaps=$this->mymodel->count_data_with_condition('pcdetails','systemtype','Laptop');
        $allPcs=$this->mymodel->count_data('pcdetails');
        $bkdpccount=$this->mymodel->get_booked_count(date("Y-m-d"),date("H:i:s"));
        $pclogs=$this->mymodel->get_booking_log($this->session->userdata('user_name'));
        $data = array('totalVist' => $totVisitors,'totalAdmn' => $totAdmins,'totalpc'=>$totPcs,'totalLaps'=>$totLaps,'totalBookedpc' => $bkdpccount,'bkdpclog'=>$pclogs,'allPcs'=>$allPcs);
        $this->load->view('visitor/dashboard',$data);
	}
    public function __construct(){
         //if user is not logged in then redirect to Login Page       
        parent::__construct();
        if($this->session->userdata('user_type')!="Visitor"){
                return redirect('home');
            }
        $this->load->model('mymodel');
    }
    // Show Visitor Profile
    public function show_profile($vistrid){
        $vistpf=$this->mymodel->fetch_data('uname',$vistrid,'visitordetails');     
        $data=array('vistpf'=>$vistpf);
        $this->load->view('visitor/visitorprofile',$data);
    }
}