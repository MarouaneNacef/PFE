<?php
    class Demande
    {
        private $db;
        private int $id;
        private int $id_v;

        public function __construct(int $id=null,int $id_v=null)
        {
            if(!is_null($id))
            {
                $this->id=$id;
            }
            if(!is_null($id_v))
            {
                $this->id_v=$id_v;
            }
            try
            {
                $this->db=new PDO("mysql:host=127.0.0.1;dbname=PFE","root","root@mysql");
            }
            catch(PDOException $e)
            {
                header("location:/error");
                die;
            }
        }
        public function create():bool
        {
            $st=$this->db->prepare("insert into Demande (id_v) values (?)");
            $created=$st->execute(array($this->id_v));
            return $created;
        }
        public function read_med($id_med):array
        {
            $st=$this->db->prepare("select date,heure,id_emp,id_v FROM Visit,Demande WHERE Visit.id=Demande.id_v and Visit.id_med=?");
            $st->execute(array($id_med));
            $data=array();
            while($raw=$st->fetch(PDO::FETCH_ASSOC))
                $data[]=$raw;
            return $data;
        }
        public function read_emp($id_emp):array
        {
            $st1=$this->db->prepare("SELECT date,heure,id_med,id_v FROM Visit,Demande WHERE Visit.id=Demande.id_v and Visit.id_emp=?");
            $st1->execute(array($id_emp));
            $data=array();
            while($raw=$st1->fetch(PDO::FETCH_ASSOC))
                $data[]=$raw;
            return $data;
        }
        public function delete()
        {
            $st=$this->db->prepare("delete from Demande where id_v=?");
            $deleted=$st->execute(array($this->id_v));
            return $deleted;
        }
        public function exist():bool
        {
            $st=$this->db->prepare("SELECT count(id_v) from Demande where id_v=?");
            $st->execute(array($this->id_v));
            $var=$st->fetch(PDo::FETCH_ASSOC);
            return (bool)$var["count(id_v)"];
        }
    }
?>