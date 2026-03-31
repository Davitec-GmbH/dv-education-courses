<?php

declare(strict_types=1);

namespace Davitec\DvEducationCourses\Tests\Unit\Domain\Model;

use Davitec\DvEducationCourses\Domain\Model\Location;
use PHPUnit\Framework\Attributes\Test;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

final class LocationTest extends UnitTestCase
{
    private Location $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = new Location();
    }

    #[Test]
    public function getNameReturnsInitialEmptyString(): void
    {
        self::assertSame('', $this->subject->getName());
    }

    #[Test]
    public function setNameSetsName(): void
    {
        $this->subject->setName('Conference Center');
        self::assertSame('Conference Center', $this->subject->getName());
    }

    #[Test]
    public function getCityReturnsInitialEmptyString(): void
    {
        self::assertSame('', $this->subject->getCity());
    }

    #[Test]
    public function setCitySetsCity(): void
    {
        $this->subject->setCity('Dresden');
        self::assertSame('Dresden', $this->subject->getCity());
    }

    #[Test]
    public function getZipcodeReturnsInitialEmptyString(): void
    {
        self::assertSame('', $this->subject->getZipcode());
    }

    #[Test]
    public function setZipcodeSetsZipcode(): void
    {
        $this->subject->setZipcode('01067');
        self::assertSame('01067', $this->subject->getZipcode());
    }

    #[Test]
    public function getStreetReturnsInitialEmptyString(): void
    {
        self::assertSame('', $this->subject->getStreet());
    }

    #[Test]
    public function setStreetSetsStreet(): void
    {
        $this->subject->setStreet('Prager Str. 10');
        self::assertSame('Prager Str. 10', $this->subject->getStreet());
    }

    #[Test]
    public function getSortingReturnsInitialZero(): void
    {
        self::assertSame(0, $this->subject->getSorting());
    }

    #[Test]
    public function setSortingSetsSorting(): void
    {
        $this->subject->setSorting(1);
        self::assertSame(1, $this->subject->getSorting());
    }

    #[Test]
    public function getFullAddressReturnsCompleteAddress(): void
    {
        $this->subject->setStreet('Prager Str. 10');
        $this->subject->setZipcode('01067');
        $this->subject->setCity('Dresden');
        self::assertSame('Prager Str. 10, 01067 Dresden', $this->subject->getFullAddress());
    }

    #[Test]
    public function getFullAddressReturnsPartialAddressWithoutStreet(): void
    {
        $this->subject->setZipcode('01067');
        $this->subject->setCity('Dresden');
        self::assertSame('01067 Dresden', $this->subject->getFullAddress());
    }

    #[Test]
    public function getFullAddressReturnsPartialAddressWithOnlyCity(): void
    {
        $this->subject->setCity('Dresden');
        self::assertSame('Dresden', $this->subject->getFullAddress());
    }

    #[Test]
    public function getFullAddressReturnsEmptyStringWhenAllFieldsEmpty(): void
    {
        self::assertSame('', $this->subject->getFullAddress());
    }
}
