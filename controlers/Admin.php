<?php
require_once "models/User.php";
class Admin extends Profile
{
    private User $user;
    public function creat_acc(array $data)
    {
        $this->user=new User($data);
        if($this->user->exist())
        {
            return false;
        }
        $created=$this->user->create();
        return $created;
    }
    public function delete_acc(int $id):bool
    {
        $v=new Visit(null,false,$id,null);
        $this->user=new User($id);
        if(!$this->user->exist())
            return false;//error message
        $v->delete_emp();
        $deleted=$this->user->delete();
        return $deleted;
    }
    public function edit_acc(int $id_emp,array $data)
    {
        $this->user=new User($id_emp);
        if(!$this->user->exist())
            return false;
        $updated=$this->user->update($data);
        return $updated;
    }
}
?>