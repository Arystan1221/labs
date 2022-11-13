<?php
spl_autoload_register(function ($class_name) {
    include 'classes/'.$class_name.'.class.php';
});

$user = new User('Arys', 'Arystan','password');
$user->showInfo();

$user2 = new User('Taha', 'Taikhan','password1');
$user2->showInfo();

$user3 = new User('Aru', 'Aruzhan','password');
$user3->showInfo();

$user = new SuperUser('admin', 'admin', 'administrator', 'administrator');
$user->showInfo();


print_r($user->getInfo());

echo $user->auth('admin', 'administrator');
echo $user->auth('Taikhan', 'password1');

$res = get_class_vars('User');
echo "Всего обычных пользователей: {$resCountUser['count']}<br>";
$resSuper = get_class_vars('SuperUser');
echo "Всего суперөпользователей: {$resSuper['count']}<br>";