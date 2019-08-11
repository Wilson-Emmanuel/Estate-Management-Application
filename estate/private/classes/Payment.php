<?php

class Payment{
    
    private $id; //int
    private $purpose; //String
    private $amount; //double
    private $start; //String (date)
    private $end; //String (date) 
    private $method; //String
    private $slip_no;//String
    private $date; //String (datetime)
    private $one_time;//boolean (0 or 1)
    private $confirmed; //boolean (int 1 or 0)
    private $occupant_id; //int 
    private $confirmed_date; //String (datetime)
    private $payer_name;
    private $payment_date;
    private $payer_estate;


    private $recipient_bank_id;


    private $occupant;//(Occupant(occupant_id) class
    
    public function __construct($id=0) {
        if($id < 1){
            //initialize to an invllaid payment
            $this->id = 0;
            $this->purpose = "none";
            $this->amount = 0;
            $this->start = date("Y-m-d");
            $this->end = date("Y-m-d");
            $this->method = "none";
            $this->one_time = 0;
            $this->date =date("Y-m-d H:i:s");
            $this->confirmed = 0;
            $this->occupant_id = 0;
            $this->slip_no = "none";
            $this->recipient_bank_id =0;
            $this->payer_estate = 0;
            $this->payer_name = "none";
            $this->payment_date = date("Y-m-d");
            $this->confirmed_date = date("Y-m-d H:i:s");
            
            $this->occupant = null;
            
        } else{
            $this->fetch_payment_with_id($id);
        }
    }
    /**
     * Fetch a single payment with an id
     * 
     * @param type $id
     * @return \Payment
     */
    public function fetch_payment_with_id($id){
        $row = DB::queryFirstRow("SELECT * FROM payment WHERE id = %i", $id);
        $this->set_a_payment($row);
        return $this;
    }
    public function fetch_payment($estate, $id){
        $row = DB::queryFirstRow("SELECT * FROM payment WHERE payer_estate = %i AND id = %i",$estate, $id);
       return $this->set_a_payment($row);
        
    }
    
    
    
    public function fetch_all_occupant_payment($occupant_id){
        $result = DB::query("SELECT * FROM payment WHERE occupant = %i", $occupant_id);
       return $this->set_payment_array($result);
        
    }
    public function fetch_all_payment(){
        $result = DB::query("SELECT * FROM payment");
        return $this->set_payment_array($result);
    }
    public function fetch_all_payment_estate($estate_id){
        $result = DB::query("SELECT * FROM payment WHERE payer_estate = %i",$estate_id);
        return $this->set_payment_array($result);
    }
    public function get_estate_unconfirmed($estate_id){
           $row = DB::queryFirstRow("SELECT COUNT(confirmed) AS unconfirmed FROM payment WHERE confirmed =0 AND payer_estate=%i",$estate_id);
           $unconfirmed = 0;
           if(!empty($row)){
               $unconfirmed = (int)$row['unconfirmed'];
           }
           return $unconfirmed;
    }

        private function set_payment_array($result){
        $payments = array();
        foreach ($result as $row){
            $payments[] = $this->set_a_payment1($row);
        }
        return $payments;
    }
    
    public function update_by_id(){
        DB::update('payment', $this->get_array(FALSE), 'id=%i',  $this->get_id());
        return true;
    }
    
    public function update_by_occupant_id(){
        DB::update('payment',  $this->get_array(FALSE),'id=%i', $this->get_id());
        return true;
    }
    /**
     * Delete the row representing this object in the payment database using the id in the where clause
     */
    public function delete_by_id(){
        DB::delete('payment','id=%i',$this->get_id());
        return TRUE;
    }
    /**
     * Delete the row representing this object in the database using the occupant id in the where clause
     */
    public function delete_by_occupant_id(){
        DB::delete('payment',"occupant =%i", $this->occupant_id);
        return TRUE;
    }
    /**
     * Insert this object data as a row in the payment database table
     */
    public function insert(){
       
            DB::insert('payment',  $this->get_array(FALSE));
           return true;
    }

    /**
     * To convert a payment object into an array
     * 
     * @param type $include_id if true, the id field will be included
     * return an array of payment object
     */
    private function get_array($include_id = FALSE){
        $new_array = array();
       if($include_id){
            $new_array['id'] = $this->id;
       }
        $new_array['purpose'] = $this->purpose;
        $new_array['amount'] = $this->amount;
        $new_array['start'] = $this->start;
        $new_array['end'] = $this->end;
        $new_array['method'] = $this->method;
        //$new_array['date'] = $this->date;
        $new_array['confirmed'] = $this->confirmed;
        $new_array['one_time'] = $this->one_time;
        $new_array['occupant'] = $this->occupant_id;
        $new_array['slip_no'] = $this->slip_no;
        $new_array['payer_name'] = $this->payer_name;
        $new_array['recipient_bank_id'] = $this->recipient_bank_id;
        $new_array['payment_date'] = $this->payment_date;
        $new_array['payer_estate'] = $this->payer_estate;
        $new_array['confirmed_date'] = $this->confirmed_date;
        
        return $new_array;
    }
    public function get_slip_no() {
        return $this->slip_no;
    }

    public function set_slip_no($slip_no) {
        $this->slip_no = $slip_no;
    }

    private function set_a_payment($row){
        if(empty($row)){
            return new self();
        }
        $this->id = (int)$row['id'];
        $this->purpose = $row['purpose'];
        $this->amount = (double)$row['amount'];
        $this->start = $row['start'];
        $this->end = $row['end'];
        $this->method = $row['method'];
        $this->date = $row['date'];
        $this->one_time = (int)$row['one_time'];
        $this->confirmed =(int)$row['confirmed'];
        $this->occupant_id = (int)$row['occupant'];
        $this->slip_no = $row['slip_no'];
        $this->payer_name = $row['payer_name'];
        $this->recipient_bank_id = (int)$row['recipient_bank_id'];
        $this->payment_date = $row['payment_date'];
        $this->payer_estate = (int)$row['payer_estate'];
        $this->confirmed_date = $row['confirmed_date'];
        
        $this->occupant = new Occupant($this->occupant_id);
        
        return $this;
    }
    public function get_recipient_bank_id() {
        return $this->recipient_bank_id;
    }
    public function get_payer_name() {
        return $this->payer_name;
    }

    public function set_payer_name($payer_name) {
        $this->payer_name = $payer_name;
    }

        public function set_recipient_bank_id($recipient_bank_id) {
        $this->recipient_bank_id = $recipient_bank_id;
    }

            private function set_a_payment1($row){
            $py = new self();
        $py->id = (int)$row['id'];
        $py->purpose = $row['purpose'];
        $py->amount = (double)$row['amount'];
        $py->start = $row['start'];
        $py->end = $row['end'];
        $py->method = $row['method'];
        $py->one_time = (int)$row['one_time'];
        $py->date = $row['date'];
        $py->confirmed =(int)$row['confirmed'];
        $py->occupant_id = (int)$row['occupant'];
        $py->slip_no = $row['slip_no'];
        $py->payer_name = $row['payer_name'];
        $py->payment_date = $row['payment_date'];
        $py->payer_estate = (int)$row['payer_estate'];
        $py->recipient_bank_id = (int)$row['recipient_bank_id'];
        $py->confirmed_date = $row['confirmed_date'];
        
        $py->occupant = new Occupant($py->occupant_id);
        
        return $py;
    }
    public function get_payment_date() {
        return $this->payment_date;
    }

    public function set_payment_date($payment_date) {
        $this->payment_date = $payment_date;
    }
    public function get_payer_estate() {
        return $this->payer_estate;
    }

    public function set_payer_estate($payer_estate) {
        $this->payer_estate = $payer_estate;
    }

            public function get_one_time() {
        return $this->one_time;
    }

  

    public function set_one_time($one_time) {
        $this->one_time = $one_time;
    }

    public function set_confirmed_date($confirmed_date) {
        $this->confirmed_date = $confirmed_date;
    }

        public function get_id() {
        return $this->id;
    }

    public function get_purpose() {
        return $this->purpose;
    }

    public function get_amount() {
        return $this->amount;
    }

    public function get_start() {
        return $this->start;
    }

    public function get_end() {
        return $this->end;
    }

    public function get_method() {
        return $this->method;
    }

    public function get_date() {
        return $this->date;
    }

    public function get_confirmed() {
        return $this->confirmed;
    }

    public function get_occupant_id() {
        return $this->occupant_id;
       
    }

    public function get_confirmed_date() {
        return $this->confirmed_date;
    }

    public function get_occupant() {
        return $this->occupant;
    }

    public function set_id($id) {
        $this->id = $id;
    }

    public function set_purpose($purpose) {
        $this->purpose = $purpose;
    }

    public function set_amount($amount) {
        $this->amount = $amount;
    }

    public function set_start($start) {
        $this->start = $start;
    }

    public function set_end($end) {
        $this->end = $end;
    }

    public function set_method($method) {
        $this->method = $method;
    }

    public function set_date($date) {
        $this->date = $date;
    }

    public function set_confirmed($confirmed) {
        $this->confirmed = $confirmed;
    }

    public function set_occupant_id($occupant_id) {
        $this->occupant_id = $occupant_id;
         $this->occupant = new Occupant($occupant_id);
    }

    public function set_confired_date($confired_date) {
        $this->confired_date = $confired_date;
    }

    public function set_occupant($occupant) {
        $this->occupant = $occupant;
    }


    
}
?>

