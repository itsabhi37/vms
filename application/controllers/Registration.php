<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {
    
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
        $visitors=$this->mymodel->fetch_all('visitordetails');           
        $data = array('visitors' => $visitors);
		$this->load->view('admin/registration',$data);
	}
    public function add_visitor(){        
        $vid=$this->mymodel->getVisitorId('visitordetails');
        
        // For Visitor Proof Of Identity
        $vstpoiconfig =   [
                'upload_path'   =>  './uploads/visitor_poi',
                'allowed_types' =>  'jpg|png|jpeg|pdf',
                'max_size'      =>  '300',
                'overwrite'     =>  TRUE,
                'file_name'     =>  'POI_'.$vid
            ];
        $this->load->library('upload', $vstpoiconfig);
        $this->upload->initialize($vstpoiconfig);
        if(!$this->upload->do_upload('poi')){
            $visitorpoi_path="NULL";
            $upload_error=$this->upload->display_errors(); 
            $visitors=$this->mymodel->fetch_all('visitordetails');
            $data = array('visitors' => $visitors,'upload_error'=>$upload_error);            
            $this->load->view('admin/registration',$data);
        }else{
            $this->upload->do_upload('poi');
            $poidata = $this->upload->data();
            $visitorpoi_path=base_url('/uploads/visitor_poi/'.$poidata['file_name']);
        }
        
        // For Visitor Image
        $vstimgconfig =   [
            'upload_path'   =>  './uploads/visitor_image',
            'allowed_types' =>  'jpg|png|jpeg',
            'max_size'      =>  '300',
            'overwrite'     =>  TRUE,
            'file_name'     =>  $vid
            ];
        $this->load->library('upload', $vstimgconfig);
        $this->upload->initialize($vstimgconfig);
        if(!$this->upload->do_upload('visitorimage')){
            $visitorimage_path="NULL";
            $upload_error=$this->upload->display_errors(); 
            $visitors=$this->mymodel->fetch_all('visitordetails');
            $data = array('visitors' => $visitors,'upload_error'=>$upload_error);            
            $this->load->view('admin/registration',$data);
        }else{
            $this->upload->do_upload('visitorimage');
            $imgdata=$this->upload->data();
            $visitorimage_path=base_url('/uploads/visitor_image/'.$imgdata['file_name']);
        }
        
        $this->form_validation->set_rules('txtName', 'Visitor Name', 'required|trim');
        $this->form_validation->set_rules('txtDesignation', 'Designation', 'required|trim');
        $this->form_validation->set_rules('txtDepartment', 'Department', 'required|trim'); 
        $this->form_validation->set_rules('txtEmail', 'Email', 'trim|valid_email');        
        $this->form_validation->set_rules('txtMobile', 'Mobile', 'required|trim|min_length[10]|integer'); 
       
        if ($this->form_validation->run() == FALSE||$visitorpoi_path=="NULL"||$visitorimage_path=="NULL"){            
                //On Validation Fail  
                $visitors=$this->mymodel->fetch_all('visitordetails');
                $data = array('visitors' => $visitors);            
                $this->load->view('admin/registration',$data);
        } 
        else{
                // On Success Save Details in Add Mode   
                $name=$this->input->post('txtName');
                $designation=$this->input->post('txtDesignation');
                $department=$this->input->post('txtDepartment');   
                $email=$this->input->post('txtEmail');
                $mobile=$this->input->post('txtMobile');
                $gender=$this->input->post('radGender');                
                
                // Preparing array for storing data in Visitor Details Table
                $data = array('uname' => $vid,'name'=>$name,'designation'=>$designation,'department'=>$department,'email'=>$email,'mobile'=>$mobile,'gender'=>$gender,'poi'=>$visitorpoi_path,'image'=>$visitorimage_path);

                // Preparing array for storing data in Login Details Table also for further use
            
                $defaultpwd=sha1('Nic@123');
                $lgndata = array('uname' => $vid,'pwd' => $defaultpwd,'user_type'=>'Visitor');

                $this->mymodel->insert_data('logindetails',$lgndata);
                $this->action_redirect_msg($this->mymodel->insert_data('visitordetails',$data),
                       'Visitor Registered Successfully.','Something went wrong, please try again!');
                    
        }
    }
    public function edit_visitor($vid){    
        $visitors=$this->mymodel->fetch_all('visitordetails');   
        $vis=$this->mymodel->fetch_data('uname',$vid,'visitordetails');
        $data = array('vis' => $vis,'visitors' => $visitors);        
        $this->load->view('admin/registration',$data);
    }
    
    public function update_visitor(){
        $this->form_validation->set_rules('txtName', 'Visitor Name', 'required|trim');
        $this->form_validation->set_rules('txtDesignation', 'Designation', 'required|trim');
        $this->form_validation->set_rules('txtDepartment', 'Department', 'required|trim'); 
        $this->form_validation->set_rules('txtEmail', 'Email', 'trim|valid_email');        
        $this->form_validation->set_rules('txtMobile', 'Mobile', 'required|trim|min_length[10]|integer'); 
            
        if ($this->form_validation->run() == FALSE){
                //On Validation Fail
                $this->session->set_flashdata('upderror','Something went wrong pls try again..');
                $loc='registration/edit_visitor/'.$this->input->post('txtUserName');
                return redirect($loc);  
        }
        else{
            // On Success
                $uname=$this->input->post('txtUserName');
                $name=$this->input->post('txtName');
                $designation=$this->input->post('txtDesignation');
                $department=$this->input->post('txtDepartment');   
                $email=$this->input->post('txtEmail');
                $mobile=$this->input->post('txtMobile');
                $gender=$this->input->post('radGender');            
                
                $data = array('name'=>$name,'designation'=>$designation,'department'=>$department,'email'=>$email,'mobile'=>$mobile,'gender'=>$gender);
            
                $this->action_redirect_msg($this->mymodel->update_data('uname',$uname,$data,'visitordetails'),
                       'Visitor Details Updated Successfully.','Something went wrong, please try again!');
        }        
    }
    public function delete_class($vid){
        $this->mymodel->delete_data('uname',$vid,'logindetails'); // Delete Data From Login Details
        $this->action_redirect_msg($this->mymodel->delete_data('uname',$vid,'visitordetails'),
               'Visitor Deleted Successfully.','Something went wrong, please try again!');
    }
    public function show_profile($vistrid){
        $vistpf=$this->mymodel->fetch_data('uname',$vistrid,'visitordetails');     
        $data=array('vistpf'=>$vistpf);
        $this->load->view('admin/visitorprofile',$data);
    }
    private function action_redirect_msg($actions,$successmsg,$failmsg){
            if($actions){
                 $this->session->set_flashdata('success',$successmsg);                 
            }
            else{
                $this->session->set_flashdata('error',$failmsg);
            }         
        return redirect('registration');
    }
}