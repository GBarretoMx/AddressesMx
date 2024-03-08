<?php
declare(strict_types=1);
namespace MageBarrett\AddressBookMx\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class AddressBook extends AbstractDb
{
    private const TABLE_NAME = 'magebarrett_addressbookmx';
    private  const FIEL_NAME = 'addressbook_id';

    protected function _construct()
    {
        $this->_init(self::TABLE_NAME, self::FIEL_NAME);
    }

}
