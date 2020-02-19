<?php

namespace Webbaard\Pub\Application\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Webbaard\Pub\Domain\Tab\Repository\TabCollection;
use Webbaard\Pub\Domain\Tab\ValueObject\TabId;

class TabController
{
	private TabCollection $tabCollection;

	/**
	 * TabController constructor.
	 * @param TabCollection $tabCollection
	 */
	public function __construct(TabCollection $tabCollection)
	{
		$this->tabCollection = $tabCollection;
	}

	public function detailsAction($id): JsonResponse
	{
		return JsonResponse::create(
			$this->tabCollection->get(TabId::fromString($id))->payload()
		);
	}
}