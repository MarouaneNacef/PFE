<?php
    class Visit
    {
        private $db;
        private int $id;
        private int $id_med;
        private int $id_emp;
        private string $date;
        private string $heure;
        private string $ordonnance;
        private string $conclusion;
        private string $nature;
        private bool $valid;
        
        public function __construct($param=null,bool $validate=false,int $id_emp=null,int $id_med=null)
        {
            if(!is_null($id_med))
                $this->id_med=$id_med;
            if(!is_null($id_emp))
                $this->id_emp=$id_emp;
            if(is_int($param)&&!is_null($param))
                $this->id=$param;
            if(is_array($param)&&!is_null($param))
            {
                $this->id_med=$param["id_med"];
                $this->id_emp=$param["id_emp"];
                $this->date=$param["date"];
                $this->heure=$param["heure"];
                $this->nature=$param["nature"];
            }
            if($validate)
            {
                $this->valid=1;
            }
            try
            {
                $this->db=new PDO("mysql:host=127.0.0.1;dbname=PFE","root","root@mysql");
            }
            catch(PDOException $e)
            {
                header("Location:/error");
                die;
            }
        }
        public function create():bool
        {
            $st=$this->db->prepare("INSERT into Visit(id_med,id_emp,date,heure,nature,valid) values (?,?,?,?,?,0)");
            $created=$st->execute(array($this->id_med,$this->id_emp,$this->date,$this->heure,$this->nature));
            return $created;
        }
        public function read_med():array
        {
            $st=$this->db->prepare("select * from Visit where id_med=?");
            $st->execute(array($this->id_med));
            $data=array();
            while($raw=$st->fetch(PDO::FETCH_ASSOC))
                $data[]=$raw;
            return $data;
        }
        public function read_med_nv($date):array
        {
            $st=$this->db->prepare("select id,id_emp,date,heure from Visit where id_med=? and valid=0 and date=?");
            $st->execute(array($this->id_med,$date));
            $data=array();
            while($raw=$st->fetch(PDO::FETCH_ASSOC))
                $data[]=$raw;
            return $data;
        }
        public function read_emp():array
        {
            $st=$this->db->prepare("select * from Visit where id_emp=?");
            $st->execute(array($this->id_emp));
            $data=array();
            while($raw=$st->fetch(PDO::FETCH_ASSOC))
                $data[]=$raw;
            return $data;
        }
        public function update(array $param):bool
        {
            $st=$this->db->prepare("update Visit set date=?,heure=? where id=?");
            $param[]=$this->id;
            $updated=$st->execute($param);
            return $updated;
        }
        public function validate(string $conclusion,string $ordonnance)
        {
            $st=$this->db->prepare("update Visit set ordonnance=?,conclusion=?,valid=1 where id=?");
            $st->execute(array($ordonnance,$conclusion,$this->id));
        }
        public function delete():bool
        {
            $st=$this->db->prepare("delete from Visit where id=?");
            $deleted=$st->execute(array($this->id));
            return $deleted;
        }
        public function is_free($date,$heure,$id_med):bool
        {
            $st=$this->db->prepare("SELECT count(id) from Visit where date=? and heure=? and id_med=?");
            $st->execute(array($date,$heure,$id_med));
            $data=$st->fetch(PDO::FETCH_ASSOC);
            return !(bool)$data["count(id)"];
        }
        public function get_nature():string
        {
            $st=$this->db->prepare("select nature from Visit where id=?");
            $st->execute(array($this->id));
            $n=$st->fetch(PDO::FETCH_ASSOC);
            return $n["nature"];
        }
        public function get_free_time($date,$id_med):string
        {
            $h="8";
            $min="00";
            while($h!="16")
            {
                if(!(($h=="11"&&$min=="30")||$h=="12"))
                {
                    $t=$h.":".$min;
                    if($this->is_free($date,$t,$id_med))
                        return $t;
                }
                if($min=="00")
                {
                    $min="30";
                }
                else
                {
                    $min="00";
                    $h++;
                }
            }
            return null;
        }
        public function get_date():string
        {
            $st=$this->db->prepare("select date from Visit where id=?");
            $st->execute(array($this->id));
            $var=$st->fetch(PDO::FETCH_ASSOC);
            return $var["date"];
        }
        public function get_emp():string
        {
            $st=$this->db->prepare("select id_emp from Visit where id=?");
            $st->execute(array($this->id));
            $data=$st->fetch(PDO::FETCH_ASSOC);
            return $data["id_emp"];
        }
        public function delete_emp()
        {
            $st=$this->db->prepare("delete from Visit where id_emp=?");
            $deleted=$st->execute(array($this->id_emp));
            return $deleted;
        }
    }
?>