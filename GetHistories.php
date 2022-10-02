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





$query = "SELECT DRCard,TGCard from Bets ORDER BY Time DESC LIMIT 20";



if($result = mysqli_query($dblink, $query)){
    
	    $testrow=mysqli_fetch_all($result, MYSQLI_ASSOC);
	    $fg=array();
	    $D=0;$T=0;
	    for($i=0;$i<count($testrow);$i++)
	    {
	        if($testrow[$i]['DRCard'] > $testrow[$i]['TGCard'])
	        {
	          $D++;  
	        }
	        elseif($testrow[$i]['DRCard'] < $testrow[$i]['TGCard'])
	        {
	          $T++;  
	        }
	        
	    }
	    $DR=array('D' => $D/20);
	    $TR=array('T' => $T/20);
	    array_push($fg,$DR,$TR);
	    $TRG=array();
	    for($i=0;$i<8;$i++)
	    {
	        array_push($TRG,$testrow[$i]);
	        
	    }
		$dataArray = array('Values' => $TRG,'Ratio' => $fg);
		
	}
		else{
			$dataArray = array('success' => false, 'Message' => 'Could not Get Card, try again later.');
		}


// $result = mysqli_query($dblink, $query);

// $row = mysqli_affected_rows($dblink);
// if($row){
// 	$dataArray = array('success' => true, 'Message' => 'Bets Cleared ');
// } else{
	
//     $dataArray = array('success' => false, 'Message' => 'Could not Clear, try again later.');

// }



echo json_encode($dataArray);
?>