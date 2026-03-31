<?php

declare(strict_types=1);

namespace Davitec\DvEducationCourses\Tests\Functional\Repository;

use Davitec\DvEducationCourses\Domain\Repository\EventRepository;
use PHPUnit\Framework\Attributes\Test;
use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;

final class EventRepositoryTest extends FunctionalTestCase
{
    protected array $testExtensionsToLoad = [
        'typo3conf/ext/dv_education_courses',
    ];

    private EventRepository $eventRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->importCSVDataSet(__DIR__ . '/../Fixtures/pages.csv');
        $this->importCSVDataSet(__DIR__ . '/../Fixtures/tx_dveducationcourses_domain_model_location.csv');
        $this->importCSVDataSet(__DIR__ . '/../Fixtures/tx_dveducationcourses_domain_model_type.csv');
        $this->importCSVDataSet(__DIR__ . '/../Fixtures/tx_dveducationcourses_domain_model_course.csv');
        $this->importCSVDataSet(__DIR__ . '/../Fixtures/tx_dveducationcourses_domain_model_event.csv');

        $this->eventRepository = $this->get(EventRepository::class);
    }

    #[Test]
    public function findUpcomingReturnsOnlyFutureEvents(): void
    {
        $result = $this->eventRepository->findUpcoming();
        // Events with uid 1 (startdate=1900000000) and uid 2 (startdate=1930000000) are future
        // Event uid 3 started in past (1700000000) so not upcoming even though enddate is future
        // Event uid 4 is fully past
        self::assertCount(2, $result);
    }

    #[Test]
    public function findUpcomingRespectsLimit(): void
    {
        $result = $this->eventRepository->findUpcoming(1);
        self::assertCount(1, $result);
    }

    #[Test]
    public function findUpcomingReturnsEventsOrderedByStartdate(): void
    {
        $result = $this->eventRepository->findUpcoming();
        $titles = [];
        foreach ($result as $event) {
            $titles[] = $event->getTitle();
        }
        self::assertSame(['Future Event 1', 'Future Event 2'], $titles);
    }

    #[Test]
    public function findByCourseReturnsEventsForGivenCourse(): void
    {
        // Course 1 has events 1 and 3
        $result = $this->eventRepository->findByCourse(1);
        self::assertCount(2, $result);
    }

    #[Test]
    public function findByCourseReturnsEmptyForCourseWithoutEvents(): void
    {
        // Course 2 has event 2 only
        $result = $this->eventRepository->findByCourse(99);
        self::assertCount(0, $result);
    }

    #[Test]
    public function findRunningReturnsCurrentlyRunningEvents(): void
    {
        // Event uid 3: startdate=1700000000 (past), enddate=1900000000 (future) => running
        $result = $this->eventRepository->findRunning();
        self::assertCount(1, $result);
        self::assertSame('Running Event', $result->getFirst()->getTitle());
    }
}
