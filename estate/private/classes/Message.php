<?php
class Message{
    private $id; //int
    private $name;
    private $address;
    private $subject;
    private $estate; //int
    private $building;//int
    private $sender;// user, tenant, estate_admin or main_admin
    private $body;//string
    private $sender_id;
    private $receiver;//string
    private $receiver_id;//int
    private $email;
    private $seen;//int (0 or 1)
    private $date; //datetime
    
    public function __construct($id=0) {
       if(!($id >0)){
            $this->id =0;
        $this->name ="none";
        $this->address = "none";
        $this->subject = "none";
        $this->estate =0;
        $this->building =0;
        $this->sender = "none";
        $this->body = "none";
        $this->sender_id=0;
        $this->receiver = "none";
        $this->receiver_id = 0;
        $this->email ="none";
        $this->seen=0;
        $this->date = date("Y-m-d H:i:s");
       }else{
           $this->fetch_by_id($id);
       }
    }
    
    private function set_row($row){
        $this->id = (int)$row['id'];
        $this->name = $row['name'];
        $this->address = $row['address'];
        $this->subject = $row['subject'];
        $this->estate = (int)$row['estate'];
        $this->building = (int)$row['building'];
        $this->sender = $row['sender'];
        $this->receiver = $row['receiver'];
        $this->receiver_id = (int)$row['receiver_id'];
        $this->body = $row['body'];
        $this->sender_id = (int)$row['sender_id'];
        $this->email = $row['email'];
        $this->seen= (int)$row['seen'];
        $this->date = $row['date'];
        return $this;
    }
    public function get_receiver() {
        return $this->receiver;
    }

    public function get_receiver_id() {
        return $this->receiver_id;
    }

    public function set_receiver($receiver) {
        $this->receiver = $receiver;
    }

    public function set_receiver_id($receiver_id) {
        $this->receiver_id = $receiver_id;
    }

        private function set_row1($row){
        $msg = new self();
        $msg->id = (int)$row['id'];
        $msg->name = $row['name'];
        $msg->address = $row['address'];
        $msg->subject = $row['subject'];
        $msg->estate = (int)$row['estate'];
        $msg->building = (int)$row['building'];
        $msg->sender = $row['sender'];
        $msg->receiver = $row['receiver'];
        $msg->receiver_id = (int)$row['receiver_id'];
        $msg->body = $row['body'];
        $msg->sender_id =(int) $row['sender_id'];
        $msg->email = $row['email'];
        $msg->seen= (int)$row['seen'];
        $msg->date = $row['date'];
        return $msg;
    }
    public function get_array($include_id = FALSE){
        $arr = array();
        if($include_id){
            $arr['id'] = $this->id;
        }
        $arr['name'] = $this->name;
        $arr['address'] = $this->address;
        $arr['subject'] = $this->subject;
        $arr['estate'] = $this->estate;
        $arr['building'] = $this->building;
        $arr['sender']= $this->sender;
        $arr['body'] = $this->body;
        $arr['sender_id']= $this->sender_id;
        $arr['receiver'] = $this->receiver;
        $arr['receiver_id'] = $this->receiver_id;
        $arr['email'] = $this->email;
        $arr['seen'] = $this->seen;
        //$arr['date'] = $this->date;
        return $arr;
    }

    private function set_result($result){
        $arr = array();
        foreach($result as $row){
            $arr[] = $this->set_row1($row);
        }
        return $arr;
    }
    public function fetch_by_id($id){
        $row = DB::queryFirstRow('SELECT * FROM message WHERE id=%i',$id);
        return $this->set_row($row);
    }
    public function fetch_by_sender_id($sender ,$sender_id){
        $result = DB::query("SELECT * FROM message WHERE sender =%s AND sender_id = %i",$sender,$sender_id);
        return $this->set_result($result);
    }
    public function fetch_by_receiver($receiver, $receiver_id){
        $result = DB::query("SELECT * FROM message WHERE receiver =%s AND receiver_id = %i",$receiver, $receiver_id);
        return $this->set_result($result);
    }
    public function fetch_by_estate($estate_id){
        $result = DB::query("SELECT * FROM message WHERE estate = %i",$estate_id);
        return $this->set_result($result);
    }
    public function fetch_by_building($building_id){
        $result = DB::query("SELECT * FROM message WHERE building = %i",$building_id);
        return $this->set_result($result);
    }
    
    
    
    public function fetch_by_email($email){
        $result = DB::query("SELECT * FROM message WHERE email=%s",$email);
        return $this->set_result($result);
    }
    ///////////////////////////////
    //fetching messages for different kind of users
    public function  fetch_messages($receiver, $receiver_id){
        $result = DB::query("SELECT * FROM message WHERE receiver = %s AND receiver_id =%i ORDER BY date DESC",  $receiver,$receiver_id);
        return $this->set_result($result);
    }
    public function  fetch_messages_main(){
        $result = DB::query("SELECT * FROM message WHERE receiver = 'main'  ORDER BY date DESC");
        return $this->set_result($result);
    }
    public function  fetch_messages_sent($sender,$sender_id){
        $result = DB::query("SELECT * FROM message WHERE sender = %s AND sender_id =%i ORDER BY date DESC",  $sender, $sender_id);
        return $this->set_result($result);
    }
   
    public function get_recipient_info(){
        $text = "none";
        if($this->receiver){
            switch (trim($this->receiver)){
                case Occupant::TYPE:
                    $oc = new Occupant($this->receiver_id);
                    $text = '<b>'.$this->get_sender_text($this->receiver).'</b> (Name : '.$oc->get_name().', Estate : '.$oc->get_estate()->get_name().', Building : '.$oc->get_building()->get_name().', Address : '.$oc->get_estate()->get_address().')';
                    break;
                case MainAdmin::TYPE:
                    $text = '<b>'.$this->get_sender_text($this->receiver).'</b>';
                    break;
                case EstateAdmin::TYPE:
                    $admin = new EstateAdmin($this->receiver_id);
                    $text ='<b>'. $this->get_sender_text($this->receiver).'</b> (Estate : '.$admin->get_estate()->get_name().', Address : '.$admin->get_estate()->get_address().')';
            
                default :
                    $text = "Unknown";
            }
        }
        return $text;
    }
    public function get_sender_info(){
        $text = "none";
        if($this->sender){
            switch (trim($this->sender)){
                case Occupant::TYPE:
                    $oc = new Occupant($this->sender_id);
                    $text = '<b>'.$this->get_sender_text($this->sender).'</b> (Name : '.$oc->get_name().', Estate : '.$oc->get_estate()->get_name().', Building : '.$oc->get_building()->get_name().', Address : '.$oc->get_estate()->get_address().')';
                    break;
                case MainAdmin::TYPE:
                    $text = '<b>'.$this->get_sender_text($this->sender).'</b>';
                    break;
                case EstateAdmin::TYPE:
                    $admin = new EstateAdmin($this->sender_id);
                    $text ='<b>'. $this->get_sender_text($this->sender_id).'</b> (Estate : '.$admin->get_estate()->get_name().', Address : '.$admin->get_estate()->get_address().')';
            
                default :
                    $text = "Unknown";
            }
        }
        return $text;
    }

    



    public function get_sender_text($sender){
        switch ($sender){
            case Occupant::TYPE:
                return "Tenant";
            case EstateAdmin::TYPE:
                return "Estate Admin";
            case MainAdmin::TYPE:
                return "Main Admin";
            default :
                return "Unknown User";
        }
    }
    
    public function get_date_text($date){
       
        $date_int = strtotime($date);
        
        $Year = date("Y",$date_int);
        
        $month_num =(int) date("n",$date_int);
       $month_text = date("M",$date_int);
        
        $day = (int)date("j",$date_int);
        
        
        
        //$day_in_week = (int)date("w",$date_int);
        $week_day = date("D",$date_int);
        $week_in_year = (int)date("W",$date_int);
        
         $today_from_yesterday_int = strtotime("+1 day",$date_int);
         $today_from_yesterday = (int)date("j",$today_from_yesterday_int);
         
         $today = (int)date("j");
        
        $text ="";
        
        //if this year
        if(date("Y") ===$Year){
           
                
               
                //check if today
                if($day == (int)date("j")){
                    
                    $text = "Today  ".date("h:iA",$date_int);
                    
                }elseif($today == $today_from_yesterday){//yesterday
                    $text = "Yesterday  ".date("h:iA",$date_int);
                    
                }elseif($week_in_year == (int)date("W")){//same week
                    $text = $week_day;
                }else{
                    $text = $day." ".$month_text;
                }
            
        }else{
             $text = $day." ".$month_text." ".$Year;
        }
        return $text;
       }
       public function get_time_text($date){
           
           $date_int = strtotime($date);
           $day =(int) date("j",$date_int);
           $today = (int)date("j");
           $time ="";
           
           $today_from_yesterday_int = strtotime("+1 day",$date_int);
           $today_from_yesterday = date("j",$today_from_yesterday_int);
           if(($day != $today)  && ($today != $today_from_yesterday) ){
         
               $time = date("h:iA",$date_int);
           }
           return $time;
       }
       
       public function get_unread_messages($user, $id){
           $row = DB::queryFirstRow("SELECT COUNT(receiver) AS receiver_count FROM message WHERE receiver =%s AND receiver_id=%i AND seen=0",$user,$id);
           $unread = 0;
           if(!empty($row)){
               $unread = (int)$row['receiver_count'];
           }
           return $unread;
           
       }
       public function get_unread_messages_main(){
           $row = DB::queryFirstRow("SELECT COUNT(receiver) AS receiver_count FROM message WHERE receiver = 'main' AND seen=0");
           $unread = 0;
           if(!empty($row)){
               $unread = (int)$row['receiver_count'];
           }
           return $unread;
           
       }

    public function insert(){
        DB::insert('message',  $this->get_array());
        return true;
    }
    public function delete_by_id(){
        DB::delete('message','id=%i',  $this->id);
        return true;
    }
    public function delete_by_email(){
        DB::delete('message','email=%s',  $this->email);
        return true;
    }
  
    public function delete_by_building(){
        DB::delete('message','building=%i',  $this->building);
        return true;
        
    }
    public function delete_by_estate(){
        DB::delete('message','estate=%i',  $this->estate);
        return true;
    }
    public function update_by_email(){
        DB::update('message',  $this->get_array(),'email=%s',  $this->email);
        return true;
    }
    public function update_by_id(){
        DB::update('message',  $this->get_array(),'id=%i',  $this->id);
        return true;
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

    public function get_subject() {
        return $this->subject;
    }

    public function get_estate() {
        return $this->estate;
    }

    public function get_building() {
        return $this->building;
    }

    public function get_sender() {
        return $this->sender;
    }

    public function get_body() {
        return $this->body;
    }

    public function get_sender_id() {
        return $this->sender_id;
    }

    public function get_email() {
        return $this->email;
    }

    public function get_seen() {
        return $this->seen;
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

    public function set_subject($subject) {
        $this->subject = $subject;
    }

    public function set_estate($estate) {
        $this->estate = $estate;
    }

    public function set_building($building) {
        $this->building = $building;
    }

    public function set_sender($sender) {
        $this->sender = $sender;
    }

    public function set_body($body) {
        $this->body = $body;
    }

    public function set_sender_id($sender_id) {
        $this->sender_id = $sender_id;
    }

    public function set_email($email) {
        $this->email = $email;
    }

    public function set_seen($seen) {
        $this->seen = $seen;
    }

    public function set_date($date) {
        $this->date = $date;
    }


}
?>

