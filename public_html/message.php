<?php

if(isset($_SESSION['messageHeader'])){
    $msgheader = $_SESSION['messageHeader'];
    echo "<div class='row'><div class='col-lg-12'><h2>$msgheader</h2></div></div>";
    unset($_SESSION['messageHeader']);
}

if(isset($_SESSION['messageBody'])){
    $msgbody = $_SESSION['messageBody'];
    echo "<div class='row'><div class='col-lg-12'>$msgbody</div></div>";
    unset($_SESSION['messageBody']);
}

?>