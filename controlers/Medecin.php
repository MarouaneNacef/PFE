<?php
require_once "controlers/Profile.php";
require_once "models/Demande.php";
require_once "models/Visit.php";
class Medecin extends Profile
{
    private Visit $v;
    private Demande $d;
    public function get_emp_file(int $id):array
    {
        $data=array("emp"=>null,"rdv"=>null);
        $data["emp"]=$this->get_emp($id);
        if(is_null($data["emp"]))
            return null;
        $this->v=new Visit(null,0,$id_emp=$id,null);
        $data["rdv"]=$this->v->read_emp();
        return $data;
    }
    public function validate_rdv(int $id,string $conclusion,string $ordonnance,int $id_med)
    {
        $this->v=new Visit($id);
        $this->v->validate($conclusion,$ordonnance);
        $nature=$this->v->get_nature();
        $date=$this->v->get_date();
        $emp=$this->v->get_emp();
        $time=$this->get_next_reg($nature,$date,$id_med);
        if(!is_null($time))
        {
            $this->v=new Visit($param=array("id_med"=>$id_med,"id_emp"=>$emp,"date"=>$time["new_date"],"heure"=>$time["free_t"],"nature"=>$nature));
            $this->v->create();
        }
    }
    public function get_planing(int $id):array
    {
        $date=date("y-m-d");
        $tmp=explode("-",$date);
        $tmp[0]="20".$tmp[0];
        $date=implode("-",$tmp);
        $this->v=new Visit($param=null,$validate=false,$id_emp=null,$id_med=$id);
        return $this->v->read_med_nv($date);
    }
    public function create_rdv(int $emp,int $med,string $date,string $heure,string $nature):bool
    {
        $param=array("id_med"=>$med,"id_emp"=>$emp,"date"=>$date,"heure"=>$heure,"nature"=>$nature);
        $this->v=new Visit($param);
        if($this->v->is_free($date,$heure,$med))
        {
            $this->v->create();
            return true;
        }
        return false;
    }
    public function edit_rdv(string $date,string $heure,int $id,$id_med):bool
    {
        $this->v=new Visit($id);
        if($this->v->is_free($date,$heure,$id_med))
        {
            $updated=$this->v->update(array($date,$heure));
            return true;
        }
        return false;
    }
    public function delete_rdv(int $id):bool
    {
        $this->v=new Visit($id);
        $deleted=$this->v->delete($id);
        return $deleted;
    }
    public function get_demande(int $id_med):array
    {
        $this->d=new Demande();
        return $this->d->read_med($id_med);
    }
    public function incriment_date(string $date)
    {
        $arr=explode("-",$date);
        $y=$arr[0];
        $m=$arr[1];
        $d=$arr[2];
        $d++;
        switch ($m)
        {
            case '1':
                if($d>31)
                {
                    $d=1;
                    $m++;
                }
                break;
            case '2':
                if($y%4==0&&$d>29)
                {
                    $d=1;
                    $m++;
                }
                if($y%4!=0&&$d>28)
                {
                    $d=1;
                    $m++;
                }
                break;
            case '3':
                if($d>31)
                {
                    $d=1;
                    $m++;
                }
                break;
            case '4':
                if($d>30)
                {
                    $d=1;
                    $m++;
                }
                break;
            case '5':
                if($d>31)
                {
                    $d=1;
                    $m++;
                }
                break;
            case '6':
                if($d>30)
                {
                    $d=1;
                    $m++;
                }
                break;
            case '7':
                if($d>31)
                {
                    $d=1;
                    $m++;
                }
                break;
            case '8':
                if($d>31)
                {
                    $d=1;
                    $m++;
                }
                break;
            case '9':
                if($d>30)
                {
                    $d=1;
                    $m++;
                }
                break;
            case '10':
                if($d>31)
                {
                    $d=1;
                    $m++;
                }
                break;
            case '11':
                if($d>30)
                {
                    $d=1;
                    $m++;
                }
                break;
            case '12':
                if($d>31)
                {
                    $d=1;
                    $m++;
                }
                break;
        }
        if($m>12)
        {
            $m=1;
            $y++;
        }
        if(strlen($d)==1)
            $d="0".$d;
        if(strlen($m)==1)
            $m="0".$m;
        return implode("-",array($y,$m,$d));
    }
    public function get_next_reg($nature,$date,$id_med)
    {
        $this->v=new Visit(null,false,null,null);
        if($nature=="semestriel")
        {
            $d=explode("-",$date);
            $d[1]+=4;
            if($d[1]>12)
            {
                $d[1]-=12;
                $d[0]++;
            }
            if(strlen($d[1])==1)
                $d[1]="0".$d[1];
            if(strlen($d[2])==1)
                $d[2]="0".$d[20];
            $new_date=implode("-",$d);
        }
        if($nature=="annuel")
        {
            $d=explode("-",$date);
            $d[0]++;
            $new_date=implode("-",$d);
        }
        if($nature=="non régulier")
            return null;
        $free_t=$this->v->get_free_time($new_date,$id_med);
        while(is_null($free_t))
        {   
            $new_date=$this->incriment_date($new_date);
            $free_t=$this->v->get_free_time($new_date,$id_med);
        }
        $time["new_date"]=$new_date;
        $time["free_t"]=$free_t;
        return $time;
    }
}
?>