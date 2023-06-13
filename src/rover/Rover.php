<?php

namespace rover;

class Rover
{

    public function __construct()
    {
    }

    public function execute(string $commands): String
    {
        $direction = "N";

        foreach(str_split($commands) as $command) {
            if ($command == "R") {
                $direction = "E";
            } else {
                $direction = "W";
            }
        }

        return "0:0:" . $direction;
    }
}
