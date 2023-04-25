<?php
require_once "models/User.php";
class Authen
{
    private User $user;
    public function login(int $mat,string $passwd)
    {
        $this->user=new User($mat);
        $prev=$this->user->connect($passwd);
        if($prev==0)
        {
            $_SESSION["msg"]="Mauvaises information d'identification";
            header("Location:/");
            die;
        }
        else
        {
            $_SESSION["mat"]=$mat;
            $_SESSION["prv"]=$prev;
            if($prev==1 || $prev==2 || $prev==3)
            {
                header("Location:/home");
                die;
            }
            else
            {
                header("Location:/");
                die;
            }
        }
    }
    public function logout()
    {
        session_destroy();
        header("Location:/");
    }
    public function get_profile(int $id):array
    {
        $this->user=new User($id);
        if(!$this->user->exist())
            return null;
        return $this->user->read();
    }
}
?>