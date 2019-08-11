    <table class="table table-active table-lg table-responsive-sm w-100">
   <thead class="bg-primary"> 
<tr>
                <th colspan="8"><h2 class="text-center">Manage Estate</h2></th>
  </tr>
   </thead>
    </table>
<table id="example" class="display" style="width:100%">
        <thead>
           
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Description</th>
                <th>City</th>
                <th>State</th>
                <th>Date Registerred</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $estates = (new Estate())->fetch_all_estates();
            
            foreach ($estates as $est){
                echo '<tr>';
                echo '<td>'.$est->get_name().'</td>';
                echo '<td>'.$est->get_address().'</td>';
                echo '<td>'.$est->get_description().'</td>';
                echo '<td>'.$est->get_city().'</td>';
                echo '<td>'.$est->get_state().'</td>';
                echo '<td>'.$est->get_date().'</td>';
                echo ' <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" onclick="main_admin_estate_edit(this);" data-id="'.$est->get_id().'" data-toggle="modal" data-target="#edit" ><span class="fa fa-pencil"></span></button></p></td>';
               echo ' <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" onclick="main_admin_estate_delete(this);" data-id="'.$est->get_id().'" data-toggle="modal" data-target="#delete" ><span class="fa fa-trash"></span></button></p></td>';
    
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
        <h4 class="modal-title custom_align centered" id="Heading">Edit Estate</h4>
      </div>
          <div class="modal-body">
              <input type="hidden" id="main_admin_estate_edit_id" value="1">
          <div class="form-group">
              <label>Name</label>
              <input class="form-control " type="text" placeholder="Name" id="main_admin_estate_edit_name">
        </div>
              
        <div class="form-group">
            <label>Address</label>
            <input class="form-control "  disabled type="text" id="main_admin_estate_edit_address"  placeholder="Address">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea rows="3" class="form-control" id="main_admin_estate_edit_description"  placeholder="Description"></textarea>
    
        </div>
              
        <div class="form-group">
            <label>City</label>
            <input class="form-control " id="main_admin_estate_edit_city" type="text"  disabled placeholder="City">
        </div>
        <div class="form-group">
            <label>State</label>
            <input class="form-control " id="main_admin_estate_edit_state" type="text"  disabled placeholder="State">
        </div>
        <div class="form-group">
            <span id="main_admin_estate_edit_message"></span>
        </div>
              
      </div>
          <div class="modal-footer ">
              <button type="button" class="btn btn-warning btn-lg" id="main_admin_estate_edit_btn" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span><i class="fa fa-pencil-square"></i> Update</button>
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
        <h4 class="modal-title custom_align" id="Heading">Delete Estate</h4>
      </div>
          <div class="modal-body">
       
            <div id="main_admin_estate_delete_message">  <div class="alert alert-danger" ><span class="fa fa-warning"></span> Are you sure you want to delete this Record?</div></div>
              <input type="hidden" id="main_admin_estate_delete_id" >
      </div>
        <div class="modal-footer ">
            <button type="button" id="main_admin_estate_delete_btn" class="btn btn-success" ><span class="fa fa-check-circle"></span> Yes</button>
        <button type="button" class="btn btn-default" onclick="window.location.href = window.location.href;" data-dismiss="modal"><span class="fa fa-remove"></span> Cancel</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>