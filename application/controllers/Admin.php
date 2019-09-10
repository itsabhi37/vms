<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    
	public function home()
	{
        $totVisitors=$this->mymodel->count_data('visitordetails');  
        $totAdmins=$this->mymodel->count_data('admindetails');   
        $totPcs=$this->mymodel->count_data_with_condition('pcdetails','systemtype','Desktop');
        $totLaps=$this->mymodel->count_data_with_condition('pcdetails','systemtype','Laptop');
        $allPcs=$this->mymodel->count_data('pcdetails');
        $bkdpccount=$this->mymodel->get_booked_count(date("Y-m-d"),date("H:i:s"));
        // Return no. of bookings in months of curret year
        $pclogs=$this->mymodel->get_booking_log("");
        $data = array('totalVist' => $totVisitors,'totalAdmn' => $totAdmins,'totalPcs'=>$totPcs,'totalLaps'=>$totLaps,'totalBookedpc'=>$bkdpccount,'bkdpclog'=>$pclogs,'allPcs'=>$allPcs);
		$this->load->view('admin/dashboard',$data);
	}
    public function __construct(){
         //if user is not logged in then redirect to Login Page       
        parent::__construct();
        if($this->session->userdata('user_type')!="Admin"){
                return redirect('home');
            }
        $this->load->model('mymodel');
    }
}