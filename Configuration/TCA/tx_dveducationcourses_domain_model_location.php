<?php

declare(strict_types=1);

defined('TYPO3') or die();

return [
    'ctrl' => [
        'title' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_location',
        'label' => 'name',
        'label_alt' => 'city',
        'label_alt_force' => true,
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'default_sortby' => 'name ASC',
        'enablecolumns' => ['disabled' => 'hidden'],
        'searchFields' => 'name,city',
        'iconIdentifier' => 'ext-dveducationcourses-location',
        'security' => ['ignorePageTypeRestriction' => true],
    ],
    'types' => [
        '1' => ['showitem' => 'name, street, zipcode, city, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden'],
    ],
    'columns' => [
        'name' => [
            'label' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_location.name',
            'config' => ['type' => 'input', 'size' => 50, 'max' => 255, 'required' => true],
        ],
        'city' => [
            'label' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_location.city',
            'config' => ['type' => 'input', 'size' => 30, 'max' => 255],
        ],
        'zipcode' => [
            'label' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_location.zipcode',
            'config' => ['type' => 'input', 'size' => 10, 'max' => 20],
        ],
        'street' => [
            'label' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_location.street',
            'config' => ['type' => 'input', 'size' => 50, 'max' => 255],
        ],
    ],
];
