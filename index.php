<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	require "db.php"; 
	include "connect.php";
	//require_once 'connect.php';


?>


<?php
//$workers = mysqli_query($connect, query:"SELECT * FROM 'users'");
//var_dump($workers);
//?>


<?php if( isset($_SESSION['logged_user'])): ?>
	Авторизован!<br>
	Здравствуйте, <?php echo $_SESSION['logged_user']->name; ?>!<hr>
	<a href="logout.php">Выйти</a>
<?php else : ?>
	Вы не авторизованы!<br>
	<a href="/login.php">Авторизация</a><br>
	<a href="/signup.php">Добавить сотрудника</a><br>
	Список сотрудников:<br>

<?php
$result = mysqli_query($connect, "SELECT * FROM `users`");

while ($workers = mysqli_fetch_assoc($result))
{
	echo $workers['surname']; echo "&nbsp"; echo $workers['name']; echo "&nbsp"; echo $workers['patronymic']; echo "&nbsp"; echo $workers['role']; echo "&nbsp"; echo $workers['work_number'];
	echo "<br>";
}
?>
<?php endif; ?>