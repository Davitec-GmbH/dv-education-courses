<?php

declare(strict_types=1);

namespace Davitec\DvEducationCourses\Tests\Unit\Domain\Model;

use Davitec\DvEducationCourses\Domain\Model\Type;
use PHPUnit\Framework\Attributes\Test;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

final class TypeTest extends UnitTestCase
{
    private Type $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = new Type();
    }

    #[Test]
    public function getTitleReturnsInitialEmptyString(): void
    {
        self::assertSame('', $this->subject->getTitle());
    }

    #[Test]
    public function setTitleSetsTitle(): void
    {
        $this->subject->setTitle('Workshop');
        self::assertSame('Workshop', $this->subject->getTitle());
    }

    #[Test]
    public function getDescriptionReturnsInitialEmptyString(): void
    {
        self::assertSame('', $this->subject->getDescription());
    }

    #[Test]
    public function setDescriptionSetsDescription(): void
    {
        $this->subject->setDescription('Hands-on workshops');
        self::assertSame('Hands-on workshops', $this->subject->getDescription());
    }

    #[Test]
    public function getSlugReturnsInitialEmptyString(): void
    {
        self::assertSame('', $this->subject->getSlug());
    }

    #[Test]
    public function setSlugSetsSlug(): void
    {
        $this->subject->setSlug('workshop');
        self::assertSame('workshop', $this->subject->getSlug());
    }

    #[Test]
    public function getSortingReturnsInitialZero(): void
    {
        self::assertSame(0, $this->subject->getSorting());
    }

    #[Test]
    public function setSortingSetsSorting(): void
    {
        $this->subject->setSorting(10);
        self::assertSame(10, $this->subject->getSorting());
    }
}
