<?php
class EstateAdmin{
    const TYPE = "estate";

    private $id;
    private $name;
    private $phone;
    private $email;
    private $address;
    private $estate_id; //int
    private $password; //string of size 20 in the database. change this size if you whish to encrypt the password
    private $date;//datetime
    
    private $estate;
    
    public function __construct($id=0) {
        if($id <1){
            $this->id = 0;
            $this->name = "name";
            $this->phone = "none";
            $this->email = "none";
            $this->address = "none";
            $this->estate_id =0;
            $this->password = "none";
            $this->date = date("Y-m-d H:i:s");
            
            $this->estate = null;
        }else {
            $this->fetch_estate_admin_by_id($id);
        }
        
    }
    public function fetch_estate_admin_by_id($id){
        $row = DB::queryFirstRow('SELECT * FROM estate_admin WHERE id=%i',$id);
        return $this->set_row($row);
    }
    public function fetch_all_estate_admins(){
        $result = DB::query('SELECT * FROM estate_admin');
        return $this->set_result($result);
    }
    public function fetch_estate_admin_by_estate_id($estate_id){
        $row = DB::queryFirstRow('SELECT * FROM estate_admin WHERE estate =%i',$estate_id);
        return $this->set_row($row);
    }
    public function update_by_id(){
        DB::update('estate_admin',  $this->get_array(),'id=%i',  $this->id);
        return true;
    }
    public function update_by_estate_id(){
        DB::update('estate_admin',  $this->get_array(),'estate=%i',  $this->estate_id);
        return true;
    }
    public function insert(){
        DB::insert('estate_admin',  $this->get_array());
        return true;
    }
    public function delete(){
        DB::delete('estate_admin','id=%i',  $this->id);
        return true;
        }
    public function delete_by_estate(){
        DB::delete('estate_admin','estate=%i',  $this->estate_id);
        return true;
    }

    public function get_array($include_id = false){
        $arr = array();
        if($include_id){
            $arr['id']  = $this->id;
            
        }
        $arr['name'] = $this->name;
       $arr['phone'] = $this->phone;
       $arr['email'] = $this->email;
       $arr['address'] =  $this->address;
       $arr['estate'] = $this->estate_id;
       $arr['password'] = $this->password;
      // $arr['date'] = $this->date;
        
        return $arr;
    }
    
    private function set_result($result){
        $arr = array();
        foreach($result as $row){
            $arr[] = $this->set_row1($row);
        }
        return $arr;
    }
    
    private function set_row($row){
        $this->id = (int)$row['id'];
        $this->name = $row['name'];
        $this->phone = $row['phone'];
        $this->email  = $row['email'];
        $this->address = $row['address'];
        $this->estate_id = (int)$row['estate'];
        $this->password = $row['password'];
        $this->date = $row['date'];
        
        $this->estate= new Estate($this->estate_id);
        return $this;
    }
    private function set_row1($row){
        $ea = new self();
        $ea->id = (int)$row['id'];
        $ea->name = $row['name'];
        $ea->phone = $row['phone'];
        $ea->email  = $row['email'];
        $ea->address = $row['address'];
        $ea->estate_id = (int)$row['estate'];
        $ea->password = $row['password'];
        $ea->date = $row['date'];
        
        $ea->estate= new Estate($ea->estate_id);
        return $ea;
    }
    public function get_id() {
        return $this->id;
    }
    public function get_address() {
        return $this->address;
    }

    public function set_address($address) {
        $this->address = $address;
    }

        public function get_name() {
        return $this->name;
    }

    public function get_phone() {
        return $this->phone;
    }

    public function get_email() {
        return $this->email;
    }

    public function get_estate_id() {
        return $this->estate_id;
    }

    public function get_password() {
        return $this->password;
    }

    public function get_date() {
        return $this->date;
    }

    public function get_estate() {
        return $this->estate;
    }

    public function set_id($id) {
        $this->id = $id;
    }

    public function set_name($name) {
        $this->name = $name;
    }

    public function set_phone($phone) {
        $this->phone = $phone;
    }

    public function set_email($email) {
        $this->email = $email;
    }

    public function set_estate_id($estate_id) {
        $this->estate_id = $estate_id;
        $this->estate = new Estate($this->estate_id);
    }

    public function set_password($password) {
        $this->password = $password;
    }

    public function set_date($date) {
        $this->date = $date;
    }

    public function set_estate($estate) {
        $this->estate = $estate;
    }

  
    
}
?>

