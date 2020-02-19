<?php

namespace Webbaard\Pub\Domain\Tab\Repository;

use Webbaard\Pub\Domain\Tab\Tab;
use Webbaard\Pub\Domain\Tab\ValueObject\TabId;

interface TabCollection
{
	public function get(TabId $tabId): Tab;

	public function Save(Tab $tab): void;
}