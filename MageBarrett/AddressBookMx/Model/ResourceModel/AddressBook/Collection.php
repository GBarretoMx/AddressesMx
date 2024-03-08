<?php
declare(strict_types=1);
namespace MageBarrett\AddressBookMx\Model\ResourceModel\AddressBook;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use MageBarrett\AddressBookMx\Model\AddressBook;
use MageBarrett\AddressBookMx\Model\ResourceModel\AddressBook as AddressBookResource;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            AddressBook::class,
            AddressBookResource::class);
    }

}
