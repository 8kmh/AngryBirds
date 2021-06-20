<?php

namespace App\Model;

class BirdModel
{
    private $birds = [
        1=> [
            'name' => 'White bird',
            'description' => 'The chubby white bird drop an egg bomb when the players tap the screen after launching the',
            'image' => 'white.png',
        ],
        [
            'name' => 'Black bird',
            'description' => 'Black birds act as bombs, which explode once they\'ve lan landed on a target, obliterating',
            'image' => 'black.png',
        ],
        [
            'name' => 'Red bird',
            'description' => 'The first avian missile players encounter when they start the game, the red bird follows',
            'image' => 'red.png',
        ],
        [
            'name' => 'blue bird',
            'description' => 'The blue bird split into three smaller version in a mid-air when the screen is tapped.',
            'image' => 'blue.png',
        ],
        [
            'name' => 'yellow bird',
            'description' => 'Taping the screen after launching the yellow bird gives...',
            'image' => 'yellow.png',
        ],
        [
            'name' => 'green bird',
            'description' => 'The green bird turns into a boomerang that doubles back to strike targets in otherwise',
            'image' => 'green.png',
        ],
    ];

    public function getBirds(): array
    {
        return $this->birds;
    }

    public function getBird($index): array
    {
        return $this->birds[$index];
    }
}