<?php

declare(strict_types=1);

namespace Davitec\DvEducationCourses\Controller;

use Davitec\DvEducationCourses\Domain\Model\Event;
use Davitec\DvEducationCourses\Domain\Repository\EventRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Controller for event listing and detail display.
 */
class EventController extends ActionController
{
    public function __construct(
        private readonly EventRepository $eventRepository,
    ) {}

    /**
     * List upcoming events.
     */
    public function listAction(): ResponseInterface
    {
        $limit = (int)($this->settings['itemsPerPage'] ?? 20);

        $this->view->assignMultiple([
            'events' => $this->eventRepository->findUpcoming($limit),
            'courseDetailPid' => (int)($this->settings['courseDetailPid'] ?? 0),
            'eventDetailPid' => (int)($this->settings['eventDetailPid'] ?? 0),
        ]);

        return $this->htmlResponse();
    }

    /**
     * Show a single event with schedule and details.
     */
    public function showAction(Event $event): ResponseInterface
    {
        $this->view->assignMultiple([
            'event' => $event,
            'courseDetailPid' => (int)($this->settings['courseDetailPid'] ?? 0),
            'listPid' => (int)($this->settings['listPid'] ?? 0),
        ]);

        return $this->htmlResponse();
    }
}
