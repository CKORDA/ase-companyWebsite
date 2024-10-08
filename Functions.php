<?php

function loadpage ($index){
    $path= $index . '.html'; 
    $content=file_get_contents($path);
    echo $content;
}
