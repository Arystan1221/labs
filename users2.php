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
    function __construct(string $name, string $login, string $password)
    {
        $this->name = $name;
        $this->login = $login;
        $this->password= $password;
    }
    function __destruct()
    {
        echo "Пользователь $this->login удален </br>";
    }

}
$user = new User('Arys', 'Arystan','password');
$user->showInfo();

$user2 = new User('Taha', 'Taikhan','password');
$user2->showInfo();

$user3 = new User('Aru', 'Aruzhan','password');
$user3->showInfo();



?>

