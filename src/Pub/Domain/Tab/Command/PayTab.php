<?php

declare(strict_types=1);

namespace Webbaard\Pub\Domain\Tab\Command;

use Prooph\Common\Messaging\Command;
use Prooph\Common\Messaging\PayloadConstructable;
use Prooph\Common\Messaging\PayloadTrait;
use Webbaard\Pub\Domain\Tab\Tab;
use Webbaard\Pub\Domain\Tab\ValueObject\TabId;

final class PayTab extends Command implements PayloadConstructable
{
	use PayloadTrait;

	const TAB_ID = 'tab-id';

	public function tabId()
	{
		return TabId::fromString($this->payload[self::TAB_ID]);
	}
}