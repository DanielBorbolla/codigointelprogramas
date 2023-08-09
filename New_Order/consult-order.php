<?php
// ----------------- save order id on SESSION-----------
if(isset($_POST['id'])){
    session_start();
    $_SESSION['order']=$_POST['id'];
    echo '1';
}
// ----------------- save order id on SESSION-----------
?>