<?php
declare(strict_types=1);
namespace MageBarrett\AddressBookMx\Api;

interface AddressesByTownInterface
{
    /**
     * POST for Addresses
     * @param string $town
     * @return mixed
     */
    public function postAddressesByTown($town);

}
