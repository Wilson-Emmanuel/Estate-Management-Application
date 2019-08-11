<?php
class Levy{
    private $id;
    private $purpose;
    private $amount; //double
    private $start;// date
    private $end; //date
    private $flat_count;//int
    private $building_count;//int
    private $recipient_bank_id;
    private $payment_date;
    private $payer_name;
    private $method;
    private $slip_no;


    private $estate;//id (int)
    private $one_time;///boolean (0 or 1)
    private $confirmed; //int (0 or 1)
    private $date; //datetime
    private $confirmed_date;//datetime
    
    public function __construct($id=0) {
        if($id <1){
            $this->id =0;
            $this->purpose = "none";
            $this->amount =0; //doub
            $this->start=date("Y-m-d");// date
            $this->end = date("Y-m-d"); //date
            $this->payment_date = date("Y-m-d"); //date
            $this->payer_name = "none";
            $this->flat_count =0;//i
            $this->building_count =0;
            $this->one_time =0;
            $this->estate =0;//id (i
            $this->recipient_bank_id = 0;
            $this->slip_no = 0;
            $this->method = "none";
            $this->confirmed =0; //i
            $this->date =date("Y-m-d H:i:s"); //dateti
            $this->confirmed_date =date("Y-m-d H:i:s");
        }else{
            $this->fetch_by_id($id);
        }
    }
    
    private function set_result($result){
        $arr = array();
        foreach($result as $row){
            $arr[] = $this->set_row1($row);
        }
        return $arr;
    }

    private function set_row($row){
         $this->id =(int)$row['id'];
        $this->purpose =$row['purpose'];
        $this->amount =(double)$row['amount']; //doub
        $this->start=$row['start'];// date
        $this->end = $row['end']; //date
        $this->flat_count =(int)$row['flat_count'];//i
        $this->building_count =(int)$row['building_count'];
        $this->estate =(int)$row['estate'];//id (i
        $this->one_time = (int)$row['one_time'];
        $this->payer_name = $row['payer_name'];
        $this->payment_date = $row['payment_date'];
        $this->recipient_bank_id = (int)$row['recipient_bank_id'];
        $this->confirmed =(int)$row['confirmed']; //i
        $this->slip_no = (int)$row['slip_no'];
        $this->method = $row['method'];
        $this->date = $row['date']; //dateti
        $this->confirmed_date = $row['confirmed_date'];
        return $this;
    }
    private function set_row1($row){
        $lv = new self();
         $lv->id =(int)$row['id'];
       $lv->purpose =$row['purpose'];
       $lv->amount =(double)$row['amount']; //doub
       $lv->start=$row['start'];// date
       $lv->end = $row['end']; //date
       $lv->flat_count =(int)$row['flat_count'];//i
       $lv->building_count =(int)$row['building_count'];
       $lv->one_time = (int)$row['one_time'];
       $lv->estate =(int)$row['estate'];//id (i
       $lv->payer_name = $row['payer_name'];
       $lv->method = $row['method'];
       $lv->slip_no = (int)$row['slip_no'];
       $lv->recipient_bank_id = (int)$row['recipient_bank_id'];
        $lv->payment_date = $row['payment_date'];
        
        $lv->confirmed =(int)$row['confirmed']; //i
        $lv->date = $row['date']; //dateti
        $lv->confirmed_date = $row['confirmed_date'];
        return $lv;
    }
    public function get_array($include_id=false){
        $arr = array();
        if($include_id){
            $arr['id'] = $this->id;
        }
        $arr['purpose'] = $this->purpose;
        $arr['amount']  = $this->amount;
        $arr['start'] = $this->start;
        $arr['end'] = $this->end;
        $arr['flat_count'] = $this->flat_count;
        $arr['building_count'] = $this->building_count;
        $arr['estate']= $this->estate;
        $arr['one_time'] = $this->one_time;
        $arr['confirmed'] = $this->confirmed;
        $arr['payer_name'] = $this->payer_name;
        $arr['slip_no'] = $this->slip_no;
        $arr['method'] = $this->method;
        $arr['payment_date'] = $this->payment_date;
        $arr['recipient_bank_id'] = $this->recipient_bank_id;
        //$arr['date']= $this->date;
        $arr['confirmed_date'] = $this->confirmed_date;
        return $arr;
    }
    
    
    public function get_one_time() {
        return $this->one_time;
    }
    public function get_payment_date() {
        return $this->payment_date;
    }

    public function get_payer_name() {
        return $this->payer_name;
    }
    public function get_slip_no() {
        return $this->slip_no;
    }
    public function get_method() {
        return $this->method;
    }

    public function set_method($method) {
        $this->method = $method;
    }

        
    public function get_recipient_bank_id() {
        return $this->recipient_bank_id;
    }

    public function set_recipient_bank_id($recipient_bank_id) {
        $this->recipient_bank_id = $recipient_bank_id;
    }

        public function set_slip_no($slip_no) {
        $this->slip_no = $slip_no;
    }

        public function set_payment_date($payment_date) {
        $this->payment_date = $payment_date;
    }

    public function set_payer_name($payer_name) {
        $this->payer_name = $payer_name;
    }

        public function set_one_time($one_time) {
        $this->one_time = $one_time;
    }
 public function get_unconfirmed_count(){
           $row = DB::queryFirstRow("SELECT COUNT(confirmed) AS unconfirmed FROM levy WHERE confirmed =0");
           $unconfirmed = 0;
           if(!empty($row)){
               $unconfirmed = (int)$row['unconfirmed'];
           }
           return $unconfirmed;
    }
        public function fetch_by_id($id){
        $row = DB::queryFirstRow("SELECT * FROM levy WHERE id=%i",$id);
        return $this->set_row($row);
    }
    public function fetch_by_estate($estate_id){
        $result =DB::query("SELECT * FROM levy WHERE estate= %i",$estate_id);
        return $this->set_result($result);
    }
    public function fetch_all(){
        $result =DB::query("SELECT * FROM levy");
        return $this->set_result($result);
    }
    public function update_by_id(){
        DB::update('levy',  $this->get_array(),'id=%i',  $this->id);
        return true;
    }
    public function update_by_estate(){
        DB::update('levy',  $this->get_array(),'estate',$this->estate);
        return true;
    }
    public function insert(){
        DB::insert('levy',  $this->get_array());
        return true;
    }
    public function delete_by_id(){
        DB::delete('levy','id=%i',  $this->id);
        return true;
    }
    public function delete_by_estate(){
        DB::delete('levy','estate=%i',  $this->estate);
        return true;
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

    public function get_flat_count() {
        return $this->flat_count;
    }

    public function get_building_count() {
        return $this->building_count;
    }

    public function get_estate() {
        return $this->estate;
    }

    public function get_confirmed() {
        return $this->confirmed;
    }

    public function get_date() {
        return $this->date;
    }

    public function get_confirmed_date() {
        return $this->confirmed_date;
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

    public function set_flat_count($flat_count) {
        $this->flat_count = $flat_count;
    }

    public function set_building_count($building_count) {
        $this->building_count = $building_count;
    }

    public function set_estate($estate) {
        $this->estate = $estate;
    }

    public function set_confirmed($confirmed) {
        $this->confirmed = $confirmed;
    }

    public function set_date($date) {
        $this->date = $date;
    }

    public function set_confirmed_date($confirmed_date) {
        $this->confirmed_date = $confirmed_date;
    }


}
?>

