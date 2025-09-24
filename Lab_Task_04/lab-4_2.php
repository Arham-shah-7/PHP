<html>
<head>
	<title>Form</title>
</head>
<body>
<?php
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$num=$_POST["num"];
		switch($num)
		{
			case 1:
			$res="Monday";
			break;
			case 2:
			$res="Tuesday";
			break;
			case 3:
			$res="Wednesay";
			break;
			case 4:
			$res="Thursday";
			break;
			case 5:
			$res="Friday";
			break;
			case 6:
			$res="Saturday";
			break;
			case 7:
			$res="Sunday";
			break;
		}
	}
?>
	<form method="POST">
		<table border="1">
			<tr>
				<th>Enter Number:</th>
				<td> <input type="number" name="num"> </td>
			</tr>
			<tr>
				<td>Day of Week:</td>
				<td><?php echo $res; ?></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="Submit"></td>
			</tr>
		</table>
	</form>
</body>
</html>