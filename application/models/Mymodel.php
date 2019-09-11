<?php 
class Mymodel extends CI_Model{
    
    public function validate_login($username,$password){
        
        $password=sha1($password); // Encrypted Password
        
        $q=$this->db->where(['uname like binary'=>$username,'pwd like binary'=>$password])
                    ->get('logindetails');
        
        if($q->num_rows()){
            return $q->row()->user_type;
            //return TRUE;
        }
        else {
            return FALSE;
        }
    }
    public function getVisitorId($tablename){
        $query = $this->db->query('SELECT uname FROM '.$tablename.' ORDER BY uname DESC LIMIT 1');          
        if(empty($query->result()))
        {
            $vid='NIC'.date("Y").'0001';            
            return $vid;
        }
        else{
            $lastid= $query->row()->uname;
            $onlynumber = substr($lastid, -4);
            $onlynumber=str_pad($onlynumber+1, 4, '0', STR_PAD_LEFT);            
            $vid='NIC'.date("Y").$onlynumber;
            return $vid;
        }
    }
    public function fetch_all($tablename){
        // fetch all details from Given Table
        $query= $this->db->get($tablename); 
        return $query->result();
        
    }
    
    public function insert_data($tablename,$data){   
        return $this->db->insert($tablename, $data);
    }
    
    public function fetch_data($id,$idvalue,$tablename){
        $query=$this->db->where($id,$idvalue)
                        ->get($tablename);
        return $query->row();
    }
    
    public function delete_data($id,$idvalue,$tablename){ 
       return $this->db->delete($tablename, [$id=>$idvalue]);
    }
    
    public function update_data($id,$idvalue,Array $data,$tablename){       
        return $this->db
                    ->where($id,$idvalue)
                    ->update($tablename, $data);
    }
    public function count_data($tablename){ 
        $query = $this->db->query('SELECT * FROM '.$tablename);
        return $query->num_rows();
    }
    public function count_data_with_condition($tablename,$fieldname,$condition){ 
        $query=$this->db->where($fieldname,$condition)
                        ->get($tablename);
        return $query->num_rows();
    }
    public function get_info($id,$idvalue,$tablename){ 
        $query=$this->db->where($id,$idvalue)
                        ->get($tablename);
        return $query->row();
    }
    public function get_booked_info($todydate,$crnttime){
        $query = $this->db->query("SELECT * FROM bookingdetails WHERE date='".$todydate."' AND '".$crnttime."' BETWEEN time_from AND time_to");
       return $query->result();
    }
    public function get_booked_count($todydate,$crnttime){
        $query = $this->db->query("SELECT * FROM bookingdetails WHERE date='".$todydate."' AND '".$crnttime."' BETWEEN time_from AND time_to");
       return $query->num_rows();
    }
    
    // This function return no. of bookings in a month this is for chart
    public function get_booking_log($uname){        
        if($uname==""){
        $query=$this->db->query("SELECT SUM(IF(month = 'Jan', total, 0)) AS 'Jan', SUM(IF(month = 'Feb', total, 0)) AS 'Feb', SUM(IF(month = 'Mar', total, 0)) AS 'Mar', SUM(IF(month = 'Apr', total, 0)) AS 'Apr', SUM(IF(month = 'May', total, 0)) AS 'May', SUM(IF(month = 'Jun', total, 0)) AS 'Jun', SUM(IF(month = 'Jul', total, 0)) AS 'Jul', SUM(IF(month = 'Aug', total, 0)) AS 'Aug', SUM(IF(month = 'Sep', total, 0)) AS 'Sep', SUM(IF(month = 'Oct', total, 0)) AS 'Oct', SUM(IF(month = 'Nov', total, 0)) AS 'Nov', SUM(IF(month = 'Dec', total, 0)) AS 'Dec' FROM (SELECT DATE_FORMAT(date, '%b') AS month, COUNT(id) as total FROM bookingdetails WHERE date <= NOW() and date >= Date_add(Now(),interval - 12 month) GROUP BY DATE_FORMAT(date, '%m-%Y')) as sub");
            return $query->result();
        }
        else{
            $query=$this->db->query("SELECT SUM(IF(month = 'Jan', total, 0)) AS 'Jan', SUM(IF(month = 'Feb', total, 0)) AS 'Feb', SUM(IF(month = 'Mar', total, 0)) AS 'Mar', SUM(IF(month = 'Apr', total, 0)) AS 'Apr', SUM(IF(month = 'May', total, 0)) AS 'May', SUM(IF(month = 'Jun', total, 0)) AS 'Jun', SUM(IF(month = 'Jul', total, 0)) AS 'Jul', SUM(IF(month = 'Aug', total, 0)) AS 'Aug', SUM(IF(month = 'Sep', total, 0)) AS 'Sep', SUM(IF(month = 'Oct', total, 0)) AS 'Oct', SUM(IF(month = 'Nov', total, 0)) AS 'Nov', SUM(IF(month = 'Dec', total, 0)) AS 'Dec' FROM (SELECT DATE_FORMAT(date, '%b') AS month, COUNT(id) as total FROM bookingdetails WHERE date <= NOW() and date >= Date_add(Now(),interval - 12 month) AND uname='".$uname."' GROUP BY DATE_FORMAT(date, '%m-%Y')) as sub");
                return $query->result();
        }
    }

    // Fetch all Details for Reporting

    public function get_all_report_data($vid){
        if(empty($vid)){
            $this->db->select('vd.uname,vd.name,pd.ip,pd.networktype,bd.date,bd.time_from,bd.time_to');
            $this->db->from('bookingdetails bd'); 
            $this->db->join('visitordetails vd', 'vd.uname=bd.uname', 'left');
            $this->db->join('pcdetails pd', 'pd.ip=bd.ip', 'left');       
            $query = $this->db->get(); 
        }
        else{
            $this->db->select('vd.uname,vd.name,pd.ip,pd.networktype,bd.date,bd.time_from,bd.time_to');
            $this->db->from('bookingdetails bd'); 
            $this->db->join('visitordetails vd', 'vd.uname=bd.uname', 'left');
            $this->db->join('pcdetails pd', 'pd.ip=bd.ip', 'left');
            $this->db->where('bd.uname',$vid);       
            $query = $this->db->get(); 
        }
        return $query->result();
    }

    //Count and return number of rows available in a table
    public function count_rows($fields, $where, $table, $distinct)
    {
        //If distinct variable is not blank and variable has distinct value
        if($distinct != '' && $distinct == 'distinct')
        {
            $this->db->distinct();
            $this->db->select($fields);
        }
        else
        {
            $this->db->select($fields);
        }
        //If where variable is not blank
        if ($where != "") 
        {
            $this->db->where($where);
        }
        $query = $this->db->get($table);
        return $query->num_rows();
        $query->free_result();
    }

    public function ForgotPassword($email,$usertype)
    {
        if($usertype=="Admin"){
            $this->db->select('email,uname');
            $this->db->from('admindetails');
            $this->db->where('email', $email);
            $query=$this->db->get();
            return $query->row_array();
        }
        if($usertype=="Visitor"){
            $this->db->select('email,uname');
            $this->db->from('visitordetails');
            $this->db->where('email', $email);
            $query=$this->db->get();
            return $query->row_array();
        }        
    }

    public function sendpassword($data)
    {
        $email = $data['email'];
        $uname = $data['uname'];
        $query1=$this->db->query("SELECT *  from logindetails where uname = '".$uname."' ");
        $row=$query1->result_array();

        if ($query1->num_rows()>0){
            $passwordplain = "";
            $passwordplain  = rand(999999999,9999999999);
            $newpass['pwd'] = sha1($passwordplain);
            $this->db->where('uname', $uname);
            $this->db->update('logindetails', $newpass);
           /* $mail_message='Dear '.$row[0]['user_type'].','. "\r\n";
            $mail_message.='Thanks for contacting regarding to forgot password,<br> Your <b>Password</b> is <b>'.$passwordplain.'</b>'."\r\n";
            $mail_message.='<br>Please Update your password.';
            $mail_message.='<br>Thanks & Regards';
            $mail_message.='<br>Visitor Management System';
            require 'PHPMailerAutoload.php';
            require 'class.phpmailer.php';
            $mail = new PHPMailer;
            $mail->IsSendmail();
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->Host = "hostname";
            $subject = 'Testing Email';
            $mail->AddAddress($email);
            $mail->IsMail();
            $mail->From = 'abhishekkr11693@gmail.com';
            $mail->FromName = 'Abhishek Kumar';
            $mail->IsHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $mail_message;
            $mail->Send();*/

            //Mail Code
            $to = $email;
            $subject = "VMS Password Reset";
            $mail_message='Dear '.$row[0]['user_type'].','. "\r\n";
            $mail_message.='Thanks for contacting regarding to forgot password,<br> Your <b>Password</b> is <b>'.$passwordplain.'</b>'."\r\n";
            $mail_message.='<br>Please Update your password.';
            $mail_message.='<br>Thanks & Regards';
            $mail_message.='<br>Visitor Management System';
            $headers = "From: abhishekkr11693@gmail.com";

            mail($to,$subject,$mail_message,$headers);
            echo "<script>alert('Password sent to your email!')</script>";
            /*if (!$mail->send()) {
                echo "<script>alert('msg','Failed to send password, please try again!')</script>";
            } else {
                echo "<script>alert('msg','Password sent to your email!')</script>";
            }*/
            redirect(base_url(),'refresh');
        }else{
            echo "<script>alert('msg','Email not found try again!')</script>";
            redirect(base_url(),'refresh');
        }
    }
}

?>