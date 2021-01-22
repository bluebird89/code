<?php

$subject = 'AAaaaaa Bbbbb';
preg_replace_callback_array(
    [
        '~[A]+~i' => function ($match) {
            echo strlen($match[0]), ' matches for "A" found', PHP_EOL;
        },
        '~[b]+~i' => function ($match) {
            echo strlen($match[0]), ' matches for "b" found', PHP_EOL;
        }
    ],
    $subject
);
