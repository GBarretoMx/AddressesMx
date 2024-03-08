<?php
declare(strict_types=1);
namespace MageBarrett\AddressBookMx\Model;


use MageBarrett\AddressBookMx\Api\Data;
use MageBarrett\AddressBookMx\Api\Data\AddressBookInterface;
use MageBarrett\AddressBookMx\Api\Data\AddressBookInterfaceFactory;
use MageBarrett\AddressBookMx\Api\Data\AddressBookSearchResultsInterface;
use MageBarrett\AddressBookMx\Api\AddressBookRepositoryInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use MageBarrett\AddressBookMx\Model\ResourceModel\AddressBook as ResourceAddressBook;
use MageBarrett\AddressBookMx\Model\ResourceModel\AddressBook\CollectionFactory as AddressBookCollectionFactory;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

class AddressBookRepository implements AddressBookRepositoryInterface
{
    /**
     * @var ResourceAddressBook
     */
    protected ResourceAddressBook $resource;

    /**
     * @var AddressBookFactory
     */
    protected AddressBookFactory $addressBookFactory;

    /**
     * @var AddressBookCollectionFactory
     */
    protected AddressBookCollectionFactory $addressBookCollectionFactory;

    /**
     * @var CollectionProcessorInterface
     */
    private CollectionProcessorInterface $collectionProcessor;

    /**
     * @var Data\AddressBookSearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;

    /**
     * @param ResourceAddressBook $resource
     * @param AddressBookFactory $addressBookFactory
     * @param AddressBookCollectionFactory $addressBookCollectionFactory
     * @param CollectionProcessorInterface $collectionProcessor
     * @param Data\AddressBookSearchResultsInterfaceFactory $searchResultsFactory
     */
    public function __construct(
        ResourceAddressBook $resource,
        AddressBookFactory $addressBookFactory,
        AddressBookCollectionFactory $addressBookCollectionFactory,
        CollectionProcessorInterface $collectionProcessor,
        Data\AddressBookSearchResultsInterfaceFactory $searchResultsFactory,
    )
    {
        $this->resource = $resource;
        $this->addressBookFactory = $addressBookFactory;
        $this->addressBookCollectionFactory = $addressBookCollectionFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->searchResultsFactory = $searchResultsFactory;
    }


    /**
     * @param AddressBookInterface $addressBook
     * @return void
     * @throws CouldNotSaveException
     */
    public function save(Data\AddressBookInterface $addressBook)
    {
        try {
            $this->resource->save($addressBook);
        } catch (LocalizedException $exception) {
            Throw new CouldNotSaveException(
                __('Could not save the address book: %1', $exception->getMessage()),
                $exception
            );
        }
    }

    /**
     * @param $addressbookId
     * @return AddressBookInterface
     * @throws NoSuchEntityException
     */
    public function getById($addressbookId)
    {
        $addressBook = $this->addressBookFactory->create();
        $addressBook->load($addressbookId);
        if (!$addressBook->getId()){
            throw new NoSuchEntityException(__('The Address Book with the "%1" ID doesn\'t exist.', $addressBook));
        }
        return $addressBook;
    }


    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return AddressBookSearchResultsInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->addressBookCollectionFactory->create();

        $this->collectionProcessor->process($searchCriteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }


    /**
     * @param AddressBookInterface $addressBook
     * @return void
     * @throws CouldNotDeleteException
     */
    public function delete(Data\AddressBookInterface $addressBook)
    {
        try {
            $this->resource->delete($addressBook);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(
                __('Could not delete the Address book: %1', $exception->getMessage())
            );
        }
    }

    /**
     * @param $addressbookId
     * @return null
     * @throws LocalizedException
     */
    public function deleteById($addressbookId)
    {
        return $this->delete($this->getById($addressbookId));
    }
}
