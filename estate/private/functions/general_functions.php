<?php
include 'db_connection.php';
/*
 * Importing the Zend library for file decryption and encryption
 */
//require_once 'library/Zend/Loader/StandardAutoloader.php';
//$loader = new Zend\Loader\StandardAutoloader(array('autoregister_zf' => true));
// //Register the Phly namespace
//$loader->setFallbackAutoloader(TRUE);
//$loader->register();
// 
//require_once ('library/Zend/Filter/File/Decrypt.php');
// Put all of your general functions in this file

// header redirection often requires output buffering 
// to be turned on in php.ini.
function redirect_to($new_location) {
  header("Location: " . $new_location);
  exit;
}

/**
 * This function downloads a file into the browser
 * 
 * @param type $fileName this parameter represent the full path of the file to be downloaded
 * 
 */
 function downloader($fileName){
             if(file_exists($fileName)){
                 header('Content-Description: File Transfer');
                 header('Content-Type: application/octet-stream');
                // header('Content-Type: video/mp4');
                 header('Content-Disposition: attachment; filename='.basename($fileName));
                 header('Content-Transfer-Encoding: binary');
                 header('Expires: 0');
                 header('Cache-Control: must-revalidate, post-check=0 pre-check=0');
                 header('Pragma: public');
                 header('Content-Length: '.filesize($fileName));
                 ob_clean();
                 flush();
                 readfile($fileName);
                 exit;
         
                 }
             }
       function downloaderFile($fileName){
            //$fileName = "cps.png";
             if(file_exists($fileName)){
                 header('Content-Description: File Transfer');
                 header('Content-Type: application/octet-stream');
                // header('Content-Type: video/mp4');
                 header('Content-Disposition: attachment; filename='.basename($fileName));
                 header('Content-Transfer-Encoding: binary');
                 header('Expires: 0');
                 header('Cache-Control: must-revalidate');
                 header('Pragma: public');
                 header('Content-Length: '.filesize($fileName));
                 ob_clean();
                 flush();
                 readfile($fileName);
                 //exit;
         
                 }
             }
          
             /**
 * This function downloads a file into the browser
 * 
 * @param type $file_path this parameter represent the full path of the file to be downloaded
 * @param type $rate this is the rate of the download. if omitted, the download will assume a rate of 20.5 kb/s
 * @param type $download_name this is the name of the downloaded file. if omitted, the download will take the same name as default name  
 * 
 */
function download_rated($file_path, $rate=20.5, $download_name=""){
    $down_file = $download_name.  pathinfo($file_path, PATHINFO_EXTENSION);

    //set the download rate limit
    //(=> 20, 5 kb/s)
    $download_rate = $rate;
    if(file_exists($file_path) && is_file($file_path)){
     header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Type: video/mp4');
    header('Content-Disposition: attachment; filename='.  $down_file);
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0 pre-check=0');
    header('Pragma: public');
    header('Content-Length: '.filesize($file_path));



        flush();
        $file = fopen($file_path, 'r');
        while (!feof($file)){
            //send current filepart to the browser
            print fread($file, round($download_rate * 1024));
            //flush the content to the browser 
            flush();
            //sleep one second 
            sleep(1);

        }
        fclose($file);
    }
//    } else{
//        die('Error: The file '.$file_path.'does not exist!');
//    }
}

/**
 * This function get the list of supported algorithms based on a partcular installation
 * @return type array that contains the supported algorithms based on your installation
 */
function supported_algorithms(){
   
    return mcrypt_list_algorithms();
    
}

/** The function fetches the supported vector sizes for a particular algorithm
 * 
 * @param type $algorithm the selected algorithm. This must be one of the supported algorithms returned by the supported_alorithms function
 * @return type the supported vector sizes for the passed algorithm
 */
function vector_size_correct($algorithm){
    
    $cipher = mcrypt_module_open($algorithm, '', MCRYPT_MODE_OFB, '');
    $vector_size = mcrypt_enc_get_iv_size($cipher);
    
    return $vector_size;
}

/** The function fetches the supported key sizes for a particular algorithm
 * 
 * @param type $algorithm the selected algorithm. This must be one of the supported algorithms returned by the supported_alorithms function
 * @return type the supported key sizes for the passed algorithm
 */
function key_size_correct($algorithm){
    
    $cipher = mcrypt_module_open($algorithm, '', MCRYPT_MODE_CBC, '');
    $key_size = mcrypt_enc_get_supported_key_sizes($cipher);
    
    return $key_size;
}

function decrypt_and_download($source, $destination,$algorithm, $vector, $key){
    if(file_exists($source)){
        /*
         * Copy the encrypted file to a temporary folder
         */
        if(copy($source, $destination)){
            $source = base64_decode($source);
            //zend file deryption
            //$filter = new Zend_Filter_File_Decrypt(
            $filter = new Zend\Filter\File\Decrypt(
                    array('adapter' => 'blockCipher',
                          'vector' => $vector,
                          'algorithm' => $algorithm,
                          'key'  => $key)
                    );
            $filter->filter($destination);
            
            downloader($destination);
            
            //delete the copied decrypted file;
            unlink($destination);
        }
    }
}

function encrypt_and_download($source, $destination,$algorithm, $vector, $key){
    if(file_exists($source)){
        /*
         * Copy the encrypted file to a temporary folder
         */
        if(copy($source, $destination)){
            //zend file deryption
            //$filter = new Zend_Filter_File_Decrypt(
            $filter = new Zend\Filter\File\Encrypt(
                    array('adapter' => 'blockCipher',
                          'vector' => $vector,
                          'algorithm' => $algorithm,
                          'key'  => $key)
                    );
            $filter->filter($destination);
           // $destination = base64_encode($destination);
            downloader($destination);
            
            //delete the copied decrypted file;
            unlink($destination);
        }
    }
}

function enter_report($email, $report){
    global $mysqli;
    if(mysqli_query($mysqli, "INSERT INTO reports_tb (email, report) VALUES ('{$email}', '{$report}'")){
         return TRUE;
     } else {
         return FALSE;
     }
}
function enter_report_db($db, $email, $report){
   
    if(mysqli_query($db, "INSERT INTO reports_tb (email, report) VALUES ('{$email}', '{$report}')")){
         return TRUE;
     } else {
         return FALSE;
     }
}
            
?>
