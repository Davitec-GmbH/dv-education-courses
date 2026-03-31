<?php

declare(strict_types=1);

namespace Davitec\DvEducationCourses\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

class SingleEventRepository extends Repository
{
    protected $defaultOrderings = [
        'startdate' => QueryInterface::ORDER_ASCENDING,
    ];
}
