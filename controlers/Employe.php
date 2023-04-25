<?php
require_once "models/User.php";
require_once "models/Visit.php";
require_once "models/Demande.php";
class Employe
{
    private Visit $v;
    private Demande $d;
    
    public function get_visit(int $id):array
    {
        $this->v=new Visit(null,false,$id_emp=$id,null);
        return $this->v->read_emp();
    }
    public function set_demande(int $id_v)
    {
        $this->d=new Demande(null,$id_v);
        if($this->d->exist())
            return false;
        $created=$this->d->create();
        return $created;
        
    }
    public function get_demande(int $id):array
    {
        $this->d=new Demande();
        return $this->d->read_emp($id);
    }
    public function rm_demande(int $id):bool
    {
        $this->d=new Demande(null,$id);
        $deleted=$this->d->delete();
        return $deleted;
    }
}
?>