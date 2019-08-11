<div class="row">
    <div class="col-sm-12 ">
        <h4 class="text-center estate_admin_color" style="padding-top: 10px;; padding-bottom: 10px;">Estate and Building Images</h4>
    </div>
</div>
<?php
$images_estates = (new Image())->fetch_by_type(Image::ESTATE, (new EstateAdmin($_SESSION['id']))->get_estate_id());
$image_buildings = (new Image())->fetch_by_building((new EstateAdmin($_SESSION['id']))->get_estate_id());
$data ="";
$counter = 0;

foreach($images_estates as $images_estate){
    $estate = new Estate($images_estate->get_type_id());
    if($counter ==0){
        $data .= '<div class="row">';
    }
    $data .= '
          <div class="col-md-6 wow bounceInUp " data-wow-duration="1.4s">
              <div class="card mb-4 border-dark">
                  <img class="card-img-top" width="100" height="300" src="uploads/estate/'.$images_estate->get_name().'" alt="'.$estate->get_name().'" >
                  <div class="card-body">
                      <h5 class="card-title">'.  ucwords($estate->get_name()).'</h5>
                      <p class="card-text">'.$images_estate->get_description().'<br>
                        Type : Estate  </p>
                     <form method="post">
                     <input type="hidden" name="post" value="manage_image">
                     <input type="hidden" name="image_id" value="'.$images_estate->get_id().'">
                    <button type="submit" name="delete_image_btn" class="btn btn-outline-dark btn-sm"><i class="fa fa-trash"></i> Delete</a>
                    </form>
                  </div>
              </div>
  
      </div>';
    if($counter  ==2){
        $data .= '</div>';
        $counter =0;
    }else{
        $counter++;
    }
}
if($counter ==2 || $counter==1){
    $data .= '</div>';
}
echo $data;
$data = "";
$counter =0;
?>

<?php
foreach($image_buildings as $image_building){
    $building = new Building($image_building->get_type_id());
    if($counter  ==0){
        $data .= '<div class="row">';
    }
    $data .= '
          <div class="col-md-6 wow bounceInUp " data-wow-duration="1.4s">
              <div class="card mb-4 border-dark">
                  <img class="card-img-top" width="100" height="300" src="uploads/buildings/'.$image_building->get_name().'" alt="'.$building->get_name().'" >
                  <div class="card-body">
                      <h5 class="card-title">'.  ucwords($building->get_name()).'</h5>
                      <p class="card-text">'.$image_building->get_description().'<br> Type : Building</p>
                     <form method="post">
                     <input type="hidden" name="post" value="manage_image">
                     <input type="hidden" name="image_id" value="'.$image_building->get_id().'">
                    <button type="submit" name="delete_image_btn" class="btn btn-outline-dark btn-sm"><i class="fa fa-trash"></i> Delete</a>
                    </form>
                  </div>
              </div>
          </div>
     ';
    if($counter  ==2){
        $data .= '</div>';
        $counter =0;
    }else{
        $counter++;
    }
}
if($counter ==2 || $counter ==1){
    $data .= '</div>';
}
echo $data;
   ?>

