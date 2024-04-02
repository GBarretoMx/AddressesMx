<?php
declare(strict_types=1);
namespace MageBarrett\AddressBookMx\Model;
use MageBarrett\AddressBookMx\Api\AddressesByTownInterface;
use MageBarrett\AddressBookMx\Model\ResourceModel\AddressBook\CollectionFactory as AddressesCollectionFactory;

class AddressesByTown implements AddressesByTownInterface
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

    /**
     * {@inheritdoc}
     */
    public function postAddressesByTown($town)
    {
        $town = trim($town);
        $addressesCollection = $this->addressesCollectionFactory->create()
            ->addFieldToSelect('*')
            ->addFieldToFilter('municipio', ['eq' => $town])
            ->getData();
        if (empty($addressesCollection)){
            return 'No match was found with Town - '.$town;
        }

        return $addressesCollection;
    }
}
