<?php

session_start();
if (!isset($_SESSION['nombre_usuario'])) {

    echo '<script>window.location.href="index.php";</script>';
}

require('../Main_app/conexion.php');

$tipo = (int)$_SESSION['tipo'];

if ($tipo === 1 || $tipo === 2) {
    $id_empresa = $_SESSION['id_empresa'];
    $permiso = 6;
} else {
    $id_empresa = $_SESSION['id_emp'];
}
?>
<table class="table table-bordered borders big-font">
    <thead style="background:#4472C4; color:white" class="">
        <tr>

            <th scope="column" class="col-md-0-5" rowspan="2"></th>
            <th scope="column" class="col-md-1-5" colspan="2" rowspan="2">KEY/CODE
            </th>
            <th scope="column" class="col-md-7" colspan="7">
                <div>
                    <select class="form-select" id="product_category" style="background:#4472C4; color:white">
                        <option selected value=''>--CATEGORY--</option>
                        <option value='desktop'>DESKTOP</option>
                        <option value='laptop'>LAPTOP</option>
                        <option value='allinone'>ALL IN ONE</option>
                        <option value='monitor'>MONITOR</option>
                        <option value='other'>OTHER</option>
                    </select>
                    DESCRIPTION
                </div>
            </th>
            <th scope="column" class="col-md-1" rowspan="2">QUANTITY
            </th>
            <th scope="column" class="col-md-1-5" rowspan="2">UNIT PRICE</th>
            <th scope="column" class="col-md-1" rowspan="2">AMOUNT</th>
            <th scope="column" class="col-md-1-5" rowspan="2">ACTIONS</th>
        </tr>
        <tr id="description">
            <th colspan="7"></th>

        </tr>
    </thead>
    <tbody>
        <form id="product_form">
            <tr id="characteristics">
                <td class='col-md-0-5'>+</td>
                <td class='col-md-1'><input name='first_code_input' id='first_code_input' type='text' class='form-control' disabled></td>
                <td class='col-md-0-5'><input name='second_code_input' id='second_code_input' type='text' class='form-control' disabled></td>
                <td class="col-md-1" colspan="7" id='placeholder'>gatitos bonitos</td>
                <td><input name='quantity_input' id='quantity_input' type='text' class='form-control quantity' disabled></td>
                <td><input name='unit_price_input' id='unit_price_input' type='text' class='form-control price' disabled></td>
                <td><input name='amount_input' id='amount_input' type='text' class='form-control' disabled></td>
                <td><button type='submit' value='button' class='btn btn-success add_item' id='add_item'><i class='fas fa-plus-square'></i></button></td>
            </tr>
        </form>
    </tbody>
</table>
<script>
    $(document).ready(function() {
        $('#product_category').change(function() {
            $('.form-control').prop("disabled", false);
            $('#description').children().remove();
            if ($('#placeholder').length) {
                console.log('placeholder')
            } else {
                var placeholder = $("<td class='col-md-1' colspan='5' id='placeholder'>gatitos bonitos</td>");
                $('.child').first().before(placeholder).end().remove();
            }

            var category = $('#product_category option:selected').val(),
                des_lap_all = $("<td>PROCESSOR</td> <td class='col-md-0-5'>GEN</td> <td class='col-md-0-5'>DISK</td> <td class='col-md-0-5'>MEM</td>"),
                monitor = $("<td>SIZE</td> <td colspan='2'>SHAPE</td> <td colspan='2'>TYPE</td>"),
                brand_model = $("<td class='col-md-1'>BRAND</td> <td class='col-md-1'>MODEL</td>"),
                desktop = $("<td class='col-md-0-5'>CAB</td>"),
                laptop = $("<td class='col-md-0-5'>SCR</td>"),
                allinone = $("<td class='col-md-0-5'>SIZE</td>"),
                other = $("<td colspan='7'></td>"),
                brand_input = $("<td class = 'child' ><input name='brand_input' id='brand_input' type='text' class='form-control details'></td>"),
                model_input = $("<td class = 'child' ><input name='model_input' id='model_input' type='text' class='form-control details'></td>"),
                processor_input = $("<td class = 'child' ><input name='processor_input' id='processor_input' type='text' class='form-control details'></td>"),
                gen_input = $("<td class = 'child' ><input name='gen_input' id='gen_input' type='text' class='form-control details'></td>"),
                disc_input = $("<td class = 'child' ><input name='disc_input' id='disc_input' type='text' class='form-control details'></td>"),
                mem_input = $("<td class = 'child' ><input name='mem_input' id='mem_input' type='text' class='form-control details'></td>"),
                cab_input = $("<td class = 'child' ><input name='cab_input' id='cab_input' type='text' class='form-control details'></td>"),
                scr_input = $("<td class = 'child' ><input name='scr_input' id='scr_input' type='text' class='form-control details'></td>"),
                size_input = $("<td class = 'child' ><input name='size_input' id='size_input' type='text' class='form-control details'></td>"),
                shape_input = $("<td colspan='2'  class = 'child' ><input name='shape_input' id='shape_input' type='text' class='form-control details'></td>"),
                type_input = $("<td colspan='2' class = 'child' ><input name='type_input' id='type_input' type='text' class='form-control details'></td>"),
                other_input = $("<td colspan='7' class = 'child' ><input name='other_input' id='other_input' type='text' class='form-control details'></td>");

            if (category === 'desktop' || category === 'laptop' || category === 'allinone' || category === 'monitor') {
                $('#description').append(brand_model);

            }
            if (category === 'desktop' || category === 'laptop' || category === 'allinone') {
                $('#description').append(des_lap_all);

            }
            switch (category) {
                case 'desktop':

                    $('#description').append(desktop);
                    $('#placeholder').replaceWith(brand_input, model_input, processor_input, gen_input, disc_input, mem_input, cab_input);
                    break;
                case 'laptop':

                    $('#description').append(laptop);
                    $('#placeholder').replaceWith(brand_input, model_input, processor_input, gen_input, disc_input, mem_input, scr_input);
                    break;
                case 'allinone':

                    $('#description').append(allinone);
                    $('#placeholder').replaceWith(brand_input, model_input, processor_input, gen_input, disc_input, mem_input, size_input);

                    break;
                case 'monitor':

                    $('#description').append(monitor);
                    $('#placeholder').replaceWith(brand_input, model_input, size_input, shape_input, type_input);

                    break;
                case 'other':
                    $('#description').append(other);
                    $('#placeholder').replaceWith(other_input);
                    break;
            }
        })
    })

    $(document).on('keyup', '.quantity, .price', function() {
        let total = 0;
        let quantity = Number($('#quantity_input').val());
        let price = Number($('#unit_price_input').val());
        total = quantity * price;
        $('#amount_input').val(total);


    })
</script>