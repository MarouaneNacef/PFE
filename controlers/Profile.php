<?php
require_once "models/User.php";
class Profile
{
    private User $user;
    public function get_emp_list():array
    {
        $this->user=new User(null);
        return $this->user->read_all();
    }
    public function get_emp(int $id):array
    {
        $this->user=new User($id);
        if(!$this->user->exist())
            return null;
        return $this->user->read();
    }
}
?>