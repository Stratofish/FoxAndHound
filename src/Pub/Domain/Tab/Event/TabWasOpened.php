<?php

namespace Webbaard\Pub\Domain\Tab\Event;

use Prooph\EventSourcing\AggregateChanged;
use Webbaard\Pub\Domain\Tab\ValueObject\CustomerName;
use Webbaard\Pub\Domain\Tab\ValueObject\OpenedOn;
use Webbaard\Pub\Domain\Tab\ValueObject\TabId;

class TabWasOpened extends AggregateChanged
{
	const CUSTOMER_NAME = 'customerName';

	public static function forCustomer(TabId $tabId, CustomerName $customerName): self
	{
		return self::occur(
			$tabId->toString(),
			[
				self::CUSTOMER_NAME => $customerName->toString()
			]
		);
	}

	public function tabId(): TabId
	{
		return TabId::fromString($this->aggregateId());
	}

	public function customerName(): CustomerName
	{
		return CustomerName::fromString($this->payload['customerName']);
	}

	public function openedOn(): OpenedOn
	{
		return OpenedOn::fromDateTime($this->createdAt);
	}
}