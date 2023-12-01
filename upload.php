<?php
require_once  'common/config/config.inc.php';
$arrFileExtension = array('png', 'jpg', 'gif','zip','psd','PSD','PNG','JPG','JPEG','GIF','AI','ai','ZIP','RAR','rar','pdf','PDF','doc','DOC');
if(isset($_FILES)){    
      if($_POST['_frmOrder']=='frmOrder'){         
        
        if($_GET['frm']=='contact'){
            $arrStatus = uploadedFile($_FILES,FILE_UPLOADED_PATH.'/contact_request','upl',$arrFileExtension);
        }else{
            $arrStatus = uploadedFile($_FILES,FILE_UPLOADED_PATH,'upl',$arrFileExtension);
        }
        if($arrStatus['status']=='success'){             
            echo json_encode(array('status'=>'success','fileName'=>$arrStatus['fileName']));
            exit;
        }else{
            echo json_encode(array('status'=>'error1'));
            exit;
        }          
      } 
         echo json_encode(array('status'=>'error2'));
         exit;
    }
?>    