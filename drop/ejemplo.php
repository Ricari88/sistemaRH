<?php

echo "ejecutar archivo python";
$r=shell_exec("python example.py"); 
echo $r;//will be out put of .py script
echo "ready";
?>