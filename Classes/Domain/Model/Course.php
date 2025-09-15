<?php

declare(strict_types=1);

namespace Davitec\DvEducationCourses\Domain\Model;

use TYPO3\CMS\Extbase\Annotation\ORM\Cascade;
use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Domain model for an education course.
 */
class Course extends AbstractEntity
{
    protected string $title = '';
    protected string $description = '';
    protected string $content = '';
    protected string $objectives = '';
    protected string $targetGroups = '';
    protected string $admissionRequirements = '';
    protected string $slug = '';
    protected ?Type $type = null;
    protected int $sorting = 0;

    /** @var ObjectStorage<ContactPerson>|null */
    #[Lazy]
    protected ?ObjectStorage $contactPersons = null;

    /** @var ObjectStorage<Event>|null */
    #[Lazy]
    #[Cascade(['value' => 'remove'])]
    protected ?ObjectStorage $events = null;

    /** @var ObjectStorage<Course>|null */
    #[Lazy]
    protected ?ObjectStorage $similarCourses = null;

    /** @var ObjectStorage<FileReference>|null */
    #[Lazy]
    protected ?ObjectStorage $images = null;

    public function initializeObject(): void
    {
        $this->contactPersons = new ObjectStorage();
        $this->events = new ObjectStorage();
        $this->similarCourses = new ObjectStorage();
        $this->images = new ObjectStorage();
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getObjectives(): string
    {
        return $this->objectives;
    }

    public function setObjectives(string $objectives): void
    {
        $this->objectives = $objectives;
    }

    public function getTargetGroups(): string
    {
        return $this->targetGroups;
    }

    public function setTargetGroups(string $targetGroups): void
    {
        $this->targetGroups = $targetGroups;
    }

    public function getAdmissionRequirements(): string
    {
        return $this->admissionRequirements;
    }

    public function setAdmissionRequirements(string $admissionRequirements): void
    {
        $this->admissionRequirements = $admissionRequirements;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): void
    {
        $this->type = $type;
    }

    public function getSorting(): int
    {
        return $this->sorting;
    }

    public function setSorting(int $sorting): void
    {
        $this->sorting = $sorting;
    }

    /** @return ObjectStorage<ContactPerson> */
    public function getContactPersons(): ObjectStorage
    {
        return $this->contactPersons ?? new ObjectStorage();
    }

    /** @param ObjectStorage<ContactPerson> $contactPersons */
    public function setContactPersons(ObjectStorage $contactPersons): void
    {
        $this->contactPersons = $contactPersons;
    }

    public function addContactPerson(ContactPerson $contactPerson): void
    {
        $this->contactPersons?->attach($contactPerson);
    }

    public function removeContactPerson(ContactPerson $contactPerson): void
    {
        $this->contactPersons?->detach($contactPerson);
    }

    /** @return ObjectStorage<Event> */
    public function getEvents(): ObjectStorage
    {
        return $this->events ?? new ObjectStorage();
    }

    /** @param ObjectStorage<Event> $events */
    public function setEvents(ObjectStorage $events): void
    {
        $this->events = $events;
    }

    public function addEvent(Event $event): void
    {
        $this->events?->attach($event);
    }

    public function removeEvent(Event $event): void
    {
        $this->events?->detach($event);
    }

    /** @return ObjectStorage<Course> */
    public function getSimilarCourses(): ObjectStorage
    {
        return $this->similarCourses ?? new ObjectStorage();
    }

    /** @param ObjectStorage<Course> $similarCourses */
    public function setSimilarCourses(ObjectStorage $similarCourses): void
    {
        $this->similarCourses = $similarCourses;
    }

    public function addSimilarCourse(Course $course): void
    {
        $this->similarCourses?->attach($course);
    }

    public function removeSimilarCourse(Course $course): void
    {
        $this->similarCourses?->detach($course);
    }

    /** @return ObjectStorage<FileReference> */
    public function getImages(): ObjectStorage
    {
        return $this->images ?? new ObjectStorage();
    }

    /** @param ObjectStorage<FileReference> $images */
    public function setImages(ObjectStorage $images): void
    {
        $this->images = $images;
    }
}
