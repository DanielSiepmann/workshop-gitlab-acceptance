<?php

$EM_CONF['example_extension'] = [
    'title' => 'Example extension',
    'description' => 'Example for TYPO3 Extension Workshop.',
    'category' => 'example',
    'version' => '1.0.0',
    'state' => 'stable',
    'author' => 'Daniel Siepmann',
    'author_email' => 'coding@daniel-siepmann.de',
    'author_company' => 'Codappix',
    'constraints' => [
        'depends' => [
            'php' => '7.2.0-7.2.999',
            'typo3' => '8.7.0-9.5.999',
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'Workshop\\ExampleExtension\\' => 'Classes',
        ]
    ],
];
