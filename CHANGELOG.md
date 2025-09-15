# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.0.0] - 2026-03-28

### Added
- Full German translation
- Unit and functional tests
- RST documentation
- TYPO3 v13.4 LTS compatibility verified

### Changed
- Extension declared stable for production use

## [0.2.0] - 2025-12-10

### Added
- Course search with text and type filter
- CourseService with suggested courses logic (manual + type-based)
- Event list with upcoming events filter
- FlexForm configuration for all plugins
- Reset button in search form

### Fixed
- cHash exclusion for all plugin parameters
- Course list action set to non-cacheable for POST search

## [0.1.0] - 2025-09-15

### Added
- Initial extension extracted from EIPOS course management
- Course model with description, objectives, target groups, admission requirements
- Event model with scheduling, pricing, location, booked-up status
- SingleEvent for multi-day event schedules
- Location, Type, ContactPerson models
- IRRE relations: Course -> Events, Event -> SingleEvents
- MM relations: Course <-> ContactPersons, Course <-> SimilarCourses
- Four plugins: CourseList, CourseDetail, EventList, EventDetail
- Slug fields with auto-generation
- TYPO3 v12.4 LTS and v13.4 LTS support
- PHP 8.2 - 8.4 support
