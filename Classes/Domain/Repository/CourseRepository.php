<?php

declare(strict_types=1);

namespace Davitec\DvEducationCourses\Domain\Repository;

use Davitec\DvEducationCourses\Domain\Model\Type;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Repository for Course domain model.
 */
class CourseRepository extends Repository
{
    protected array $defaultOrderings = [
        'title' => QueryInterface::ORDER_ASCENDING,
    ];

    /**
     * @return QueryResultInterface<\Davitec\DvEducationCourses\Domain\Model\Course>
     */
    public function findBySearchTerm(string $searchTerm): QueryResultInterface
    {
        $query = $this->createQuery();
        $pattern = '%' . $searchTerm . '%';

        $query->matching(
            $query->logicalOr(
                $query->like('title', $pattern),
                $query->like('description', $pattern),
                $query->like('objectives', $pattern),
                $query->like('targetGroups', $pattern),
            )
        );

        return $query->execute();
    }

    /**
     * @return QueryResultInterface<\Davitec\DvEducationCourses\Domain\Model\Course>
     */
    public function findByType(Type $type): QueryResultInterface
    {
        $query = $this->createQuery();
        $query->matching($query->equals('type', $type));

        return $query->execute();
    }
}
