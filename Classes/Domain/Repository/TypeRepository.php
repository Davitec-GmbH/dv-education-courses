<?php

declare(strict_types=1);

namespace Davitec\DvEducationCourses\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

class TypeRepository extends Repository
{
    protected array $defaultOrderings = [
        'sorting' => QueryInterface::ORDER_ASCENDING,
    ];
}
