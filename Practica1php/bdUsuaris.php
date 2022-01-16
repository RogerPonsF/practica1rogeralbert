<?php
    function verificaUsuari($nom, $clau){
        try{
            include('db/connectar-db.php');

            $comn='SELECT * FROM user WHERE username=:nom OR mail=:nom';
            $cn = $db->prepare($comn);
            $cn->execute(array(':nom' => $nom)); 
            $error=true;  
            foreach ($cn as $fila) {
                $resn=$fila['username'];
                $resm=$fila['mail'];

                if($resn==$nom OR $resm==$nom){
                    $pass=$fila['passHash'];  
                    if(password_verify($clau,$pass))$error=false;
                    else $error=true;
                }
            }
        }catch(PDOException $e){
            echo 'Error amb la BDs: ' . $e->getMessage();
        }
        return $error;
    }



    function registrar($infousuari)
    {
        try{
            include('db/connectar-db.php');
            $db->beginTransaction();
            $comn='SELECT * FROM user WHERE username=:nom OR mail=:nom2';
            $cn = $db->prepare($comn);
            $cn->execute(array(':nom' => $infousuari[0],':nom2' => $infousuari[1])); 
            $error=false;  
            if(($cn->rowCount())>0)$error=true;
            if($error==false)
            {
                $clauhash=password_hash($infousuari[4],PASSWORD_DEFAULT);
                $sql = "INSERT INTO user(mail,username,passHash,userFirstName,userLastName) 
                    VALUES(:mail,:username,:passHash,:userFirstName,:userLastName)";
                $insert = $db->prepare($sql);
                $insert -> execute(array(':mail'=>$infousuari[1],':username'=>$infousuari[0],'passHash'=>$clauhash,':userFirstName'=>$infousuari[2],':userLastName'=>$infousuari[3]));
                $db->commit();
            }
            else $db->rollback();
        }catch(PDOException $e){
            echo 'Error amb la BDs: ' . $e->getMessage();
        }
        return $error;
    }

    function updatesessio($inicisessio,$nom)
    {
        include('db/connectar-db.php');
        $dataperf=passaratext($inicisessio);
        $sql = "UPDATE `user` SET lastSingIn = $dataperf WHERE username = $nom";
        $update = $db->query($sql);
    }
    function passaratext($inicisessio)
    {
        //$date=$inicisessio[6],"-",$inicisessio[5],"-",$inicisessio[3]," ",$inicisessio[2],":",$inicisessio[1],":",$inicisessio[0];
        $infonecesaria=array($inicisessio["year"],$inicisessio["mon"],$inicisessio["mday"],$inicisessio["hours"],$inicisessio["minutes"],$inicisessio["seconds"]);
        $string="-";
        $hola=implode($string,$infonecesaria);
        return $hola;
    }
?>