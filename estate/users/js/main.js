jQuery(document).ready(function(){

       
    var heading = $("h1").text();

    var title = $('title');

    var meta = $('#meta-info').text();

    title.text(heading);
    
     $(window).on('load', function() {
                 var pre_loader = $('#preloader');
                 pre_loader.fadeOut('slow', function() {
                   $(this).remove();
                 });
               });

 $("#confirm-delete").on('click',function(){
       $("#hide").removeClass("hide");
   }) 
   
   $(".reject-btn").click(function(){
       var id = this.id;
     
       var reason = $("#reason-reject");
       reason.attr('id', "#reason-reject-" + id);
                  
       reason.toggleClass("hide").fadeIn();
       
       $("#leave_id").val(id);
       
   })
   
    $('delete-account').submit(function(){

       if(window.prompt("Are you sure you want to do this?")){
           $.ajax({
               
           })
       }
    });

    var pass = $("#password");

    pass.on("change", function(){
        if($(this).val() < 10000000){
            $(".error-line1").text("Password must be at least 8 characters");
        }else if($(this).val() === ''){
            $(".error-line1").text("Password must be entered");
        }else{
               $(".error-line1").addClass("hide");
        }
    });

    $("#conf-pass").on("change", function(){

        if($(this).val() !== pass.val()){

            $(".error-line2").text("Passwords do not match");
        }else if($(this).val() === ''){
            $(".error-line2").text("Confirm your password");
        }else{
            $(".error-line2").addClass("hide");
        }
    });
        
   $('#start').on('change',function(){
       
        var start = $('#start').val();
        
        var day = start.split('-').join('');
        
        var type_num = $("#numdays").val();
        
        var num = parseInt(type_num);
        
        var end = $("#end").val();
        
        var day2 = end.split('-').join('');
        
        var dif = parseInt(day2) - parseInt(day)

        if(dif > num){
            day += num;
            var re = '/[4]+[2]+[2]/';
            
            day = day.split(re);
            
            $("#end").val()
           $('#error').html("Error! day1: "+day+"<br>Day2: "+day2+"<br>Difference: "+diff);
       }
       
    });
    
    var id =  $("#select-user").val();
    
    $("#select-user").on('change', function(){
        
        var id = $(this).val();

        $('#staff_id').val(id);        
    })
    
    $('#staff_id').val(id)
    
    $("#leave-type").on('change',function(){
        
        var val = $(this).val();
        if(val !== ''){
            $('#leave_id').val(val);
        }
        
        var type = document.getElementById('leave_type');
        
        
        $('#numdays').val(type.label);
       
    })
    
    $("#select-user").on("change",function(){
        var labl = document.getElementById("lft").label;
        $("#level").val(labl);
    })
    
    $("#btn-toggle").click(function(){
         $(this).fadeOut('fast',function(){
             $("#add").fadeIn("slow");
         });
        
    });
    /////////////////////////////////////////////////////
    //New building parameters
   /* $("#building_owner_div").hide();
    $("#building_owner_select").on('change',function(){
       var sel = $(this).val().trim();
       if(sel === "new"){
             $("#building_owner_div").show();
           
       }else{
             $("#building_owner_div").hide();
           
       }
    });*/
    
    $("#sale-amount-div").hide();
    $("#for_sale").on('change',function(){
       var for_sale = $(this).val();
       if(for_sale === "1"){
           $("#sale-amount-div").show();
       }else{
           $("#sale-amount-div").hide();
       }
    });
    
   ////Estate admin building manage
          $("#building_sale_amount_div").hide();
   $("#building_for_sale_select").on('change',function(){
      var for_sale = $(this).val();
      if(for_sale ==="0"){
          $("#building_sale_amount_div").hide();
      }else{
          $("#building_sale_amount_div").show();
      }
   });
   
   
   
   ///////////////////////////////////////
   ///Selecting all the checkboxes in a form
   $("#mytable #checkall").click(function () {
        if ($("#mytable #checkall").is(':checked')) {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });

        } else {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
    
    ///////////////////////////////////
    //Image category text
    $("#image-building-text").hide();
    $("#image-buildings").hide();
    $("select#image-category").on('change',function(){
       var val = $(this).val();
       if(val =="1"){
           $("#image-building-text").show();
            $("#image-buildings").show();
       }else{
           $("#image-building-text").hide();
            $("#image-buildings").hide();
       }
    });
})