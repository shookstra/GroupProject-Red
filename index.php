<?php

$action = 'home';

switch ($action) {
    case 'home':
        require($_SERVER['DOCUMENT_ROOT'] . '/GroupProject/views/index.php');
}
