<?php

class EventListenerInterface{
    public function attachEvent()
    {
        event_buffer_set_callback(__METHOD__);
    }

    public function detouchEvent()
    {

    }
}
