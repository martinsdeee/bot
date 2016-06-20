<?php 

namespace Tattvika\Bot\Commands;

class HelpCommand extends Command
{

	protected $respond_rows = [
		'--- Helpful information --- ',
		'!help - List of commands',
		'!time - Give currend time and date'
	];

	protected $respond;

	public function boot()
	{
	    $this->respond = implode("\n", $this->respond_rows);
	}

	public function fire()
	{
	    return $this->respond;
	}

}