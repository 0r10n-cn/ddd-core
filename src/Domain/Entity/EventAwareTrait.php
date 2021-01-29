<?php

declare(strict_types=1);

namespace OrionUa\DDDCore\Domain\Entity;

trait EventAwareTrait
{
    private array $events = [];

    /**
     * @param DomainEventInterface $event
     */
    protected function record(DomainEventInterface $event): void
    {
        $this->events[] = $event;
    }

    public function releaseEvents(): array
    {
        $events = $this->events;
        $this->events = [];

        return $events;
    }

}
