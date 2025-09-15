<?php

declare(strict_types=1);

defined('TYPO3') or die();

return [
    'ctrl' => [
        'title' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_contactperson',
        'label' => 'last_name',
        'label_alt' => 'first_name',
        'label_alt_force' => true,
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'default_sortby' => 'last_name ASC',
        'enablecolumns' => ['disabled' => 'hidden'],
        'searchFields' => 'first_name,last_name,email',
        'iconIdentifier' => 'ext-dveducationcourses-contactperson',
        'security' => ['ignorePageTypeRestriction' => true],
    ],
    'types' => [
        '1' => ['showitem' => 'salutation, title, first_name, last_name, phone, email, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden'],
    ],
    'columns' => [
        'salutation' => [
            'label' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_contactperson.salutation',
            'config' => ['type' => 'input', 'size' => 10, 'max' => 20],
        ],
        'title' => [
            'label' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_contactperson.title',
            'config' => ['type' => 'input', 'size' => 20, 'max' => 100],
        ],
        'first_name' => [
            'label' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_contactperson.first_name',
            'config' => ['type' => 'input', 'size' => 30, 'max' => 255, 'required' => true],
        ],
        'last_name' => [
            'label' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_contactperson.last_name',
            'config' => ['type' => 'input', 'size' => 30, 'max' => 255, 'required' => true],
        ],
        'phone' => [
            'label' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_contactperson.phone',
            'config' => ['type' => 'input', 'size' => 20, 'max' => 50],
        ],
        'email' => [
            'label' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_contactperson.email',
            'config' => ['type' => 'email'],
        ],
    ],
];
