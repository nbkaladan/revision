<?php

namespace Virtualtraining\RevisionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Virtualtraining\RevisionBundle\Model\PaqueteInterface;

/**
 * Paquete
 *
 * @ORM\Table(name="paquete", indexes={@ORM\Index(name="id_entorno", columns={"id_entorno"})})
 * @ORM\Entity(repositoryClass="Virtualtraining\RevisionBundle\Entity\PaqueteRepository")
 */
class Paquete implements PaqueteInterface
{
    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=100, nullable=true)
     */
    private $descripcion;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Virtualtraining\RevisionBundle\Entity\Entorno
     *
     * @ORM\ManyToOne(targetEntity="Virtualtraining\RevisionBundle\Entity\Entorno")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_entorno", referencedColumnName="id")
     * })
     */
    private $idEntorno;



    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Paquete
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idEntorno
     *
     * @param \Virtualtraining\RevisionBundle\Entity\Entorno $idEntorno
     * @return Paquete
     */
    public function setIdEntorno(\Virtualtraining\RevisionBundle\Entity\Entorno $idEntorno = null)
    {
        $this->idEntorno = $idEntorno;

        return $this;
    }

    /**
     * Get idEntorno
     *
     * @return \Virtualtraining\RevisionBundle\Entity\Entorno 
     */
    public function getIdEntorno()
    {
        return $this->idEntorno;
    }
}
