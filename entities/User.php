<?php

require_once 'interfaces/LoggerInterface.php';
require_once 'interfaces/EventListenerInterface.php';

abstract class User {
    protected $id;
    protected $name;
    protected $role;

    abstract protected function getTextsToEdit();

}

