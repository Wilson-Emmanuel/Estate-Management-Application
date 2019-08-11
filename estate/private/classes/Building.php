<?php


class Building{
    
    private $id; //int
    private $name; //String
    private $location; //String
    private $description; //String
    private $owner_id; //int
    private $estate_id; //int
    private $for_sale; //int
    private $sale_amount; //double
    
    private $flat_count;//int
    private $flat_description;//string
    private $flat_rent;//double


    private $date; //datetime
    
    private $owner; //BuildingOwner object
    private $estate; //Estate object
    
    public function __construct($id=0) {
        if($id <1){
            //Create invalid Building
            $this->id = 0;
            $this->name = "none";
            $this->location = "none";
            $this->description = "none";
            $this->owner_id = 0;
            $this->estate_id = 0;
            $this->for_sale = 0;
            $this->sale_amount =0;
            $this->flat_count =0;
            $this->flat_description = "none";
            $this->flat_rent =0;
            $this->date = date("Y-m-d H:i:s");
            
            $this->owner = null;
            $this->estate = null;
        } else{
            $this->fetch_building_with_id($id);
        }
    }
    
    public  function fetch_building_with_id($id){
        $row = DB::queryFirstRow("SELECT * FROM building WHERE id=%i",$id);
        return $this->set_row($row);
    }
    public  function fetch_all_buildings(){
        $result = DB::query("SELECT * FROM building");
        return $this->set_building_array($result);
    }
    
    public function fetch_buildings_by_estate($estate_id){
        $result = DB::query("SELECT * FROM building WHERE estate =%i",$estate_id);
        return $this->set_building_array($result);
    }
    public function fetch_buildings_by_estate_not_on_sale($estate_id){
        $result = DB::query("SELECT * FROM building WHERE estate =%i AND for_sale=0",$estate_id);
        return $this->set_building_array($result);
    }
    public function fetch_building_by_owner($owner_id){
        $result = DB::query("SELECT * FROM building WHERE owner=%i",$owner_id);
        return $this->set_building_array($result);
    }
    
    public function update_by_id(){
        DB::update('building',  $this->get_building_array(FALSE),'id=%i',  $this->get_id());
        return true;
    }
    public function update_by_owner_id(){
        DB::update('building',  $this->get_building_array(FALSE),'owner=%i',  $this->get_owner_id());
        return true;
    }
    public function update_by_estate_id(){
        DB::update('building',  $this->get_building_array(FALSE),'estate=%i',  $this->get_estate_id());
        return true;
    }
    public function delete_by_id(){
        DB::delete('building','id=%i',  $this->get_id());
        return true;
    }
    public function delete_by_owner_id(){
        DB::delete('building', 'owner=%i',  $this->get_owner_id());
        return true;
    }
    public function delete_by_estate_id(){
        DB::delete('building','estate=%i',  $this->get_estate_id());
        return true;
    }
    public function insert(){
     
            DB::insert('building',  $this->get_building_array(FALSE));
            return true;
      
    }
   

    
    private function set_building_array($result){
        $new_array = array();
        foreach($result as $row){
            $new_array[] = $this->set_row1($row);
        }
        return $new_array;
    }

        private function set_row($row){
        $this->id = (int)$row['id'];
        $this->name = $row['name'];
        $this->description = $row['description'];
        $this->location = $row['location'];
        $this->owner_id = (int)$row['owner'];
        $this->estate_id = (int)$row['estate'];
        $this->for_sale = (int)$row['for_sale'];
        $this->sale_amount = (double)$row['sale_amount'];
        $this->flat_count = (int)$row['flat_count'];
        $this->flat_description = $row['flat_description'];
        $this->flat_rent = (double)$row['flat_rent'];
        $this->date = $row['date'];
        
        $this->owner = new BuildingOwner($this->owner_id);
        $this->estate = new Estate($this->estate_id);
        return $this;
    }
      private function set_row1($row){
            $bd = new self();
        $bd->id = (int)$row['id'];
        $bd->name = $row['name'];
        $bd->description = $row['description'];
        $bd->location = $row['location'];
        $bd->owner_id = (int)$row['owner'];
        $bd->estate_id = (int)$row['estate'];
        $bd->for_sale = (int)$row['for_sale'];
        $bd->sale_amount = (double)$row['sale_amount'];
        $bd->flat_count = (int)$row['flat_count'];
        $bd->flat_description = $row['flat_description'];
        $bd->flat_rent = (double)$row['flat_rent'];
        $bd->date = $row['date'];
        
        $bd->owner = new BuildingOwner($bd->owner_id);
        $bd->estate = new Estate($bd->estate_id);
        return $bd;
    }
    
    public function get_building_array($include_id){
        $new_array =array();
        if($include_id){
            $new_array['id'] = $this->id;
        }
        $new_array['name'] = $this->name;
        $new_array['description'] = $this->description;
        $new_array['location'] = $this->location;
        $new_array['owner'] = $this->owner_id;
        $new_array['estate'] = $this->estate_id;
        $new_array['for_sale'] = $this->for_sale;
        $new_array['sale_amount'] = $this->sale_amount;
        $new_array['flat_count'] = $this->flat_count;
        $new_array['flat_description'] = $this->flat_description;
        $new_array['flat_rent'] = $this->flat_rent;
        //$new_array['date'] = $this->date;
        
        return $new_array;
        
    }
    
    public function get_available_flats(){
        //count the flats currently occupied by tenants in this building
        if($this->id >0 && !$this->for_sale){
            $tenants = (new Occupant())->fetch_occupant_with_building_id($this->id);
            $total_occupied_flats = 0;
            foreach($tenants as $tenant){
                $total_occupied_flats += (int)$tenant->get_flats();
            }
            return $this->flat_count - $total_occupied_flats;
        }else{
            return 0;
        }
    }
    
    

    public function get_code(){
        return $this->estate->get_code()."/Bd".$this->id;
    }
    public function get_flat_count() {
        return $this->flat_count;
    }

    public function get_flat_description() {
        return $this->flat_description;
    }

    public function get_flat_rent() {
        return $this->flat_rent;
    }

    public function set_flat_count($flat_count) {
        $this->flat_count = $flat_count;
    }

    public function set_flat_description($flat_description) {
        $this->flat_description = $flat_description;
    }

    public function set_flat_rent($flat_rent) {
        $this->flat_rent = $flat_rent;
    }

        public function get_id() {
        return $this->id;
    }

    public function get_name() {
        return $this->name;
    }

    public function get_location() {
        return $this->location;
    }

    public function get_description() {
        return $this->description;
    }

    public function get_owner_id() {
        return $this->owner_id;
    }

    public function get_estate_id() {
        return $this->estate_id;
    }

    public function get_for_sale() {
        return $this->for_sale;
    }

    public function get_sale_amount() {
        return $this->sale_amount;
    }

    public function get_date() {
        return $this->date;
    }

    public function get_owner() {
        return $this->owner;
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

    public function set_location($location) {
        $this->location = $location;
    }

    public function set_description($description) {
        $this->description = $description;
    }

    public function set_owner_id($owner_id) {
        $this->owner_id = $owner_id;
        $this->owner = new BuildingOwner($owner_id);
    }

    public function set_estate_id($estate_id) {
        $this->estate_id = $estate_id;
        $this->estate = new Estate($estate_id);
    }

    public function set_for_sale($for_sale) {
        $this->for_sale = $for_sale;
    }

    public function set_sale_amount($sale_amount) {
        $this->sale_amount = $sale_amount;
    }

    public function set_date($date) {
        $this->date = $date;
    }

    public function set_owner($owner) {
        $this->owner = $owner;
    }

    public function set_estate($estate) {
        $this->estate = $estate;
    }


}

?>
