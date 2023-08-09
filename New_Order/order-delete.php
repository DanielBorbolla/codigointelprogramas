<?php
    require('../Main_app/conexion.php'); 
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $delete_query = "DELETE FROM ordenes_compra WHERE id = $id";
        $result = $conexion->query($delete_query);
        if(!$result){
            die('Query Failed');
        }
       echo "Order Deleted Successfully"; 
    }







?>