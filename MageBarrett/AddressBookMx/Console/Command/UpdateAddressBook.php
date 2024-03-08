<?php
declare(strict_types=1);
namespace MageBarrett\AddressBookMx\Console\Command;

use MageBarrett\AddressBookMx\Api\Data\AddressBookInterfaceFactory;
use MageBarrett\AddressBookMx\Model\AddressBookRepository;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use MageBarrett\AddressBookMx\Model\AddressBookFactory;
use Magento\Framework\Filesystem\DirectoryList;
use Magento\Framework\Filesystem\Driver\File as DriverFile;

class UpdateAddressBook extends Command
{
    /**
     *  Exit codes.
     */
    const RETURN_SUCCESS = 0;
    const RETURN_FAILURE = 1;

    /**
     * @var AddressBookFactory
     */
    protected AddressBookFactory $addressBookFactory;

    /**
     * @var DirectoryList
     */
    protected DirectoryList $directoryList;


    /**
     * @var DriverFile|File
     */
    protected DriverFile $file;

    /**
     * @var LoggerInterface
     */
    protected LoggerInterface $logger;

    /**
     * @var AddressBookInterfaceFactory
     */
    protected AddressBookInterfaceFactory $addressBookInterfaceFactory;

    /**
     * @var AddressBookRepository
     */
    protected AddressBookRepository $addressBookRepository;

    public function __construct(
        AddressBookFactory $addressBookFactory,
        DirectoryList $directoryList,
        DriverFile $file,
        LoggerInterface $logger,
        AddressBookInterfaceFactory $addressBookInterfaceFactory,
        AddressBookRepository $addressBookRepository,
    )
    {
        $this->addressBookInterfaceFactory = $addressBookInterfaceFactory;
        $this->addressBookRepository = $addressBookRepository;
        $this->addressBookFactory    = $addressBookFactory;
        $this->directoryList         = $directoryList;
        $this->file                  = $file;
        $this->logger                = $logger;
        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName('magebarrett:updateaddressbook');
        $this->setDescription('Update Address Book Mx');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $output->writeln("<info>Start Update Address Book</info>");
            //Directory Path
            $pathDirectoryFile = $this->directoryList->getPath('var').'/import/CPdescarga.txt';
              if ($this->file->isExists($pathDirectoryFile)){
                  $output->writeln("<comment>reading file</comment>");
                  $addressFile = fopen($pathDirectoryFile, 'r');
                  while (!feof($addressFile)) {
                      $addressFileLine = fgets($addressFile);
                      $arrayAddress = explode('|', (string)$addressFileLine);
                      if (isset($arrayAddress[0]) && strlen($arrayAddress[0]) == 5){
                          //save addresses
                          $codigoPostal          = (int)$arrayAddress[0];     //codigo_postal
                          $nombreAsentantamiento = (string)$arrayAddress[1];  //nombre_asentantamiento
                          $tipoAsentamiento      = (string)$arrayAddress[2];  //tipo_asentamiento
                          $municipio             = (string)$arrayAddress[3];  //municipio
                          $estado                = (string) $arrayAddress[4]; //estado
                          $claveEntidad          = (int)$arrayAddress[7];     //clave_entidad
                          $claveMunicipio        = (int)$arrayAddress[11];    //clave_municipio
                          /*$this->logger->debug('ZIP::', [
                              'codigo_postal'          => $codigoPostal,
                              'nombre_asentantamiento' => $nombreAsentantamiento,
                              'tipo_asentamiento' => $tipoAsentamiento,
                              'municipio' => $municipio,
                              'estado' => $estado,
                              'clave_entidad' => $claveEntidad,
                              'clave_municipio' => $claveMunicipio
                          ]);*/
                          $model = $this->addressBookFactory->create();
                          $model->setCodigoPostal($codigoPostal);
                          $model->setNombreAsentantamiento($nombreAsentantamiento);
                          $model->setTipoAsentamiento($tipoAsentamiento);
                          $model->setMunicipio($municipio);
                          $model->setEstado($estado);
                          $model->setClaveEntidad($claveEntidad);
                          $model->setClaveMunicipio($claveMunicipio);
                          $this->addressBookRepository->save($model);
                      }
                  }
                  fclose($addressFile);
              } else {
                  $output->writeln("<error>File not found in directory </error>");
                  return self::RETURN_FAILURE;
              }

            $output->writeln("<info>Successfully Update Address Book</info>");
            return self::RETURN_SUCCESS;
        } catch (\Exception $exception){
            $output->writeln("");
            $output->writeln("<error>{$exception->getMessage()}</error>");
            return self::RETURN_FAILURE;
        }
    }


}
