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
    function __construct(string $name, string $login, string $password, string $role)
    {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
        $this->role = $role;
    }
    function showInfo(){
        echo "$this->name | $this->login | $this->password | $this->role <br/>";
    
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
            return true . ' True';
        }else{
            return false . ' False';
        }
    }
}

$user1 = new User('Arys','Arystan','password');
$user1->showInfo();

$user2 = new User('Taha','Taikhan','password');
$user2->showInfo();

$user3 = new User('Aru','Aruzhan','password');
$user3->showInfo();

$user = new SuperUser('admin','admin','administrator','administrator');
$user->showInfo();

print_r($user->getInfo());

echo $user->auth('admin', 'administrator');
echo $user->auth('Taikhan', 'password1');