    <table class="table table-active table-lg table-responsive-sm w-100">
   <thead class="bg-primary"> 
<tr>
                <th colspan="8"><h2 class="text-center">Manage Banks</h2></th>
  </tr>
   </thead>
    </table>
<table id="example" class="display" style="width:100%">
        <thead>
           
            <tr>
                <th>Account Name</th>
                <th>Account Number</th>
                <th>Bank Name</th>
                <th>Date Enterred</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $banks = (new Bank())->fetch_banks(MainAdmin::TYPE, $_SESSION['id']);
            
            foreach ($banks as $bank){
                echo '<tr>';
                echo '<td>'.$bank->get_name().'</td>';
                echo '<td>'.$bank->get_number().'</td>';
                echo '<td>'.$bank->get_bank().'</td>';
                echo '<td>'.$bank->get_date().'</td>';
               
                echo ' <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" onclick="main_admin_bank_edit(this);" data-id="'.$bank->get_id().'" data-toggle="modal" data-target="#edit" ><span class="fa fa-pencil"></span></button></p></td>';
               echo ' <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" onclick="main_admin_bank_delete(this);" data-id="'.$bank->get_id().'" data-toggle="modal" data-target="#delete" ><span class="fa fa-trash"></span></button></p></td>';
    
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

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="fa fa-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align centered" id="Heading">Edit Bank</h4>
      </div>
          <div class="modal-body">
              <input type="hidden" id="main_admin_bank_edit_id" value="1">
          <div class="form-group">
              <label>Account Name</label>
              <input class="form-control " type="text" placeholder="Account Name" id="main_admin_bank_edit_name">
        </div>
              
        <div class="form-group">
            <label>Account Number</label>
            <input class="form-control "   type="text" id="main_admin_bank_edit_number"  placeholder="Account Number">
        </div>
        <div class="form-group">
            <label>Bank Name</label>
            <input type="text" class="form-control" id="main_admin_bank_edit_bank"  placeholder="Bank Name">
    
        </div>
              
       
        <div class="form-group">
            <span id="main_admin_bank_edit_message"></span>
        </div>
              
      </div>
          <div class="modal-footer ">
              <button type="button" class="btn btn-warning btn-lg" id="main_admin_bank_edit_btn" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span><i class="fa fa-pencil-square"></i> Update</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>



 
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="fa fa-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete Bank</h4>
      </div>
          <div class="modal-body">
       
            <div id="main_admin_bank_delete_message">  <div class="alert alert-danger" ><span class="fa fa-warning"></span> Are you sure you want to delete this Record?</div></div>
              <input type="hidden" id="main_admin_bank_delete_id" >
      </div>
        <div class="modal-footer ">
            <button type="button" id="main_admin_bank_delete_btn" class="btn btn-success" ><span class="fa fa-check-circle"></span> Yes</button>
        <button type="button" class="btn btn-default" onclick="window.location.href = window.location.href;" data-dismiss="modal"><span class="fa fa-remove"></span> Cancel</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>