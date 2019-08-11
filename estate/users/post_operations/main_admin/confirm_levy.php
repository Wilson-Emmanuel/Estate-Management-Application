<?php
if(isset($_POST['main_levy_details_btn'])){
    $levy_id = (int)trim($_POST['levy_id']);
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
       $levy = new Levy($levy_id);
       if($levy->get_confirmed()){
           $error = "Levy  has already been confirmed";
       }else{
          if(!$type){
              //one time
              $levy->set_one_time(1);
              
          }else{
              $levy->set_start($start_year.'-'.$start_month.'-'.$start_day);
              $levy->set_end($end_year.'-'.$end_month.'-'.$end_day);
          }
          $levy->set_confirmed_date(date("Y-m-d H:i:s"));
          $levy->set_confirmed(1);
          if($levy->update_by_id()){
              $success = "Levy Successfully Updated!";
          }
       }
   }
    
}
?>

