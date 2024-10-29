<?php 
require_once ('functions.php');
if (!isset ($_GET['page'])) die ('404- page not found');
else loadpage($_Get['page']); 