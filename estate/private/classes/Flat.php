<?php
class Flat{
    
    private $id; //int
    private $description; //String
    private $building_id; //int
    private $vacant; //boolean (0 or 1)
    private $amount; //double
    private $date; //datetime
    
    private $building;
    
    public function __construct($id=0) {
      if($id <1){
          $this->id = 0;
          $this->description = "none";
          $this->building_id = 0;
          $this->vacant = 0;
          $this->amount = 0;
          $this->date = date("Y-m-d H:i:s");
          
          $this->building = null;
      }else {
          $this->fetch_flat_with_id($id);
      }
      
    }
    
    public function fetch_flat_with_id($id){
        $row = DB::queryFirstRow("SELECT * FROM flat WHERE id=%i",$id);
        return $this->set_row($row);
    }
    
    public function fetch_all_flats(){
        $result = DB::query("SELECT * FROM flat");
        return $this->set_result($result);
    }
    public function fetch_flats_by_building($building_id){
        $result = DB::query("SELECT * FROM flat WHERE building =%i",$building_id);
        return $this->set_result($result);
    }
    
    

    

    private function set_result($result){
        $flats = array();
        foreach($result as $row){
            $flats[] = $this->set_row1($row);
        }
        return $flats;
    }
    
    public function set_row($row){
        $this->id = (int)$row['id'];
        $this->description = $row['description'];
        $this->vacant = (int)$row['vacant'];
        $this->building_id = (int)$row['building'];
        $this->amount = (double)$row['amount'];
        $this->date = $row['date'];
        
        $this->building = new Building($this->get_building_id());
        return $this;
    }
    public function set_row1($row){
        $ft = new self();
        $ft->id = (int)$row['id'];
        $ft->description = $row['description'];
        $ft->vacant = (int)$row['vacant'];
        $ft->building_id = (int)$row['building'];
        $ft->amount = (double)$row['amount'];
        $ft->date = $row['date'];
        
        $ft->building = new Building($ft->id);
        return $ft;
    }
    public function update_by_id(){
        DB::update('flat',$this->get_array(false,'id=%i',  $this->get_id()));
        return true;
    }
    public function update_by_building_id(){
        DB::update('flat',  $this->get_array(false),'building=%i',  $this->get_building_id());
        return true;
    }
    public function insert(){
        DB::insert('flat',  $this->get_array(false));
        return true;
    }
    public function delete_by_id(){
        DB::delete('flat','id=%i',  $this->get_id());
        return true;
    }
    public function delete_by_building(){
        DB::delete('flat','building=%i',  $this->get_building_id());
        return true;
    }

    public function get_array($include_id=FALSE){
        $array = array();
        if($include_id){
            $array['id'] = $this->get_id();
            
        }
        $array['description'] = $this->description;
        $array['vacant'] = $this->vacant;
        $array['building'] = $this->building_id;
        $array['amount'] = $this->amount;
        //$array['date'] = $this->get_date();
        return $array;
    }

        public function get_id() {
        return $this->id;
    }
    public function get_code(){
        return $this->building->get_code()."/Ft".$this->id;
    }

    public function get_description() {
        return $this->description;
    }

    public function get_building_id() {
        return $this->building_id;
    }

    public function get_vacant() {
        return $this->vacant;
    }

    public function get_amount() {
        return $this->amount;
    }

    public function get_date() {
        return $this->date;
    }

    public function get_building() {
        return $this->building;
    }

    public function set_id($id) {
        $this->id = $id;
    }

    public function set_description($description) {
        $this->description = $description;
    }

    public function set_building_id($building_id) {
        $this->building_id = $building_id;
        $this->set_building($building_id);
    }

    public function set_vacant($vacant) {
        $this->vacant = $vacant;
    }

    public function set_amount($amount) {
        $this->amount = $amount;
    }

    public function set_date($date) {
        $this->date = $date;
    }

    public function set_building($building) {
        $this->building = $building;
    }


}

?>
