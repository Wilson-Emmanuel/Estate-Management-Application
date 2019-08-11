<?php
if(isset($_POST['estate_payment_details_btn'])){
    $payment_id = (int)trim($_POST['payment_id']);
    $type = (int)trim($_POST['type']);
    
    $start_day = (int)trim($_POST['start_day']);
    $start_month = (int)trim($_POST['start_month']);
    $start_year = (int)trim($_POST['start_year']);
    
    $end_day = (int)trim($_POST['end_day']);
    $end_month = (int)trim($_POST['end_month']);
    $end_year = (int)trim($_POST['end_year']);
    
   $error = "";
   $success = "";
   
   if($type){
if(!$start_day || !$start_month || !$start_year || !$end_day || !$end_month || !$end_year){
    $error .= "\n Invalid start and/or end date";
}
       
       $isLeap = (int)date("L");
        if(($end_month ===2 && !$isLeap && $end_day >28) || ($isLeap && $end_day>29 && $end_month ===2)){
            $error .= "Invalid end day for February";
        }elseif(in_array($end_month, array(4,9,11,6))){
            if($end_day <1 || $end_day >30){
                $error .= "\n Invalid end day for the selected month";
            }
        }elseif(in_array($end_month, array(1,3,5,7,8,10,12))){//there is no need to check these ones
            if($end_day <1 || $end_day >31){
                $error .= "\n Invalid end day for the selected month";
            }
        }
        
        if(($start_month ===2 && !$isLeap && $start_day >28) || ($isLeap && $start_day>29 && $start_month ===2)){
            $error .= "Invalid start day for February";
        }elseif(in_array($start_month, array(4,9,11,6))){
            if($start_day <1 || $start_day >30){
                $error .= "\n Invalid start day for the selected month";
            }
        }elseif(in_array($start_month, array(1,3,5,7,8,10,12))){//there is no need to check these ones
            if($start_day <1 || $start_day >31){
                $error .= "\n Invalid start day for the selected month";
            }
        }
   }
   
   if(strlen($error) <1){
       $payment = new Payment($payment_id);
       if($payment->get_confirmed()){
           $error = "Payment has already been confirmed";
       }else{
          if(!$type){
              //one time
              $payment->set_one_time(1);
              
          }else{
              $payment->set_start($start_year.'-'.$start_month.'-'.$start_day);
              $payment->set_end($end_year.'-'.$end_month.'-'.$end_day);
          }
          $payment->set_confired_date(date("Y-m-d H:i:s"));
          $payment->set_confirmed(1);
          if($payment->update_by_id()){
              $success = "Payment Successfully Updated!";
          }
       }
   }
    
}
?>

