<?php
class user{
    public $name;
    public $login;
    public $password;

    function showInfo(){
        echo "Имя: $this->name<br>";
        echo "логин: $this->login <br>";
        echo "пароль: $this->password <br> <br>";
    }



}
$user1 = new User ();
$user2 = new User ();
$user3 = new User ();

$user1 -> name = "arystan";
$user1 -> login = "arys";
$user1 -> password = "1234";
$user1 -> showInfo();

$user2 -> name = "Taha";
$user2 -> login = "Taikhan";
$user2 -> password = "2321312";
$user2 -> showInfo();

$user3 -> name = "Yera";
$user3 -> login = "Yernar";
$user3 -> password = "3456456asd";
$user3 -> showInfo();
?>