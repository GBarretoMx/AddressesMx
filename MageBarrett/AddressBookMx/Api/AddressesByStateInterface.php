<?php
declare(strict_types=1);
namespace MageBarrett\AddressBookMx\Api;

interface AddressesByStateInterface
{
    /**
     * POST for Addresses
     * @param string $state
     * @return mixed
     */
    public function postAddressesByState($state);
}
