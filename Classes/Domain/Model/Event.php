<?php

declare(strict_types=1);

namespace Davitec\DvEducationCourses\Domain\Model;

use TYPO3\CMS\Extbase\Annotation\ORM\Cascade;
use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Domain model for a course event (a concrete scheduled instance of a course).
 */
class Event extends AbstractEntity
{
    protected string $title = '';
    protected string $eventCode = '';
    protected string $description = '';
    protected ?\DateTime $startdate = null;
    protected ?\DateTime $enddate = null;
    protected string $duration = '';
    protected float $price = 0.00;
    protected ?Location $location = null;
    protected bool $bookedUp = false;
    protected bool $onRequest = false;
    protected string $slug = '';
    protected int $sorting = 0;

    /** @var ObjectStorage<SingleEvent>|null */
    #[Lazy]
    #[Cascade(['value' => 'remove'])]
    protected ?ObjectStorage $singleEvents = null;

    public function initializeObject(): void
    {
        $this->singleEvents = new ObjectStorage();
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getEventCode(): string
    {
        return $this->eventCode;
    }

    public function setEventCode(string $eventCode): void
    {
        $this->eventCode = $eventCode;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getStartdate(): ?\DateTime
    {
        return $this->startdate;
    }

    public function setStartdate(?\DateTime $startdate): void
    {
        $this->startdate = $startdate;
    }

    public function getEnddate(): ?\DateTime
    {
        return $this->enddate;
    }

    public function setEnddate(?\DateTime $enddate): void
    {
        $this->enddate = $enddate;
    }

    public function getDuration(): string
    {
        return $this->duration;
    }

    public function setDuration(string $duration): void
    {
        $this->duration = $duration;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(?Location $location): void
    {
        $this->location = $location;
    }

    public function getBookedUp(): bool
    {
        return $this->bookedUp;
    }

    public function setBookedUp(bool $bookedUp): void
    {
        $this->bookedUp = $bookedUp;
    }

    public function getOnRequest(): bool
    {
        return $this->onRequest;
    }

    public function setOnRequest(bool $onRequest): void
    {
        $this->onRequest = $onRequest;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }

    public function getSorting(): int
    {
        return $this->sorting;
    }

    public function setSorting(int $sorting): void
    {
        $this->sorting = $sorting;
    }

    /** @return ObjectStorage<SingleEvent> */
    public function getSingleEvents(): ObjectStorage
    {
        return $this->singleEvents ?? new ObjectStorage();
    }

    /** @param ObjectStorage<SingleEvent> $singleEvents */
    public function setSingleEvents(ObjectStorage $singleEvents): void
    {
        $this->singleEvents = $singleEvents;
    }

    public function addSingleEvent(SingleEvent $singleEvent): void
    {
        $this->singleEvents?->attach($singleEvent);
    }

    public function removeSingleEvent(SingleEvent $singleEvent): void
    {
        $this->singleEvents?->detach($singleEvent);
    }

    /**
     * Checks whether the event starts in the future.
     */
    public function getIsUpcoming(): bool
    {
        return $this->startdate !== null && $this->startdate > new \DateTime();
    }

    /**
     * Checks whether the event is currently running.
     */
    public function getIsRunning(): bool
    {
        $now = new \DateTime();

        return $this->startdate !== null
            && $this->enddate !== null
            && $this->startdate <= $now
            && $this->enddate >= $now;
    }

    /**
     * Returns the price formatted with currency symbol.
     */
    public function getFormattedPrice(): string
    {
        if ($this->onRequest) {
            return '';
        }

        return number_format($this->price, 2, ',', '.') . ' €';
    }
}
