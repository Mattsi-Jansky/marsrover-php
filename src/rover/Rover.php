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
                    Direction::NORTH => $y++,
                    Direction::EAST => $x++,
                    Direction::SOUTH => $y--,
                    Direction::WEST => $x--,
                };
            }

            if ($y == 10) {$y = 0;}
            else if ($y == -1) {$y = 9;}
            else if($x == -1) {$x = 9;}
        }

        return "$x:$y:$direction->value";
    }
}
