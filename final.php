<?php
 include_once('index.html');
//session_start()



// Create connection
$conn = mysqli_connect("localhost","root","","nipuna22");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else
{
  echo "connected";
}


extract($_POST); 

    
	//	$gender=$_POST['gender'];
              $sname=$_POST['sname'];
              $email=$_POST['email'];
       $phno=$_POST['phno'];
		$city=$_POST['city'];
		$cname=$_POST['cname'];
     $yos=$_POST['yos'];
     $dept=$_POST['dept'];
    //  $rphone=$_POST['referralphone'];
    //  $tid=$_POST['usename'];
    //  $dept=$_POST['dept'];




      
		
  
         
         $chkNew="";

              $chkNew1="";

              $SUM=[];
        
if(!empty($_POST['all'])) {


// Loop to store and display values of individual checked checkbox.
foreach($_POST['all'] as $chkNew1) 
{ 
        $chkNew .= $chkNew1. ","; 
        $Q= "select * from eventmoneyta where eventname='$chkNew1'";
        $result = mysqli_query($conn, $Q);
      
        if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) {
            array_push($SUM,$row["eventmoney"]);
          }
        }
        // array_push($SUM,);
} 
// echo "<p>".$chkNew ."</p>";
}

else
{
  echo "<script>
  alert('select events');
 
</script>";
}
$res1=array_sum($SUM);

$qry="insert into register(sname,email,phno,cname,yos,dept,events,moneypayed)
VALUES ('$sname','$email','$phno','$cname','$yos','$dept','$chkNew','$res1')";

$res=mysqli_query($conn,$qry);

$GLOBALS['z']=$GLOBALS['res1'];
if(!$res){
	// die("Connection failed: " . mysqli_connect_error());
  echo "<script>
  alert('TRY AGAIN');
</script>";
}
else {
// echo "Success";


 echo "<script>
alert('Amount to be paid :$res1, proceed to payment.Thankyou');
window.location.href='finall.html';
 </script>";
 
 
 
 
}
mysqli_close($conn);
 
// header("Location:finall.html"); 
// exit();
header("location: finall.html");
exit();
?>


