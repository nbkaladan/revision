<?php
/**
 * Created by PhpStorm.
 * User: kaladan
 * Date: 24/08/14
 * Time: 20:59
 */

namespace Virtualtraining\RevisionBundle\Model;


Interface PaqueteInterface {
	public function setDescripcion($descripcion);
	public function getDescripcion();
	public function getId();
	public function setIdEntorno(\Virtualtraining\RevisionBundle\Entity\Entorno $idEntorno = null);
	public function getIdEntorno();
} 