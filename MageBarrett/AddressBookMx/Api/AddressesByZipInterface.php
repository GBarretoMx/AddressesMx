<?php
declare(strict_types=1);
namespace MageBarrett\AddressBookMx\Api;

interface AddressesByZipInterface
{
    /**
     * POST for Addresses
     * @param string $zip
     * @return mixed
     */
    public function postAddressesByZip($zip);
}
