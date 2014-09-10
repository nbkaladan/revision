<?php
/**
 * Created by PhpStorm.
 * User: kaladan
 * Date: 20/08/14
 * Time: 18:49
 */

namespace Virtualtraining\RevisionBundle\Handler;

use Virtualtraining\RevisionBundle\Model\EntradaInterface;

Interface EntradaHandlerInterface {
	/**
	 * Get an Entrada given the identifier
	 *
	 * @api
	 *
	 * @param mixed $id
	 *
	 * @return EntradaInterface
	 */
	public function get($id);

	/**
	 * Get a list of Entradas.
	 *
	 * @param int $limit  the limit of the result
	 * @param int $offset starting from the offset
	 *
	 * @return array
	 */
	public function all($limit = 5, $offset = 0);

	/**
	 * Get a list of Entradas given idPaquete they belong to.
	 *
	 * @param mixed $idPaquete
	 * @param int $limit  the limit of the result
	 * @param int $offset starting from the offset
	 *
	 * @return array
	 */
	public function allByPaquete($idPaquete, $limit = 5, $offset = 0);

	/**
	 * Post Entrada, creates a new Entrada.
	 *
	 * @api
	 *
	 * @param array $parameters
	 *
	 * @return EntradaInterface
	 */
	public function post(array $parameters);

	/**
	 * Edit an Entrada.
	 *
	 * @api
	 *
	 * @param EntradaInterface   $entrada
	 * @param array           $parameters
	 *
	 * @return EntradaInterface
	 */
	public function put(EntradaInterface $entrada, array $parameters);

	/**
	 * Partially update an Entrada.
	 *
	 * @api
	 *
	 * @param EntradaInterface   $entrada
	 * @param array           $parameters
	 *
	 * @return EntradaInterface
	 */
	public function patch(EntradaInterface $entrada, array $parameters);
} 