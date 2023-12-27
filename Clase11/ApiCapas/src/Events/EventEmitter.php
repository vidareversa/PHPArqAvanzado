<?php

class EventEmitter
{
    private $listeners = [];

    public function on($event, callable $callback)
    {
        $this->listeners[$event][] = $callback;
    }

    public function emit($event, $data = null)
    {
        if (isset($this->listeners[$event])) {
            foreach ($this->listeners[$event] as $listener) {
                $listener($data);
            }
        }
    }
}