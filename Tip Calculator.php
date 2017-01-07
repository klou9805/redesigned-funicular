<html>

<head></head>
<body>

<?php
	$bill = "";
	$radiobutton = "";
	$error = "";
	$radioerror = "";
	if($_POST)
	{
		if(isset($_POST["bill"]))
		{
			$bill = $_POST["bill"];
			//if(!is_numeric($bill) || $bill <= 0)
				//$error = "invalidinput";
		}
		if(isset($_POST["radiobutton"]))
			$radiobutton = $_POST["radiobutton"];
		//else
			//$radioerror = "radioerror";
	}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

	Bill Subtotal: $ <input type="text" name="bill" value="<?php echo $bill;?>">

	<br>Tip Percentage:<br>
<?php
	for($i = 2; $i < 5; $i++)
	{
		if($radiobutton == 5 * $i)
			echo '<input type="radio" name="radiobutton" checked="checked" value="'.(5 * $i).'"'.">".(5 * $i)."%";
		else
			echo '<input type="radio" name="radiobutton" value="'.(5 * $i).'"'.">".(5 * $i)."%";
	}
?>
    <br><input type="submit" name="submit" value="Submit">
<?php
	if(isset($bill) && isset($radiobutton) && $bill > 0 && is_numeric($bill))
	{
		$tip = $bill * $radiobutton * .01;
		$total = $bill + $tip;
		$printTip = "<br><br>Tip: $" .$tip;
		$printTotal = "<br>Total: $" .$total;
		echo $printTip;
		echo $printTotal;
	}
	/*
	else if($radioerror == "radiobutton" && $error == "invalidinput")
	{
		echo "<br>Invalid Input and Percentage Not Selected";
	}
	else if($radioerror == "radioerror" || $radiobutton == "" )
	{
		echo "<br>Select a Percentage";
	}
	else if($error == "invalidinput")
	{
		echo "<br>Invalid Input";
	}
	*/
?>
</form>
</body>

</html>