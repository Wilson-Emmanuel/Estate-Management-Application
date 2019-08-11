<?php
if(isset($_POST['create_image_btn'])){
    
    $image = $_FILES['image_file'];
    $desc = trim($_POST['description']);
    $cate = (int)trim($_POST['type']);
    $building = trim($_POST['buildings']);
    
    $dir_dest = "";
    $new_name = "";
   $type_id = 0;
    if($cate ==1){
        //building
        $dir_dest = "uploads/buildings/";
         $new_name = "b".trim($_SESSION['id']).trim($building).time();
       
        $type_id = (int)$building;
    }else if($cate ==0){
        $dir_dest = "uploads/estate/";
        $new_name = "e".trim($_SESSION['id']).time();
        $type_id = (int)(new EstateAdmin($_SESSION['id']))->get_estate_id();
        
    }
    
    
    
    
     // ---------- IMAGE UPLOAD ----------

    // we create an instance of the class, giving as argument the PHP object
    // corresponding to the file field from the form
    // All the uploads are accessible from the PHP object $_FILES
    $handle = new Upload($_FILES['image_file']);
    $handle->file_new_name_body = $new_name;
    // then we check if the file has been uploaded properly
    // in its *temporary* location in the server (often, it is /tmp)
    if ($handle->uploaded) {

        // yes, the file is on the server
        // below are some example settings which can be used if the uploaded file is an image.
       
        $handle->image_resize            = true;
       $handle->image_ratio_y           = FALSE;
       
        $handle->image_x =1200;
        $handle->image_y = 1000;

        // now, we start the upload 'process'. That is, to copy the uploaded file
        // from its temporary location to the wanted location
        // It could be something like $handle->Process('/home/www/my_uploads/');
        $handle->Process($dir_dest);

        // we check if everything went OK
        if ($handle->processed) {
            // everything was fine !
            $info = getimagesize($handle->file_dst_pathname);
            
            //$x_width = $info[0];
            //$y_width = $info[1];
            $image_x = $handle->image_dst_x;
            $image_y = $handle->image_dst_y;
            $mine = $info['mime'];
          $file_size = round(filesize($handle->file_dst_pathname)/256)/4;
          $file_dest_name = $handle->file_dst_name; //with extension
          $file_dest_name_body = $handle->file_dst_name_body;//without extension
          
          $u_image = new Image();
          $u_image->set_type($cate);
          $u_image->set_type_id($type_id);
          $u_image->set_size($file_size);
          $u_image->set_width_x($image_x);
          $u_image->set_width_y($image_y);
          $u_image->set_name($file_dest_name);
          $u_image->set_date(date("Y-m-d H:i:s"));
          $u_image->set_description($desc);
          
          if($u_image->insert()){
              $success = 'Image successfully uploaded! <a href="'.$handle->file_dst_pathname.'">See Image here</a>';
          }else{
              //delete the file
              unlink($handle->file_dst_pathname);
              $error = "Image not uploaded. Try again.";
          }
           
        } else {
            // one error occured
           $error .= "\n File upload failed. Please try again.";
        }

        // we now process the image a second time, with some other settings
//        $handle->image_resize            = true;
//        $handle->image_ratio_y           = true;
//        $handle->image_x                 = 300;
//        $handle->image_reflection_height = '25%';
//        $handle->image_contrast          = 50;
//
//        $handle->Process($dir_dest);

        // we check if everything went OK
//        if ($handle->processed) {
//            // everything was fine !
//            echo '<p class="result">';
//            echo '  <b>File uploaded with success</b><br />';
//            echo '  <img src="'.$dir_pics.'/' . $handle->file_dst_name . '" />';
//            $info = getimagesize($handle->file_dst_pathname);
//            echo '  File: <a href="'.$dir_pics.'/' . $handle->file_dst_name . '">' . $handle->file_dst_name . '</a><br/>';
//            echo '   (' . $info['mime'] . ' - ' . $info[0] . ' x ' . $info[1] .' - ' . round(filesize($handle->file_dst_pathname)/256)/4 . 'KB)';
//            echo '</p>';
//        } else {
//            // one error occured
//            echo '<p class="result">';
//            echo '  <b>File not uploaded to the wanted location</b><br />';
//            echo '  Error: ' . $handle->error . '';
//            echo '</p>';
//        }

        // we delete the temporary files
        $handle-> Clean();

    } else {
        // if we're here, the upload file failed for some reasons
        // i.e. the server didn't receive the file
       
       $error = "File not uploaded on the server. Error :".$handle->error;
        
    }

    
}
if(isset($_POST['delete_image_btn'])){
    
    $image_id = (trim($_POST['image_id']));
    $image = new Image($image_id);
    if($image->get_type()=="0"){
        if($image->delete_by_id()){
            unlink("uploads/estate/".$image->get_name());
        }
    }else{
        if($image->delete_by_id()){
            unlink("uploads/buildings/".$image->get_name());
        }
    }
}
?>

