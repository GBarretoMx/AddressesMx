<?php
declare(strict_types=1);
namespace MageBarrett\AddressBookMx\Model;
use MageBarrett\AddressBookMx\Api\AddressesByStateInterface;
use MageBarrett\AddressBookMx\Model\ResourceModel\AddressBook\CollectionFactory as AddressesCollectionFactory;

class AddressesByState implements AddressesByStateInterface
{
    /**
     * @var AddressesCollectionFactory
     */
    protected AddressesCollectionFactory $addressesCollectionFactory;

    public function __construct(
        AddressesCollectionFactory $addressesCollectionFactory,
    )
    {
        $this->addressesCollectionFactory = $addressesCollectionFactory;
    }

    public function postAddressesByState($state)
    {
        $state = trim($state);
        $collection = $this->addressesCollectionFactory->create()
            ->addFieldToSelect('*')
            ->addFieldToFilter('estado', ['eq' => $state])
            ->getData();
        if (empty($collection)) {
            return 'No match was found with State - '.$state;
        }
        return $collection;
    }
}
