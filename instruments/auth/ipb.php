<?php
if (!defined('MCR')) exit;

require(MCR_ROOT.'instruments/auth/usual.php');

Class MCMSAuth {

/* Загрузка API главной CMS */

public static function start() { return; } 

/* Проверка авторизации пользователя в главной CMS */

public static function userLoad() { return; } 

/* Авторизация пользователя в главной CMS */

public static function login($id) { return; } 

/* Выход пользователя в главной CMS */

public static function logout() { return; }

/* Проверка авторизации пользователя в webMCR */

public static function userInit() { 
MCRAuth::LoadSession();
}

/* Генерация пароля */

public static function createPass($password) { 	
	return 0;
}

/* 
	Проверка пароля при авторизации 
	data [4]
	'pass_db'	 - зашифрованный пароль из БД, 
	'pass'		 - введенный пароль
	'user_id'	 - идентификатор пользователя
	'user_name'	 - логин пользователя
*/

public static function checkPass($data) { 
global $bd_names, $bd_users;

    $sql = "SELECT `{$bd_users['salt_pwd']}` FROM `{$bd_names['users']}` "
          . "WHERE `{$bd_users['id']}`=:id"; 

    $result = getDB()->fetchRow($sql, array('id' => (int)$data['user_id']), 'num');
    if (!$result) return false;

    if ($data['pass_db'] == md5(md5($result[0]).md5($data['pass']))) return true;
    else return false;
}

}