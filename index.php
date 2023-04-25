<?php
session_start();
require_once "controlers/Authen.php";
require_once "controlers/Medecin.php";
require_once "controlers/Admin.php";
require_once "controlers/Employe.php";
require_once "controlers/Profile.php";

$request=$_SERVER['REQUEST_URI'];
switch($request)
{
//public
    case '/':
        require "views/pages/Login.php";
        break;
    case "/login":
        if(isset($_POST["mat"])&&isset($_POST["passwd"]))
        {
            $auth=new Authen();
            $auth->login((int)$_POST["mat"],$_POST["passwd"]);
        }
        else
        {
            header("Location:/");
            die;
        }
        break;
    case "/logout":
        $auth=new Authen();
        $auth->logout();
        break;
    case "/profile":
        require "access_controle.php";
        require "views/pages/Profile.php";
        break;
    case "/home":
        require "access_controle.php";
        require_once "views/pages/HomePage.php";
        break;
    case '/error':
        require 'error.php';
        break;
//admin
    case "/admin/save":
        require "access_controle_admin.php";
        require "access_controle.php";
        if(!isset($_POST["mat"]))
        {
            header("Location:/admin/addEmp");
            die;
        }
        if($_POST["passwd"]!=$_POST["MDP"])
        {
            $_SESSION["msg"]="le mot de passe n'est pas identique";
            header("Location:/admin/addEmp");
            die;
        }
        unset($_POST["MDP"]);
        $data=$_POST;
        $data["mat"]=(int)$_POST["mat"];
        $data["tel"]=(int)$_POST["tel"];
        $date=explode("-",$_POST["date_n"]);
        $d=array($date[2],$date[1],$date[0]);
        $date=implode("-",$d);
        $data["date_n"]=$date;
        $admin=new Admin();
        $created=$admin->creat_acc($data);
        if(!$created)
        {
            $_SESSION["msg"]="le compte n'a pas été créé avec succès";
            header("Location:/admin/addEmp");
            die;
        }
        header("Location:/admin/profil_list");
        break;
    case "/admin/profil_list":
        require "access_controle_list.php";
        require "views/pages/ProfileList.php";
        break;
    case "/admin/addEmp":
        require "access_controle_admin.php";
        require "access_controle.php";
        require "views/pages/AddProfil.php";
        break;
    case "/admin/delete_acc":
        require "access_controle_admin.php";
        require "access_controle.php";
        if(isset($_POST["mat"]))
        {
            $mat=(int)$_POST["mat"];
            $adm=new Admin();
            $adm->delete_acc($mat);
            header("Location:/admin/profil_list");
            die;
        }
        break;
    case "/admin/modiffier":
        require "access_controle_admin.php";
        require "access_controle.php";
        require "views/pages/alter_emp.php";
        break;
    case "/admin/alter":
        $adm=new Admin();
        $old=(int)$_POST["old_mat"];
        unset($_POST["old_mat"]);
        $data=$_POST;
        $data["mat"]=(int)$_POST["mat"];
        $data["tel"]=(int)$_POST["tel"];
        $date=explode("-",$_POST["date_n"]);
        $d=array($date[2],$date[1],$date[0]);
        $date=implode("-",$d);
        $data["date_n"]=$date;
        $adm->edit_acc($old,$data);
        header("Location:/admin/profil_list");
        break;
//medecin
    case '/medecin/addRDV':
        require "views/pages/AddRDV.php";
        break;
    case '/medecin/saveRDV':
        require "access_controle.php";
        require "access_controle_medecin.php";
        $med=new Medecin();
        if(isset($_POST["mat"])&&isset($_POST["dateV"])&&isset($_POST["HV"])&&isset($_POST["nature"]))
        {
            $med->create_rdv($_POST["mat"],$_SESSION["mat"],$_POST["dateV"],$_POST["HV"],$_POST["nature"]);
        }
        header("Location:/home");
        break;
    case "/medecin/valider":
        require "access_controle_medecin.php";
        require "views//pages/Conclusion.php";
        break;
    case "/madecin/validate":
        require "access_controle_medecin.php";
        $med=new Medecin();
        $med->validate_rdv((int)$_POST["id_v"],$_POST["con"],$_POST["ord"],(int)$_SESSION["mat"]);
        header("Location:/home");
        break;
    case "/madecin/med_doc":
        require "access_controle_medecin.php";
        require "views/pages/Profile2.php";
        break;
//employe
    case "/employe/reporter";
        require "access_controle.php";
        if(isset($_POST["id_v"]))
        {
            $id_v=(int)$_POST["id_v"];
            $emp=new Employe();
            $emp->set_demande($id_v);
        }
        header("Location:/home");
        break;
    case "/employe/annuler";
        if(isset($_POST["id_d"]))
        {
            $id_d=(int)$_POST["id_d"];
            $emp=new Employe();
            $emp->rm_demande($id_d);
        }
        header("Location:/home");
        die;
        break;
// public
    case "/debug" :
        require "test.php";
        break;
    default :
        require "404.php";
        break;
    }
?>