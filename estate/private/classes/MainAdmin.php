<?php
class MainAdmin{
    const TYPE = "main";
    
    private $id;
    private $name;
    private $phone;
    private $email;
    private $address;
    private $password;
    private $date;
    
    public function __construct($id=0) {
        if($id <1){
            $this->id =0;
            $this->name = "none";
            $this->phone = "none";
            $this->email = "none";
            $this->address = "none";
            $this->password = "none";
            $this->date = date("Y-m-d H:i:s");
        }else{
            $this->fetch_by_id($id);
        }
    }
    public function fetch_by_id($id){
        $row = DB::queryFirstRow("SELECT * FROM main_admin WHERE id=%i",$id);
        return $this->set_row($row);
    }
    public function fetch_by_email($email){
        $row = DB::queryFirstRow("SELECT * FROM main_admin WHERE email=%s",$email);
        return $this->set_row($row);
    }
    public function fetch_all(){
        $result = DB::query("SELECT * FROM main_admin");
        return $this->set_result($result);
    }
    public function update_by_id(){
        DB::update('main_admin',  $this->get_array(),'id=%i',  $this->id);
        return true;
    }
    public function update_by_email(){
        DB::update('main_admin',  $this->get_array(),'email=%s',  $this->email);
        return true;
    }
    public function delete_by_id(){
        DB::delete('main_admin','id=%i',  $this->id);
        return true;
    }
    public function delete_by_email(){
        DB::delete('main_admin','email=%s',  $this->email);
        return true;
    }
    public function insert(){
        DB::insert('main_admin',  $this->get_array());
        return true;
    }

    private function set_result($result){
        $arr = array();
        foreach ($result as $row){
            $arr[] = $this->set_row1($row);
        }
        return $arr;
    }

    private function set_row($row){
        $this->id = (int)$row['id'];
        $this->name = $row['name'];
        $this->phone = $row['phone'];
        $this->email = $row['email'];
        $this->address = $row['address'];
        $this->password = $row['password'];
        $this->date = $row['date'];
        return $this;
    }
    private function set_row1($row){
        $ma = new self();
       $ma->id = (int)$row['id'];
       $ma->name = $row['name'];
       $ma->phone = $row['phone'];
       $ma->email = $row['email'];
       $ma->address = $row['address'];
       $ma->password = $row['password'];
       $ma->date = $row['date'];
        return $ma;
    }
    public function get_array($include_id = false){
        $arr = array();
        if($include_id){
            $arr['id'] = $this->id;
        }
        $arr['name'] = $this->name;
        $arr['phone'] = $this->phone;
        $arr['email'] = $this->email;
        $arr['address'] = $this->address;
        $arr['password'] = $this->password;
        //$arr['date'] = $this->date;
        return $arr;
    }
    public function get_id() {
        return $this->id;
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

    public function get_address() {
        return $this->address;
    }

    public function get_password() {
        return $this->password;
    }

    public function get_date() {
        return $this->date;
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

    public function set_address($address) {
        $this->address = $address;
    }

    public function set_password($password) {
        $this->password = $password;
    }

    public function set_date($date) {
        $this->date = $date;
    }

 
}
?>

