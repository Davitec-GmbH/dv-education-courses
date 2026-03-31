.. include:: ../Includes.rst.txt

============
Installation
============

.. contents:: Table of Contents
   :local:
   :depth: 2

Requirements
============

- TYPO3 v12.4 LTS or v13.4 LTS
- PHP 8.2 or higher
- Composer-based TYPO3 installation

Composer installation
=====================

Install the extension via Composer:

.. code-block:: bash

   composer require davitec/dv-education-courses

Activate the extension
======================

After installing the package, activate the extension in the TYPO3 backend:

1. Go to **Admin Tools > Extensions**.
2. Search for ``dv_education_courses``.
3. Click the activate icon if the extension is not yet active.

Alternatively, activate via CLI:

.. code-block:: bash

   vendor/bin/typo3 extension:setup

Database update
===============

The extension adds several database tables. Update the database schema:

**Via backend:**

1. Go to **Admin Tools > Maintenance > Analyze Database Structure**.
2. Apply all suggested changes for tables starting with ``tx_dveducationcourses_``.

**Via CLI:**

.. code-block:: bash

   vendor/bin/typo3 database:updateschema

Include TypoScript
==================

The extension's TypoScript must be included in your site's template:

1. Go to **Web > Template** and select your root page.
2. Open the **Includes** tab (or **Info/Modify** in older versions).
3. Add **Education Courses (dv_education_courses)** to the list of included
   static templates.

Alternatively, include it manually in your site package:

.. code-block:: typoscript

   @import 'EXT:dv_education_courses/Configuration/TypoScript/setup.typoscript'
   @import 'EXT:dv_education_courses/Configuration/TypoScript/constants.typoscript'

Quick start guide
=================

After installation, follow these steps to get a working course catalog:

1. **Create a storage folder**

   Create a new SysFolder in the page tree (e.g. "Course Data") that will hold
   all course, event, type, location, and contact person records.

2. **Set the storage PID**

   Configure the TypoScript constant to point to your storage folder:

   .. code-block:: typoscript

      plugin.tx_dveducationcourses.persistence.storagePid = 42

   Replace ``42`` with the UID of your storage folder.

3. **Create pages for the plugins**

   Create the following pages in your page tree:

   - A page for the **course list**
   - A page for the **course detail** view
   - A page for the **event list** (optional)
   - A page for the **event detail** view (optional)

4. **Configure page PIDs**

   Set the TypoScript constants for the detail and list page UIDs:

   .. code-block:: typoscript

      plugin.tx_dveducationcourses.settings.detailPid = 10
      plugin.tx_dveducationcourses.settings.listPid = 9
      plugin.tx_dveducationcourses.settings.eventDetailPid = 12
      plugin.tx_dveducationcourses.settings.courseDetailPid = 10

5. **Add plugins to pages**

   - On the course list page, add the **Course List** content element.
   - On the course detail page, add the **Course Detail** content element.
   - Repeat for event list and event detail if needed.

6. **Create initial data**

   In your storage folder, create:

   - At least one **Type** record (e.g. "Seminar", "Workshop").
   - At least one **Course** record with a type assigned.
   - At least one **Event** record as an inline child of the course.

7. **Clear caches and test**

   Flush all caches and visit your course list page in the frontend.
