<?php
class user
{
    public $name;
    public $login;
    public $password;

    function showInfo()
    {
        echo "Имя: $this->name<br>";
        echo "логин: $this->login <br>";
        echo "пароль: $this->password <br> <br>";
    }

    function __construct(string $name, string $login, string $password)
    {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
    }

}
class SuperUser extends user
{
    public $role;
    function __construct(string $name, string $login, string $password, string $role)
    {
        parent::__construct($name, $login, $password);
        $this->role;
    }
    function showInfo()
    {
        echo "Имя: $this->name<br>";
        echo "логин: $this->login <br>";
        echo "пароль: $this->password <br> <br>";
    }
}

$user = new User('Arys', 'Arystan','password');
$user->showInfo();

$user2 = new User('Taha', 'Taikhan','password');
$user2->showInfo();

$user3 = new User('Aru', 'Aruzhan','password');
$user3->showInfo();

$user= new SuperUser('admin','admin','administrator','admin');
$user->showInfo();
?>