<?php

declare(strict_types=1);

namespace Davitec\DvEducationCourses\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Domain model for a contact person.
 */
class ContactPerson extends AbstractEntity
{
    protected string $salutation = '';
    protected string $title = '';
    protected string $firstName = '';
    protected string $lastName = '';
    protected string $phone = '';
    protected string $email = '';
    protected int $sorting = 0;

    /**
     * Returns the full name including title if present.
     */
    public function getName(): string
    {
        $parts = array_filter([$this->title, $this->firstName, $this->lastName]);

        return implode(' ', $parts);
    }

    public function getSalutation(): string
    {
        return $this->salutation;
    }

    public function setSalutation(string $salutation): void
    {
        $this->salutation = $salutation;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
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
