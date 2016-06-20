<?php 

namespace Tattvika\Bot\Commands;

class TimeCommand extends Command
{

	protected $format = "H:i:s d.m.Y";

	public function boot()
	{
	    //
	}

	public function fire()
	{
	    return date($this->format);
	}
}