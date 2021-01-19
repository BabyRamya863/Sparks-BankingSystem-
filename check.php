<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<!--<h1>Hello</h1>-->
<?php
	$rec;$num;$id;
	if(isset($_POST['submit']))
	{
		$rec=$_POST['reciever'];
		$amount=$_POST['num'];
		$sender=$_POST['sender'];
	}
	$rec1=explode("_", $rec);
	$reciever_id=$rec1[0];
	$reciever_name=$rec1[1];
	$sender=explode("_", $sender);
	$sender_id=$sender[0];
	$sender_name=$sender[1];
	$sender_balance=$sender[2];
	//echo $sender_id."  ".$rec." Amount ".$amount." " .$sender_name;
	//echo $sender_id."   ".$sender_name."    ".$sender_balance."    ".$amount;
		$conn = new mysqli("localhost", "root", "", "spark");
		$minus=$sender_balance-$amount;
		$s="UPDATE user_details SET balance='$minus' WHERE id='$sender_id' ";
		$result = $conn->query($s);
		$r="SELECT * FROM user_details WHERE id='$reciever_id'";
		$result1 = $conn->query($r);
		$row1 = $result1 -> fetch_assoc();
		$plus=$row1["balance"]+$amount;
		$r1="UPDATE user_details SET balance='$plus' WHERE id='$reciever_id' ";
		$result1 = $conn->query($r1);
		//Inserting into tranactions table;
		$ins="INSERT INTO transactions(SENDER, RECIEVER, AMOUNT) VALUES('$sender_name','$reciever_name',$amount)";
		if(!mysqli_query($conn,$ins))
		{
			echo "<script type='text/JavaScript'>alert('Your transactions is not successful');</script>";
		}
		else{
			//echo "inserted";
			echo "<script type='text/JavaScript'>alert('Successfully Transfered');</script>";
		}
		$result -> free_result();
	$conn->close();
?>
</body>
</html>