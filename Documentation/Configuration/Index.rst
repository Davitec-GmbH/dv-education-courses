.. include:: ../Includes.rst.txt

=============
Configuration
=============

.. contents:: Table of Contents
   :local:
   :depth: 2

TypoScript constants
====================

All settings are configured under ``plugin.tx_dveducationcourses``. The following
constants are available:

.. t3-field-list-table::
   :header-rows: 1

   - :Constant: Constant
     :Type: Type
     :Default: Default
     :Description: Description

   - :Constant: ``persistence.storagePid``
     :Type: int
     :Default: *(empty)*
     :Description: UID of the SysFolder containing course records.

   - :Constant: ``settings.detailPid``
     :Type: int
     :Default: *(empty)*
     :Description: UID of the page containing the Course Detail plugin.

   - :Constant: ``settings.listPid``
     :Type: int
     :Default: *(empty)*
     :Description: UID of the page containing the Course List plugin.

   - :Constant: ``settings.eventDetailPid``
     :Type: int
     :Default: *(empty)*
     :Description: UID of the page containing the Event Detail plugin.

   - :Constant: ``settings.courseDetailPid``
     :Type: int
     :Default: *(empty)*
     :Description: UID of the page containing the Course Detail plugin (used in
        event views to link back to the parent course).

   - :Constant: ``settings.itemsPerPage``
     :Type: int
     :Default: ``20``
     :Description: Number of items shown per page in list views.

Example configuration:

.. code-block:: typoscript

   plugin.tx_dveducationcourses {
       persistence.storagePid = 42
       settings {
           detailPid = 10
           listPid = 9
           eventDetailPid = 12
           courseDetailPid = 10
           itemsPerPage = 15
       }
   }

FlexForm settings
=================

The **Course List** plugin provides a FlexForm with plugin-level overrides for
the following settings. These values take precedence over the TypoScript
constants when set:

.. t3-field-list-table::
   :header-rows: 1

   - :Setting: Setting
     :Description: Description
     :Default: Default

   - :Setting: ``settings.detailPid``
     :Description: Course detail page -- overrides the TypoScript constant for
        this specific plugin instance. Page picker (group type).
     :Default: *(from TypoScript)*

   - :Setting: ``settings.listPid``
     :Description: Course list page -- overrides the TypoScript constant for
        this specific plugin instance. Page picker (group type).
     :Default: *(from TypoScript)*

   - :Setting: ``settings.itemsPerPage``
     :Description: Number of items per page for pagination in this plugin
        instance.
     :Default: ``20``

To access the FlexForm, edit the Course List content element and switch to the
**Plugin** tab.

Plugins (CType)
===============

The extension registers four content element plugins (CType). All plugins use the
Extbase ``PLUGIN_TYPE_CONTENT_ELEMENT`` registration.

.. t3-field-list-table::
   :header-rows: 1

   - :CType: CType
     :Plugin: Plugin key
     :Controller: Controller / Action
     :Cacheable: Cacheable

   - :CType: ``dveducationcourses_courselist``
     :Plugin: CourseList
     :Controller: ``CourseController::list``
     :Cacheable: No (non-cacheable for POST search)

   - :CType: ``dveducationcourses_coursedetail``
     :Plugin: CourseDetail
     :Controller: ``CourseController::show``
     :Cacheable: Yes

   - :CType: ``dveducationcourses_eventlist``
     :Plugin: EventList
     :Controller: ``EventController::list``
     :Cacheable: No (non-cacheable for filtering)

   - :CType: ``dveducationcourses_eventdetail``
     :Plugin: EventDetail
     :Controller: ``EventController::show``
     :Cacheable: Yes

Caching behaviour
=================

The extension configures cHash exclusions in ``ext_localconf.php`` for all plugin
parameters. This ensures that search terms, filter values, and detail record UIDs
do not generate unnecessary cHash values that would pollute the page cache.

The excluded parameters cover all four plugins:

- ``tx_dveducationcourses_courselist[searchTerm]``
- ``tx_dveducationcourses_courselist[type]``
- ``tx_dveducationcourses_coursedetail[course]``
- ``tx_dveducationcourses_eventdetail[event]``
- All associated ``__referrer`` and ``__trustedProperties`` parameters

The **CourseList** and **EventList** plugins are registered as non-cacheable
because they handle POST-based search and filter requests. The **CourseDetail**
and **EventDetail** plugins are fully cacheable.

Template overrides
==================

The extension uses standard Extbase/Fluid template paths. To override templates
in your site package, add higher-priority template paths via TypoScript:

.. code-block:: typoscript

   plugin.tx_dveducationcourses {
       view {
           templateRootPaths.10 = EXT:your_site_package/Resources/Private/Extensions/DvEducationCourses/Templates/
           partialRootPaths.10 = EXT:your_site_package/Resources/Private/Extensions/DvEducationCourses/Partials/
           layoutRootPaths.10 = EXT:your_site_package/Resources/Private/Extensions/DvEducationCourses/Layouts/
       }
   }

The default template paths (priority ``0``) are:

- ``EXT:dv_education_courses/Resources/Private/Templates/``
- ``EXT:dv_education_courses/Resources/Private/Partials/``
- ``EXT:dv_education_courses/Resources/Private/Layouts/``

.. important::

   When overriding templates, maintain the same directory structure and file names
   as the original templates. Only copy the files you want to modify.
