<?php

$teams = [
    'Popular Football Teams',
    [
        'La Lega',
        ['Real Madrid', 'FC Barcelona', 'Athletico Madrid', 'Real Betis', 'Osasuna']
    ],
    [
        'English Premier League',
        ['Manchester United', 'Liverpool', 'Manchester City', 'Arsenal', 'Chelsea']
    ]
];


$tree = new RecursiveTreeIterator(
    new RecursiveArrayIterator($teams), null, null, RecursiveIteratorIterator::LEAVES_ONLY
);

foreach ($tree as $leaf) {
    echo $leaf.PHP_EOL;
}
