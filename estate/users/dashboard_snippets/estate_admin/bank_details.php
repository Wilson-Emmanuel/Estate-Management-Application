    <table class="table table-active table-lg table-responsive-sm w-100">
   <thead class="estate_admin_color"> 
<tr>
                <th colspan="8"><h2 class="text-center">Main Admin Bank Details</h2></th>
  </tr>
   </thead>
    </table>
<table id="example" class="display" style="width:100%">
        <thead>
           
            <tr>
                <th>Account Name</th>
                <th>Account Number</th>
                <th>Bank Name</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
                
               $banks = (new Bank())->fetch_main_admin_banks();
            
               foreach ($banks as $bank){
                   echo '<tr>';
                   echo '<td>'.$bank->get_name().'</td>';
                   echo '<td>'.$bank->get_number().'</td>';
                   echo '<td>'.$bank->get_bank().'</td>';
                   echo '</tr>';
               }
            ?>
            
            
           
                
        </tbody>
<!--        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>-->
    </table>


 
   