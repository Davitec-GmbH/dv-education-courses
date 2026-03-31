<?php

declare(strict_types=1);

namespace Davitec\DvEducationCourses\Tests\Functional\Repository;

use Davitec\DvEducationCourses\Domain\Model\Type;
use Davitec\DvEducationCourses\Domain\Repository\CourseRepository;
use Davitec\DvEducationCourses\Domain\Repository\TypeRepository;
use PHPUnit\Framework\Attributes\Test;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;

final class CourseRepositoryTest extends FunctionalTestCase
{
    protected array $testExtensionsToLoad = [
        'typo3conf/ext/dv_education_courses',
    ];

    private CourseRepository $courseRepository;
    private TypeRepository $typeRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->importCSVDataSet(__DIR__ . '/../Fixtures/pages.csv');
        $this->importCSVDataSet(__DIR__ . '/../Fixtures/tx_dveducationcourses_domain_model_type.csv');
        $this->importCSVDataSet(__DIR__ . '/../Fixtures/tx_dveducationcourses_domain_model_course.csv');

        $this->courseRepository = $this->get(CourseRepository::class);
        $this->typeRepository = $this->get(TypeRepository::class);
    }

    #[Test]
    public function findAllReturnsAllCourses(): void
    {
        $result = $this->courseRepository->findAll();
        self::assertCount(3, $result);
    }

    #[Test]
    public function findAllReturnsCoursesOrderedByTitle(): void
    {
        $result = $this->courseRepository->findAll();
        $titles = [];
        foreach ($result as $course) {
            $titles[] = $course->getTitle();
        }
        self::assertSame(['JavaScript Advanced', 'PHP Basics', 'Project Management'], $titles);
    }

    #[Test]
    public function findBySearchTermFindsMatchingCourses(): void
    {
        $result = $this->courseRepository->findBySearchTerm('PHP');
        self::assertCount(1, $result);
        self::assertSame('PHP Basics', $result->getFirst()->getTitle());
    }

    #[Test]
    public function findBySearchTermSearchesInDescription(): void
    {
        $result = $this->courseRepository->findBySearchTerm('patterns');
        self::assertCount(1, $result);
        self::assertSame('JavaScript Advanced', $result->getFirst()->getTitle());
    }

    #[Test]
    public function findBySearchTermSearchesInObjectives(): void
    {
        $result = $this->courseRepository->findBySearchTerm('Lead projects');
        self::assertCount(1, $result);
        self::assertSame('Project Management', $result->getFirst()->getTitle());
    }

    #[Test]
    public function findBySearchTermSearchesInTargetGroups(): void
    {
        $result = $this->courseRepository->findBySearchTerm('Managers');
        self::assertCount(1, $result);
        self::assertSame('Project Management', $result->getFirst()->getTitle());
    }

    #[Test]
    public function findBySearchTermReturnsEmptyResultForNoMatch(): void
    {
        $result = $this->courseRepository->findBySearchTerm('nonexistent');
        self::assertCount(0, $result);
    }

    #[Test]
    public function findByTypeReturnsCoursesOfGivenType(): void
    {
        $type = $this->typeRepository->findByUid(1);
        self::assertInstanceOf(Type::class, $type);

        $result = $this->courseRepository->findByType($type);
        self::assertCount(2, $result);
    }

    #[Test]
    public function findByTypeReturnsSeminarCourses(): void
    {
        $type = $this->typeRepository->findByUid(2);
        self::assertInstanceOf(Type::class, $type);

        $result = $this->courseRepository->findByType($type);
        self::assertCount(1, $result);
        self::assertSame('Project Management', $result->getFirst()->getTitle());
    }
}
