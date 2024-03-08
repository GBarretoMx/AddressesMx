<?php
declare(strict_types=1);
namespace MageBarrett\AddressBookMx\Model\Resolver;

use MageBarrett\AddressBookMx\Model\ResourceModel\AddressBook\CollectionFactory as AddressesCollectionFactory;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

class AddressesMx implements ResolverInterface
{
    /**
     * @var AddressesCollectionFactory
     */
    protected AddressesCollectionFactory $addressesCollectionFactory;
    public function __construct(AddressesCollectionFactory $addressesCollectionFactory)
    {
        $this->addressesCollectionFactory = $addressesCollectionFactory;
    }

    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    )
    {
        if (empty($args['codigoPostal'])) {
            throw new GraphQlInputException(__('codigoPostal must be specified'));
        }

        $addressesCollection = $this->addressesCollectionFactory->create()
            ->addFieldToSelect('*')
            ->addFieldToFilter('codigo_postal', ['eq' => $args['codigoPostal']])
            ->getData();

        if (empty($addressesCollection)) {
            throw new GraphQlInputException(__('No match was found with codigoPostal'));
        }

        try {
            $addresses = [];
            foreach ($addressesCollection as $addressItem) {
                $addresses[] = [
                    'addressBookId'          => $addressItem['addressbook_id'],
                    'codigoPostal'           => $addressItem['codigo_postal'],
                    'nombreAsentantamiento' => $addressItem['nombre_asentantamiento'],
                    'tipoAsentamiento'      => $addressItem['tipo_asentamiento'],
                    'municipio'              => $addressItem['municipio'],
                    'estado'                 => $addressItem['estado'],
                    'claveEntidad'          => $addressItem['clave_entidad'],
                    'claveMunicipio'        => $addressItem['clave_municipio'],
                    'createdAt'             => $addressItem['created_at'],
                    'updatedAt'             => $addressItem['updated_at']
                ];
            }
            return ['addresses' => $addresses];

        } catch (NoSuchEntityException $e) {
            throw new GraphQlNoSuchEntityException(__($e->getMessage()), $e);
        }
    }

}
