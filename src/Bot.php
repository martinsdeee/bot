<?php

namespace Tattvika\Bot;

class Bot
{

	protected $name;

	protected $contact;

	protected $commands = [
		'!help' => \Tattvika\Bot\Commands\HelpCommand::class,
		'!time' => \Tattvika\Bot\Commands\TimeCommand::class,
	];

	protected $common_responds = [
		"Ok", 
		"I see",
	];

    public function __construct($name)
    {
    	$this->name = $name;
    }

    public function __get($property)
    {
        return $this->$property;
    }

    /**
     * Greet somebody
     * @param  string $name name
     * @return string       message
     */
    public function greet($name)
    {
    	$this->makeContact($name);

    	$bot = $this->name;

        return "Hello $name, my name is $bot";
    }

    public function respond($message)
    {
        return $this->parse($message);
    }

    public function parse($message)
    {
    	if(array_key_exists($message, $this->commands))
    		return $this->runCommand($message);

    	$response = $this->common_responds;
        return $response[array_rand($response)];
    }

    /**
     * Run command
     * @param  string $command command
     * @return mixed           
     */
    public function runCommand($command)
    {
    	$command = new $this->commands[$command]();

        return $command->fire();
    }

    public function makeContact($name)
    {
        $this->contact = $name;
    }
}
