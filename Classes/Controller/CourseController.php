<?php

declare(strict_types=1);

namespace Davitec\DvEducationCourses\Controller;

use Davitec\DvEducationCourses\Domain\Model\Course;
use Davitec\DvEducationCourses\Domain\Repository\CourseRepository;
use Davitec\DvEducationCourses\Domain\Repository\TypeRepository;
use Davitec\DvEducationCourses\Service\CourseService;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Controller for course listing and detail display.
 */
class CourseController extends ActionController
{
    public function __construct(
        private readonly CourseRepository $courseRepository,
        private readonly TypeRepository $typeRepository,
        private readonly CourseService $courseService,
    ) {}

    /**
     * List courses with optional search and type filter.
     */
    public function listAction(): ResponseInterface
    {
        $searchTerm = trim((string)($this->request->getParsedBody()['tx_dveducationcourses_courselist']['searchTerm']
            ?? $this->request->getQueryParams()['tx_dveducationcourses_courselist']['searchTerm']
            ?? ''));
        $typeUid = (int)($this->request->getParsedBody()['tx_dveducationcourses_courselist']['type']
            ?? $this->request->getQueryParams()['tx_dveducationcourses_courselist']['type']
            ?? 0);

        if ($searchTerm !== '') {
            $courses = $this->courseRepository->findBySearchTerm($searchTerm);
        } elseif ($typeUid > 0) {
            $type = $this->typeRepository->findByUid($typeUid);
            $courses = $type !== null ? $this->courseRepository->findByType($type) : $this->courseRepository->findAll();
        } else {
            $courses = $this->courseRepository->findAll();
        }

        $this->view->assignMultiple([
            'courses' => $courses,
            'types' => $this->typeRepository->findAll(),
            'searchTerm' => $searchTerm,
            'selectedType' => $typeUid,
            'detailPid' => (int)($this->settings['detailPid'] ?? 0),
            'listPid' => (int)($this->settings['listPid'] ?? 0),
        ]);

        return $this->htmlResponse();
    }

    /**
     * Show a single course with all details and suggestions.
     */
    public function showAction(Course $course): ResponseInterface
    {
        $this->view->assignMultiple([
            'course' => $course,
            'suggestedCourses' => $this->courseService->getSuggestedCourses($course),
            'listPid' => (int)($this->settings['listPid'] ?? 0),
            'eventDetailPid' => (int)($this->settings['eventDetailPid'] ?? 0),
        ]);

        return $this->htmlResponse();
    }
}
