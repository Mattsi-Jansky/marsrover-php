<?php

use PHPUnit\Framework\TestCase;
use rover\Rover;
use function PHPUnit\Framework\assertEquals;

class RoverTest extends TestCase
{
    public function testGivenNoInstructionsDoesNothing()
    {
        $rover = new Rover();

        $result = $rover->execute("");

        assertEquals("0:0:N", $result);
    }

    public function testGivenRotateRightCommandFacesEast()
    {
        $rover = new Rover();

        $result = $rover->execute("R");

        assertEquals("0:0:E", $result);
    }

}
