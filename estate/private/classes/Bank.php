<?php
class Bank{
    private $id;
    private $name;
    private $number;
    private $bank;
    private $owner; //String
    private $owner_id; //int
    private $date;
    
    
    
    public function __construct($owner="", $owner_id=0) {
        if($owner_id <1){
            $this->id = 0;
            $this->name = "none";
            $this->number = "none";
            $this->bank = "none";
            $this->owner = "none";
            $this->owner_id = 0;
            $this->date = date("Y-m-d H:i:s");
        }else{
            $this->fetch_all_banks($owner, $owner_id);
        }
    }
    
    public function fetch_banks($owner, $owner_id){
        $result = DB::query("SELECT * FROM bank WHERE owner = %s AND owner_id = %i",$owner, $owner_id);
        return $this->set_array($result);
    }
    public function fetch_main_admin_banks(){
        $result = DB::query("SELECT * FROM bank WHERE owner = '".MainAdmin::TYPE."'");
        return $this->set_array($result);
    }
    public function fetch_bank_by_id($id){
        $row= DB::queryFirstRow("SELECT * FROM bank WHERE id = %i",$id);
        return $this->set_row($row);
    }
    public function fetch_all_banks(){
        $result = DB::query("SELECT * FROM bank");
        return $this->set_array($result);
    }
    public function update_by_id(){
        DB::update('bank',  $this->get_array(),"id=%i",  $this->get_id());
        return true;
    }
    public function update_by_owner( $owner, $owner_id){
       
        DB::update('bank',  $this->get_array(),'owner=%s AND owner_id=%i',$owner,$owner_id );
        return true;
    }
    public function insert(){
        DB::insert('bank',  $this->get_array());
        return true;
    }
    public function delete_by_id(){
        DB::delete('bank','id=%i',  $this->id);
        return true;
    }
    public function delete_by_owner($owner, $owner_Id){
        DB::delete('bank','owner=%s AND owner_id=%i',$owner,$owner_Id);
        return true;
    }
    

    private function set_array($result){
        $arr = array();
        foreach ($result as $row){
            $arr[] = $this->set_row1($row);
        }
        return $arr;
    }
    public function get_array($include_id = FALSE){
        $arr = array();
        if($include_id){
            $arr['id'] = $this->get_id();
            
        }
        $arr['name'] = $this->name;
        $arr['number'] = $this->number;
        $arr['bank'] = $this->bank;
        $arr['owner'] = $this->owner;
        $arr['owner_id'] = $this->owner_id;
        //$arr['date'] = $this->date;
        return $arr;
    }

    private function set_row($row){
        $this->id = (int)$row['id'];
        $this->name = $row['name'];
        $this->number = $row['number'];
        $this->bank = $row['bank'];
        $this->owner = $row['owner'];
        $this->owner_id =(int)$row['owner_id'];
        $this->date = $row['date'];
        return $this;
    }
    private function set_row1($row){
        $bk = new self();
       $bk->id = (int)$row['id'];
       $bk->name = $row['name'];
       $bk->number = $row['number'];
       $bk->bank = $row['bank'];
       $bk->owner = $row['owner'];
       $bk->owner_id =(int)$row['owner_id'];
       $bk->date = $row['date'];
        return $bk;
    }
    
    public function get_id() {
        return $this->id;
    }

    public function get_name() {
        return $this->name;
    }

    public function get_number() {
        return $this->number;
    }

    public function get_bank() {
        return $this->bank;
    }

    public function get_owner() {
        return $this->owner;
    }

    public function get_owner_id() {
        return $this->owner_id;
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

    public function set_number($number) {
        $this->number = $number;
    }

    public function set_bank($bank) {
        $this->bank = $bank;
    }

    public function set_owner($owner) {
        $this->owner = $owner;
    }

    public function set_owner_id($owner_id) {
        $this->owner_id = $owner_id;
    }

    public function set_date($date) {
        $this->date = $date;
    }


}


?>
