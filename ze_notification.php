<?php
//geting targeted date
    $date=date("y-m-d");
    $arr=explode("-",$date);
    $arr[0]="20".$arr[0];
    $arr[2]+=2;//edit day defrrence
    $date=implode("-",$arr);
    echo "date=$date\n";
    //debug
    $date="2022-09-25";
//database connection
    try
    {
        $db=new PDO("mysql:host=127.0.0.1;dbname=PFE","root","root@mysql");
        echo "Connection succeeded\n";
    }
    catch(PDOException $e)
    {
        echo "Could not connect to database\n";
        die;
    }
    //getting targeted employes
    $st=$db->prepare("SELECT distinct id_emp from Visit where date=?");
    $st->execute(array($date));
    $ids=array();
    while($raw=$st->fetch(PDO::FETCH_ASSOC))
        $ids[]=$raw["id_emp"];
    echo "targgited employes:\n";
    foreach($ids as $v)
        echo "$v\n";
    //getting email
    $emails=array();
    $st=$db->prepare("SELECT email from User where mat=?");
    foreach($ids as $mat)
    {
        $st->execute(array($mat));
        while($raw=$st->fetch(PDO::FETCH_ASSOC))
            $emails[]=$raw["email"];
    }
    echo "emails :\n";
    foreach($emails as $v)
    {
        echo "$v\n";
        //mail($v,"rappel","bonjour ");
    }
    $time=(int)date("h");
    echo "finished at :$time h\n";
    $sleep=(9-$time)*3600000;
    $sleep+=86400000;
    echo "sleep for : $sleep ms\n";
    //sleep($sleep);
?>