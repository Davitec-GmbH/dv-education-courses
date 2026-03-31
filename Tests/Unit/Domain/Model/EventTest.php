<?php

declare(strict_types=1);

namespace Davitec\DvEducationCourses\Tests\Unit\Domain\Model;

use Davitec\DvEducationCourses\Domain\Model\Event;
use Davitec\DvEducationCourses\Domain\Model\Location;
use Davitec\DvEducationCourses\Domain\Model\SingleEvent;
use PHPUnit\Framework\Attributes\Test;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

final class EventTest extends UnitTestCase
{
    private Event $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = new Event();
        $this->subject->initializeObject();
    }

    #[Test]
    public function initializeObjectInitializesSingleEventsStorage(): void
    {
        $event = new Event();
        $event->initializeObject();
        self::assertInstanceOf(ObjectStorage::class, $event->getSingleEvents());
    }

    #[Test]
    public function getTitleReturnsInitialEmptyString(): void
    {
        self::assertSame('', $this->subject->getTitle());
    }

    #[Test]
    public function setTitleSetsTitle(): void
    {
        $this->subject->setTitle('Spring Event');
        self::assertSame('Spring Event', $this->subject->getTitle());
    }

    #[Test]
    public function getEventCodeReturnsInitialEmptyString(): void
    {
        self::assertSame('', $this->subject->getEventCode());
    }

    #[Test]
    public function setEventCodeSetsEventCode(): void
    {
        $this->subject->setEventCode('EVT-001');
        self::assertSame('EVT-001', $this->subject->getEventCode());
    }

    #[Test]
    public function getDescriptionReturnsInitialEmptyString(): void
    {
        self::assertSame('', $this->subject->getDescription());
    }

    #[Test]
    public function setDescriptionSetsDescription(): void
    {
        $this->subject->setDescription('Event description');
        self::assertSame('Event description', $this->subject->getDescription());
    }

    #[Test]
    public function getStartdateReturnsInitialNull(): void
    {
        self::assertNull($this->subject->getStartdate());
    }

    #[Test]
    public function setStartdateSetsStartdate(): void
    {
        $date = new \DateTime('2026-06-01');
        $this->subject->setStartdate($date);
        self::assertSame($date, $this->subject->getStartdate());
    }

    #[Test]
    public function getEnddateReturnsInitialNull(): void
    {
        self::assertNull($this->subject->getEnddate());
    }

    #[Test]
    public function setEnddateSetsEnddate(): void
    {
        $date = new \DateTime('2026-06-30');
        $this->subject->setEnddate($date);
        self::assertSame($date, $this->subject->getEnddate());
    }

    #[Test]
    public function getDurationReturnsInitialEmptyString(): void
    {
        self::assertSame('', $this->subject->getDuration());
    }

    #[Test]
    public function setDurationSetsDuration(): void
    {
        $this->subject->setDuration('3 days');
        self::assertSame('3 days', $this->subject->getDuration());
    }

    #[Test]
    public function getPriceReturnsInitialZero(): void
    {
        self::assertSame(0.00, $this->subject->getPrice());
    }

    #[Test]
    public function setPriceSetsPrice(): void
    {
        $this->subject->setPrice(499.99);
        self::assertSame(499.99, $this->subject->getPrice());
    }

    #[Test]
    public function getLocationReturnsInitialNull(): void
    {
        self::assertNull($this->subject->getLocation());
    }

    #[Test]
    public function setLocationSetsLocation(): void
    {
        $location = new Location();
        $this->subject->setLocation($location);
        self::assertSame($location, $this->subject->getLocation());
    }

    #[Test]
    public function setLocationAcceptsNull(): void
    {
        $this->subject->setLocation(new Location());
        $this->subject->setLocation(null);
        self::assertNull($this->subject->getLocation());
    }

    #[Test]
    public function getBookedUpReturnsInitialFalse(): void
    {
        self::assertFalse($this->subject->getBookedUp());
    }

    #[Test]
    public function setBookedUpSetsBookedUp(): void
    {
        $this->subject->setBookedUp(true);
        self::assertTrue($this->subject->getBookedUp());
    }

    #[Test]
    public function getOnRequestReturnsInitialFalse(): void
    {
        self::assertFalse($this->subject->getOnRequest());
    }

    #[Test]
    public function setOnRequestSetsOnRequest(): void
    {
        $this->subject->setOnRequest(true);
        self::assertTrue($this->subject->getOnRequest());
    }

    #[Test]
    public function getSlugReturnsInitialEmptyString(): void
    {
        self::assertSame('', $this->subject->getSlug());
    }

    #[Test]
    public function setSlugSetsSlug(): void
    {
        $this->subject->setSlug('spring-event');
        self::assertSame('spring-event', $this->subject->getSlug());
    }

    #[Test]
    public function getSortingReturnsInitialZero(): void
    {
        self::assertSame(0, $this->subject->getSorting());
    }

    #[Test]
    public function setSortingSetsSorting(): void
    {
        $this->subject->setSorting(3);
        self::assertSame(3, $this->subject->getSorting());
    }

    #[Test]
    public function getSingleEventsReturnsObjectStorage(): void
    {
        self::assertInstanceOf(ObjectStorage::class, $this->subject->getSingleEvents());
    }

    #[Test]
    public function setSingleEventsSetsSingleEvents(): void
    {
        $storage = new ObjectStorage();
        $storage->attach(new SingleEvent());
        $this->subject->setSingleEvents($storage);
        self::assertCount(1, $this->subject->getSingleEvents());
    }

    #[Test]
    public function addSingleEventAddsSingleEvent(): void
    {
        $singleEvent = new SingleEvent();
        $this->subject->addSingleEvent($singleEvent);
        self::assertTrue($this->subject->getSingleEvents()->contains($singleEvent));
    }

    #[Test]
    public function removeSingleEventRemovesSingleEvent(): void
    {
        $singleEvent = new SingleEvent();
        $this->subject->addSingleEvent($singleEvent);
        $this->subject->removeSingleEvent($singleEvent);
        self::assertFalse($this->subject->getSingleEvents()->contains($singleEvent));
    }

    #[Test]
    public function getIsUpcomingReturnsTrueForFutureStartdate(): void
    {
        $this->subject->setStartdate(new \DateTime('+1 month'));
        self::assertTrue($this->subject->getIsUpcoming());
    }

    #[Test]
    public function getIsUpcomingReturnsFalseForPastStartdate(): void
    {
        $this->subject->setStartdate(new \DateTime('-1 month'));
        self::assertFalse($this->subject->getIsUpcoming());
    }

    #[Test]
    public function getIsUpcomingReturnsFalseWhenStartdateIsNull(): void
    {
        self::assertFalse($this->subject->getIsUpcoming());
    }

    #[Test]
    public function getIsRunningReturnsTrueWhenBetweenStartAndEnd(): void
    {
        $this->subject->setStartdate(new \DateTime('-1 week'));
        $this->subject->setEnddate(new \DateTime('+1 week'));
        self::assertTrue($this->subject->getIsRunning());
    }

    #[Test]
    public function getIsRunningReturnsFalseWhenOutsideDateRange(): void
    {
        $this->subject->setStartdate(new \DateTime('+1 week'));
        $this->subject->setEnddate(new \DateTime('+2 weeks'));
        self::assertFalse($this->subject->getIsRunning());
    }

    #[Test]
    public function getIsRunningReturnsFalseWhenDatesAreNull(): void
    {
        self::assertFalse($this->subject->getIsRunning());
    }

    #[Test]
    public function getFormattedPriceReturnsFormattedString(): void
    {
        $this->subject->setPrice(1499.50);
        self::assertSame('1.499,50 €', $this->subject->getFormattedPrice());
    }

    #[Test]
    public function getFormattedPriceReturnsEmptyStringWhenOnRequest(): void
    {
        $this->subject->setPrice(500.00);
        $this->subject->setOnRequest(true);
        self::assertSame('', $this->subject->getFormattedPrice());
    }

    #[Test]
    public function getFormattedPriceFormatsZeroPrice(): void
    {
        self::assertSame('0,00 €', $this->subject->getFormattedPrice());
    }
}
