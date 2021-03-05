<?php
require_once "../../../resources/autoload.php";  // Load required libs

$search_query = $_GET["search"];  // Search is passed as a get var
if (empty($search_query)) {
    die("<span>No Results</span>");
}

$sacctmgr = new slurm(config::CLUSTER["name"]);
$assocs = $sacctmgr->getAccounts();

$MAX_COUNT = 10;  // Max results of PI search

$out = array();
foreach ($assocs as $assoc) {
    // loop through each association
    if (strpos($assoc, $search_query) !== false) {
        array_push($out, $assoc);
        if (count($out) >= $MAX_COUNT) {
        break;
        }
    }
}

foreach ($out as $pi_acct) {
    echo "<span>$pi_acct</span>";
}