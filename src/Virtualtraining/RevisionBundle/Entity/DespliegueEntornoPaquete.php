<?php
/**
 * Created by PhpStorm.
 * User: kaladan
 * Date: 19/08/14
 * Time: 14:43
 */

namespace Virtualtraining\RevisionBundle\Entity;


class DespliegueEntornoPaquete extends Despliegue{
	/**
	 * @var array
	 */
	private $entornos = array();


	function __construct($despliegue){
		$this->setId($despliegue->getId());
		$this->setDescripcion($despliegue->getDescripcion());
		$this->setOrden($despliegue->getOrden());
	}

	/**
	 * Set entornos
	 *
	 * @param array $entorno
	 * @return DespliegueEntornoPaquete
	 */
	public function setEntornos($entorno)
	{
		$this->entornos = $entorno;

		return $this;
	}

	/**
	 * Get entornos
	 *
	 * @return array
	 */
	public function getEntornos()
	{
		return $this->entornos;
	}
} 