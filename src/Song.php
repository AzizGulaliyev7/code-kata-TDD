<?php

namespace App;

class Song
{
    public function sing() {
        return $this->verses(99, 0);
    }

    public function verses($start, $end) {
        return implode(PHP_EOL, array_map(
            fn ($number) => $this->verse($number),
            range($start, $end)));
    }

    public function verse($number) {
        switch ($number) {
            case 2:
                return
                    "2 bottles of beer on the wall" . PHP_EOL .
                    "2 bottles of beer" . PHP_EOL .
                    "Take one down and pass it around" . PHP_EOL .
                    "1 bottle of beer on the wall" . PHP_EOL;

            case 1:
                return
                    "1 bottle of beer on the wall" . PHP_EOL .
                    "1 bottle of beer" . PHP_EOL .
                    "Take one down and pass it around" . PHP_EOL .
                    "No more bottles of beer on the wall" . PHP_EOL;

            case 0:
                return
                    "No more bottles of beer on the wall" . PHP_EOL .
                    "No more bottles of beer" . PHP_EOL .
                    "Go to the store and buy some more" . PHP_EOL .
                    "99 bottles of beer on the wall" . PHP_EOL;

            default:
                return
                    "{$number} bottles of beer on the wall" . PHP_EOL .
                    "{$number} bottles of beer" . PHP_EOL .
                    "Take one down and pass it around" . PHP_EOL .
                    ($number - 1) . " bottles of beer on the wall" . PHP_EOL;
        }
    }
}