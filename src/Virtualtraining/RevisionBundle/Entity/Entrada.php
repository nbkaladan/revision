<?php

namespace Virtualtraining\RevisionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Virtualtraining\RevisionBundle\Model\EntradaInterface;

/**
 * Entrada
 *
 * @ORM\Table(name="entrada", indexes={@ORM\Index(name="id_tipo_error", columns={"id_tipo_error"}), @ORM\Index(name="id_paquete", columns={"id_paquete"})})
 * @ORM\Entity
 */
class Entrada implements EntradaInterface
{
    /**
     * @var string
     *
     * @ORM\Column(name="autor", type="string", length=100, nullable=true)
     */
    private $autor;

    /**
     * @var string
     *
     * @ORM\Column(name="error", type="string", length=200, nullable=true)
     */
    private $error;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=3000, nullable=true)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="afecta", type="string", length=100, nullable=true)
     */
    private $afecta;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Virtualtraining\RevisionBundle\Entity\Paquete
     *
     * @ORM\ManyToOne(targetEntity="Virtualtraining\RevisionBundle\Entity\Paquete")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_paquete", referencedColumnName="id")
     * })
     */
    protected $idPaquete;

    /**
     * @var \Virtualtraining\RevisionBundle\Entity\TipoError
     *
     * @ORM\ManyToOne(targetEntity="Virtualtraining\RevisionBundle\Entity\TipoError")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_error", referencedColumnName="id")
     * })
     */
    protected $idTipoError;



    /**
     * Set autor
     *
     * @param string $autor
     * @return Entrada
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;

        return $this;
    }

    /**
     * Get autor
     *
     * @return string 
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * Set error
     *
     * @param string $error
     * @return Entrada
     */
    public function setError($error)
    {
        $this->error = $error;

        return $this;
    }

    /**
     * Get error
     *
     * @return string 
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Entrada
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
     * Set afecta
     *
     * @param string $afecta
     * @return Entrada
     */
    public function setAfecta($afecta)
    {
        $this->afecta = $afecta;

        return $this;
    }

    /**
     * Get afecta
     *
     * @return string 
     */
    public function getAfecta()
    {
        return $this->afecta;
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
     * Set idPaquete
     *
     * @param \Virtualtraining\RevisionBundle\Entity\Paquete $idPaquete
     * @return Entrada
     */
    public function setIdPaquete(\Virtualtraining\RevisionBundle\Entity\Paquete $idPaquete = null)
    {
        $this->idPaquete = $idPaquete;

        return $this;
    }

    /**
     * Get idPaquete
     *
     * @return \Virtualtraining\RevisionBundle\Entity\Paquete 
     */
    public function getIdPaquete()
    {
        return $this->idPaquete;
    }

    /**
     * Set idTipoError
     *
     * @param \Virtualtraining\RevisionBundle\Entity\TipoError $idTipoError
     * @return Entrada
     */
    public function setIdTipoError(\Virtualtraining\RevisionBundle\Entity\TipoError $idTipoError = null)
    {
        $this->idTipoError = $idTipoError;

        return $this;
    }

    /**
     * Get idTipoError
     *
     * @return \Virtualtraining\RevisionBundle\Entity\TipoError 
     */
    public function getIdTipoError()
    {
        return $this->idTipoError;
    }
}
