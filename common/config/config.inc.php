<?php 
ini_set("error_reporting",'0');
define('FS_METHOD', 'direct');
if(!defined("_CFG_DEBUG"))
    define("_CFG_DEBUG", 1);

if(_CFG_DEBUG)
{
    error_reporting(0);         // show all notification
    ini_set('error_reporting', E_ALL ^ E_NOTICE);
}
else
{
    error_reporting(0);     // show only errors
//  ini_set('error_reporting', E_ERROR);
}
if($_SERVER['HTTP_HOST']=="10.0.0.142" || $_SERVER['HTTP_HOST']=="localhost" || $_SERVER['HTTP_HOST'] == "star.vinove.com" )
{
  
}
else
{
  
}
session_start();
#Commented by PA as zlip enabled serverwide and was conflicting with this
#if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler");

if($_SERVER['HTTP_HOST']=="10.0.0.142" || $_SERVER['HTTP_HOST']=="localhost")
{
   
    $arrConfig['DB_HOST'] = 'localhost';
    $arrConfig['DB_NAME'] = 'career';
    $arrConfig['DB_USER'] = 'root';
    $arrConfig['DB_PASS'] = 'vinove';
    $onError  = 0;

    $arrConfig['siteRootUrl'] = 'http://'.$_SERVER['HTTP_HOST'].'/vinove/';
    define('LOCAL_MODE', true);
     
   define('SUB_DOMAIN_VIRTUAL_URL','http://'.$_SERVER['HTTP_HOST'].'/vinove/');
    define('SUB_DOMAIN_SECURED_VIRTUAL_URL','http://'.$_SERVER['HTTP_HOST'].'/vinove/');
    define('ADMIN_REQUEST_QUOTE_EMAIL', 'shubham.kumar1@mail.vinove.com');
     // define('CONTACT_US_EMAIL_TO','arun.thakur@mail.vinove.com');
    define('CONTACT_US_EMAIL_TO','shubham.kumar1@mail.vinove.com');
    define('CONTACT_US_EMAIL_TO_CAREER','shubham.kumar1@mail.vinove.com');
    define('CONTACT_FORM_EMAIL_HR','rahul.bansal1@mail.vinove.com');
    define('CONTACT_US_SUBJECT','Vinove: Contact Us');

    
}
else if($_SERVER['HTTP_HOST'] == "beta.vinove.com" )
{
    $arrConfig['DB_HOST'] = 'localhost';
    $arrConfig['DB_NAME'] = 'betavinc_career';
    $arrConfig['DB_USER'] = 'betavinc_vinoven';
    $arrConfig['DB_PASS'] = 'vinove@123';

    //Continue on mysql error
    $onError  = 1;
    $arrConfig['siteRootUrl'] = 'http://'.$_SERVER['HTTP_HOST'].'/vinove_new/';
    define('LOCAL_MODE', true);
    define('SUB_DOMAIN_VIRTUAL_URL','http://'.$_SERVER['HTTP_HOST'].'/vinove_new/');
        define('LOCAL_MODE', true);
        define('ADMIN_REQUEST_QUOTE_EMAIL', 'abhishek.kumar@mail.vinove.com');
}
else
{
    $arrConfig['DB_HOST'] = 'localhost';
    $arrConfig['DB_NAME'] = 'vinovec_mindscapeblog';
    $arrConfig['DB_USER'] = 'vinovec_mindscap';
    $arrConfig['DB_PASS'] = 'NlV{BG[;guC?';
        

    //Continue on mysql error
    $onError  = 1;
    $arrConfig['siteRootUrl'] = 'http://'.$_SERVER['HTTP_HOST'].'/';
    define('LOCAL_MODE', false);
       
}
        define('CONTACT_US_EMAIL_TO','careers@vinove.com');
        define('CONTACT_US_EMAIL_TO_CAREER','careers@vinove.com');
        define('CONTACT_FORM_EMAIL_HR','careers@vinove.com');
        
        define('CONTACT_US_SUBJECT','VINOVE: Contact Us');
$varCacheDisable = '?rand='.microtime(true);
// To get root path
$varSiteFsPath = dirname(__FILE__);
$varSiteFsPath = str_replace('\\' ,'/',$varSiteFsPath);
$arrConfig['sourceRoot'] = str_replace('/common/config' ,'/',$varSiteFsPath);

// Title and Link Settings
$arrConfig['siteTitle'] = 'vinove';
$arrConfig['siteUrl'] = 'www.vinove.com';
//Define site root url and site source path
define('SITE_ROOT_URL', $arrConfig['siteRootUrl']);
define('SITE_SOURCE_PATH', $arrConfig['sourceRoot']);

//Define source root path
define('SOURCE_ROOT', $arrConfig['sourceRoot']);

if (isset($_SESSION['sessUser']['RecordPerPage'])) {
    $arrConfig['limit'] = $_SESSION['sessUser']['RecordPerPage'];
}
else
    $arrConfig['limit'] = 10;
$varCurrency = $_SESSION['sessUser']['CurrencyCode'];
define('COMPONENTS_PATH', $arrConfig['sourceRoot'].'components/'); 
define('LOGO_PATH_URL',SITE_ROOT_URL."common/images/logo.gif");
define('IMAGE_PATH_URL', SITE_ROOT_URL.'common/images/');
define('UPLOAD_FILES_PATH', $arrConfig['sourceRoot'].'common/uploaded_files/');
define('IMAGE_PATH', $arrConfig['siteRootUrl'].'common/images/');
define('ROOT_JS_PATH', $arrConfig['siteRootUrl'].'common/js/');   // comTABLE_FEEDBACK2mon root Js
define('INC_PATH', $arrConfig['sourceRoot'].'common/inc/');
define('CONFIG_PATH', $arrConfig['sourceRoot'].'common/config/');
define('SAVE_ORDER_FILES_PATH',UPLOAD_FILES_PATH.'order_files/');
define('UPLOADED_QUOTE_FILES_PATH', UPLOAD_FILES_PATH.'request_a_quote/');
define('UPLOADED_CONTACT_PATH', UPLOAD_FILES_PATH.'contact_request/');
define('CLASSES_PATH', $arrConfig['sourceRoot'].'classes/');
define('COMPONENTS_PATH', $arrConfig['sourceRoot'].'components/');  // use for file includes in php
define('COMPONENTS_SITE_PATH', $arrConfig['siteRootUrl'].'components/'); // use for images and js css
define('CONTROLLERS_PATH', $arrConfig['sourceRoot'].'controllers/');  // use for file includes in php


define('FILE_UPLOADED_PATH',$arrConfig['sourceRoot'].'common/uploaded_files');
//define('ORDER_NOW_EMAIL_ADDRESS','projects@markupbox.com');

//define('CONTACT_EMAIL','sales@markupbox.com');
define('CONTACT_EMAIL','shubham.kumar1@mail.vinove.com');

define('CONTACT_EMAIL_SUBJECT','Request A Quote');
//define('CONTACT_EMAIL_SUBJECT','Reference:Job Title');

define('EMAIL_QUOTE','shubham.kumar1@mail.vinove.com');
//define('EMAIL_QUOTE','sales@markupbox.com');


define('QUOTE_EMAIL_SUBJECT','Request A Quote For ');

//to get root path
$varSiteFsPath = dirname(__FILE__);
$varSiteFsPath = str_replace('\\', '/', $varSiteFsPath);
$arrConfig['sourceRoot'] = str_replace('/common/config', '/', $varSiteFsPath);
//includablefiles
//
//



//require_once CLASSES_PATH.'class.database.inc.php';
//require_once $arrConfig['sourceRoot'].'common/inc/table_constants.inc.php';
//require_once $arrConfig['sourceRoot'].'classes/class_general_bll.php';
//require_once $arrConfig['sourceRoot'].'classes/class_core_bll.php';
define("ORDER_FILES_UPLOADED_VIEW_PATH", UPLOAD_FILES_PATH);


// Database connection
//$db = new Database($arrConfig['DB_HOST'], $arrConfig['DB_USER'], $arrConfig['DB_PASS'], $arrConfig['DB_NAME']);
//$db->onError = $onError;
//$db->connect();
//$objCore = new Core();
//$objGeneral = new General();
$varFileName = basename($_SERVER['PHP_SELF']);
//echo $varFileName;

function uploadedFile($arrFile,$varUploadedPath,$fileName='upl',$arrExtension){
    if(!is_dir($varUploadedPath)){
        @mkdir($varUploadedPath, 0777);
    }
    $extension = pathinfo($arrFile[$fileName]['name'], PATHINFO_EXTENSION);
    if(!in_array(strtolower($extension), $arrExtension)){
        return array('status'=>'error','message'=>'An error occured while uploading the file.');
    }
    // upload files logic goes here
    $varTrimFileName = str_replace(' ', '_',trim($arrFile[$fileName]['name']));
    // $varFileName = time().'_'.$arrFile[$fileName]['name'];
    // $varFileName = time().'_'.$fileName.'.'.$extension;
    $varFileName = time().'_'.$varTrimFileName;
    if(move_uploaded_file($arrFile[$fileName]['tmp_name'], $varUploadedPath.'/'.$varFileName)){
        return array('status'=>'success','message'=>'Uploaded successfully.','fileName'=>$varFileName);

    }
}

function isMobile(){
$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
    return 1;
    } else {
        return 0;
    }
}
?>