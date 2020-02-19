<?php

declare(strict_types=1);

namespace Webbaard\Pub\Domain\Tab\Command;

use Prooph\Common\Messaging\Command;
use Prooph\Common\Messaging\PayloadConstructable;
use Prooph\Common\Messaging\PayloadTrait;
use Webbaard\Pub\Domain\Tab\ValueObject\MenuItem;
use Webbaard\Pub\Domain\Tab\ValueObject\TabId;

final class AddToTab extends Command implements PayloadConstructable
{
	use PayloadTrait;

	const TAB_ID = 'tab-id';
	const MENU_ITEM = 'menu-item';
	const PRICE = 'price';

	public function tabId()
	{
		return TabId::fromString($this->payload[self::TAB_ID]);
	}

	public function MenuItem()
	{
		return MenuItem::fromStrings($this->payload[self::MENU_ITEM], $this->payload[self::PRICE]);
	}
}