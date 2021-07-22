<?php
$data = $_GET['peers'];
$data = explode("_", $data);
$a = 0;
while ($a != count($data))
{
    if (str_starts_with($data[$a], "c"))
    {
        echo "Chat #";
        echo str_replace("c", "", $data[$a]);
    }
    else
    {
        echo $data[$a];
    }
    echo "<br>";
    $a++;
}