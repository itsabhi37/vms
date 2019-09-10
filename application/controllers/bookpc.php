<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bookpc extends CI_Controller {
    
	public function index()
	{
        $bkdpc=$this->mymodel->get_booked_info(date("Y-m-d"),date("H:i:s"));
        $allpc=$this->mymodel->fetch_all('pcdetails');
        $data = array('allpcs' => $allpc,'bookedpc'=>$bkdpc);
        $this->load->view('visitor/booking',$data);
	}
    
    public function __construct(){
         //if user is not logged in then redirect to Login Page       
        parent::__construct();
        if($this->session->userdata('user_type')!="Visitor"){
                return redirect('home');
            }
        $this->load->model('mymodel');
    }
    
    public function bookme($sysip){
        $uname=$this->session->userdata('user_name');//visitor uname
        $systm=$this->mymodel->fetch_data('ip',$sysip,'pcdetails');
        $vistrs=$this->mymodel->fetch_data('uname',$uname,'visitordetails');
        $data = array('sys' => $systm,'vis'=>$vistrs);
        $this->load->view('visitor/bookme',$data);
    }
    
    public function book_system(){
         
        $this->form_validation->set_rules('txtDate', 'Date', 'required|trim');
        $this->form_validation->set_rules('txtStartTime', 'Start Time', 'required|trim');
        $this->form_validation->set_rules('txtEndTime', 'End Time', 'required|trim'); 
        
        if ($this->form_validation->run() == FALSE){            
                //On Validation Fail 
            
               $this->session->set_flashdata('upderror','Something went wrong pls try again..');
               $loc='bookpc/bookme/'.$this->input->post('txtHiddenIP');
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
        return redirect('bookpc');
    }
}