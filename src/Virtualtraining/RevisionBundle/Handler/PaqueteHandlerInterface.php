<?php
/**
 * Created by PhpStorm.
 * User: kaladan
 * Date: 20/08/14
 * Time: 18:49
 */

namespace Virtualtraining\RevisionBundle\Handler;

use Virtualtraining\RevisionBundle\Model\PaqueteInterface;

Interface PaqueteHandlerInterface {
	/**
	 * Get a Paquete given the identifier
	 *
	 * @api
	 *
	 * @param mixed $id
	 *
	 * @return PaqueteInterface
	 */
	public function get($id);

	/**
	 * Get a list of Paquetes.
	 *
	 * @param int $limit  the limit of the result
	 * @param int $offset starting from the offset
	 *
	 * @return array
	 */
	public function all($limit = 5, $offset = 0);

	/**
	 * Post Paquete, creates a new Paquete.
	 *
	 * @api
	 *
	 * @param array $parameters
	 *
	 * @return PaqueteInterface
	 */
	public function post(array $parameters);

	/**
	 * Edit a Paquete.
	 *
	 * @api
	 *
	 * @param PaqueteInterface   $paquete
	 * @param array           $parameters
	 *
	 * @return PaqueteInterface
	 */
	public function put(PaqueteInterface $paquete, array $parameters);

	/**
	 * Partially update a Paquete.
	 *
	 * @api
	 *
	 * @param PaqueteInterface   $paquete
	 * @param array           $parameters
	 *
	 * @return PaqueteInterface
	 */
	public function patch(PaqueteInterface $paquete, array $parameters);

} 