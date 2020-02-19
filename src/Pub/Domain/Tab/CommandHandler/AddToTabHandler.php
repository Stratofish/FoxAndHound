<?php

declare(strict_types=1);

namespace Webbaard\Pub\Domain\Tab\CommandHandler;

use Webbaard\Pub\Domain\Tab\Command\AddtoTab;
use Webbaard\Pub\Domain\Tab\Repository\TabCollection;

final class AddToTabHandler
{
	private TabCollection $tabCollection;

	/**
	 * PayTabHandler constructor.
	 * @param TabCollection $tabCollection
	 */
	public function __construct(TabCollection $tabCollection)
	{
		$this->tabCollection = $tabCollection;
	}


	public function __invoke(AddToTab $addToTab): void
	{
		$tab = $this->tabCollection->get($addToTab->tabId());
		$tab->AddMenuItem($addToTab->MenuItem());
		$this->tabCollection->Save($tab);
	}
}
