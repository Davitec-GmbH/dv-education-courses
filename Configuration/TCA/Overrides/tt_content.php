<?php

declare(strict_types=1);

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

ExtensionUtility::registerPlugin('DvEducationCourses', 'CourseList', 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang.xlf:plugin.courselist.title', 'ext-dveducationcourses-course');
ExtensionUtility::registerPlugin('DvEducationCourses', 'CourseDetail', 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang.xlf:plugin.coursedetail.title', 'ext-dveducationcourses-course');
ExtensionUtility::registerPlugin('DvEducationCourses', 'EventList', 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang.xlf:plugin.eventlist.title', 'ext-dveducationcourses-event');
ExtensionUtility::registerPlugin('DvEducationCourses', 'EventDetail', 'LLL:EXT:dv_education_courses/Resources/Private/Language/locallang.xlf:plugin.eventdetail.title', 'ext-dveducationcourses-event');

$GLOBALS['TCA']['tt_content']['types']['dveducationcourses_courselist']['showitem'] = '--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,--palette--;;general,pi_flexform,--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,--palette--;;hidden,--palette--;;access';
$GLOBALS['TCA']['tt_content']['types']['dveducationcourses_courselist']['columnsOverrides']['pi_flexform']['config']['ds']['*,dveducationcourses_courselist'] = 'FILE:EXT:dv_education_courses/Configuration/FlexForms/CourseList.xml';
