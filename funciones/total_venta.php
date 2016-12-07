<?php
session_start();
include('core.php');
$key=$_POST['key'];
$suma=sumar_filas($key);
if ($row = mysqli_fetch_row($suma)) {
$subtotal = trim($row[0]);
}
$total=$_SESSION['total']+$subtotal;
echo $total;