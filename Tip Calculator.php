<html>

<head></head>
<body>

<?php
	$bill = "";
	$radiobutton = "";
	$bilerror = false;
	$radioerror = false;
	$custompercentage = "";
	$custompercentageerror = false;
	$split = 1;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if($_POST)
	{
		if(isset($_POST["bill"]))
		{
			$bill = $_POST["bill"];
			if((!is_numeric($bill) || $bill <= 0) && isset($bill))
				$billerror = true;

		}
		if(isset($_POST["radiobutton"]))
			$radiobutton = $_POST["radiobutton"];
		//else
			//$radioerror = "radioerror";
	}
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

	Bill Subtotal: $ <input type="text" name="bill" value="<?php echo $bill;?>" <?php if($billerror = true) {echo 'style="color:red">';}?>

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

<?php
	echo '<br><input type="radio" name = radiobutton" value="-1"';
	if($radiobutton == "custom")
		echo "checked";

		echo '> Custom: ';
?>
		<input type="text" name="customradiobutton" value="<?php echo $custompercentage;?>";<br><br>
	

	<br>Split: <input type="text" name="split" value="<?php echo $split;?>"person(s);<br><br>
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

?>
</form>
</body>

</html>