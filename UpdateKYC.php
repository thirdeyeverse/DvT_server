<?php
 include 'config.php';
$dbport = 3306;
// $dbuser = 'root';
// $dbpassword = '';
// $db = 'game';
// $dbhost = 'localhost';
// $dbport = 3306;





$dblink = mysqli_init();
$dbconnection = mysqli_real_connect($dblink, $dbhost, $dbuser, $dbpassword, $db, $dbport);

if($dbconnection) {

}
else{
	die("connection failed" . mysql_error());
}

$username = $_POST['usrname'];
$phone = $_POST['phone'];
$uid=$_POST['uid'];
$type=$_POST['type'];

$i=1;


    
if($type == 0)
{
    $pid=$_POST['pid'];
    $query1 ="UPDATE users SET KYC=KYC+'$i' WHERE userid='$uid'";
    $qu = "UPDATE users SET PayTmKYC=1 WHERE userid='$uid'";
    $result1 = mysqli_query($dblink, $query1);
    
    $row1 = mysqli_affected_rows($dblink);
    
    if($row1)
    {
        
            //$phone=$_POST['phone'];
            
            
            
            $res = mysqli_query($dblink, $qu);
            $row2 = mysqli_affected_rows($dblink);
            if($row2)
            {
                $query = "INSERT INTO PayTm (userid,phone,paytmid) VALUES ('$uid','$phone','$pid')";
                if($result = mysqli_query($dblink, $query))
                {
                    $dataArray = array('success' => true, 'error' => '',  'Message' => "KYC Updated Successfully");
                }
                else{
                    //$r=mysqli_fetch_row($result);
                    $dataArray = array('success' => false, 'Message' => 'Requesttttt not completed, try again later.');
                }
            }
            else
            {
                $dataArray = array('success' => false, 'Message' => 'RRRRRRequest not completed, try again later.');
            }
    }
    else
    {
        $dataArray = array('success' => false, 'Message' => 'Could not update, try again later.');
    }
    
            
    
    
    
}
else if($type == 1)
{
    $upid=$_POST['upiid'];
    $query1 ="UPDATE users SET KYC=KYC+'$i' WHERE userid='$uid'";
    $qu = "UPDATE users SET UPIKYC=1 WHERE userid='$uid'";
    $result1 = mysqli_query($dblink, $query1);
    
    $row1 = mysqli_affected_rows($dblink);
    
    if($row1)
    {
        
                //$phone=$_POST['phone'];
                
                
                
                $res = mysqli_query($dblink, $qu);
                $row2 = mysqli_affected_rows($dblink);
                if($row2)
                {
                    $query = "INSERT INTO UPI (userid,phone,UPIid) VALUES('$uid','$phone','$upid')";
                    if($result = mysqli_query($dblink, $query))
                    {
                        $dataArray = array('success' => true, 'error' => '',  'Message' => "KYC Updated Successfully");
                    } else{
                        $dataArray = array('success' => false, 'Message' => 'Request not completed, try again later.');
                    }
                }
                else
                {
                    $dataArray = array('success' => false, 'Message' => 'Request not completed, try again later.');
                }
    }
    else
    {
        $dataArray = array('success' => false, 'Message' => 'Could not update, try again later.');
    }
                
        
}
else if($type == 2)
{
    $accnum=$_POST['accnum'];
    $ifsc=$_POST['ifsc'];
    $query1 ="UPDATE users SET KYC=KYC+'$i WHERE userid='$uid'";
    $qu = "UPDATE users SET BankKYC=1 WHERE userid='$uid'";
    $result1 = mysqli_query($dblink, $query1);
    
    $row1 = mysqli_affected_rows($dblink);
    
    if($row1)
    {
        
            //$phone=$_POST['phone'];
            
            
            
            $res = mysqli_query($dblink, $qu);
            $row2 = mysqli_affected_rows($dblink);
            if($row2)
            {
                $query = "INSERT INTO Banking (userid,username,phone,AccNum,IFSC) VALUES('$uid','$username','$phone','$accnum','$ifsc')";
                if($result = mysqli_query($dblink, $query))
                {
                    $dataArray = array('success' => true, 'error' => '',  'Message' => "KYC Updated Successfully");
                } else{
                    $dataArray = array('success' => false, 'Message' => 'Request not completed, try again later.');
                }
            }
            else
            {
                $dataArray = array('success' => false, 'Message' => 'Request not completed, try again later.');
            }
    }
    else
    {
        $dataArray = array('success' => false, 'Message' => 'Could not update, try again later.');
    }
    
        
}
    
    
   
    
    
	




echo json_encode($dataArray);
?>