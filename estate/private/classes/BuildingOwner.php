<?php
class BuildingOwner{
    private  $id;
    private $name;
    private $email;
    private $phone;
    private $estate_id;
    private $date;
    
    public function __construct($id =0) {
        
        if($id < 1){
            $this->id = 0;
            $this->name = "none";
            $this->email = "none";
            $this->phone = "none";
            $this->estate_id = 0;
            $this->date = date("Y-m-d H:i:s");
        }else {
            $this->fetch_owner_by_id($id);
        }
    }
    
    public function fetch_owner_by_id($id){
        $row = DB::queryFirstRow("SELECT * FROM building_owner WHERE id=%i",$id);
        return $this->set_row($row);
    }
    
    public function fetch_all_owner(){
        $result = DB::query('SELECT * FROM building_owner');
        return $this->set_result($result);
    }
    public function fetch_all_owners_by_estate_id($estate){
        $result = DB::query('SELECT * FROM building_owner WHERE estate=%i',$estate);
        return $this->set_result($result);
    }


    private function set_row($row){
        $this->id = (int)$row['id'];
        $this->name = $row['name'];
        $this->email = $row['email'];
        $this->phone = $row['phone'];
        $this->estate_id = (int)$row['estate'];
        $this->date = $row['date'];
        
        return $this;
    }
    private function set_row1($row){
        $bo = new self();
        $bo->id = (int)$row['id'];
        $bo->name = $row['name'];
        $bo->email = $row['email'];
        $bo->phone = $row['phone'];
        $bo->estate_id = (int)$row['estate'];
        $bo->date = $row['date'];
        
        return $bo;
    }
    
    public function update_by_id(){
        DB::update('building_owner',  $this->get_array(FALSE),'id=%i',  $this->id);
        return true;
    }
    public function update_by_estate_id(){
        DB::update('building_owner', $this->get_array(),'estate=%i',  $this->estate_id);
        return TRUE;
    }
    public function insert(){
        DB::insert('building_owner',  $this->get_array());
        return TRUE;
    }
    public function delete_by_id(){
        DB::delete('building_owner','id=%i',  $this->id);
        return TRUE;
    }
    public function delete_by_estate(){
        DB::delete('building_owner','estate=%i',  $this->estate_id);
        return TRUE;
    }

    public function get_estate_id() {
        return $this->estate_id;
    }

    public function set_estate_id($estate_id) {
        $this->estate_id = $estate_id;
    }

        
    private function set_result($result){
        $array = array();
        foreach($result as $row){
            $array[] = $this->set_row1($row);
        }
        return $array;
    }
    
    public function get_array($include_id=false){
       $new_array = array();
       if($include_id){
           $new_array['id'] = $this->id;
           
       }
       $new_array['name'] = $this->name;
       $new_array['email'] = $this->email;
       $new_array['phone'] = $this->phone;
       $new_array['estate'] = $this->estate_id;
       //$new_array['date'] = $this->date;
       return $new_array;
    }
    
    public function get_id() {
        return $this->id;
    }

    public function get_name() {
        return $this->name;
    }

    public function get_email() {
        return $this->email;
    }

    public function get_phone() {
        return $this->phone;
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

    public function set_email($email) {
        $this->email = $email;
    }
    

    public function set_phone($phone) {
        $this->phone = $phone;
    }

    public function set_date($date) {
        $this->date = $date;
    }


    
}
?>

