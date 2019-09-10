<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pcmaster extends CI_Controller {
    
    public function __construct(){
         //if user is not logged in then redirect to Login Page       
        parent::__construct();
        if($this->session->userdata('user_type')!="Admin"){
                return redirect('home');
            }
         $this->load->model('mymodel');
    }
    public function index()
	{
        $pcs=$this->mymodel->fetch_all('pcdetails');           
        $data = array('pcs' => $pcs);
		$this->load->view('admin/pcmaster',$data);
	}
    public function add_pc(){
        $this->form_validation->set_rules('txtPCName', 'PC/Laptop Name', 'required|trim');
        $this->form_validation->set_rules('txtUserName', 'User Name', 'required|trim');
        $this->form_validation->set_rules('txtPassword', 'Password', 'required|trim');
        $this->form_validation->set_rules('txtIP', 'IP Address', 'required|trim|is_unique[pcdetails.ip]'); 
       
        if ($this->form_validation->run() == FALSE){            
                //On Validation Fail  
                $pcs=$this->mymodel->fetch_all('pcdetails');
                $data = array('pcs' => $pcs);   
                $this->load->view('admin/pcmaster',$data);
        } 
        else{
                // On Success Save Details in Add Mode   
                $name=$this->input->post('txtPCName');            
                $systemtype=$this->input->post('radSystemType');
                $uname=$this->input->post('txtUserName');
                $password=$this->input->post('txtPassword');
                $ip=$this->input->post('txtIP');       
                $networktype=$this->input->post('radNetworkType');
                
                // Preparing array for storing data in PC Details Table
            
                $data = array('name'=>$name,'systemtype' =>         $systemtype,'uname'=>$uname,'password'=>$password,'ip'=>$ip,'networktype'=>$networktype);

                $this->action_redirect_msg($this->mymodel->insert_data('pcdetails',$data),
                       'Hardware Registered Successfully.','Something went wrong, please try again!');
        }
    }
    public function edit_pc($pcip){    
        $pcs=$this->mymodel->fetch_all('pcdetails');   
        $pcsinfo=$this->mymodel->fetch_data('ip',$pcip,'pcdetails');
        $data = array('pcinfo' => $pcsinfo,'pcs' => $pcs);        
        $this->load->view('admin/pcmaster',$data);
    }
    
    public function update_pc(){
        $this->form_validation->set_rules('txtPCName', 'PC/Laptop Name', 'required|trim');
        $this->form_validation->set_rules('txtUserName', 'User Name', 'required|trim');
        $this->form_validation->set_rules('txtPassword', 'Password', 'required|trim');
                    
        if ($this->form_validation->run() == FALSE){
                //On Validation Fail
                $this->session->set_flashdata('upderror','Something went wrong pls try again..');
                $loc='pcmaster/edit_pc/'.$this->input->post('txtIP');
                return redirect($loc);  
        }
        else{
            // On Success  
                $ip=$this->input->post('txtIP');  
                $name=$this->input->post('txtPCName');            
                $systemtype=$this->input->post('radSystemType');
                $uname=$this->input->post('txtUserName');
                $password=$this->input->post('txtPassword');
                $networktype=$this->input->post('radNetworkType');
                $data=array('name'=>$name,'systemtype'=>$systemtype,'uname'=>$uname,'password'=>$password,'networktype'=>$networktype);
            
                $this->action_redirect_msg($this->mymodel->update_data('ip',$ip,$data,'pcdetails'),
                       'Hardware Details Updated Successfully.','Something went wrong, please try again!');
        }        
    }
    public function delete_pc($sysip){
        $this->action_redirect_msg($this->mymodel->delete_data('ip',$sysip,'pcdetails'),
               'Hardware Deleted Successfully.','Something went wrong, please try again!');
    }
    private function action_redirect_msg($actions,$successmsg,$failmsg){
            if($actions){
                 $this->session->set_flashdata('success',$successmsg);                 
            }
            else{
                $this->session->set_flashdata('error',$failmsg);
            }         
        return redirect('pcmaster');
    }
}