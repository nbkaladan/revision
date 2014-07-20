<?php

namespace Virtualtraining\RevisionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ResultadoDespliegueEnt
 *
 * @ORM\Table(name="resultado_despliegue_ent", indexes={@ORM\Index(name="id_despliegue", columns={"id_despliegue"}), @ORM\Index(name="id_resultado", columns={"id_resultado"}), @ORM\Index(name="IDX_8372CCD617D40B04", columns={"id_entrada"})})
 * @ORM\Entity
 */
class ResultadoDespliegueEnt
{
    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=200, nullable=true)
     */
    private $descripcion;

    /**
     * @var \Virtualtraining\RevisionBundle\Entity\Entrada
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Virtualtraining\RevisionBundle\Entity\Entrada")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_entrada", referencedColumnName="id")
     * })
     */
    private $idEntrada;

    /**
     * @var \Virtualtraining\RevisionBundle\Entity\Despliegue
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Virtualtraining\RevisionBundle\Entity\Despliegue")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_despliegue", referencedColumnName="id")
     * })
     */
    private $idDespliegue;

    /**
     * @var \Virtualtraining\RevisionBundle\Entity\Resultado
     *
     * @ORM\ManyToOne(targetEntity="Virtualtraining\RevisionBundle\Entity\Resultado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_resultado", referencedColumnName="id")
     * })
     */
    private $idResultado;



    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return ResultadoDespliegueEnt
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
     * Set idEntrada
     *
     * @param \Virtualtraining\RevisionBundle\Entity\Entrada $idEntrada
     * @return ResultadoDespliegueEnt
     */
    public function setIdEntrada(\Virtualtraining\RevisionBundle\Entity\Entrada $idEntrada)
    {
        $this->idEntrada = $idEntrada;

        return $this;
    }

    /**
     * Get idEntrada
     *
     * @return \Virtualtraining\RevisionBundle\Entity\Entrada 
     */
    public function getIdEntrada()
    {
        return $this->idEntrada;
    }

    /**
     * Set idDespliegue
     *
     * @param \Virtualtraining\RevisionBundle\Entity\Despliegue $idDespliegue
     * @return ResultadoDespliegueEnt
     */
    public function setIdDespliegue(\Virtualtraining\RevisionBundle\Entity\Despliegue $idDespliegue)
    {
        $this->idDespliegue = $idDespliegue;

        return $this;
    }

    /**
     * Get idDespliegue
     *
     * @return \Virtualtraining\RevisionBundle\Entity\Despliegue 
     */
    public function getIdDespliegue()
    {
        return $this->idDespliegue;
    }

    /**
     * Set idResultado
     *
     * @param \Virtualtraining\RevisionBundle\Entity\Resultado $idResultado
     * @return ResultadoDespliegueEnt
     */
    public function setIdResultado(\Virtualtraining\RevisionBundle\Entity\Resultado $idResultado = null)
    {
        $this->idResultado = $idResultado;

        return $this;
    }

    /**
     * Get idResultado
     *
     * @return \Virtualtraining\RevisionBundle\Entity\Resultado 
     */
    public function getIdResultado()
    {
        return $this->idResultado;
    }
}
