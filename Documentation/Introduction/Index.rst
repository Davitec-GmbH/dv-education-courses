.. include:: ../Includes.rst.txt

============
Introduction
============

.. contents:: Table of Contents
   :local:
   :depth: 2

What does it do?
================

The **Education Courses** extension provides a generic course catalog system for
the education sector. It was originally extracted from the EIPOS course management
system and designed to be reusable across different TYPO3 projects.

The extension manages the complete lifecycle of educational offerings: from
defining course templates with descriptions, objectives, and target groups, to
scheduling concrete events with dates, pricing, and locations, down to individual
session dates within multi-day events.

It provides four frontend plugins for listing and displaying courses and events,
including full-text search and type-based filtering.

Features
========

Domain models
-------------

The extension ships with six domain models that cover the full course catalog
domain:

- **Course** -- The main entity. Holds title, description, content, objectives,
  target groups, admission requirements, images, and a slug for URL generation.
- **Event** -- A concrete scheduled instance of a course with start/end dates,
  duration, price, location reference, booked-up and on-request flags, and an
  event code.
- **SingleEvent** -- An individual date entry within a multi-day event, providing
  fine-grained scheduling (title, start date, end date).
- **Type** -- Categorises courses (e.g. workshop, seminar, certificate program)
  with title, description, and slug.
- **Location** -- Physical venue with name, street, zipcode, and city. Provides
  a computed full address string.
- **ContactPerson** -- Contact details (salutation, title, first name, last name,
  phone, email) linked to courses via MM relation.

Three-level hierarchy
---------------------

The data model follows a clear three-level hierarchy:

::

   Course
     |-- Event (IRRE, cascade delete)
     |     |-- SingleEvent (IRRE, cascade delete)
     |
     |-- ContactPerson (MM relation)
     |-- SimilarCourses (MM self-relation)

- **Course** → **Event**: One course can have multiple scheduled events
  (inline relation with cascade delete).
- **Event** → **SingleEvent**: Each event can contain multiple single-day
  entries for multi-day schedules (inline relation with cascade delete).
- **Course** → **ContactPerson**: Many-to-many relation allowing shared
  contact persons across courses.
- **Course** → **SimilarCourses**: Self-referencing many-to-many relation
  for cross-linking related courses.

Frontend plugins
----------------

Four content element plugins are registered:

- **CourseList** -- Lists courses with text search and type filter. The list
  action is non-cacheable to support POST-based search.
- **CourseDetail** -- Displays a single course with all its details, events,
  contact persons, and similar courses.
- **EventList** -- Lists upcoming events with filtering. The list action is
  non-cacheable.
- **EventDetail** -- Displays a single event with its schedule (single events),
  location, and pricing.

Search and filter
-----------------

The course list plugin provides:

- **Text search** via a search term input field
- **Type filter** to narrow results by course type
- **Reset button** to clear all filters
- Pagination with configurable items per page

Slug management
---------------

Automatic slug generation is provided for the following entities:

- Courses (``slug`` field)
- Events (``slug`` field)
- Types (``slug`` field)

Slugs enable human-readable URLs when used with TYPO3's route enhancer
configuration.

Compatibility
=============

- **TYPO3**: v12.4 LTS and v13.4 LTS
- **PHP**: 8.2, 8.3, 8.4
