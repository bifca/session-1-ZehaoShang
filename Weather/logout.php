<?php
session_start();
if(session_destroy())
{
header("Location: index.php?city=".$_GET["city"]);
}
?>