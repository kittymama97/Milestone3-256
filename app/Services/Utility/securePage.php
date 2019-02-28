<?php
if (isset($_SESSION['principle']) == false || $_SESSION['principle'] == NULL || $_SESSION['principle'] == false) {
    header("Location: login2.blade.php");
}