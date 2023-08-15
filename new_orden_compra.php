<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Orden de Compra</title>
    <!-- $page_title definida en inicio.php -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.5/umd/popper.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.5/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://use.fontawesome.com/releases/v5.11.2/js/all.js" data-auto-replace-svg="nest"></script>

    <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="Styles/main.css">
</head>
<?php
session_start();
require('Main_app/conexion.php');
require_once "librerias/header.php";
switch ($id_compania) {
    case '2':
        include "New_Order/templates_order/new_order_esmel.php";
        break;
    case '1':
        include "New_Order/templates_order/new_order_grancompu.php";
        break;
};
require_once "librerias/footer.php";
?>

<script>
    $(document).ready(function() {
        console.log("event")
        $(document).on('input', '.item_row', function(event) {
            var row = $(this).closest('tr');
            var inputsInRow = row.find('.item_row');
            var item_inputs = []; // Variable para almacenar los valores
            inputsInRow.each(function() {
                item_inputs.push($(this).val()); // Agregar valor a la variable
            });
            if (!item_inputs.includes('')) {
                var newRow = $(this).closest(".item").clone(); // Clona la fila actual
                newRow.find("input").val(""); // Borra los valores de los inputs clonados

                var numRows = $(".table-items tr.item").length;
                newRow.find(".item-num").text(numRows + 1); // Actualiza el número de la fila

                $(".table-items").append(newRow); // Agrega la nueva fila clonada 
            }
        });
        $('#saveOrder').click(function() {

            var jsonDataArray = [];

            $('.table-items .item').each(function(index, row) {
                var jsonData = {};

                $(row).find('input').each(function() {
                    var inputName = $(this).attr('input_item_name');
                    var inputValue = $(this).val();
                    jsonData[inputName] = inputValue;
                });

                jsonDataArray.push(jsonData);
            });
            var jsonString = JSON.stringify(jsonDataArray);
            console.log(jsonDataArray);
        });


    });
</script>

</body>

</html>