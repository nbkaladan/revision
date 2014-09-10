<?php
/**
 * Created by PhpStorm.
 * User: kaladan
 * Date: 19/08/14
 * Time: 14:52
 */

namespace Virtualtraining\RevisionBundle\Entity;


class EntornoPaquete extends Entorno{
	/**
	 * @var array
	 */
	private $paquetes = array();


	function __construct($entorno){
		$this->setId($entorno->getId());
		$this->setDescripcion($entorno->getDescripcion());
		$this->setUbicacion($entorno->getUbicacion());
	}

	/**
	 * Set paquetes
	 *
	 * @param array $paquete
	 * @return EntornoPaquete
	 */
	public function setPaquetes($paquete)
	{
		$this->paquetes = $paquete;

		return $this;
	}

	/**
	 * Get paquetes
	 *
	 * @return array
	 */
	public function getPaquetes()
	{
		return $this->paquetes;
	}
} 