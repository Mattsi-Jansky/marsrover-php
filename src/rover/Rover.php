<?php

namespace rover;

enum Direction: string {
    case NORTH = "N";
    case EAST = "E";
    case SOUTH = "S";
    case WEST = "W";

    public function turnRight(): Direction {
        return match($this) {
            self::NORTH => Direction::EAST,
            self::EAST => Direction::SOUTH,
            self::SOUTH => Direction::WEST,
            self::WEST => Direction::NORTH,
        };
    }

    public function turnLeft(): Direction {
        return match($this) {
            self::NORTH => Direction::WEST,
            self::EAST => throw new \Exception('To be implemented'),
            self::SOUTH => throw new \Exception('To be implemented'),
            self::WEST => Direction::SOUTH,
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
                $direction = $direction->turnLeft();
            }
        }

        return "0:0:" . $direction->value;
    }
}
