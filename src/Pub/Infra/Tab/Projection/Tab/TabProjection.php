<?php
declare(strict_types=1);

namespace Webbaard\Pub\Infra\Tab\Projection\Tab;

use Prooph\Bundle\EventStore\Projection\ReadModelProjection;
use Prooph\EventStore\Projection\ReadModelProjector;
use Webbaard\Pub\Domain\Tab\Event\TabWasOpened;
use Webbaard\Pub\Domain\Tab\Event\TabWasPaid;

final class TabProjection implements ReadModelProjection
{
    public function project(ReadModelProjector $projector): ReadModelProjector
    {
        $projector->fromStream('event_stream')
            ->init(function (): array {
                return [];
            })
            ->when([
            	TabWasOpened::class => function($state, TabWasOpened $event){
            	    /** @var TabReadModel $readModel */
            	    $readModel = $this->readModel();
            	    $readModel->stack('insert', [
            	    	'id' => $event->tabId()->toString(),
		                'customerName' => $event->customerName()->toString(),
		                'open_amount' => 0
	                ]);
	            },
	            TabWasPaid::class => function($state, TabWasPaid $event){
		            /** @var TabReadModel $readModel */
		            $readModel = $this->readModel();
		            $readModel->stack('remove', [
			            'id' => $event->tabId()->toString()
		            ]);
	            }
            ]);

        return $projector;
    }
}
