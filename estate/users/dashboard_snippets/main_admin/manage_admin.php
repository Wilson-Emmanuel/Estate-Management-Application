    <table class="table table-active table-lg table-responsive-sm w-100">
   <thead class="bg-primary"> 
<tr>
                <th colspan="8"><h2 class="text-center">Manage Estate Admins</h2></th>
  </tr>
   </thead>
    </table>
<table id="example" class="display" style="width:100%">
        <thead>
           
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th>Estate</th>
                <th>Password</th>
                <th>Date Joined</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $admins = (new EstateAdmin())->fetch_all_estate_admins();
           // echo '<tr><td colspan="8"><pre>'.print_r($admins).'</pre></td></tr>';
            foreach ($admins as $admin){
                echo '<tr>';
                echo '<td>'.$admin->get_name().'</td>';
                echo '<td>'.$admin->get_phone().'</td>';
                echo '<td>'.$admin->get_email().'</td>';
                echo '<td>'.$admin->get_address().'</td>';
                
                $est = new Estate($admin->get_estate_id());
                echo '<td>'.$est->get_name().' in '.$est->get_address().', '.$est->get_city().', '.$est->get_state().'</td>';
                echo '<td>'.$admin->get_password().'</td>';
                echo '<td>'.$admin->get_date().'</td>';
                echo ' <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" onclick="main_admin_estate_admin_edit(this);" data-id="'.$admin->get_id().'" data-toggle="modal" data-target="#edit" ><span class="fa fa-pencil"></span></button></p></td>';
               echo ' <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" onclick="main_admin_estate_admin_delete(this);" data-id="'.$admin->get_id().'" data-toggle="modal" data-target="#delete" ><span class="fa fa-trash"></span></button></p></td>';
    
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
        <h4 class="modal-title custom_align text-center" id="Heading">Edit Estate Admin</h4>
      </div>
          <div class="modal-body">
              <input type="hidden" id="main_admin_estate_admin_edit_id" value="1">
          <div class="form-group">
              <label>Name</label>
              <input class="form-control " type="text" placeholder="Name" id="main_admin_estate_admin_edit_name">
        </div>
          <div class="form-group">
              <label>Phone</label>
              <input class="form-control " type="text" placeholder="Phone" id="main_admin_estate_admin_edit_phone">
        </div>
          <div class="form-group">
              <label>Email</label>
              <input class="form-control " type="text" placeholder="Email" id="main_admin_estate_admin_edit_email">
        </div>
              
        <div class="form-group">
            <label>Address</label>
            <input class="form-control "  type="text" id="main_admin_estate_admin_edit_address"  placeholder="Address">
        </div>
              
        <div class="form-group">
            <label>Estate</label>
            <select class="form-control" id="main_admin_estate_admin_edit_estate_new_estate" >
                <option value="none">Select ...</option>
                <?php
                $ests = (new Estate())->fetch_all_estates();
                foreach($ests as $est){
                    echo '<option value="'.$est->get_id().'">'.$est->get_name().' in '.$est->get_address().', '.$est->get_city().', '.$est->get_state().'</option>';
                }
                ?>
            </select>
            <input class="form-control "  disabled type="text" id="main_admin_estate_admin_edit_estate"  placeholder="Estate">
           
        </div>
        
        <div class="form-group">
            <label>Password</label>
            <input class="form-control "  type="text" id="main_admin_estate_admin_edit_password"  placeholder="Password">
        </div>    
       
        <div class="form-group">
            <span id="main_admin_estate_admin_edit_message"></span>
        </div>
              
      </div>
          <div class="modal-footer ">
              <button type="button" class="btn btn-warning btn-lg" id="main_admin_estate_admin_edit_btn" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span><i class="fa fa-pencil-square"></i> Update</button>
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
        <h4 class="modal-title custom_align" id="Heading">Delete Estate Admin</h4>
      </div>
          <div class="modal-body">
       
            <div id="main_admin_estate_admin_delete_message">  <div class="alert alert-danger" ><span class="fa fa-warning"></span> Are you sure you want to delete this Record?</div></div>
              <input type="hidden" id="main_admin_estate_admin_delete_id" >
      </div>
        <div class="modal-footer ">
            <button type="button" id="main_admin_estate_admin_delete_btn" class="btn btn-success" ><span class="fa fa-check-circle"></span> Yes</button>
        <button type="button" class="btn btn-default" onclick="window.location.href = window.location.href;" data-dismiss="modal"><span class="fa fa-remove"></span> Cancel</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>