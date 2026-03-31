<?php

declare(strict_types=1);

namespace Davitec\DvEducationCourses\Service;

use Davitec\DvEducationCourses\Domain\Model\Course;
use Davitec\DvEducationCourses\Domain\Repository\CourseRepository;
use Davitec\DvEducationCourses\Domain\Repository\EventRepository;

/**
 * Service for course-related business logic.
 */
class CourseService
{
    public function __construct(
        private readonly CourseRepository $courseRepository,
        private readonly EventRepository $eventRepository,
    ) {}

    /**
     * Returns courses that have at least one upcoming event.
     *
     * @return Course[]
     */
    public function getCoursesWithUpcomingEvents(): array
    {
        $courses = [];
        foreach ($this->courseRepository->findAll() as $course) {
            $upcomingEvents = $this->eventRepository->findUpcoming();
            foreach ($upcomingEvents as $event) {
                if ($event->getUid() !== null) {
                    $courses[$course->getUid()] = $course;
                    break;
                }
            }
        }

        return array_values($courses);
    }

    /**
     * Returns suggested courses: manual similar courses first, then fill up to limit.
     *
     * @return Course[]
     */
    public function getSuggestedCourses(Course $course, int $limit = 4): array
    {
        $suggestions = [];

        foreach ($course->getSimilarCourses() as $similar) {
            $suggestions[$similar->getUid()] = $similar;
            if (count($suggestions) >= $limit) {
                return array_values($suggestions);
            }
        }

        if ($course->getType() !== null && count($suggestions) < $limit) {
            $byType = $this->courseRepository->findByType($course->getType());
            foreach ($byType as $candidate) {
                if ($candidate->getUid() === $course->getUid()) {
                    continue;
                }
                $suggestions[$candidate->getUid()] = $candidate;
                if (count($suggestions) >= $limit) {
                    break;
                }
            }
        }

        return array_values($suggestions);
    }
}
