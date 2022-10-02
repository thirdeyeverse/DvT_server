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


#$Round = $_POST['round'];

$userid = $_POST['usr'];

$query = "SELECT username,userid FROM users WHERE Playing='1' AND userid !='$userid' LIMIT 25";

$result = mysqli_query($dblink, $query);


$row = mysqli_fetch_all($result, MYSQLI_ASSOC);


$testquery="SELECT username,userid FROM users WHERE Playing='1' AND userid !='$userid'";
$testresult = mysqli_query($dblink, $testquery);
$testrow=mysqli_fetch_all($testresult, MYSQLI_ASSOC);

#$row = mysqli_fetch_row($result);
if($row){

    $c= count($row);

    $Datan=array();
    $totalPlayers=0;

    for($i=0;$i<count($testrow);$i++)
    {
        $totalPlayers++;
    }

    for($i=0;$i<$c;$i++)
    {
        $ar=array("user"=>$row[$i]["username"],"Id"=>$row[$i]["userid"]);
        array_push($Datan,$ar);
        
    }

    if($c<25)
    {
        $k=25-$c;
        for($i=0;$i<$k;$i++)
        {
            $ii=$i+10001;
            $ar=array("user"=>"Guest {$ii}","Id"=>$ii);
            array_push($Datan,$ar);
            $totalPlayers++;
        }
        
    }
    

    
	$dataArray = array("Values" => $Datan,"Players"=>$totalPlayers);

} 
else{

    $c= count($row);

    $totalPlayers=0;

    for($i=0;$i<count($testrow);$i++)
    {
        $totalPlayers++;
    }

    $k=25-$c;
    $dummy=array();

    if($c<25)
    {
        
        for($i=0;$i<$k;$i++)
        {
            $ii=$i+10001;
            $ar=array("user"=>"Guest {$ii}","Id"=>$ii);
            array_push($dummy,$ar);
            $totalPlayers++;
        }
       
        
    }
    $dataArray = array("Values" => $dummy,"Players"=>$totalPlayers);

	
}

mysqli_free_result($result);

echo json_encode($dataArray);
?>