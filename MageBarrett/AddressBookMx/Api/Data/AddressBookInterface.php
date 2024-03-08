<?php
declare(strict_types=1);
namespace MageBarrett\AddressBookMx\Api\Data;

interface AddressBookInterface
{
    /**
     * Get Address Book ID
     * @return int|null
     */
    public function getAddressbookId():int;

    /**
     * Set Address  Book ID
     * @param int $addressbookId
     * @return AddressBookInterface
     */
    public function setAddressbookId(int $addressbookId);

    /**
     * Get Codigo Postal
     * @return int
     */
    public function getCodigoPostal():int;

    /**
     * Set Codigo postal
     * @param int $codigoPostal
     * @return AddressBookInterface
     */
    public function setCodigoPostal(int $codigoPostal);

    /**
     * Get Nombre Asentamiento
     * @return string
     */
    public function getNombreAsentantamiento():string;

    /**
     * Set Nombre Asentantamiento
     * @param string $nombreAsentantamiento
     * @return AddressBookInterface
     */
    public function setNombreAsentantamiento(string $nombreAsentantamiento);

    /**
     * Get Tipo Asentamiento
     * @return string
     */
    public function getTipoAsentamiento():string;

    /**
     * Set Tipo Asentamiento
     * @param string $tipoAsentamiento
     * @return AddressBookInterface
     */
    public function setTipoAsentamiento(string $tipoAsentamiento);

    /**
     * Get Municipio
     * @return string
     */
    public function getMunicipio():string;

    /**
     * Set Municipio
     * @param string $municipio
     * @return AddressBookInterface
     */
    public function setMunicipio(string $municipio);

    /**
     * Get Estado
     * @return string
     */
    public function getEstado():string;

    /**
     * Set Estado
     * @param string $estado
     * @return AddressBookInterface
     */
    public function setEstado(string $estado);

    /**
     * Get Clave Entidad
     * @return int
     */
    public function getClaveEntidad():int;

    /**
     * Set Clave Entidad
     * @param int $claveEntidad
     * @return AddressBookInterface
     */
    public function setClaveEntidad(int $claveEntidad);

    /**
     * Get Clave Municipio
     * @return int
     */
    public function getClaveMunicipio():int;

    /**
     * Set Clave Municipio
     * @param int $claveMunicipio
     * @return AddressBookInterface
     */
    public function setClaveMunicipio(int $claveMunicipio);

    /**
     * Get Created At
     * @return string
     */
    public function getCreatedAt():string;

    /**
     * Set Created At
     * @param string $createdAt
     * @return AddressBookInterface
     */
    public function setCreatedAt(string $createdAt);

    /**
     * Get Updated At
     * @return string
     */
    public function getUpdatedAt():string;

    /**
     * Set Updated At
     * @param string $updatedAt
     * @return AddressBookInterface
     */
    public function setUpdatedAt(string $updatedAt);
}
