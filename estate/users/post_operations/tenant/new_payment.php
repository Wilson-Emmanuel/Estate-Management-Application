<?php
if(isset($_POST['tenant_new_payment_btn'])){
    
    $payer = trim($_POST['payer']);
    $purpose = trim($_POST['purpose']);
    $amount = trim($_POST['amount']);
    
    $pay_day =(int) trim($_POST['pay_day']);
    $pay_month =(int) trim($_POST['pay_month']);
    $pay_year =(int) trim($_POST['pay_year']);
    
    $method = trim($_POST['method']);
    $slip_no = trim($_POST['slip_no']);
    $bank = (int)trim($_POST['bank']);
    
    $success = "";
    $error = "";
    if(strlen($purpose) <2){
        $error = "You must include purpose";
    }
    if(strlen($purpose) >50){
        $error .= "Purpose is too long.";
    }
    if(strlen($method) >15){
        $error .= "Method is too long.";
    }
    if(strlen($payer) >50){
        $error .= "Payer name too long.";
    }
    if(strlen($slip_no) >25){
        $error .= "Slip No too long.";
    }
    if(strlen($amount) >20){
        $error .= "\n Amount too long";
    }
    if(strlen($payer) <2){
        $error = "Payer's name cannot be ommitted";
    }
    if(is_numeric($amount)){
        $amount = (double)$amount;
    }else{
        $error .= "\n Amount must be a number";
    }
    if($pay_day ==0 || $pay_month ==0 || $pay_year ==0){
        $error .= "\n Invalid Date of Payment.";
    }
    $date = $pay_year."-".$pay_month."-".$pay_day;
    
    $isLeap = (int)date("L");
    if(($pay_month ===2 && !$isLeap && $pay_day >28) || ($isLeap && $pay_day>29 && $pay_month ===2)){
        $error .= "Invalid day for February";
    }elseif(in_array($pay_month, array(4,9,11,6))){
        if($pay_day <1 || $pay_day >30){
            $error .= "\n Invalid day for the selected month";
        }
    }elseif(in_array($pay_month, array(1,3,5,7,8,10,12))){//there is no need to check these ones
        if($pay_day <1 || $pay_day >31){
            $error .= "\n Invalid day for the selected month";
        }
    }
    
    if(!$bank){
        $error .= "\n You must select the bank used for the transaction.";
        
    }
    if(strlen($method) <2){
        $error .= "\n You must include the method/mode of payment.";
    }
    
    if(strlen(trim($error)) <1){
        $payment = new Payment();
        if(strlen($slip_no) >1){
            $payment->set_slip_no($slip_no);
        }
        $payment->set_payment_date($date);
        $payment->set_recipient_bank_id($bank);
        $payment->set_purpose($purpose);
        $payment->set_amount($amount);
        $payment->set_payer_name($payer);
        $payment->set_method($method);
        $payment->set_occupant_id($_SESSION['id']);
        
        $occupant_estate_id = (new Occupant($_SESSION['id']))->get_estate_id();
        $payment->set_payer_estate($occupant_estate_id);
        if($payment->insert()){
            $success = "Payment successfully submitted.";
        }
    }
    
}
?>
