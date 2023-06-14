<?php

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestWith;
use PHPUnit\Framework\TestCase;
use rover\Rover;
use function PHPUnit\Framework\assertEquals;

class RoverTest extends TestCase
{
    #[Test]
    #[TestWith(["","0:0:N"])]
    #[TestWith(["R","0:0:E"])]
    #[TestWith(["L","0:0:W"])]
    #[TestWith(["RR","0:0:S"])]
    #[TestWith(["RRR","0:0:W"])]
    #[TestWith(["RRRR","0:0:N"])]
    #[TestWith(["LL","0:0:S"])]
    #[TestWith(["LLL","0:0:E"])]
    #[TestWith(["LLLL","0:0:N"])]
    #[TestWith(["M","0:1:N"])]
    #[TestWith(["MMM","0:3:N"])]
    #[TestWith(["RMMM","3:0:E"])]
    #[TestWith(["RMMMLLMM","1:0:W"])]
    #[TestWith(["MMMRRMM","0:1:S"])]
    #[TestWith(["MMMMMMMMMM","0:0:N"])]
    #[TestWith(["MMMMMMMMMMM","0:1:N"])]
    #[TestWith(["LLM","0:9:S"])]
    #[TestWith(["LM","9:0:W"])]
    #[TestWith(["RMMMMMMMMMM","0:0:E"])]
    public function given_commands_output_new_position($commands, $expectedOutput)
    {
        $rover = new Rover();

        $result = $rover->execute($commands);

        assertEquals($expectedOutput, $result);
    }
}
