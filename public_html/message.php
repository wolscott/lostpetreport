<?php

if(isset($_SESSION['messageHeader'])){
    $msgheader = $_SESSION['messageHeader'];
    echo "<div class='row'><h2>$msgheader</h2></div>";
    unset($_SESSION['messageHeader']);
}

if(isset($_SESSION['messageBody'])){
    $msgbody = $_SESSION['messageBody'];
    echo "<div class='row'>$msgbody</div>";
    unset($_SESSION['messageBody']);
}

?>