<?php
	require "db.php"; 

	$data = $_POST;
	if( isset($data['do_signup']) )
	{
		$errors = array();
		if( trim($data['login']) == '')
		{
			$errors[] = 'Введите логин!';
		}

		if( trim($data['password']) == '')
		{
			$errors[] = 'Введите пароль!';
		}

		if( trim($data['surname']) == '')
		{
			$errors[] = 'Введите фамилию!';
		}

		if( trim($data['name']) == '')
		{
			$errors[] = 'Введите имя!';
		}

		if( trim($data['role']) == '')
		{
			$errors[] = 'Введите должность!';
		}

		if( trim($data['address']) == '')
		{
			$errors[] = 'Введите адрес!';
		}

		if( trim($data['work_number']) == '')
		{
			$errors[] = 'Введите рабочий телефон!';
		}

		if( trim($data['private_number']) == '')
		{
			$errors[] = 'Введите личный телефон!';
		}

		if( R::count('users', "login = ?", array($data['login']))>0 )
		{
			$errors[] = 'Сотрудник с таким логином уже существует!';
		}

		if( R::count('users', "work_number = ?", array($data['work_number']))>0 )
		{
			$errors[] = 'Сотрудник с таким рабочим телефоном уже существует!';
		}

		if( empty($errors))
		{
			$user = R::dispense('users');
			$user->login = $data['login'];
			$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
			$user->surname = $data['surname'];
			$user->name = $data['name'];
			$user->patronymic = $data['patronymic'];
			$user->role = $data['role'];
			$user->address = $data['address'];
			$user->work_number = $data['work_number'];
			$user->private_number = $data['private_number'];
			R::store($user);
			echo '<div style="color: green;">Сотрудник добавлен!</div><hr>';
		} else
		{
			echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
		}
	}
?>

<form action="/signup.php" method="POST">

	<p>
		<p><strong>Логин</strong>:</p>
		<input type="text" name ="login" value="<?php echo @$data['login']; ?>">
	</p>

	<p>
		<p><strong>Пароль</strong>:</p>
		<input type="text" name ="password" value="<?php echo @$data['password']; ?>">
	</p>

	<p>
		<p><strong>Фамилия</strong>:</p>
		<input type="text" name ="surname" value="<?php echo @$data['surname']; ?>">
	</p>

	<p>
		<p><strong>Имя</strong>:</p>
		<input type="text" name ="name" value="<?php echo @$data['name']; ?>">
	</p>

	<p>
		<p><strong>Отчество</strong>:</p>
		<input type="text" name ="patronymic" value="<?php echo @$data['patronymic']; ?>">
	</p>

	<p>
		<p><strong>Должность</strong>:</p>
		<input type="text" name ="role" value="<?php echo @$data['role']; ?>">
	</p>

	<p>
		<p><strong>Адрес</strong>:</p>
		<input type="text" name ="address" value="<?php echo @$data['address']; ?>">
	</p>

	<p>
		<p><strong>Рабочий телефон</strong>:</p>
		<input type="text" name ="work_number" value="<?php echo @$data['work_number']; ?>">
	</p>

	<p>
		<p><strong>Личный телефон</strong>:</p>
		<input type="text" name ="private_number" value="<?php echo @$data['private_number']; ?>">
	</p>

	<p>
		<button type="submit" name="do_signup">Добавить</button>
	</p>
</form>
