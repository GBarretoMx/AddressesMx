<?php
declare(strict_types=1);
namespace MageBarrett\AddressBookMx\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface AddressBookSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get Addressbook list.
     * @return AddressBookInterface[]
     */
    public function getItems();


    /**
     * Set address_id items
     * @param AddressBookInterface[] $items
     * @return $his
     */
    public function setItems(array $items);

}
