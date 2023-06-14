<?php

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestWith;
use PHPUnit\Framework\TestCase;
use rover\Rover;
use function PHPUnit\Framework\assertEquals;

class RoverTest extends TestCase
{
    #[Test]
    #[TestWith(["L","0:0:W"])]
    #[TestWith(["R","0:0:E"])]
    #[TestWith(["","0:0:N"])]
    public function given_commands_output_new_position($commands, $expectedOutput)
    {
        $rover = new Rover();

        $result = $rover->execute($commands);

        assertEquals($expectedOutput, $result);
    }
}
