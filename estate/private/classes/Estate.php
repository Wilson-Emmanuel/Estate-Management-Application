<?php

class Estate{
    
    private  $id; //int
    private $name; //String
    private $address; //String
    private $description; //String
    private $city; //String
    private $state; //String
    private $date; //datetime
    
    public function __construct($id=0) {
        if($id <1){
            //Create invalid estate
            $this->id = 0;
            $this->name = "none";
            $this->address = "none";
            $this->description = "none";
            $this->city = "none";
            $this->state = "none";
            $this->date = date("Y-m-d H:i:s");
        }else{
            $this->fetch_estate_with_id($id);
        }
        
    }
    
    public function fetch_estate_with_id($id){
        $row = DB::queryFirstRow("SELECT * FROM estate WHERE id=%i",$id);
        return $this->set_row($row);
    }
    
    private function set_row($row){
        $this->id = (int)$row['id'];
        $this->name = $row['name'];
        $this->address = $row['address'];
        $this->description = $row['description'];
        $this->city = $row['city'];
        $this->state = $row['state'];
        $this->date = $row['date'];
        
        return $this;
    }
    private function set_row1($row){
        $es = new self();
        $es->id = (int)$row['id'];
        $es->name = $row['name'];
        $es->address = $row['address'];
        $es->description = $row['description'];
        $es->city = $row['city'];
        $es->state = $row['state'];
        $es->date = $row['date'];
        
        return $es;
    }
    private function set_result($result){
        $estates = array();
        
        foreach ($result as $row){
            $estates[] = $this->set_row1($row);
        }
        
        return $estates;
    }
    public function fetch_estates_by_state($state){
        $result = DB::query("SELECT * FROM estate WHERE state = %s",$state);
        return $this->set_result($result);
    }
    public function fetch_estates_by_city($city){
        $result = DB::query("SELECT * FROM estate WHERE city = %s",$city);
        return $this->set_result($result);
    }
    public function get_all_vacancies(){
        $buildings = (new Building())->fetch_buildings_by_estate($this->id);
        $counter =0;
        foreach($buildings as $building){
            $counter += $building->get_available_flats();
        }
        return $counter;
    }

    public function get_all_buildings_for_sale(){
        $row = DB::queryFirstRow("SELECT COUNT(id) AS for_sale FROM building WHERE estate=%i AND for_sale=1",  $this->id);
        return (int)$row['for_sale'];
    }
    public function get_all_buildings(){
        $row = DB::queryFirstRow("SELECT COUNT(id) AS for_sale FROM building WHERE estate=%i",  $this->id);
        return (int)$row['for_sale'];
    }
    public function fetch_all_estates(){
        $result = DB::query("SELECT * FROM estate");
        return $this->set_result($result);
    }
    
    public function get_array($include_id = FALSE){
        $new_array = array();
        if($include_id){
            $new_array['id'] = $this->id;
        }
        $new_array['name'] = $this->name;
        $new_array['address'] = $this->address;
        $new_array['description'] = $this->description;
        $new_array['city'] = $this->city;
        $new_array['state'] = $this->state;
       // $new_array['date'] = $this->date;
        
        return $new_array;
    }
    public function update_by_id(){
        DB::update('estate', $this->get_array(),'id=%i',  $this->id);
        return true;
    }
    public function update_by_city(){
        DB::update('estate',  $this->get_array(),'city=%s',  $this->city);
        return true;
    }
    public function update_by_state(){
        DB::update('estate',  $this->get_array(),'state=%s',$this->state);
        return true;
    }
    public function insert(){
        
            DB::insert('estate',  $this->get_array());
            return true;
        
    }
    public function delete(){
        DB::delete('estate','id=%i',  $this->id);
        return true;
    }
    public function get_code(){
        return "EM".$this->id;
    }


    public function get_id() {
        return $this->id;
    }

    public function get_name() {
        return $this->name;
    }

    public function get_address() {
        return $this->address;
    }

    public function get_description() {
        return $this->description;
    }

    public function get_city() {
        return $this->city;
    }

    public function get_state() {
        return $this->state;
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

    public function set_address($address) {
        $this->address = $address;
    }

    public function set_description($description) {
        $this->description = $description;
    }

    public function set_city($city) {
        $this->city = $city;
    }

    public function set_state($state) {
        $this->state = $state;
    }

    public function set_date($date) {
        $this->date = $date;
    }


}
?>
