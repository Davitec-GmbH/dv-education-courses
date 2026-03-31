<?php

declare(strict_types=1);

namespace Davitec\DvEducationCourses\Tests\Unit\Domain\Model;

use Davitec\DvEducationCourses\Domain\Model\SingleEvent;
use PHPUnit\Framework\Attributes\Test;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

final class SingleEventTest extends UnitTestCase
{
    private SingleEvent $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = new SingleEvent();
    }

    #[Test]
    public function getTitleReturnsInitialEmptyString(): void
    {
        self::assertSame('', $this->subject->getTitle());
    }

    #[Test]
    public function setTitleSetsTitle(): void
    {
        $this->subject->setTitle('Day 1');
        self::assertSame('Day 1', $this->subject->getTitle());
    }

    #[Test]
    public function getStartdateReturnsInitialNull(): void
    {
        self::assertNull($this->subject->getStartdate());
    }

    #[Test]
    public function setStartdateSetsStartdate(): void
    {
        $date = new \DateTime('2026-05-01');
        $this->subject->setStartdate($date);
        self::assertSame($date, $this->subject->getStartdate());
    }

    #[Test]
    public function setStartdateAcceptsNull(): void
    {
        $this->subject->setStartdate(new \DateTime());
        $this->subject->setStartdate(null);
        self::assertNull($this->subject->getStartdate());
    }

    #[Test]
    public function getEnddateReturnsInitialNull(): void
    {
        self::assertNull($this->subject->getEnddate());
    }

    #[Test]
    public function setEnddateSetsEnddate(): void
    {
        $date = new \DateTime('2026-05-02');
        $this->subject->setEnddate($date);
        self::assertSame($date, $this->subject->getEnddate());
    }

    #[Test]
    public function setEnddateAcceptsNull(): void
    {
        $this->subject->setEnddate(new \DateTime());
        $this->subject->setEnddate(null);
        self::assertNull($this->subject->getEnddate());
    }

    #[Test]
    public function getSortingReturnsInitialZero(): void
    {
        self::assertSame(0, $this->subject->getSorting());
    }

    #[Test]
    public function setSortingSetsSorting(): void
    {
        $this->subject->setSorting(2);
        self::assertSame(2, $this->subject->getSorting());
    }
}
