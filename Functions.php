<?php

function loadpage ($index){
    $path='DynamicCompanyWebsite/index.html';
    $content=file_get_contents($path);
    echo $content;
}