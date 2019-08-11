$(function(){
   
  
   
   /////////////////////////////////////////////////////////////////////
   //Updating the main admin estate using ajax 
    $("#main_admin_estate_edit_btn").click(function(){
        
        var id = $("#main_admin_estate_edit_id").val();
        var name = $("#main_admin_estate_edit_name").val();
        var desc =$("#main_admin_estate_edit_description").val();
        
        $.post("snippets/ajax/ajax_main_admin.php",{action:"main_admin_estate_edit",id:id,name:name,desc:desc},function(data, status){
            $("#main_admin_estate_edit_message").html(data);
        });
    });
    
   //Deleting the main admin estate using ajax 
    $("#main_admin_estate_delete_btn").click(function(){
       
       var id = $("#main_admin_estate_delete_id").val();
        
        $.post("snippets/ajax/ajax_main_admin.php",{action:"main_admin_estate_delete",id:id},function(data, status){
            $("#main_admin_estate_delete_message").html(data);
        });
    });
   /////////////////////////////////////////////////////////////////////
   //Updating the main admin estate admins using ajax 
    $("#main_admin_estate_admin_edit_btn").click(function(){
        
        var id =$("#main_admin_estate_admin_edit_id").val();
        var name =$("#main_admin_estate_admin_edit_name").val();
        var phone =$("#main_admin_estate_admin_edit_phone").val();
       var email = $("#main_admin_estate_admin_edit_email").val();
        var address =$("#main_admin_estate_admin_edit_address").val();
        
        var password =$("#main_admin_estate_admin_edit_password").val();
        
        var estate = $("#main_admin_estate_admin_edit_estate_new_estate").val();
        
        $.post("snippets/ajax/ajax_main_admin.php",{action:"main_admin_estate_admin_edit",id:id,name:name,phone:phone,email:email,address:address,estate:estate,password:password},function(data, status){
            $("#main_admin_estate_admin_edit_message").html(data);
        });
    });
    
   //Deleting the main admin estate admins using ajax 
    $("#main_admin_estate_admin_delete_btn").click(function(){
       
       var id = $("#main_admin_estate_admin_delete_id").val();
        
        $.post("snippets/ajax/ajax_main_admin.php",{action:"main_admin_estate_admin_delete",id:id},function(data, status){
            $("#main_admin_estate_admin_delete_message").html(data);
        });
    });
    
    //////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////
   //Updating the main admin bank using ajax 
    $("#main_admin_bank_edit_btn").click(function(){
        
        var id = $("#main_admin_bank_edit_id").val();
        var name = $("#main_admin_bank_edit_name").val();
        var number =$("#main_admin_bank_edit_number").val();
        var bank =$("#main_admin_bank_edit_bank").val();
        
        $.post("snippets/ajax/ajax_main_admin.php",{action:"main_admin_bank_edit",id:id,name:name,number:number,bank:bank},function(data, status){
            $("#main_admin_bank_edit_message").html(data);
        });
    });
    
   //Deleting the main admin bank using ajax 
    $("#main_admin_bank_delete_btn").click(function(){
       
       var id = $("#main_admin_bank_delete_id").val();
        
        $.post("snippets/ajax/ajax_main_admin.php",{action:"main_admin_bank_delete",id:id},function(data, status){
            $("#main_admin_bank_delete_message").html(data);
        });
    });
});
//////////////////////////////////////////////////////////////////////////
//Main admin EState update
function main_admin_estate_edit(evt){
    //This click action will be registerred before the edit modal window will be dispalyed
    var id = evt.dataset.id;
    $.post("snippets/ajax/ajax_main_admin.php",{action:"main_admin_estate_fetch",id:id},function(data,status){
        var json = JSON.parse(data);
        $("#main_admin_estate_edit_id").val(json.id);
        $("#main_admin_estate_edit_name").val(json.name);
        $("#main_admin_estate_edit_address").val(json.address);
        $("#main_admin_estate_edit_description").val(json.description);
        $("#main_admin_estate_edit_city").val(json.city);
        $("#main_admin_estate_edit_state").val(json.state);
    });
}
function main_admin_estate_delete(evt){
    //This click action will be registerred before the delete modal window is displayed
    var id = evt.dataset.id;
     $("#main_admin_estate_delete_id").val(id);
   
}
//////////////////////////////////////////////////////////////////////////
//Main admin EState Admin update
function main_admin_estate_admin_edit(evt){
    //This click action will be registerred before the edit modal window will be dispalyed
   
    var id = evt.dataset.id;
    $.post("snippets/ajax/ajax_main_admin.php",{action:"main_admin_estate_admin_fetch",id:id},function(data,status){
         var json = JSON.parse(data);
        $("#main_admin_estate_admin_edit_id").val(json.id);
        $("#main_admin_estate_admin_edit_name").val(json.name);
        $("#main_admin_estate_admin_edit_phone").val(json.phone);
        $("#main_admin_estate_admin_edit_email").val(json.email);
        $("#main_admin_estate_admin_edit_address").val(json.address);
        
        $("#main_admin_estate_admin_edit_estate").val("Current: "+json.estate);
        $("#main_admin_estate_admin_edit_password").val(json.password);
    });
}
function main_admin_estate_admin_delete(evt){
    //This click action will be registerred before the delete modal window is displayed
    var id = evt.dataset.id;
     $("#main_admin_estate_admin_delete_id").val(id);
   
}
//////////////////////////////////////////////////////////////////////////
//Main admin Bank update
function main_admin_bank_edit(evt){
    //This click action will be registerred before the edit modal window will be dispalyed
    var id = evt.dataset.id;
    $.post("snippets/ajax/ajax_main_admin.php",{action:"main_admin_bank_fetch",id:id},function(data,status){
        var json = JSON.parse(data);
        $("#main_admin_bank_edit_id").val(json.id);
        $("#main_admin_bank_edit_name").val(json.name);
        $("#main_admin_bank_edit_number").val(json.number);
        $("#main_admin_bank_edit_bank").val(json.bank);
    });
}
function main_admin_bank_delete(evt){
    //This click action will be registerred before the delete modal window is displayed
    var id = evt.dataset.id;
   
     $("#main_admin_bank_delete_id").val(id);
   
}


