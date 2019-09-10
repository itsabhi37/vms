<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {
    
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
        $admins=$this->mymodel->fetch_all('admindetails');           
        $data = array('admins' => $admins);
		$this->load->view('admin/signup',$data);
	}
    public function add_admin(){   
        $new_name = time();
        $config =   [
                'upload_path'   =>  './uploads/admin_image',
                'allowed_types' =>  'jpg|png|jpeg',
                'max_size'      =>  '300',
                'overwrite'     =>  TRUE,
                'file_name'     =>  $new_name
            ];
        
        $this->load->library('upload', $config);        
        $this->form_validation->set_rules('txtName', 'Visitor Name', 'required|trim');
        $this->form_validation->set_rules('txtUserName', 'User Name', 'required|trim|is_unique[admindetails.uname]');
        $this->form_validation->set_rules('txtDesignation', 'Designation', 'required|trim');
        $this->form_validation->set_rules('txtDepartment', 'Department', 'required|trim'); 
        $this->form_validation->set_rules('txtEmail', 'Email', 'trim|valid_email');        
        $this->form_validation->set_rules('txtMobile', 'Mobile', 'required|trim|min_length[10]|integer'); 
       
        if ($this->form_validation->run() == FALSE||$this->upload->do_upload('adminimage')==FALSE){            
                //On Validation Fail  
                $upload_error=$this->upload->display_errors(); 
                $admins=$this->mymodel->fetch_all('admindetails');
                $data = array('admins' => $admins,'upload_error'=>$upload_error);   
                $this->load->view('admin/signup',$data);
        } 
        else{
                // On Success Save Details in Add Mode   
                $name=$this->input->post('txtName');
                $uname=$this->input->post('txtUserName');
                $designation=$this->input->post('txtDesignation');
                $department=$this->input->post('txtDepartment');   
                $email=$this->input->post('txtEmail');
                $mobile=$this->input->post('txtMobile');
                $gender=$this->input->post('radGender');                
                
                // Preparing array for storing data in Visitor Details Table
        
                $imgdata=$this->upload->data();
                $image_path=base_url('/uploads/admin_image/'.$imgdata['file_name']);
                    
                $data = array('name'=>$name,'uname' => $uname,'designation'=>$designation,'department'=>$department,'email'=>$email,'mobile'=>$mobile,'gender'=>$gender,'image'=>$image_path);

                // Preparing array for storing data in Login Details Table also for further use
            
                $defaultpwd=sha1('Nic@123');
                $lgndata = array('uname' => $uname,'pwd' => $defaultpwd,'user_type'=>'Admin');

                $this->mymodel->insert_data('logindetails',$lgndata);
                $this->action_redirect_msg($this->mymodel->insert_data('admindetails',$data),
                       'Admin Registered Successfully.','Something went wrong, please try again!');
        }
    }
    public function edit_admin($admid){    
        $admins=$this->mymodel->fetch_all('admindetails');   
        $adm=$this->mymodel->fetch_data('uname',$admid,'admindetails');
        $data = array('adm' => $adm,'admins' => $admins);        
        $this->load->view('admin/signup',$data);
    }
    
    public function update_admin(){
        $this->form_validation->set_rules('txtName', 'Visitor Name', 'required|trim');
        $this->form_validation->set_rules('txtDesignation', 'Designation', 'required|trim');
        $this->form_validation->set_rules('txtDepartment', 'Department', 'required|trim'); 
        $this->form_validation->set_rules('txtEmail', 'Email', 'trim|valid_email');        
        $this->form_validation->set_rules('txtMobile', 'Mobile', 'required|trim|min_length[10]|integer'); 
            
        if ($this->form_validation->run() == FALSE){
                //On Validation Fail
                $this->session->set_flashdata('upderror','Something went wrong pls try again..');
                $loc='signup/edit_admin/'.$this->input->post('txtUserName');
                return redirect($loc);  
        }
        else{
            // On Success            
                $name=$this->input->post('txtName');
                $uname=$this->input->post('txtUserName');
                $designation=$this->input->post('txtDesignation');
                $department=$this->input->post('txtDepartment');   
                $email=$this->input->post('txtEmail');
                $mobile=$this->input->post('txtMobile');
                $gender=$this->input->post('radGender');            
                
                $data = array('name'=>$name,'designation'=>$designation,'department'=>$department,'email'=>$email,'mobile'=>$mobile,'gender'=>$gender);
            
                $this->action_redirect_msg($this->mymodel->update_data('uname',$uname,$data,'admindetails'),
                       'Admin Details Updated Successfully.','Something went wrong, please try again!');
        }        
    }
    public function delete_admin($admuname){
        $this->mymodel->delete_data('uname',$admuname,'logindetails'); // Delete Data From Login Details
        $this->action_redirect_msg($this->mymodel->delete_data('uname',$admuname,'admindetails'),
               'Admin Deleted Successfully.','Something went wrong, please try again!');
    }
    public function show_profile($admnid){
        $admpf=$this->mymodel->fetch_data('uname',$admnid,'admindetails');     
        $data=array('admpf'=>$admpf);
        $this->load->view('admin/adminprofile',$data);
    }
    private function action_redirect_msg($actions,$successmsg,$failmsg){
            if($actions){
                 $this->session->set_flashdata('success',$successmsg);                 
            }
            else{
                $this->session->set_flashdata('error',$failmsg);
            }         
        return redirect('signup');
    }
}