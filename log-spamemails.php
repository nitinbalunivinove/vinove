<?php
$uname = "admin";
$pwd   = "SpamLister@2020#";
$errroMsg = "";
session_start();

if( isset( $_POST['login-action'] ) ){
    if($_POST['uname'] == $uname && $_POST['pwd'] == $pwd){
        $_SESSION['ulogin_check'] = true;
    }else{
        $errroMsg  = "Incorrect Login Details";
    }
}

if( isset( $_GET['action'] ) && ($_GET['action'] == "logout") ){
    unset($_SESSION['ulogin_check']);
}
$jsonFile = ( $_SERVER['HTTP_HOST'] == "localhost" ) ? "/var/www/html/spamemails.json" : "/home/vinovec/vinove-leads/spamemails.json";
if(isset($_GET['delete_id'])){
    $delete_id = $_GET['delete_id'];
    $data = file_get_contents($jsonFile);
    $data = json_decode($data, true);
    unset( $data[$delete_id] );
    $fdata = array_values($data);
    $data = json_encode($fdata, JSON_PRETTY_PRINT);
    file_put_contents($jsonFile, $data);
    header('location: log-spamemails.php'); 
}

if(isset($_POST['btnadd'])){
$isDuplicate = false;
$data = file_get_contents($jsonFile);
$data = json_decode($data, true);
if( $data ){
    if( in_array( $_POST['txtEmail'], $data ) ){
        $isDuplicate = true;
        $errroMsg  = "{$_POST['txtEmail']} Email Address already exists";
    }else{
        $emails = array_merge( $data, array( $_POST['txtEmail'] ) );    
    }
}else{
    $emails = array( $_POST['txtEmail'] );
}
if( $isDuplicate === false ){
    $fdata = json_encode($emails, JSON_PRETTY_PRINT);
    file_put_contents($jsonFile, $fdata);    
}
} 
?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Spam Emails</title>
    <style type="text/css">
    body{ position: relative; margin-top: 30px; }
    a.logout{ position: absolute; top: 20px; right: 20px; }
    h3{ text-align: center; font-size: 16px; padding: 10px; border: 1px solid red; width: auto; }
    .container{width: 50%; margin: 0 auto;}
    table{border-collapse: collapse;}
    th, td{text-align: left; padding: 10px;}    
    </style>
 </head>
 <div class="container">
 <body>
     <!-- RENDER INPUT DATA INTO JSON FORMAT -->
    <?php 
    if( isset($_SESSION['ulogin_check']) &&  ($_SESSION['ulogin_check'] === true) ) { 
    ?>
     <table border="1" align="center">
        <tr>
            <th>Emails</th>
            <th>Action</th>
        </tr>     
             <?php
                $data = file_get_contents($jsonFile);
                $data = json_decode($data);
                $index = 1;
                if(!empty($data)){ 
                foreach($data as $key => $row){
                ?>
                <tr>
                <td><?php echo $row; ?></td>
                <td><a href="log-spamemails.php?delete_id=<?php echo $key; ?>" onclick="return confirm('Are you sure you want to delete this Email')">Delete</a> </td>
                </tr>
                <?php
                $index++;
                }
    }
    ?>
    </table>
         <!-- On Submitting form Data -->
        <?php if( $errroMsg ) : ?>   
        <h3><?php echo $errroMsg; ?></h3>
        <?php endif; ?>
         <form method="post">
             <table align="center">
                 <tr>
                     <td colspan="2" align="center">Add Record</td>
                 </tr>


                 <tr>
                     <td>Email</td>
                     <td><input type="email" name="txtEmail"> </td>
                 </tr>

                 <tr>
                     <td colspan="2" align="center"><input type="submit" value="Add" name="btnadd"> </td>
                 </tr>
             </table>
            <a href="log-spamemails.php?action=logout" class="logout">Logout</a>
         </form>
         <?php }else{ ?>
         <!-- LOGIN FORM -->
         <div class="loginForm">
            <?php if( $errroMsg ) : ?>   
            <h3><?php echo $errroMsg; ?></h3>
            <?php endif; ?>
             <form method="post" action="log-spamemails.php">
                 <input type="mail" placeholder="Enter username" name="uname" style="margin:5px"><br>
                 <input type="password" placeholder="Enter Password" name="pwd" style="margin:5px"><br>
                 <button type=" submit" name="login-action" style="margin:5px">Login</button>
             </form>
         </div>
         <?php } ?>
</div>         
 </body>
 </html>