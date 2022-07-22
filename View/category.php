<?php

session_start();
if (isset($_POST["categories"])) {
    $cat = $_POST["categories"];
    header("Location: /index.php?cato=$cat");
} else {
    echo "Not setted";
}
