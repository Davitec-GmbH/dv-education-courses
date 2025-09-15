<?php

declare(strict_types=1);

defined('TYPO3') or die();

return [
    'ctrl' => [
        'title' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_singleevent',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'default_sortby' => 'startdate ASC',
        'enablecolumns' => ['disabled' => 'hidden'],
        'iconIdentifier' => 'ext-dveducationcourses-singleevent',
        'security' => ['ignorePageTypeRestriction' => true],
    ],
    'types' => [
        '1' => ['showitem' => 'title, startdate, enddate'],
    ],
    'columns' => [
        'title' => [
            'label' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_singleevent.title',
            'config' => ['type' => 'input', 'size' => 50, 'max' => 255, 'required' => true],
        ],
        'startdate' => [
            'label' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_singleevent.startdate',
            'config' => ['type' => 'datetime', 'required' => true],
        ],
        'enddate' => [
            'label' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_singleevent.enddate',
            'config' => ['type' => 'datetime'],
        ],
        'event' => [
            'config' => ['type' => 'passthrough'],
        ],
    ],
];
