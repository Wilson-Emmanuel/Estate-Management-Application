$(function(){
   
  
   

    //////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////
   //Estate Admin Compose Message Recipient settings and fetching
   $("#estate_recipient_div1").hide();
   $("#estate_recipient_div2").hide();
   $("#estate_recipient").on('change',function(){
      var estate_admin_id = $(this).data("id");
      var select = $(this).val();
      
      if((select ==="3") || (select ==="4")){
          //for all buildings tenants (3) or on tenants (4)
         
          $.post("snippets/ajax/message_ajax.php",{action:"estate_recipient_building",estate_admin:estate_admin_id},function(data, status){
              if(status ==="success"){
                  $("#estate_recipient_select1").html(data);
                  $("#estate_recipient_div1").show();
                   if(select ==="3"){
                       $("#estate_recipient_div2").hide();
                   }
              }else{
                  $("#estate_recipient_div1").hide();
                  $("#estate_recipient_div2").hide();
              }
          });
          
      }else{
          //none (0) or  main admin(1) or all estate tenants(2)
            $("#estate_recipient_div1").hide();
            $("#estate_recipient_div2").hide();
      }
   });
   $("#estate_recipient_select1").on('change',function(){
       var building = $(this).val();
       var estate_admin = $(this).data("id");
       var estate_recipient = $("#estate_recipient").val();
       if(estate_recipient ==="4"){
            $.post("snippets/ajax/message_ajax.php",{action:"estate_recipient_tenant",estate_admin:estate_admin,building:building},function(data, status){
              if(status ==="success"){
                  $("#estate_recipient_select2").html(data);
                  $("#estate_recipient_div2").show();
                   
              }else{
                  $("#estate_recipient_div2").hide();
              }
          });
       }else{
            $("#estate_recipient_div2").hide();
       }
   });
   

  
});


/*function occupant_delete(evt){
    //This click action will be registerred before the delete modal window is displayed
    var id = evt.dataset.id;
     $("#occupant_delete_id").val(id);
   
}
*/

