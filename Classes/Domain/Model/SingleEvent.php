<?php

declare(strict_types=1);

namespace Davitec\DvEducationCourses\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Domain model for a single event date within an event.
 */
class SingleEvent extends AbstractEntity
{
    protected string $title = '';
    protected ?\DateTime $startdate = null;
    protected ?\DateTime $enddate = null;
    protected int $sorting = 0;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
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

    public function getSorting(): int
    {
        return $this->sorting;
    }

    public function setSorting(int $sorting): void
    {
        $this->sorting = $sorting;
    }
}
