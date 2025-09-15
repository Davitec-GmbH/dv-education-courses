<?php

declare(strict_types=1);

defined('TYPO3') or die();

return [
    'ctrl' => [
        'title' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_type',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'default_sortby' => 'sorting ASC',
        'enablecolumns' => ['disabled' => 'hidden'],
        'searchFields' => 'title',
        'iconIdentifier' => 'ext-dveducationcourses-type',
        'security' => ['ignorePageTypeRestriction' => true],
    ],
    'types' => [
        '1' => ['showitem' => 'title, slug, description, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden'],
    ],
    'columns' => [
        'title' => [
            'label' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_type.title',
            'config' => ['type' => 'input', 'size' => 50, 'max' => 255, 'required' => true],
        ],
        'description' => [
            'label' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_type.description',
            'config' => ['type' => 'text', 'rows' => 5, 'enableRichtext' => true],
        ],
        'slug' => [
            'label' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_type.slug',
            'config' => ['type' => 'slug', 'generatorOptions' => ['fields' => ['title']], 'fallbackCharacter' => '-', 'prependSlash' => false],
        ],
    ],
];
