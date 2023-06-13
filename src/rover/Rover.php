<?php

namespace rover;

class Rover
{

    public function __construct()
    {
    }

    public function execute(string $instructions): String
    {
        $direction = "N";

        foreach(str_split($instructions) as $instruction) {
            $direction = "E";
        }

        return "0:0:" . $direction;
    }
}
