    <table class="table table-active table-lg table-responsive-sm w-100">
   <thead class="estate_admin_color"> 
<tr>
                <th colspan="8"><h2 class="text-center">Manage Buildings</h2></th>
  </tr>
   </thead>
    </table>
<table id="example" class="display" style="width:100%">
        <thead>
           
            <tr>
                <th>Name</th>
                <th>Location</th>
                <th>Description</th>
                <th>Owner</th>
                <th>For Sale</th>
                <th>Sale Amount</th>
                <th>No. of Flats</th>
                <th>Flat Description</th>
                <th>Flat Rent</th>
                <th>Date Registered</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $buildings = (new Building())->fetch_buildings_by_estate((new EstateAdmin($_SESSION['id']))->get_estate_id());
            
            foreach ($buildings as $building){
                echo '<tr>';
                echo '<td>'.$building->get_name().'</td>';
                echo '<td>'.$building->get_location().'</td>';
                echo '<td>'.$building->get_description().'</td>';
                echo '<td>'.$building->get_owner()->get_name().'</td>';
                echo '<td>'.(($building->get_for_sale())?'Yes':'No').'</td>';
                echo '<td>&#8358;'.  number_format($building->get_sale_amount(), 0, '.', ',').'</td>';
                echo '<td>'.$building->get_flat_count().' (Occupied : '.($building->get_flat_count() - $building->get_available_flats()).')</td>';
                echo '<td>'.$building->get_flat_description().'</td>';
                echo '<td>&#8358; '.  number_format($building->get_flat_rent(), 0, '.', ',').'</td>';
                echo '<td>'.$building->get_date().'</td>';
                
                
               
                echo ' <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn estate_admin_color btn-xs" data-title="Edit" onclick="building_edit(this);" data-id="'.$building->get_id().'" data-toggle="modal" data-target="#edit" ><span class="fa fa-pencil"></span></button></p></td>';
               echo ' <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" onclick="building_delete(this);" data-id="'.$building->get_id().'" data-toggle="modal" data-target="#delete" ><span class="fa fa-trash"></span></button></p></td>';
    
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
        <h4 class="modal-title custom_align centered" id="Heading">Edit Building</h4>
      </div>
          <div class="modal-body">
              <input type="hidden" id="building_id" value="1">
          <div class="form-group">
              <label class="control-label">Building Name</label>
              <input class="form-control " type="text" placeholder="Building Name" id="building_name">
        </div>
              
        <div class="form-group">
            <label>Location</label>
            <input class="form-control "   type="text" id="building_location"  placeholder="Location">
            <small>This is the buildings location in the estate.</small>
        </div>
        <div class="form-group">
            <label>Description</label>
            <input type="text" class="form-control" id="building_description"  placeholder="Description">
    
        </div>
        <div class="form-group">
            <label>Building Owner</label>
            <select id="building_owner_select"   class="form-control" >
                             <option value="0">Select owner...</option>
                             <?php
                                $estate_id = (new EstateAdmin($_SESSION['id']))->get_estate()->get_id();
                                $owners = (new BuildingOwner())->fetch_all_owners_by_estate_id($estate_id);
                                 foreach ($owners as $owner){
                                  
                                    echo '<option value="'.$owner->get_id().'">'.$owner->get_name().'</option>';
                                    
                                }
                            ?>
                           
                        </select>
            <input type="text" class="form-control" id="building_owner_input"  disabled>
    
        </div>
        <div class="form-group">
            <label>For Sale</label>
            <select id="building_for_sale_select" class="form-control">
                <option value="10">Select...</option>
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>
            <input type="text" class="form-control" id="building_for_sale_input"  disabled>
    
        </div>
        <div class="form-group" id="building_sale_amount_div">
            <label>Sale Amount (&#8358;)</label>
            <input type="number" class="form-control" id="building_sale_amount"  placeholder="Sale Amount">
    
        </div>
        <div class="form-group" >
            <label>No. of Flats</label>
            <input type="number" class="form-control" id="building_no_of_flats"  placeholder="No. of Flats">
    
        </div>
        <div class="form-group" >
            <label>Flat Description</label>
            <input type="text" class="form-control" id="building_flat_description"  placeholder="Flat Description">
    
        </div>
        <div class="form-group" >
            <label>Flat Rent (&#8358;)</label>
            <input type="number" class="form-control" id="building_flat_rent"  placeholder="Flat Rent">
    
        </div>
              
       
        <div class="form-group">
            <span id="building_edit_message"></span>
        </div>
              
      </div>
          <div class="modal-footer ">
              <button type="button" class="btn btn-warning btn-lg" id="building_edit_btn" style="width: 100%;"><i class="fa fa-pencil-square"></i> Update Building</button>
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
        <h4 class="modal-title custom_align" id="Heading">Delete Building</h4>
      </div>
          <div class="modal-body">
       
              <div id="building_delete_message">  <div class="alert alert-danger" ><span class="fa fa-warning"></span> Are you sure you want to delete this Record? <br>Ensure that No occupant is living in this building as all occupants will be deleted as welll.</div></div>
              <input type="hidden" id="building_delete_id" >
      </div>
        <div class="modal-footer ">
            <button type="button" id="building_delete_btn" class="btn btn-success" ><span class="fa fa-check-circle"></span> Yes</button>
        <button type="button" class="btn btn-default" onclick="window.location.href = window.location.href;" data-dismiss="modal"><span class="fa fa-remove"></span> Cancel</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>