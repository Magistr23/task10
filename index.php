<?php

    include_once 'autoload.php';

    $fileStorage = new TelegraphText();
    $fileStorage->editText('Именно тут', 'Тут была бы ваша реклама');

    print_r($fileStorage);
