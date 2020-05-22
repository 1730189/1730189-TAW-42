<?php
    
    class carrera_model{
        private $DB;
        private $carreras;

        function __construct(){
            $this->DB=Database::connect();
        }

        function get(){
            $sql= 'SELECT * FROM carrera ORDER BY id ASC';
            $fila=$this->DB->query($sql);
            $this->carreras=$fila;
            return  $this->carreras;
        }

        //Funcion para crear un nuevo registro
        function create($data){

            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="INSERT INTO carrera(nombre)VALUES (?)";

            $query = $this->DB->prepare($sql);
            $query->execute(array($data['nombre']));
            Database::disconnect();       

        }

        //Funcion para obtener el ID de un registro
        function get_id($id){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM carrera where id = ?";
            $q = $this->DB->prepare($sql);
            $q->execute(array($id));
            $data = $q->fetch(PDO::FETCH_ASSOC);
            return $data;
        }

        //Funcion para modificar el registro seleccionado
        function update($data,$date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE carrera  set  carrera=? WHERE id = ? ";
            $q = $this->DB->prepare($sql);
            $q->execute(array($data['carrera']));
            Database::disconnect();

        }

        //Funcion para solicitar una eliminacion de un registro
        function delete($date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="DELETE FROM carrera where id=?";
            $q=$this->DB->prepare($sql);
            $q->execute(array($date));
            Database::disconnect();
        }
    }
?>

