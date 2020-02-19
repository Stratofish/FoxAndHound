<?php

namespace Webbaard\Pub\Domain\Tab\Event;

use Prooph\EventSourcing\AggregateChanged;
use Webbaard\Pub\Domain\Tab\ValueObject\MenuItem;
use Webbaard\Pub\Domain\Tab\ValueObject\TabId;

class ItemAddedToTab extends AggregateChanged
{
	const ITEM_NAME = 'itemName';
	const PRICE = 'price';

	public static function forTab(TabId $tabId, MenuItem $menuItem): self
	{
		return self::occur(
			$tabId->toString(),
			[
				self::ITEM_NAME => $menuItem->name()->toString(),
				self::PRICE => $menuItem->price()->toString()
			]
		);
	}

	public function tabId(): TabId
	{
		return TabId::fromString($this->aggregateId());
	}

	public function Price(): int
	{
		return (int)$this->payload()[self::PRICE];
	}

	public function ItemName(): string
	{
		return $this->payload()[self::ITEM_NAME];
	}

}