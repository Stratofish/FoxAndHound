<?php

namespace Webbaard\Pub\Domain\Tab\Event;

use Prooph\EventSourcing\AggregateChanged;
use Webbaard\Pub\Domain\Tab\ValueObject\CustomerName;
use Webbaard\Pub\Domain\Tab\ValueObject\OpenedOn;
use Webbaard\Pub\Domain\Tab\ValueObject\PaidOn;
use Webbaard\Pub\Domain\Tab\ValueObject\TabId;

class TabWasPaid extends AggregateChanged
{
	const PAID_ON = 'paidOn';

	public static function forTab(TabId $tabId, PaidOn $paidOn): self
	{
		return self::occur(
			$tabId->toString(),
			[
				self::PAID_ON => $paidOn->toString()
			]
		);
	}

	public function tabId(): TabId
	{
		return TabId::fromString($this->aggregateId());
	}

	public function paidOn(): PaidOn
	{
		return PaidOn::fromDateTime($this->createdAt);
	}
}