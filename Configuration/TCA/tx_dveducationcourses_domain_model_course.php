<?php

declare(strict_types=1);

defined('TYPO3') or die();

return [
    'ctrl' => [
        'title' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_course',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'default_sortby' => 'title ASC',
        'enablecolumns' => ['disabled' => 'hidden', 'starttime' => 'starttime', 'endtime' => 'endtime'],
        'searchFields' => 'title,description',
        'iconIdentifier' => 'ext-dveducationcourses-course',
        'security' => ['ignorePageTypeRestriction' => true],
    ],
    'types' => [
        '1' => [
            'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    title, slug, type, description,
                --div--;LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tab.content,
                    content, objectives, target_groups, admission_requirements,
                --div--;LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tab.relations,
                    events, contact_persons, similar_courses, images,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                    hidden, starttime, endtime,
            ',
        ],
    ],
    'columns' => [
        'title' => [
            'label' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_course.title',
            'config' => ['type' => 'input', 'size' => 50, 'max' => 255, 'required' => true],
        ],
        'description' => [
            'label' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_course.description',
            'config' => ['type' => 'text', 'rows' => 5, 'enableRichtext' => true],
        ],
        'content' => [
            'label' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_course.content',
            'config' => ['type' => 'text', 'rows' => 10, 'enableRichtext' => true],
        ],
        'objectives' => [
            'label' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_course.objectives',
            'config' => ['type' => 'text', 'rows' => 5, 'enableRichtext' => true],
        ],
        'target_groups' => [
            'label' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_course.target_groups',
            'config' => ['type' => 'text', 'rows' => 5, 'enableRichtext' => true],
        ],
        'admission_requirements' => [
            'label' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_course.admission_requirements',
            'config' => ['type' => 'text', 'rows' => 5, 'enableRichtext' => true],
        ],
        'slug' => [
            'label' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_course.slug',
            'config' => ['type' => 'slug', 'generatorOptions' => ['fields' => ['title']], 'fallbackCharacter' => '-', 'prependSlash' => false],
        ],
        'type' => [
            'label' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_course.type',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_dveducationcourses_domain_model_type',
                'items' => [['label' => '', 'value' => 0]],
                'default' => 0,
            ],
        ],
        'contact_persons' => [
            'label' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_course.contact_persons',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_dveducationcourses_domain_model_contactperson',
                'MM' => 'tx_dveducationcourses_course_contactperson_mm',
                'size' => 5,
                'maxitems' => 20,
            ],
        ],
        'events' => [
            'label' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_course.events',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_dveducationcourses_domain_model_event',
                'foreign_field' => 'course',
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
        'similar_courses' => [
            'label' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_course.similar_courses',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_dveducationcourses_domain_model_course',
                'MM' => 'tx_dveducationcourses_course_similar_mm',
                'size' => 5,
                'maxitems' => 10,
            ],
        ],
        'images' => [
            'label' => 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang_db.xlf:tx_dveducationcourses_domain_model_course.images',
            'config' => ['type' => 'file', 'allowed' => 'common-image-types', 'maxitems' => 10],
        ],
    ],
];
