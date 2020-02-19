<?php

declare(strict_types=1);

namespace Webbaard\Pub\Domain\Tab\CommandHandler;

use Webbaard\Pub\Domain\Tab\Command\PayTab;
use Webbaard\Pub\Domain\Tab\Repository\TabCollection;

final class PayTabHandler
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


	public function __invoke(PayTab $payTab): void
	{
		$tab = $this->tabCollection->get($payTab->tabId());
		$tab->SetPaid();
		$this->tabCollection->Save($tab);
	}
}
