<?php

namespace rover;

enum Direction: string {
    case NORTH = "N";
    case EAST = "E";
    case SOUTH = "S";
    case WEST = "W";

    public function turnRight(): Direction {
        return match($this){
            self::NORTH => Direction::EAST,
            self::EAST => Direction::SOUTH,
            self::SOUTH => throw new \Exception('To be implemented'),
            self::WEST => throw new \Exception('To be implemented'),
        };
    }
}

class Rover
{

    public function __construct()
    {
    }

    public function execute(string $commands): String
    {
        $direction = Direction::NORTH;

        foreach(str_split($commands) as $command) {
            if ($command == "R") {
                $direction = $direction->turnRight();
            } else {
                $direction = Direction::WEST;
            }
        }

        return "0:0:" . $direction->value;
    }
}
