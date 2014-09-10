<?php
/**
 * Created by PhpStorm.
 * User: kaladan
 * Date: 20/08/14
 * Time: 18:02
 */

namespace Virtualtraining\RevisionBundle\Model;


Interface EntradaInterface {
	public function setAutor($autor);
	public function getAutor();
	public function setError($error);
	public function getError();
	public function setDescripcion($descripcion);
	public function getDescripcion();
	public function setAfecta($afecta);
	public function getAfecta();
	public function getId();
	public function setIdPaquete(\Virtualtraining\RevisionBundle\Entity\Paquete $idPaquete = null);
	public function getIdPaquete();
	public function setIdTipoError(\Virtualtraining\RevisionBundle\Entity\TipoError $idTipoError = null);
	public function getIdTipoError();
} 