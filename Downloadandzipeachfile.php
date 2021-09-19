<?php
    if (sizeof($downloadFileAr) > 1) {
        
        $zip_file_name   = "king_ftp_".date("Y_m_d_H_i_s").".zip";
        $zip_file        = createTempFileName($zip_file_name);
        $zip             = new ZipArchive();
		
        $zip->open( $zip_file, ZipArchive::CREATE);
    
        foreach ($downloadFileAr as $file) {
    
            $file_name = getFileFromPath($file);
            $fp1       = createTempFileName($file_name);
            $fp2       = $file;
            
            
            $unlinkFileAr[] = $fp1;
            
            $isError = 0;
            
            ensureFtpConnActive();
        
            // Download file to client server
            if (!@ftp_get($conn_id, $fp1, $fp2, FTP_BINARY)) {
               if (checkFirstCharTilde($fp2) == 1) {
                   if (!@ftp_get($conn_id, $fp1, replaceTilde($fp2), FTP_BINARY)) {
                        recordFileError("file", $file_name, $lang_server_error_down);
                        $isError = 1;
                   }
               } else {
                   recordFileError("file", $file_name, $lang_server_error_down);
                   $isError = 1;
               }
            }
    
            if ($isError == 0) {
    
                // Remove the current folder path
                $file_path = str_replace($_SESSION["dir_current"]."/","",$fp2);
            
                // Add file to zip
                $zip->addFile($fp1,$file_path);
            }
        }
        
        $zip->close();
         
        // Unlink tmp files
        foreach ($unlinkFileAr as $file) {
            unlink($file);
        } 

        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=\"".$zip_file_name."\"");
        header("Content-Length: " . filesize($zip_file));

        flush();
        
        $files = glob(WP_PLUGIN_DIR."/king_ftp/download/".'*.zip'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file))
    unlink($file); // delete file
}
$fp9=$zip_file_name;
$fp10=get_site_url()."/wp-content/plugins/king_ftp/download/";
    $arraydata=array(
    array($file,"image",$lang_ftp_address_file),
    array($file_name,"image",$lang_name_file),
    array($fp1,"image",$lang_temp_address_file),
    array("".$fp10.$fp9,"image",$lang_downloadlink),
    );
    echo htmlli($arraydata,false,false);
        $file = $file_name;  
$file = WP_PLUGIN_DIR."/king_ftp/download/".$zip_file_name;  
        $myfile = fopen($file, "w") or die("Unable to open file!");
        
        $fp = @fopen($zip_file, "r");
        while (!feof($fp)) {
            //echo @fread($fp, 65536);
            //@flush();
            $txt = @fread($fp, 65536);
            fwrite($myfile, $txt);
        }
        @fclose($fp);

echo  ' <img src="'.plugins_url('images/zipfile.png',__FILE__ ).'" class="w3-bar-item  w3-hide-small" style="width: 20%;float: right;text-align: center;padding-right: 40%;padding-left: 40%;padding-top: 2em;">';  
echo '<a href="'.get_site_url()."/wp-content/plugins/king_ftp/download/".$zip_file_name.'" target="_blank" style="width:100%;float: left;text-align: center;padding-top: 1em;padding-bottom: 1em;">'.$lang_Download_Here."</a>";
        // Delete tmp file
        unlink($zip_file);
      
    }


?>