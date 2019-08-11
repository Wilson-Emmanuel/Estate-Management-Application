$(function(){
   
  
   

    //////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////
   //Updating the estate admin bank using ajax 
    $("#bank_edit_btn").click(function(){
        
        var id = $("#bank_id").val();
        var name = $("#account_name").val();
        var number =$("#account_number").val();
        var bank =$("#bank_name").val();
        
        $.post("snippets/ajax/ajax_estate_admin.php",{action:"bank_edit",id:id,name:name,number:number,bank:bank},function(data, status){
            $("#bank_edit_message").html(data);
        });
    });
    
   //Deleting the main admin bank using ajax 
    $("#bank_delete_btn").click(function(){
       
       var id = $("#bank_delete_id").val();
        
        $.post("snippets/ajax/ajax_estate_admin.php",{action:"bank_delete",id:id},function(data, status){
            $("#bank_delete_message").html(data);
        });
    });
    //////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////
   //Updating the estate admin building owner using ajax 
    $("#building_owner_edit_btn").click(function(){
        
        var id = $("#building_owner_id").val();
        var name = $("#building_owner_name").val();
        var email =$("#building_owner_email").val();
        var phone =$("#building_owner_phone").val();
        
        $.post("snippets/ajax/ajax_estate_admin.php",{action:"building_owner_edit",id:id,name:name,phone:phone,email:email},function(data, status){
            $("#building_owner_edit_message").html(data);
        });
    });
    
   //Deleting the main admin building owneer using ajax 
    $("#building_owner_delete_btn").click(function(){
       
       var id = $("#building_owner_delete_id").val();
        
        $.post("snippets/ajax/ajax_estate_admin.php",{action:"building_owner_delete",id:id},function(data, status){
            $("#building_owner_delete_message").html(data);
        });
    });
    //////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////
   //Updating the estate admin building  using ajax 
    $("#building_edit_btn").click(function(){
        
        var id = $("#building_id").val();
        var name = $("#building_name").val();
        var location=$("#building_location").val();
        var description =$("#building_description").val();
        var description =$("#building_description").val();
        var owner_id =$("#building_owner_select").val();
        var for_sale =$("#building_for_sale_select").val();
        var sale_amount =$("#building_sale_amount").val();
        var flat_count =$("#building_no_of_flats").val();
        var flat_description =$("#building_flat_description").val();
        var flat_rent =$("#building_flat_rent").val();
        
        
        
        
        $.post("snippets/ajax/ajax_estate_admin.php",{action:"building_edit",id:id,name:name,
        location:location,description:description,owner_id:owner_id,for_sale:for_sale,sale_amount:sale_amount,
    flat_count:flat_count,flat_description:flat_description,flat_rent:flat_rent},function(data, status){
            $("#building_edit_message").html(data);
        });
    });
    
   //Deleting the main admin building using ajax 
    $("#building_delete_btn").click(function(){
       
       var id = $("#building_delete_id").val();
        
        $.post("snippets/ajax/ajax_estate_admin.php",{action:"building_delete",id:id},function(data, status){
            $("#building_delete_message").html(data);
        });
    });
    //////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////
   //Updating the estate admin occupant using ajax 
    $("#occupant_edit_btn").click(function(){
        
       var id   = $("#occupant_id").val();
       var  name = $("#occupant_name").val();
       var  email  = $("#occupant_email").val();
       var  phone = $("#occupant_phone").val();
       var  building = $("#occupant_building_select").val();
       var  flats = $("#occupant_flats").val();
       var  password = $("#occupant_password").val();
        
        
        
        
        $.post("snippets/ajax/ajax_estate_admin.php",{action:"occupant_edit",id:id,name:name,
        email:email,phone:phone,building:building,flats:flats,password:password},function(data, status){
            $("#occupant_edit_message").html(data);
        });
    });
    
   //Deleting the main admin bank using ajax 
    $("#occupant_delete_btn").click(function(){
       
       var id = $("#occupant_delete_id").val();
        
        $.post("snippets/ajax/ajax_estate_admin.php",{action:"occupant_delete",id:id},function(data, status){
            $("#occupant_delete_message").html(data);
        });
    });
});

//////////////////////////////////////////////////////////////////////////
//Estate admin Bank update
function bank_edit(evt){
    //This click action will be registerred before the edit modal window will be dispalyed
    var id = evt.dataset.id;
    $.post("snippets/ajax/ajax_estate_admin.php",{action:"bank_fetch",id:id},function(data,status){
        var json = JSON.parse(data);
        $("#bank_id").val(json.id);
        $("#account_name").val(json.name);
        $("#account_number").val(json.number);
        $("#bank_name").val(json.bank);
    });
}
function bank_delete(evt){
    //This click action will be registerred before the delete modal window is displayed
    var id = evt.dataset.id;
   
     $("#bank_delete_id").val(id);
   
}
//////////////////////////////////////////////////////////////////////////
//Estate admin Building Owner update
function building_owner_edit(evt){
    //This click action will be registerred before the edit modal window will be dispalyed
    var id = evt.dataset.id;
    $.post("snippets/ajax/ajax_estate_admin.php",{action:"building_owner_fetch",id:id},function(data,status){
        var json = JSON.parse(data);
        $("#building_owner_id").val(json.id);
        $("#building_owner_name").val(json.name);
        $("#building_owner_email").val(json.email);
        $("#building_owner_phone").val(json.phone);
    });
}
function building_owner_delete(evt){
    //This click action will be registerred before the delete modal window is displayed
    var id = evt.dataset.id;
     $("#building_owner_delete_id").val(id);
   
}
//////////////////////////////////////////////////////////////////////////
//Estate admin Building  update
function building_edit(evt){
    //This click action will be registerred before the edit modal window will be dispalyed
    var id = evt.dataset.id;
    $.post("snippets/ajax/ajax_estate_admin.php",{action:"building_fetch",id:id},function(data,status){

        var json = JSON.parse(data);
        $("#building_id").val(json.id);
        $("#building_name").val(json.name);
        $("#building_location").val(json.location);
        $("#building_description").val(json.description);
        $("#building_owner_input").val("Current: "+json.owner_name);
        
       if(json.for_sale ===1){
            $("#building_for_sale_input").val("Current: Yes");
       }else{
            $("#building_for_sale_input").val("Current: No");
           
       }
       $("#building_sale_amount").val(json.sale_amount);
       $("#building_no_of_flats").val(json.flat_count);
       $("#building_flat_description").val(json.flat_description);
       $("#building_flat_rent").val(json.flat_rent);
       
    });
}
function building_delete(evt){
    //This click action will be registerred before the delete modal window is displayed
    var id = evt.dataset.id;
     $("#building_delete_id").val(id);
   
}
//////////////////////////////////////////////////////////////////////////
//Estate admin Occupant  update
function occupant_edit(evt){
    //This click action will be registerred before the edit modal window will be dispalyed
    var id = evt.dataset.id;
    $.post("snippets/ajax/ajax_estate_admin.php",{action:"occupant_fetch",id:id},function(data,status){
        var json = JSON.parse(data);
        $("#occupant_id").val(json.id);
        $("#occupant_name").val(json.name);
        $("#occupant_email").val(json.email);
        $("#occupant_phone").val(json.phone);
        $("#occupant_building_input").val("Current: "+json.building_name);
        $("#occupant_flats").val(json.flats);
        $("#occupant_password").val(json.password);
       
    });
}
function occupant_delete(evt){
    //This click action will be registerred before the delete modal window is displayed
    var id = evt.dataset.id;
     $("#occupant_delete_id").val(id);
   
}


