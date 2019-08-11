    <table class="table table-active table-lg table-responsive-sm w-100">
   <thead class="estate_admin_color"> 
<tr>
                <th colspan="8"><h2 class="text-center">Manage Occupants</h2></th>
  </tr>
   </thead>
    </table>
<table id="example" class="display" style="width:100%">
        <thead>
           
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Building</th>
                <th>No. of Rented Flats</th>
                <th>Password</th>
               
                <th>Date Registered</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
                $occupants = (new Occupant())->fetch_occupant_with_estate_id((new EstateAdmin($_SESSION['id']))->get_estate_id());
                
                foreach ($occupants as $occupant){
                    echo '<tr>';
                    echo '<td>'.$occupant->get_name().'</td>';
                    echo '<td>'.$occupant->get_phone().'</td>';
                    echo '<td>'.$occupant->get_email().'</td>';
                    echo '<td>'.(new Building($occupant->get_building_id()))->get_name().'</td>';
                    echo '<td>'.$occupant->get_flats().'</td>';
                    echo '<td>'.$occupant->get_password().'</td>';
                    echo '<td>'.$occupant->get_date().'</td>';



                    echo ' <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn estate_admin_color btn-xs" data-title="Edit" onclick="occupant_edit(this);" data-id="'.$occupant->get_id().'" data-toggle="modal" data-target="#edit" ><span class="fa fa-pencil"></span></button></p></td>';
                   echo ' <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" onclick="occupant_delete(this);" data-id="'.$occupant->get_id().'" data-toggle="modal" data-target="#delete" ><span class="fa fa-trash"></span></button></p></td>';

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
        <h4 class="modal-title custom_align centered" id="Heading">Edit Occupant</h4>
      </div>
          <div class="modal-body">
              <input type="hidden" id="occupant_id" >
          <div class="form-group">
              <label class="control-label">Name</label>
              <input class="form-control " type="text" placeholder="Occupant Name" id="occupant_name">
        </div>
              
        <div class="form-group">
            <label class="control-label">Phone</label>
            <input class="form-control "   type="tel" id="occupant_phone"  placeholder="Phone">
        </div>
        <div class="form-group">
            <label>Email Address</label>
            <input type="email" class="form-control" id="occupant_email"  placeholder="Email">
    
        </div>
        <div class="form-group">
            <label>Building</label>
            <select id="occupant_building_select"   class="form-control" >
                             <option value="0">Select owner...</option>
                             <?php
                                $estate_id = (new EstateAdmin($_SESSION['id']))->get_estate()->get_id();
                               $buildings = (new Building())->fetch_buildings_by_estate($estate_id);
                                 foreach ($buildings as $building){
                                  
                                    echo '<option value="'.$building->get_id().'">'.$building->get_name().'</option>';
                                    
                                }
                            ?>
                           
                        </select>
            <input type="text" class="form-control" id="occupant_building_input"  disabled>
    
        </div>
        
       
        <div class="form-group" >
            <label>No. of Flats to Rent</label>
            <input type="number" class="form-control" id="occupant_flats"  placeholder="No. of Flats to Rent">
    
        </div>
        <div class="form-group" >
            <label>Password</label>
            <input type="text" class="form-control" id="occupant_password"  placeholder="Password">
    
        </div>
       
              
       
        <div class="form-group">
            <span id="occupant_edit_message"></span>
        </div>
              
      </div>
          <div class="modal-footer ">
              <button type="button" class="btn btn-warning btn-lg" id="occupant_edit_btn" style="width: 100%;"><i class="fa fa-pencil-square"></i> Update Occupant</button>
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
        <h4 class="modal-title custom_align" id="Heading">Delete Occupant</h4>
      </div>
          <div class="modal-body">
       
            <div id="occupant_delete_message">  <div class="alert alert-danger" ><span class="fa fa-warning"></span> Are you sure you want to delete this Record?</div></div>
              <input type="hidden" id="occupant_delete_id" >
      </div>
        <div class="modal-footer ">
            <button type="button" id="occupant_delete_btn" class="btn btn-success" ><span class="fa fa-check-circle"></span> Yes</button>
        <button type="button" class="btn btn-default" onclick="window.location.href = window.location.href;" data-dismiss="modal"><span class="fa fa-remove"></span> Cancel</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>