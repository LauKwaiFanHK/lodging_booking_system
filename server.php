<?php
// check if post data is available or not
if (isset($_POST['fileName']) && $_POST['fileData']){
    // save uploaded file
    $uploadDir = 'your path to save file';
    file_put_contents(
        $uploadDir. $_POST['fileName'],
        base64_decode($_POST['fileData'])
    );
      // done
                  echo "Success";
         } else {
               echo "Error : File not uploaded to remote server.";
        }
