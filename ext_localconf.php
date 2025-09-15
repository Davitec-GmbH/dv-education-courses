<?php

declare(strict_types=1);

use Davitec\DvEducationCourses\Controller\CourseController;
use Davitec\DvEducationCourses\Controller\EventController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

$GLOBALS['TYPO3_CONF_VARS']['FE']['cacheHash']['excludedParameters'] = array_merge(
    $GLOBALS['TYPO3_CONF_VARS']['FE']['cacheHash']['excludedParameters'] ?? [],
    [
        'tx_dveducationcourses_courselist[searchTerm]',
        'tx_dveducationcourses_courselist[type]',
        'tx_dveducationcourses_courselist[action]',
        'tx_dveducationcourses_courselist[controller]',
        'tx_dveducationcourses_courselist[__referrer]',
        'tx_dveducationcourses_courselist[__referrer][@extension]',
        'tx_dveducationcourses_courselist[__referrer][@controller]',
        'tx_dveducationcourses_courselist[__referrer][@action]',
        'tx_dveducationcourses_courselist[__referrer][@request]',
        'tx_dveducationcourses_courselist[__trustedProperties]',
        'tx_dveducationcourses_coursedetail[course]',
        'tx_dveducationcourses_coursedetail[action]',
        'tx_dveducationcourses_coursedetail[controller]',
        'tx_dveducationcourses_eventlist[action]',
        'tx_dveducationcourses_eventlist[controller]',
        'tx_dveducationcourses_eventdetail[event]',
        'tx_dveducationcourses_eventdetail[action]',
        'tx_dveducationcourses_eventdetail[controller]',
    ],
);

ExtensionUtility::configurePlugin(
    'DvEducationCourses',
    'CourseList',
    [CourseController::class => 'list'],
    [CourseController::class => 'list'],
    ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);

ExtensionUtility::configurePlugin(
    'DvEducationCourses',
    'CourseDetail',
    [CourseController::class => 'show'],
    [],
    ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);

ExtensionUtility::configurePlugin(
    'DvEducationCourses',
    'EventList',
    [EventController::class => 'list'],
    [EventController::class => 'list'],
    ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);

ExtensionUtility::configurePlugin(
    'DvEducationCourses',
    'EventDetail',
    [EventController::class => 'show'],
    [],
    ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);
