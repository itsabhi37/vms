<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
	public function index()
	{
        if($this->session->userdata('user_name')&& $this->session->userdata('user_type')=='Admin'){
            return redirect('admin/home');
        }

        if($this->session->userdata('user_name')&& $this->session->userdata('user_type')=='Visitor'){
            return redirect('visitor/home');
        }
		$this->load->view('login');
	}
    
    public function verify_login(){
       
        $this->form_validation->set_rules('txtuname', 'Username', 'required|trim');
        $this->form_validation->set_rules('txtpwd', 'Password', 'required|trim');
        
        if ($this->form_validation->run() == FALSE){
                //On Validation Fail
                $this->load->view('login');
        }
        else{
                // On Success
                $username=$this->input->post('txtuname');
                $password=$this->input->post('txtpwd'); 
                $remember=$this->input->post('remember');                
                            
                $this->load->model('mymodel');
                $user_type=$this->mymodel->validate_login($username,$password);  

                if($user_type=='Admin'){
                    // valid credential. login user
                    $this->session->set_userdata('user_name',$username);
                    $this->session->set_userdata('user_type',$user_type);
                    
                    // Admin Details Fetching for Showing on Left Bar
                    $AdminInfo=$this->mymodel->get_info('uname',$_SESSION['user_name'],'admindetails'); 
                    $this->session->set_userdata('admin_name',$AdminInfo->name);
                    $this->session->set_userdata('admin_image',$AdminInfo->image);
                    
                    // Remember Me Code for Admin Login
                    if($remember!=NULL){
                    setcookie ("username",$username,time()+ (10 * 365 * 24 * 60 * 60));  
                    setcookie ("password",$password,time()+ (10 * 365 * 24 * 60 * 60));
                    }
                    else{
                        if(isset($_COOKIE["username"]))   
                        {  
                         setcookie ("username","");  
                        }  
                        if(isset($_COOKIE["password"]))   
                        {  
                         setcookie ("password","");  
                        } 
                    }

                    return redirect('admin/home');
                    
                }
                else if($user_type=='Visitor'){
                    // valid credential. login user
                    $this->session->set_userdata('user_name',$username);
                    $this->session->set_userdata('user_type',$user_type);
                    
                    // Visitor Details Fetching for Showing on Left Bar
                    $VisitorInfo=$this->mymodel->get_info('uname',$_SESSION['user_name'],'visitordetails'); 
                    $this->session->set_userdata('visitor_name',$VisitorInfo->name);
                    $this->session->set_userdata('visitor_image',$VisitorInfo->image);
                    
                    // Remember Me Code for Visitor Login
                    if($remember!=NULL){
                    setcookie ("username",$username,time()+ (10 * 365 * 24 * 60 * 60));  
                    setcookie ("password",$password,time()+ (10 * 365 * 24 * 60 * 60));
                    }
                    else{
                        if(isset($_COOKIE["username"]))   
                        {  
                         setcookie ("username","");  
                        }  
                        if(isset($_COOKIE["password"]))   
                        {  
                         setcookie ("password","");  
                        } 
                    }

                    return redirect('visitor/home');
                    
                }
                else{
                    // authentication failed.
                    $this->session->set_flashdata('error','Authentication Failed!');
                    return redirect('home');
                }
        }
    }

    public function ForgotPassword()
    {        
        $usertype = $this->input->post('usertype');
        $email = $this->input->post('email');
        $findemail = $this->mymodel->ForgotPassword($email,$usertype);  
        /*echo "<pre>";
        print_r($findemail);*/      
        if ($findemail) {
            $this->mymodel->sendpassword($findemail);
        } else {
            echo "<script>alert('$email not found, please enter correct email id')</script>";
            redirect(base_url(), 'refresh');
        }
    }
    
    public function logout(){
        $this->session->unset_userdata('user_name');
        $this->session->unset_userdata('user_type');
        return redirect('home');
    }
}