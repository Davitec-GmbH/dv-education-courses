<?php

declare(strict_types=1);

namespace Davitec\DvEducationCourses\Tests\Unit\Domain\Model;

use Davitec\DvEducationCourses\Domain\Model\ContactPerson;
use Davitec\DvEducationCourses\Domain\Model\Course;
use Davitec\DvEducationCourses\Domain\Model\Event;
use Davitec\DvEducationCourses\Domain\Model\Type;
use PHPUnit\Framework\Attributes\Test;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

final class CourseTest extends UnitTestCase
{
    private Course $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = new Course();
        $this->subject->initializeObject();
    }

    #[Test]
    public function initializeObjectInitializesFourObjectStorages(): void
    {
        $course = new Course();
        $course->initializeObject();

        self::assertInstanceOf(ObjectStorage::class, $course->getContactPersons());
        self::assertInstanceOf(ObjectStorage::class, $course->getEvents());
        self::assertInstanceOf(ObjectStorage::class, $course->getSimilarCourses());
        self::assertInstanceOf(ObjectStorage::class, $course->getImages());
    }

    #[Test]
    public function getTitleReturnsInitialEmptyString(): void
    {
        self::assertSame('', $this->subject->getTitle());
    }

    #[Test]
    public function setTitleSetsTitle(): void
    {
        $this->subject->setTitle('PHP Workshop');
        self::assertSame('PHP Workshop', $this->subject->getTitle());
    }

    #[Test]
    public function getDescriptionReturnsInitialEmptyString(): void
    {
        self::assertSame('', $this->subject->getDescription());
    }

    #[Test]
    public function setDescriptionSetsDescription(): void
    {
        $this->subject->setDescription('A great course');
        self::assertSame('A great course', $this->subject->getDescription());
    }

    #[Test]
    public function getContentReturnsInitialEmptyString(): void
    {
        self::assertSame('', $this->subject->getContent());
    }

    #[Test]
    public function setContentSetsContent(): void
    {
        $this->subject->setContent('Course content here');
        self::assertSame('Course content here', $this->subject->getContent());
    }

    #[Test]
    public function getObjectivesReturnsInitialEmptyString(): void
    {
        self::assertSame('', $this->subject->getObjectives());
    }

    #[Test]
    public function setObjectivesSetsObjectives(): void
    {
        $this->subject->setObjectives('Learn PHP');
        self::assertSame('Learn PHP', $this->subject->getObjectives());
    }

    #[Test]
    public function getTargetGroupsReturnsInitialEmptyString(): void
    {
        self::assertSame('', $this->subject->getTargetGroups());
    }

    #[Test]
    public function setTargetGroupsSetsTargetGroups(): void
    {
        $this->subject->setTargetGroups('Developers');
        self::assertSame('Developers', $this->subject->getTargetGroups());
    }

    #[Test]
    public function getAdmissionRequirementsReturnsInitialEmptyString(): void
    {
        self::assertSame('', $this->subject->getAdmissionRequirements());
    }

    #[Test]
    public function setAdmissionRequirementsSetsAdmissionRequirements(): void
    {
        $this->subject->setAdmissionRequirements('Basic PHP knowledge');
        self::assertSame('Basic PHP knowledge', $this->subject->getAdmissionRequirements());
    }

    #[Test]
    public function getSlugReturnsInitialEmptyString(): void
    {
        self::assertSame('', $this->subject->getSlug());
    }

    #[Test]
    public function setSlugSetsSlug(): void
    {
        $this->subject->setSlug('php-workshop');
        self::assertSame('php-workshop', $this->subject->getSlug());
    }

    #[Test]
    public function getTypeReturnsInitialNull(): void
    {
        self::assertNull($this->subject->getType());
    }

    #[Test]
    public function setTypeSetsType(): void
    {
        $type = new Type();
        $this->subject->setType($type);
        self::assertSame($type, $this->subject->getType());
    }

    #[Test]
    public function setTypeAcceptsNull(): void
    {
        $this->subject->setType(new Type());
        $this->subject->setType(null);
        self::assertNull($this->subject->getType());
    }

    #[Test]
    public function getSortingReturnsInitialZero(): void
    {
        self::assertSame(0, $this->subject->getSorting());
    }

    #[Test]
    public function setSortingSetsSorting(): void
    {
        $this->subject->setSorting(5);
        self::assertSame(5, $this->subject->getSorting());
    }

    #[Test]
    public function getContactPersonsReturnsObjectStorage(): void
    {
        self::assertInstanceOf(ObjectStorage::class, $this->subject->getContactPersons());
        self::assertCount(0, $this->subject->getContactPersons());
    }

    #[Test]
    public function setContactPersonsSetsContactPersons(): void
    {
        $storage = new ObjectStorage();
        $storage->attach(new ContactPerson());
        $this->subject->setContactPersons($storage);
        self::assertCount(1, $this->subject->getContactPersons());
    }

    #[Test]
    public function addContactPersonAddsContactPerson(): void
    {
        $contactPerson = new ContactPerson();
        $this->subject->addContactPerson($contactPerson);
        self::assertTrue($this->subject->getContactPersons()->contains($contactPerson));
    }

    #[Test]
    public function removeContactPersonRemovesContactPerson(): void
    {
        $contactPerson = new ContactPerson();
        $this->subject->addContactPerson($contactPerson);
        $this->subject->removeContactPerson($contactPerson);
        self::assertFalse($this->subject->getContactPersons()->contains($contactPerson));
    }

    #[Test]
    public function getEventsReturnsObjectStorage(): void
    {
        self::assertInstanceOf(ObjectStorage::class, $this->subject->getEvents());
        self::assertCount(0, $this->subject->getEvents());
    }

    #[Test]
    public function setEventsSetsEvents(): void
    {
        $storage = new ObjectStorage();
        $storage->attach(new Event());
        $this->subject->setEvents($storage);
        self::assertCount(1, $this->subject->getEvents());
    }

    #[Test]
    public function addEventAddsEvent(): void
    {
        $event = new Event();
        $this->subject->addEvent($event);
        self::assertTrue($this->subject->getEvents()->contains($event));
    }

    #[Test]
    public function removeEventRemovesEvent(): void
    {
        $event = new Event();
        $this->subject->addEvent($event);
        $this->subject->removeEvent($event);
        self::assertFalse($this->subject->getEvents()->contains($event));
    }

    #[Test]
    public function getSimilarCoursesReturnsObjectStorage(): void
    {
        self::assertInstanceOf(ObjectStorage::class, $this->subject->getSimilarCourses());
        self::assertCount(0, $this->subject->getSimilarCourses());
    }

    #[Test]
    public function setSimilarCoursesSetsSimilarCourses(): void
    {
        $storage = new ObjectStorage();
        $storage->attach(new Course());
        $this->subject->setSimilarCourses($storage);
        self::assertCount(1, $this->subject->getSimilarCourses());
    }

    #[Test]
    public function addSimilarCourseAddsCourse(): void
    {
        $course = new Course();
        $this->subject->addSimilarCourse($course);
        self::assertTrue($this->subject->getSimilarCourses()->contains($course));
    }

    #[Test]
    public function removeSimilarCourseRemovesCourse(): void
    {
        $course = new Course();
        $this->subject->addSimilarCourse($course);
        $this->subject->removeSimilarCourse($course);
        self::assertFalse($this->subject->getSimilarCourses()->contains($course));
    }

    #[Test]
    public function getImagesReturnsObjectStorage(): void
    {
        self::assertInstanceOf(ObjectStorage::class, $this->subject->getImages());
    }

    #[Test]
    public function setImagesSetsImages(): void
    {
        $storage = new ObjectStorage();
        $this->subject->setImages($storage);
        self::assertSame($storage, $this->subject->getImages());
    }
}
