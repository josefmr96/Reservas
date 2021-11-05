<?php

class Usuario extends Conectar{

    public function login(){
        $conectar=parent::conexion();
        parent::set_names();
        if(isset($_POST["enviar"])){
            $usu_nom = $_POST["usu_nom"];
            $pass = $_POST["usu_pass"];
            if(empty($nombre) and empty($pass)){
                header("Location: ../../../index.php?m=1");
                exit();
            }else{
                $sql = "SELECT * FROM tm_usuario WHERE usu_nom=? and usu_pass=MD5(?) and est=1";
                $stmt=$conectar->prepare($sql);
                $stmt->bindValue(1, $usu_nom);
                $stmt->bindValue(2, $pass);
                $stmt->execute();
                $resultado = $stmt->fetch();
                if (is_array($resultado) and count($resultado)>0){
                    $_SESSION["usu_id"]=$resultado["usu_id"];
                    $_SESSION["usu_nom"]=$resultado["usu_nom"];
                    $_SESSION["rol_id"]=$resultado["rol_id"];
                    header("Location:".Conectar::ruta()."view/Reservas/");
                    exit(); 
                }else{
                    header("Location: ../../../index.php?m=1");
                    exit();
                }
            }
        }
    }
    public function insert_usuario($usu_nom,$usu_pass,$rol_id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO tm_usuario (usu_id, usu_nom, usu_pass, rol_id, fech_crea, fech_modi, fech_elim, est) VALUES (NULL,?, MD5(?),?,now(), NULL, NULL, '1');";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $usu_nom);
        $sql->bindValue(2, $usu_pass);
        $sql->bindValue(3, $rol_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }

    public function update_usuario($usu_id,$usu_nom,$usu_pass,$rol_id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE tm_usuario set
            usu_nom = ?,
            usu_pass = ?,
            rol_id = ?
            WHERE
            usu_id = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $usu_nom);
        $sql->bindValue(4, $usu_pass);
        $sql->bindValue(5, $rol_id);
        $sql->bindValue(6, $usu_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }

    public function delete_usuario($usu_id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE tm_usuario SET est = '0', fech_elim = now()  WHERE  usu_id = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $usu_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }

    public function get_usuario(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT* FROM tm_usuario WHERE  est = 1";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }

    public function get_usuario_x_id($usu_id){
        $conectar= parent::conexion();
        parent::set_names();    
        $sql="SELECT * FROM tm_usuario WHERE  usu_id =?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $usu_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }
}


?>