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
            self::EAST => Direction::NORTH,
            self::SOUTH => Direction::EAST,
            self::WEST => Direction::SOUTH,
        };
    }
}

class Rover
{
    const MAX_GRID_SIZE = 10;

    public function __construct()
    {
    }

    public function execute(string $commands): String
    {
        $direction = Direction::NORTH;
        $x= 0;
        $y = 0;

        foreach(str_split($commands) as $command) {
            if ($command == "R") {
                $direction = $direction->turnRight();
            } else if ($command == "L"){
                $direction = $direction->turnLeft();
            } else {
                match ($direction) {
                    Direction::NORTH => $y = ($y + 1) % self::MAX_GRID_SIZE,
                    Direction::EAST => $x = ($x + 1) % self::MAX_GRID_SIZE,
                    Direction::SOUTH => $y = ($y > 0) ? $y - 1 : self::MAX_GRID_SIZE - 1,
                    Direction::WEST => $x = ($x > 0) ? $x - 1 : self::MAX_GRID_SIZE - 1,
                };
            }
        }

        return "$x:$y:$direction->value";
    }
}
