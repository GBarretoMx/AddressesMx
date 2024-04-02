<?php
declare(strict_types=1);
namespace MageBarrett\AddressBookMx\Model;

use MageBarrett\AddressBookMx\Api\AddressesByZipInterface;
use MageBarrett\AddressBookMx\Model\ResourceModel\AddressBook\CollectionFactory as AddressesCollectionFactory;

class AddressesByZip implements AddressesByZipInterface
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
    public function postAddressesByZip($zip)
    {
        $zip = trim($zip);
        $collection = $this->addressesCollectionFactory->create()
            ->addFieldToSelect('*')
            ->addFieldToFilter('codigo_postal', ['eq' => $zip])
            ->getData();
        if (empty($collection)){
            return 'No match was found with ZIP - '.$zip;
        }
        return $collection;
    }

}
