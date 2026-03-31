<?php

declare(strict_types=1);

namespace Davitec\DvEducationCourses\Tests\Unit\Domain\Model;

use Davitec\DvEducationCourses\Domain\Model\ContactPerson;
use PHPUnit\Framework\Attributes\Test;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

final class ContactPersonTest extends UnitTestCase
{
    private ContactPerson $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = new ContactPerson();
    }

    #[Test]
    public function getSalutationReturnsInitialEmptyString(): void
    {
        self::assertSame('', $this->subject->getSalutation());
    }

    #[Test]
    public function setSalutationSetsSalutation(): void
    {
        $this->subject->setSalutation('Herr');
        self::assertSame('Herr', $this->subject->getSalutation());
    }

    #[Test]
    public function getTitleReturnsInitialEmptyString(): void
    {
        self::assertSame('', $this->subject->getTitle());
    }

    #[Test]
    public function setTitleSetsTitle(): void
    {
        $this->subject->setTitle('Dr.');
        self::assertSame('Dr.', $this->subject->getTitle());
    }

    #[Test]
    public function getFirstNameReturnsInitialEmptyString(): void
    {
        self::assertSame('', $this->subject->getFirstName());
    }

    #[Test]
    public function setFirstNameSetsFirstName(): void
    {
        $this->subject->setFirstName('Max');
        self::assertSame('Max', $this->subject->getFirstName());
    }

    #[Test]
    public function getLastNameReturnsInitialEmptyString(): void
    {
        self::assertSame('', $this->subject->getLastName());
    }

    #[Test]
    public function setLastNameSetsLastName(): void
    {
        $this->subject->setLastName('Mustermann');
        self::assertSame('Mustermann', $this->subject->getLastName());
    }

    #[Test]
    public function getPhoneReturnsInitialEmptyString(): void
    {
        self::assertSame('', $this->subject->getPhone());
    }

    #[Test]
    public function setPhoneSetsPhone(): void
    {
        $this->subject->setPhone('+49 351 1234567');
        self::assertSame('+49 351 1234567', $this->subject->getPhone());
    }

    #[Test]
    public function getEmailReturnsInitialEmptyString(): void
    {
        self::assertSame('', $this->subject->getEmail());
    }

    #[Test]
    public function setEmailSetsEmail(): void
    {
        $this->subject->setEmail('max@example.com');
        self::assertSame('max@example.com', $this->subject->getEmail());
    }

    #[Test]
    public function getSortingReturnsInitialZero(): void
    {
        self::assertSame(0, $this->subject->getSorting());
    }

    #[Test]
    public function setSortingSetsSorting(): void
    {
        $this->subject->setSorting(4);
        self::assertSame(4, $this->subject->getSorting());
    }

    #[Test]
    public function getNameReturnsFullNameWithTitle(): void
    {
        $this->subject->setTitle('Dr.');
        $this->subject->setFirstName('Max');
        $this->subject->setLastName('Mustermann');
        self::assertSame('Dr. Max Mustermann', $this->subject->getName());
    }

    #[Test]
    public function getNameReturnsFullNameWithoutTitle(): void
    {
        $this->subject->setFirstName('Max');
        $this->subject->setLastName('Mustermann');
        self::assertSame('Max Mustermann', $this->subject->getName());
    }

    #[Test]
    public function getNameReturnsEmptyStringWhenAllFieldsEmpty(): void
    {
        self::assertSame('', $this->subject->getName());
    }
}
