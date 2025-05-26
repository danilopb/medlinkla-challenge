<?php
require_once 'FindPoint.php';

$findPoint = new FindPoint();

// keep this function call here
echo $findPoint->execute(['1, 3, 4, 7, 13', '1, 2, 4, 13, 15']);
