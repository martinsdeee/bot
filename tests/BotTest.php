<?php

namespace Tattvika\Bot\Tests;

use Tattvika\Bot\Bot;
use Tattvika\Bot\Commands\TimeCommand;
use Tattvika\Bot\Commands\HelpCommand;
use PHPUnit_Framework_TestCase as PHPUnit;

class BotTest extends PHPUnit
{

	protected $bot;

	public function setUp()
	{
	    $this->bot = new Bot("Willie");
	}

    /** @test */
    public function a_create_bot()
    {
        $this->assertEquals("Willie", $this->bot->name);
    }

    /** @test */
    public function a_bot_greets()
    {
    	
    	$this->assertEquals(
        	"Hello Jānis, my name is Willie", 
        	$this->bot->greet("Jānis")
        );
        $this->assertEquals(
        	"Hello everybody, my name is Willie",
        	$this->bot->greet("everybody")
        );
    }

    /** @test */
    public function a_bot_run_help_command()
    {
    	
    	$this->bot->runCommand("!help");
    }

    /** @test */
    public function a_bot_respond_with_common_respond_if_not_command()
    {
    	
    	$this->assertTrue(in_array($this->bot->respond("What's up!"), $this->bot->common_responds));
    }

    /** @test */
    public function a_bot_respond_with_command_if_command()
    {
        
        $timeCommand = new TimeCommand();

        $this->assertEquals(
        	date($timeCommand->format),
        	$this->bot->respond("!time")
        );

    }

    /** @test */
    public function a_bot_can_help()
    {
        
        $helpCommand = new HelpCommand();

        $this->assertEquals(
        	$helpCommand->respond,
        	$this->bot->respond("!help")
        );
       
    }

}
