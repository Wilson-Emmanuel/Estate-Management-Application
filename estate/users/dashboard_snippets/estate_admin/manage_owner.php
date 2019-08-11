    <table class="table table-active table-lg table-responsive-sm w-100">
   <thead class="estate_admin_color"> 
<tr>
                <th colspan="8"><h2 class="text-center">Manage Building Owners</h2></th>
  </tr>
   </thead>
    </table>
<table id="example" class="display" style="width:100%">
        <thead>
           
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Date Registerred</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $owners = (new BuildingOwner())->fetch_all_owners_by_estate_id((new EstateAdmin($_SESSION['id']))->get_estate_id());
            
            foreach ($owners as $owner){
                echo '<tr>';
                echo '<td>'.$owner->get_name().'</td>';
                echo '<td>'.$owner->get_phone().'</td>';
                echo '<td>'.$owner->get_email().'</td>';
                echo '<td>'.$owner->get_date().'</td>';
               
                echo ' <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn estate_admin_color btn-xs" data-title="Edit" onclick="building_owner_edit(this);" data-id="'.$owner->get_id().'" data-toggle="modal" data-target="#edit" ><span class="fa fa-pencil"></span></button></p></td>';
               echo ' <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" onclick="building_owner_delete(this);" data-id="'.$owner->get_id().'" data-toggle="modal" data-target="#delete" ><span class="fa fa-trash"></span></button></p></td>';
    
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
        <h4 class="modal-title custom_align centered" id="Heading">Edit Building Owner</h4>
      </div>
          <div class="modal-body">
              <input type="hidden" id="building_owner_id" value="1">
          <div class="form-group">
              <label>Name</label>
              <input class="form-control " type="text" placeholder="Name" id="building_owner_name">
        </div>
              
        <div class="form-group">
            <label>Email Address</label>
            <input class="form-control "   type="email" id="building_owner_email"  placeholder="Email Address">
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="tel" class="form-control" id="building_owner_phone"  placeholder="Phone Number">
    
        </div>
              
       
        <div class="form-group">
            <span id="building_owner_edit_message"></span>
        </div>
              
      </div>
          <div class="modal-footer ">
              <button type="button" class="btn btn-warning btn-lg" id="building_owner_edit_btn" style="width: 100%;"><i class="fa fa-pencil-square"></i> Update</button>
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
        <h4 class="modal-title custom_align" id="Heading">Delete Building Owner</h4>
      </div>
          <div class="modal-body">
       
            <div id="building_owner_delete_message">  <div class="alert alert-danger" ><span class="fa fa-warning"></span> Are you sure you want to delete this Record?</div></div>
              <input type="hidden" id="building_owner_delete_id" >
      </div>
        <div class="modal-footer ">
            <button type="button" id="building_owner_delete_btn" class="btn btn-success" ><span class="fa fa-check-circle"></span> Yes</button>
            <button type="button" class="btn btn-default " onclick="window.location.href = window.location.href;" data-dismiss="modal"><span class="fa fa-remove"></span> Cancel</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>