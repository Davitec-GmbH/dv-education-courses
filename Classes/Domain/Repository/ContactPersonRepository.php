<?php

declare(strict_types=1);

namespace Davitec\DvEducationCourses\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

class ContactPersonRepository extends Repository
{
    protected $defaultOrderings = [
        'last_name' => QueryInterface::ORDER_ASCENDING,
    ];
}
