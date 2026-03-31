<?php

declare(strict_types=1);

$EM_CONF[$_EXTKEY] = [
    'title' => 'Education Courses',
    'description' => 'Generic course catalog for the education sector. Manages courses, events, locations, and contact persons.',
    'category' => 'plugin',
    'author' => 'Davitec GmbH',
    'author_email' => 'devops@davitec.de',
    'author_company' => 'Davitec GmbH, +Pluswerk Standort Dresden',
    'state' => 'stable',
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '12.4.0-13.4.99',
            'php' => '8.2.0-8.4.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
