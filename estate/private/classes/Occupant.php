<?php


class Occupant{
    
    const TYPE = "tenant";


    private $id; //int
    private $building_id; //int
    private $estate_id;
    private $name; //String
    private $phone; //String
    private $email; //String
    private $flats;//No of flats (int)
    private $password; //String
    private $date; //String (datetime)
    
   private $building; //
   private $estate;//
    
    public function __construct($id =0) {
        if($id <1){
            //Create an invalid Occupant
            $this->id = 0;
            $this->building_id = 0;
            $this->estate_id =0;
            $this->name = "none";
            $this->phone = "none";
            $this->email = "none";
            $this->password = "none";
            $this->flats =0;
            $this->date = date("Y-m-d H:i:s");
            
            $this->building = null;
            $this->estate = null;
        }else{
            $this->fetch_occupant_with_id($id);
        }
    }
    public function update_by_email(){
        DB::update('occupant', $this->get_array(FALSE), 'email=%s',  $this->email);
        return true;
    }
    public function update_by_id(){
        DB::update('occupant', $this->get_array(FALSE), 'id=%i',  $this->id);
        return true;
    }
    public function delete_by_id(){
        DB::delete('occupant',"id=%i",  $this->id);
        return true;
    }
    public function delete_by_email(){
        DB::delete('occupant',"email=%s",  $this->email);
        return true;
    }
    public function delete_by_estate(){
        DB::delete('occupant',"estate=%i",  $this->estate_id);
        return true;
    }
    public function insert(){
       
            DB::insert('occupant',  $this->get_array(FALSE));
            return true;
       
    }

    /**
     * This function helps to convert an Occupant object into an array
     * 
     * @param type $include_id if true, the id field will be included in the array
     * @return type
     */
    public function get_array($include_id = FALSE){
        $new_array = array();
     
        if($include_id){
            $new_array['id'] = $this->id;
        }
        $new_array['building'] = $this->building_id;
        $new_array['estate'] = $this->estate_id;
        $new_array['name'] = $this->name;
        $new_array['phone'] = $this->phone;
        $new_array['email'] = $this->email;
        $new_array['flats'] = $this->flats;
        $new_array['password'] = $this->password;
        //$new_array['date'] = $this->date;
        return $new_array;
        
    }

    private function set_result($row){
        $this->id = $row['id'];
        $this->building_id = (int)$row['building'];
        $this->estate_id = (int)$row['estate'];
        $this->name = $row['name'];
        $this->phone = $row['phone'];
        $this->email = $row['email'];
        $this->flats = (int)$row['flats'];
        $this->password = $row['password'];
        $this->date = $row['date'];
        
      $this->building = new Building($this->building_id);
      $this->estate = new Estate($this->estate_id);
       return $this;
    }
    private function set_result1($row){
        $oc = new self();
        $oc->id = $row['id'];
        $oc->building_id = (int)$row['building'];
        $oc->estate_id = (int)$row['estate'];
        $oc->name = $row['name'];
        $oc->phone = $row['phone'];
        $oc->email = $row['email'];
        $oc->flats = (int)$row['flats'];
        $oc->password = $row['password'];
        $oc->date = $row['date'];
        
      $oc->building = new Building($oc->building_id);
      $oc->estate = new Estate($oc->estate_id);
       return $oc;
    }
    /**
     * This methods returns a single Occupant by id
     * 
     * @param type $id
     * @return Occupant
     */
    public function fetch_occupant_with_id($id){
        $result = DB::queryFirstRow("SELECT * FROM occupant WHERE id = %i", $id);
       return $this->set_result($result);
      
       
    }
    /**
     * This method returns a single Occupant by email
     * 
     * @param type $email
     * @return Occupant
     */
    public function fetch_occupant_with_email($email){
        $result = DB::queryFirstRow("SELECT * FROM occupant WHERE email = %s", $email);
      return  $this->set_result($result);
        
       
    }
    public function fetch_occupant_with_estate_id($estate_id){
        $result = DB::query("SELECT * FROM occupant WHERE estate = %i", $estate_id);
      return  $this->set_result_array($result);
        
       
    }
    public function fetch_occupant_with_building_estate_id($estate_id, $building_id){
        $result = DB::query("SELECT * FROM occupant WHERE estate = %i AND building = %i",$estate_id, $building_id);
      return  $this->set_result_array($result);
        
       
    }
    /**
     * This function helps to fetch all the occupant living in a buildilng
     * 
     * @param type $building_id - the id of the building which all its tenants are to be fetched
     * @return type an array of Occupants
     */
    public function fetch_occupant_with_building_id($building_id){
        $result = DB::query("SELECT * FROM occupant WHERE building = %i",$building_id);
      return  $this->set_result_array($result);
        
       
    }

        public function fetch_all_occupant(){
         
        $result  = DB::query("SELECT * FROM occupant");
       return $this->set_result_array($result);
    }
    private function set_result_array($result){
         $occupants = array();
        
        foreach ($result as $row){
            $occupants[] =$this->set_result1($row);
         
        }
        return $occupants;
    }

    public function get_status(){
        // "set living status here (true or false. either currently occupying or packed";
        return FALSE;
    }
    public function get_payment_status(){
        //set payment status here (true or false) either paid or owing based on the last payment period
        return TRUE;
    }
    public function get_last_payment_info(){
        return 'Last payment info here';
    }
    public function get_next_payment_info(){
       
        return 'Next Payment info here';
    }
    public function get_estate_id() {
        return $this->estate_id;
    }
    public function get_building() {
        return $this->building;
    }

    public function get_estate() {
        return $this->estate;
    }

    public function set_building($building) {
        $this->building = $building;
    }

    public function set_estate($estate) {
        $this->estate = $estate;
    }

        public function set_estate_id($estate_id) {
        $this->estate_id = $estate_id;
        $this->estate = new Estate($estate_id);
    }

    
    public function get_flats() {
        return $this->flats;
    }

    public function set_flats($flats) {
        $this->flats = $flats;
    }

            public function get_id() {
        return $this->id;
    }

    public function get_building_id() {
        return $this->building_id;
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

    public function get_password() {
        return $this->password;
    }

   

    public function get_date() {
        return $this->date;
    }

 

    public function set_id($id) {
        $this->id = $id;
    }

    public function set_building_id($building_id) {
        $this->building_id = $building_id;
        $this->building = new Building($this->building_id);
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

    public function set_password($password) {
        $this->password = $password;
    }

   

    public function set_date($date) {
        $this->date = $date;
    }

   


}
?>

