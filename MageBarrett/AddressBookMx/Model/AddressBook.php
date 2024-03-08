<?php
declare(strict_types=1);
namespace MageBarrett\AddressBookMx\Model;

use MageBarrett\AddressBookMx\Api\Data\AddressBookInterface;
use Magento\Framework\Model\AbstractModel;
use MageBarrett\AddressBookMx\Model\ResourceModel\AddressBook as AddressBookResource;

class AddressBook extends AbstractModel implements AddressBookInterface
{
    private const ADDRESSBOOK_ID = 'addressbook_id';
    private const CODIGO_POSTAL = 'codigo_postal';
    private const NOMBRE_ASENTANTAMIENTO = 'nombre_asentantamiento';
    private const TIPO_ASENTAMIENTO = 'tipo_asentamiento';
    private const MUNICIPIO = 'municipio';
    private const ESTADO = 'estado';
    private const  CLAVE_ENTIDAD = 'clave_entidad';
    private const CLAVE_MUNICIPIO = 'clave_municipio';
    private const CREATED_AT = 'created_at';
    private const UPDATE_AT = 'updated_at';

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(AddressBookResource::class);
    }

    /**
     * Get Address Book ID
     * @return int
     */
    public function getAddressbookId():int
    {
        return (int) $this->getData(self::ADDRESSBOOK_ID);
    }


    /**
     * Set Address Book ID
     * @param int $addressbookId
     * @return AddressBookInterface
     */
    public function setAddressbookId(int $addressbookId)
    {
        $this->setData(self::ADDRESSBOOK_ID, $addressbookId);
    }

    /**
     * Get Codigo Postal
     * @return int
     */
    public function getCodigoPostal():int
    {
        return (int) $this->getData(self::CODIGO_POSTAL);
    }

    /**
     * Set Codigo Postal
     * @param int $codigoPostal
     * @return AddressBookInterface
     */
    public function setCodigoPostal(int $codigoPostal)
    {
        $this->setData(self::CODIGO_POSTAL, $codigoPostal);
    }

    /**
     * Get Nombre Asentantamiento
     * @return string
     */
    public function getNombreAsentantamiento():string
    {
        return (string)$this->getData(self::NOMBRE_ASENTANTAMIENTO);
    }

    /**
     * Set Nombre Asentantamiento
     * @param string $nombreAsentantamiento
     * @return AddressBookInterface
     */
    public function setNombreAsentantamiento(string $nombreAsentantamiento)
    {
        $this->setData(self::NOMBRE_ASENTANTAMIENTO, $nombreAsentantamiento);
    }

    /**
     * Get Tipo Asentamiento
     * @return string
     */
    public function getTipoAsentamiento():string
    {
        return (string)$this->getData(self::TIPO_ASENTAMIENTO);
    }

    /**
     * Set Tipo Asentamiento
     * @param string $tipoAsentamiento
     * @return AddressBookInterface
     */
    public function setTipoAsentamiento(string $tipoAsentamiento){
        $this->setData(self::TIPO_ASENTAMIENTO, $tipoAsentamiento);
    }

    /**
     * Get Municipio
     * @return string
     */
    public function getMunicipio():string
    {
        return (string)$this->getData(self::MUNICIPIO);
    }

    /**
     * Set Municipio
     * @param string $municipio
     * @return AddressBookInterface
     */
    public function setMunicipio(string $municipio)
    {
        $this->setData(self::MUNICIPIO, $municipio);
    }

    /**
     * Get Estado
     * @return string
     */
    public function getEstado():string
    {
        return  (string)$this->getData(self::ESTADO);
    }

    /**
     * Set Estado
     * @param string $estado
     * @return AddressBookInterface
     */
    public function setEstado(string $estado)
    {
        $this->setData(self::ESTADO, $estado);
    }

    /**
     * Get Clave Entidad
     * @return int
     */
    public function getClaveEntidad():int
    {
        return (int)$this->getData(self::CLAVE_ENTIDAD);
    }

    /**
     * Set Clave Entidad
     * @param int $claveEntidad
     * @return AddressBookInterface
     */
    public function setClaveEntidad(int $claveEntidad)
    {
        $this->setData(self::CLAVE_ENTIDAD, $claveEntidad);
    }

    /**
     * Get Clave Municipio
     * @return int
     */
    public function getClaveMunicipio():int
    {
        return (int)$this->getData(self::CLAVE_MUNICIPIO);
    }

    /**
     * Set Clave Municipio
     * @param int $claveMunicipio
     * @return AddressBookInterface
     */
    public function setClaveMunicipio(int $claveMunicipio)
    {
        $this->setData(self::CLAVE_MUNICIPIO, $claveMunicipio);
    }

    /**
     * Get Created At
     * @return string
     */
    public function getCreatedAt():string
    {
        return (string) $this->getData(self::CREATED_AT);
    }

    /**
     * Set Created At
     * @param string $createdAt
     * @return AddressBookInterface
     */
    public function setCreatedAt(string $createdAt)
    {
        $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * Get Updated At
     * @return string
     */
    public function getUpdatedAt():string
    {
        return (string)$this->getData(self::UPDATE_AT);
    }

    /**
     * Set Updated At
     * @param string $updatedAt
     * @return AddressBookInterface
     */
    public function setUpdatedAt(string $updatedAt)
    {
        $this->setData(self::UPDATE_AT, $updatedAt);
    }

}
