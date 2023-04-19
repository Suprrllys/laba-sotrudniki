<?php

$par1_ip = "localhost";
$par2_name = "mysql";
$par3_p = "mysql";
$par4_db = "laba1";

$connect = mysqli_connect($par1_ip, $par2_name, $par3_p, $par4_db);

if ($connect == false)
{
	echo "Ошибка подключения";
}


?>