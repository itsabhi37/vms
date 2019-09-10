<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {
    
	public function index()
	{
        $bkdpc=$this->mymodel->get_booked_info(date("Y-m-d"),date("H:i:s"));
        $allpc=$this->mymodel->fetch_all('pcdetails');
        $data = array('allpcs' => $allpc,'bookedpc'=>$bkdpc);
        $this->load->view('admin/booking',$data);
	}
    
    public function __construct(){
         //if user is not logged in then redirect to Login Page       
        parent::__construct();
        if($this->session->userdata('user_type')!="Admin"){
                return redirect('home');
            }
        $this->load->model('mymodel');
    }
    
    public function bookme($sysip){
        $systm=$this->mymodel->fetch_data('ip',$sysip,'pcdetails');
        $data = array('sys' => $systm);
        $this->load->view('admin/bookme',$data);
    }
    
    public function show_visitors(){
        $visitors=$this->mymodel->fetch_all('visitordetails');    
        $data=array('visitors'=>$visitors);
        $this->load->view('admin/visitors',$data);
    }
    
    public function get_visitor_data()
    {
        header("Content-type: application/json");
        $visitor_data = $this->mymodel->fetch_data('uname',$this->input->post('uname'),'visitordetails');
        echo json_encode($visitor_data);
    }
    
    public function book_system(){
         
        $this->form_validation->set_rules('txtVisitorName', 'Visitor Name', 'required|trim');
        $this->form_validation->set_rules('txtDate', 'Date', 'required|trim');
        $this->form_validation->set_rules('txtStartTime', 'Start Time', 'required|trim');
        $this->form_validation->set_rules('txtEndTime', 'End Time', 'required|trim'); 
        
        if ($this->form_validation->run() == FALSE){            
                //On Validation Fail 
            
               $this->session->set_flashdata('upderror','Something went wrong pls try again..');
               $loc='booking/bookme/'.$this->input->post('txtHiddenIP');
               return redirect($loc); 
        } 
        else{
                // On Success Save Details in Add Mode
            
                $ip=$this->input->post('txtHiddenIP'); 
                $uname=$this->input->post('txtUname');           
                $date=$this->input->post('txtDate');
                $date=date("Y-m-d", strtotime($date));   
                $starttime=$this->input->post('txtStartTime');
                $starttime=date("H:i", strtotime($starttime));
                $endtime=$this->input->post('txtEndTime');
                $endtime=date("H:i", strtotime($endtime));
                
                // Preparing array for storing data in PC Details Table
                $data = array('ip'=>$ip,'uname' => $uname,'date'=>$date,'time_from'=>$starttime,'time_to'=>$endtime);

                $this->action_redirect_msg($this->mymodel->insert_data('bookingdetails',$data),
                       'System Booked Successfully.','Something went wrong, please try again!');
        }
    }
    
    private function action_redirect_msg($actions,$successmsg,$failmsg){
            if($actions){
                 $this->session->set_flashdata('success',$successmsg);                 
            }
            else{
                $this->session->set_flashdata('error',$failmsg);
            }         
        return redirect('booking');
    }
}