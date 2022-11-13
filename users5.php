<?php
abstract class UserAbstract
{
    abstract protected function showInfo();
}
class User extends UserAbstract
{
    public $name;
    public $login;
    public $password;
    static $count = 0;
    function showInfo(){
        echo "<br/>Имя: $this->name <br/>Логин: $this->login <br/>Пароль: $this->password<br/>";
    }
    function __construct(string $name, string $login, string $password)
    {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
        User::$count++;
    }
    
}

interface ISuperUser
{
    function getInfo();
}
interface IAuthorizeUser
{
    function auth($login, $password);
}
class SuperUser implements IAuthorizeUser
{
    public $name;
    public $login;
    public $password;
    public $role;
    static $count = 0;
    function __construct(string $name, string $login, string $password, string $role)
    {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
        $this->role = $role;
        SuperUser::$count++;
    }
    function showInfo(){
        echo "<br/>Имя: $this->name <br/>Логин: $this->login <br/>Пароль: $this->password <br/>Роль: $this->role <br/><br/>";
    
    }
    function getInfo(){
        $refClas = new ReflectionClass($this);
        $prop = $refClas->getProperties();
        
        $result = [];
        foreach ($prop as $attribute) {
            $name = $attribute->getName();
            $result[$name] = $this->{$name};
        }
        
        return $result;
    }
    function auth($login,$password){
        if($login == $this->login and $password == $this->password){
            return true . '<br/><br/> True<br/>';
        }else{
            return false . ' False<br/><br/>';
        }
    }
    
}

$user = new User('Arys', 'Arystan','password');
$user->showInfo();

$user2 = new User('Taha', 'Taikhan','password');
$user2->showInfo();

$user3 = new User('Aru', 'Aruzhan','password');
$user3->showInfo();

$user = new SuperUser('admin', 'admin', 'administrator', 'administrator');
$user->showInfo();

print_r($user->getInfo());

echo $user->auth('admin', 'administrator');
echo $user->auth('Taikhan', 'password1');

$res = get_class_vars('User');
echo "Всего обычных пользователей: {$res['count']}<br>";
$resSuper = get_class_vars('SuperUser');
echo "Всего суперөпользователей: {$resSuper['count']}<br>";