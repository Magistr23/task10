<?php

require_once 'interfaces/LoggerInterface.php';
require_once 'interfaces/EventListenerInterface.php';
require_once 'TelegraphText.php';
require_once 'FileStorage.php';

abstract class Storage
{
    abstract function create(TelegraphText $text);
    abstract function read($slug);
    abstract function update($slug, $title, $text);
    abstract function delete($slug);
    abstract function list();

}
