<?php

require "../../../resources/autoload.php";

if (!$USER->isAdmin()) {
    die();
}

if (!isset($_GET["pageid"])) {
    die("Pageid not found");
}

$page = $SQL->getPage($_GET["pageid"]);
echo $page["content"];