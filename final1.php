<?php
$servername = "localhost";
$sname = $_POST['sname'];
$email = $_POST['email'];
$subjects = $_POST['subjects'];
$messages = $_POST['messages'];
// Create connection
$conn = mysqli_connect($servername, "root","","nipuna22");_
// Check connection
if(!$conn) {
// die("Connection failed");
}
else{
    $qry="insert into contact(sname,email,subjects,messages)
VALUES ('$sname','$email','$subjects','$messages')";
$res=mysqli_query($conn,$qry);
if(!$res){
	// die("Connection failed: " . mysqli_connect_error());
  echo "<script>
  alert('TRY AGAIN');
</script>";
}
else {
// echo "Success";

 echo "<script>
alert('successfully registered. Thank You');
 </script>";

 
    // $stmt = $conn->prepare("insert into hei(fname,lname,clgid,email,pwd,rrc,ic,ec)values(?, ?, ?, ?,?,?,?,?)");
    // $stmt->bind_param("ssssssss",$fname,$lname,$clgid,$email,$pwd,$rrc,$ic,$ec);
    // $stmt->execute();
    // $stmt->close();
    // $conn->close();
}}

?>