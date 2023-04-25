<?php
    class User
    {
        private $db;
        private int $mat;
        private string $passwd;
        private string $email;
        private int $tel;
        private int $pervillage;
        private string $nom;
        private string $prenom;
        private string $division;
        private string $direction;
        private string $service;
        private string $atelier;
        private string $unite;
        private string $sexe;
        private string $date_n;
        private string $lieu_n;
        private string $situ_fam;
        private string $addresse;
        private string $formation_sco;
        private string $formation_pro;
        private string $qualifiquation;
        private string $post;
        private string $service_nat;
        private string $act_anterieur;
        
        public function __construct($param)
        {
            if(is_int($param))
            {
                $this->mat=$param;
            }
            if(is_array($param))
            {
                $this->mat=$param["mat"];
                $this->passwd=$param["passwd"];
                $this->email=$param["email"];
                $this->tel=$param["tel"];
                $this->pervillage=(int)$param["pervillage"];
                $this->nom=$param["nom"];
                $this->prenom=$param["prenom"];
                $this->direction=$param["direction"];
                $this->division=$param["division"];
                $this->service=$param["service"];
                $this->atelier=$param["atelier"];
                $this->unite=$param["unite"];
                $this->sexe=$param["sexe"];
                $this->date_n=$param["date_n"];
                $this->lieu_n=$param["lieu_n"];
                $this->situ_fam=$param["situ_fam"];
                $this->addresse=$param["addresse"];
                $this->formation_sco=$param["formation_sco"];
                $this->formation_pro=$param["formation_pro"];
                $this->qualifiquation=$param["qualifiquation"];
                $this->post=$param["post"];
                $this->service_nat=$param["service_nat"];
                $this->act_anterieur=$param["act_anterieur"];
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
        
        public function exist():bool
        {
            $st=$this->db->prepare("select count(mat) from User where mat=?");
            $st->execute(array($this->mat));
            $var=$st->fetch(PDO::FETCH_ASSOC);
            return (bool)$var["count(mat)"];
        }
        public function create():bool
        {
            $st=$this->db->prepare("INSERT into User values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $created=$st->execute(array(
                $this->mat,
                $this->passwd,
                $this->email,
                $this->tel,
                $this->pervillage,
                $this->nom,
                $this->prenom,
                $this->division,
                $this->direction,
                $this->service,
                $this->atelier,
                $this->unite,
                $this->sexe,
                $this->date_n,
                $this->lieu_n,
                $this->situ_fam,
                $this->addresse,
                $this->formation_sco,
                $this->formation_pro,
                $this->qualifiquation,
                $this->post,
                $this->service_nat,
                $this->act_anterieur));
            $st->debugDumpParams();
            return $created;
        }
        public function read():array
        {
            $st=$this->db->prepare("select * from User where mat=?");
            $st->execute(array($this->mat));
            $data=$st->fetch(PDO::FETCH_ASSOC);
            return $data;
        }
        public function read_all():array
        {
            $st=$this->db->prepare("select mat,nom,prenom,email from User");
            $st->execute();
            $data=array();
            while($raw=$st->fetch(PDO::FETCH_ASSOC))
                $data[]=$raw;
            return $data;
        }
        public function update(array $param):bool
        {
            $param["old"]=$this->mat;
            $st=$this->db->prepare("UPDATE User set mat=:mat,passwd=:passwd,email=:email,tel=:tel,pervillage=:pervillage,nom=:nom,prenom=:prenom,division=:division,direction=:direction,service=:service,atelier=:atelier,unite=:unite,sexe=:sexe,date_n=:date_n,lieu_n=:lieu_n,situ_fam=:situ_fam,addresse=:addresse,formation_sco=:formation_sco,formation_pro=:formation_pro,qualifiquation=:qualifiquation,post=:post,service_nat=:service_nat,act_anterieur=:act_anterieur where mat=:old");
            $updated=$st->execute($param);
            return $updated;
        }
        public function delete():bool
        {
            $st=$this->db->prepare("delete from User where mat=?");
            $deleted=$st->execute(array($this->mat));
            return $deleted;
        }
        public function connect(string $passwd):int
        {
            $st=$this->db->prepare("select pervillage from User where mat=? and passwd=?");
            $st->execute(array($this->mat,$passwd));
            $data=$st->fetch(PDO::FETCH_ASSOC);
            return (int)$data["pervillage"];
        }
    }
?>