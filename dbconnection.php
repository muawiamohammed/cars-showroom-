<?php
$db=mysqli_connect("localhost","root","12345678","car");
if(!$db)
{
	die("could not connect".mysqli_error());
}
?>