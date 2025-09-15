<?php

declare(strict_types=1);

namespace Davitec\DvEducationCourses\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Repository for Event domain model.
 */
class EventRepository extends Repository
{
    protected array $defaultOrderings = [
        'startdate' => QueryInterface::ORDER_ASCENDING,
    ];

    /**
     * @return QueryResultInterface<\Davitec\DvEducationCourses\Domain\Model\Event>
     */
    public function findUpcoming(int $limit = 0): QueryResultInterface
    {
        $query = $this->createQuery();
        $query->matching(
            $query->greaterThanOrEqual('startdate', time())
        );

        if ($limit > 0) {
            $query->setLimit($limit);
        }

        return $query->execute();
    }

    /**
     * @return QueryResultInterface<\Davitec\DvEducationCourses\Domain\Model\Event>
     */
    public function findByCourse(int $courseUid): QueryResultInterface
    {
        $query = $this->createQuery();
        $query->matching($query->equals('course', $courseUid));

        return $query->execute();
    }

    /**
     * @return QueryResultInterface<\Davitec\DvEducationCourses\Domain\Model\Event>
     */
    public function findRunning(): QueryResultInterface
    {
        $query = $this->createQuery();
        $now = time();

        $query->matching(
            $query->logicalAnd(
                $query->lessThanOrEqual('startdate', $now),
                $query->greaterThanOrEqual('enddate', $now),
            )
        );

        return $query->execute();
    }
}
