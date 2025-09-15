<?php

declare(strict_types=1);

defined('TYPO3') or die();

return [
    'ctrl' => [
        'title' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_event',
        'label' => 'title',
        'label_alt' => 'event_code',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'default_sortby' => 'startdate ASC',
        'enablecolumns' => ['disabled' => 'hidden', 'starttime' => 'starttime', 'endtime' => 'endtime'],
        'searchFields' => 'title,event_code',
        'iconIdentifier' => 'ext-dveducationcourses-event',
        'security' => ['ignorePageTypeRestriction' => true],
    ],
    'types' => [
        '1' => [
            'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    title, event_code, slug, description,
                --div--;LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tab.schedule,
                    startdate, enddate, duration,
                --div--;LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tab.pricing,
                    price, on_request, booked_up,
                --div--;LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tab.location,
                    location, single_events,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                    hidden, starttime, endtime,
            ',
        ],
    ],
    'columns' => [
        'title' => [
            'label' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_event.title',
            'config' => ['type' => 'input', 'size' => 50, 'max' => 255, 'required' => true],
        ],
        'event_code' => [
            'label' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_event.event_code',
            'config' => ['type' => 'input', 'size' => 20, 'max' => 100],
        ],
        'description' => [
            'label' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_event.description',
            'config' => ['type' => 'text', 'rows' => 5, 'enableRichtext' => true],
        ],
        'startdate' => [
            'label' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_event.startdate',
            'config' => ['type' => 'datetime', 'required' => true],
        ],
        'enddate' => [
            'label' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_event.enddate',
            'config' => ['type' => 'datetime'],
        ],
        'duration' => [
            'label' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_event.duration',
            'config' => ['type' => 'input', 'size' => 20, 'max' => 100],
        ],
        'price' => [
            'label' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_event.price',
            'config' => ['type' => 'number', 'format' => 'decimal', 'size' => 10],
        ],
        'location' => [
            'label' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_event.location',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_dveducationcourses_domain_model_location',
                'items' => [['label' => '', 'value' => 0]],
                'default' => 0,
            ],
        ],
        'booked_up' => [
            'label' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_event.booked_up',
            'config' => ['type' => 'check', 'renderType' => 'checkboxToggle'],
        ],
        'on_request' => [
            'label' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_event.on_request',
            'config' => ['type' => 'check', 'renderType' => 'checkboxToggle'],
        ],
        'slug' => [
            'label' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_event.slug',
            'config' => ['type' => 'slug', 'generatorOptions' => ['fields' => ['title']], 'fallbackCharacter' => '-', 'prependSlash' => false],
        ],
        'course' => [
            'config' => ['type' => 'passthrough'],
        ],
        'single_events' => [
            'label' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_event.single_events',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_dveducationcourses_domain_model_singleevent',
                'foreign_field' => 'event',
                'foreign_sortby' => 'sorting',
                'maxitems' => 9999,
                'appearance' => [
                    'collapseAll' => true,
                    'expandSingle' => true,
                    'useSortable' => true,
                    'enabledControls' => ['dragdrop' => true],
                ],
            ],
        ],
    ],
];
