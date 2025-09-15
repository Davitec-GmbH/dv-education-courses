<?php

declare(strict_types=1);

namespace Davitec\DvEducationCourses\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Domain model for an event location.
 */
class Location extends AbstractEntity
{
    protected string $name = '';
    protected string $city = '';
    protected string $zipcode = '';
    protected string $street = '';
    protected int $sorting = 0;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getZipcode(): string
    {
        return $this->zipcode;
    }

    public function setZipcode(string $zipcode): void
    {
        $this->zipcode = $zipcode;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    public function getSorting(): int
    {
        return $this->sorting;
    }

    public function setSorting(int $sorting): void
    {
        $this->sorting = $sorting;
    }

    /**
     * Returns the full address as a single string.
     */
    public function getFullAddress(): string
    {
        $parts = array_filter([
            $this->street,
            trim($this->zipcode . ' ' . $this->city),
        ]);

        return implode(', ', $parts);
    }
}
