<?php


namespace Webbaard\Pub\Domain\Tab;


use Prooph\EventSourcing\AggregateRoot;
use Webbaard\Pub\Domain\Tab\ValueObject\CustomerName;

final class Tab extends AggregateRoot
{
	private CustomerName $customerName;

	public static function forCustomer(CustomerName $customerName): self
	{
		$self = new self();
		$self->customerName = $customerName;
		$self->recordThat();
		return $self;
	}
}