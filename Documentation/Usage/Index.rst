.. include:: ../Includes.rst.txt

=====
Usage
=====

.. contents:: Table of Contents
   :local:
   :depth: 2

Managing course types
=====================

Course types categorise your courses (e.g. "Workshop", "Seminar", "Certificate
Program"). They are used for filtering in the course list.

1. Navigate to your storage folder in **Web > List**.
2. Click the **Create new record** button.
3. Select **Type** under the *Education Courses* section.
4. Fill in the fields:

   - **Title** -- The display name of the type (e.g. "Seminar").
   - **Description** -- Optional description of this course category.
   - **Slug** -- Auto-generated from the title. Used for URL generation.

5. Save the record.

Create at least one type before creating courses. Types enable visitors to filter
the course list by category.

Creating courses
================

A course represents an educational offering (e.g. "Project Management
Fundamentals"). It is the top-level entity in the hierarchy.

1. Navigate to your storage folder in **Web > List**.
2. Click **Create new record** and select **Course**.
3. Fill in the **General** tab:

   - **Title** -- The course name.
   - **Slug** -- Auto-generated from the title for URL routing.
   - **Type** -- Select a previously created type.
   - **Description** -- Short summary shown in list views.
   - **Content** -- Full course description (RTE field).

4. Fill in the **Details** tab:

   - **Objectives** -- Learning objectives of the course.
   - **Target Groups** -- Who should attend this course.
   - **Admission Requirements** -- Prerequisites for enrolment.

5. Add **Images** via the file reference relation.
6. Save the record.

Adding contact persons
======================

Contact persons are shared records that can be linked to multiple courses via an
MM relation.

1. Create **ContactPerson** records in your storage folder:

   - **Salutation** -- e.g. "Frau", "Herr".
   - **Title** -- Academic title (e.g. "Dr.", "Prof.").
   - **First Name** and **Last Name**.
   - **Phone** and **Email**.

2. To link a contact person to a course, edit the course record and add the
   contact person in the **Contact Persons** relation field.

A single contact person can be assigned to multiple courses. Changes to the
contact person record are reflected everywhere it is used.

Adding events
=============

Events are concrete scheduled instances of a course. They are stored as inline
(IRRE) children of the course record.

1. Edit a course record.
2. In the **Events** section, click **Create new**.
3. Fill in the event fields:

   - **Title** -- Name of this specific event instance (e.g. "Spring 2026").
   - **Event Code** -- Internal identifier or booking code.
   - **Description** -- Additional details specific to this event.
   - **Start Date** and **End Date** -- The overall event period.
   - **Duration** -- Text field for display purposes (e.g. "3 days", "40 hours").
   - **Price** -- Numeric value in EUR. Displayed as formatted currency
     (e.g. "1.250,00 EUR").
   - **Location** -- Select a previously created location record.
   - **Booked Up** -- Check if this event is fully booked. Displayed as a flag
     in the frontend.
   - **On Request** -- Check if pricing is only available on request. When
     enabled, the price is hidden in the frontend.
   - **Slug** -- Auto-generated from the title.

4. Save the course (events are saved with the parent course).

.. note::

   Deleting a course will automatically delete all its events (cascade delete).

Adding single events
====================

Single events represent individual session dates within a multi-day event. They
are stored as inline (IRRE) children of the event record.

1. Edit an event (within a course record).
2. In the **Single Events** section, click **Create new**.
3. Fill in:

   - **Title** -- Name of this session (e.g. "Day 1: Introduction").
   - **Start Date** -- Date and time this session begins.
   - **End Date** -- Date and time this session ends.

4. Repeat for each session day.

Single events are displayed in the event detail view, providing visitors with a
detailed schedule of multi-day events.

.. note::

   Deleting an event will automatically delete all its single events
   (cascade delete).

Managing locations
==================

Locations are standalone records representing physical venues.

1. Create a **Location** record in your storage folder:

   - **Name** -- Venue name (e.g. "Conference Center Dresden").
   - **Street** -- Street address.
   - **Zipcode** -- Postal code.
   - **City** -- City name.

2. The location is then available for selection in event records.

The model provides a computed ``fullAddress`` property that combines street,
zipcode, and city into a single display string.

Linking similar courses
=======================

Courses can be cross-linked via the similar courses MM relation. This is useful
for "You might also be interested in" sections on the course detail page.

1. Edit a course record.
2. In the **Similar Courses** relation field, add one or more other courses.
3. Save.

In addition to manual linking, the ``CourseService`` provides automatic
suggestions based on matching course types. If a course has fewer manual
similar-course links than desired, the service fills up with other courses of
the same type.

Course list: search and filter
==============================

The **CourseList** plugin renders a list of courses with search and filter
capabilities.

**Frontend features:**

- **Search field** -- Visitors can enter a text search term. The search is
  performed on course titles and descriptions.
- **Type filter** -- A dropdown or selection of course types to filter results.
- **Reset button** -- Clears all active filters and shows the full list.
- **Pagination** -- Results are paginated according to the ``itemsPerPage``
  setting (default: 20).

**How search works:**

The list action accepts ``searchTerm`` and ``type`` parameters via POST. Since
the action is non-cacheable, each search request is processed fresh. The cHash
exclusion configuration ensures no cHash errors occur.

**Configuration per instance:**

Each CourseList plugin instance can override the detail page PID, list page PID,
and items per page via the FlexForm (see :ref:`Configuration <configuration>`).

Event listing
=============

The **EventList** plugin displays events. It shows upcoming events and currently
running events based on the start and end dates.

The event model provides two computed properties:

- ``isUpcoming`` -- Returns ``true`` if the event's start date is in the future.
- ``isRunning`` -- Returns ``true`` if the current date is between the event's
  start and end dates.

These properties can be used in Fluid templates to visually distinguish between
upcoming and running events.

Course and event detail views
=============================

The **CourseDetail** plugin renders all information about a single course:

- Title, description, content
- Objectives, target groups, admission requirements
- Images
- List of events with dates, prices, and locations
- Contact persons with phone and email
- Similar courses

The **EventDetail** plugin renders a single event:

- Title, event code, description
- Start/end dates, duration
- Price (formatted with currency symbol, or hidden for on-request events)
- Location with full address
- Schedule of single events (for multi-day events)
