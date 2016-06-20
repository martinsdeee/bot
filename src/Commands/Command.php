<?php

namespace Tattvika\Bot\Commands;

abstract class Command
{
	function __construct()
	{
		$this->boot();
	}

	public function __get($property)
    {
        return $this->$property;
    }

	public abstract function boot();
	public abstract function fire();
}