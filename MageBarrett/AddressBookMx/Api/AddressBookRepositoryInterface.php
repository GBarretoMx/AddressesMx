<?php
declare(strict_types=1);
namespace MageBarrett\AddressBookMx\Api;

use Magento\Framework\Exception\LocalizedException;

interface AddressBookRepositoryInterface
{

    /**
     * Save Address Book
     * @param Data\AddressBookInterface $addressBook
     * @return Data\AddressBookInterface
     * @throws LocalizedException
     */
    public function save(Data\AddressBookInterface $addressBook);


    /**
     * Get Address Book by ID
     * @param int $addresbookId
     * @return Data\AddressBookInterface
     * @throws LocalizedException
     */
    public function getById($addressBookId);

    /**
     * Retrieve AddresBook matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return Data\AddressBookSearchResultsInterface
     * @throws LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Address Book
     * @param Data\AddressBookInterface $addressBook
     * @return bool true on success
     * @throws  LocalizedException
     */
    public function delete(
        Data\AddressBookInterface $addressBook
    );

    /**
     * Deleate Address book by ID
     * @param $addressBookId
     * @return  bool true on success
     * @throws LocalizedException
     */
    public function deleteById($addressBookId);

}
