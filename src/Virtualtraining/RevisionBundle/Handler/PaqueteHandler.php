<?php
/**
 * Created by PhpStorm.
 * User: kaladan
 * Date: 20/08/14
 * Time: 18:09
 */

namespace Virtualtraining\RevisionBundle\Handler;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\FormFactoryInterface;

use Virtualtraining\RevisionBundle\Model\PaqueteInterface;
use Virtualtraining\RevisionBundle\Form\PaqueteType;
use Virtualtraining\RevisionBundle\Exception\InvalidFormException;

class PaqueteHandler implements PaqueteHandlerInterface{

	private $om;
	private $entityClass;
	private $repository;
	private $formFactory;

	public function __construct(ObjectManager $om, $entityClass, FormFactoryInterface $formFactory){
		$this->om = $om;
		$this->entityClass = $entityClass;
		$this->repository = $this->om->getRepository($this->entityClass);
		$this->formFactory = $formFactory;
	}

	/**
	 * @param mixed $id
	 * @return object|PaqueteInterface
	 */
	public function get($id){
		return $this->repository->find($id);
	}

	/**
	 * Get a list of Paquetes.
	 *
	 * @param int $limit the limit of the result
	 * @param int $offset starting from the offset
	 *
	 * @return array
	 */
	public function all($limit = 5, $offset = 0) {
		return $this->repository->findBy(array(), null, $limit, $offset);
	}

	/**
	 * Post Paquete, creates a new Paquete.
	 *
	 * @api
	 *
	 * @param array $parameters
	 *
	 * @return PaqueteInterface
	 */
	public function post(array $parameters) {
		$paquete = $this->createPaquete(); // factory method create an empty Paquete

		// Process form does all the magic, validate and hydrate the Paquete Object.
		return $this->processForm($paquete, $parameters, 'POST');
	}

	/**
	 * Edit a Paquete.
	 *
	 * @api
	 *
	 * @param PaqueteInterface $paquete
	 * @param array $parameters
	 *
	 * @return PaqueteInterface
	 */
	public function put(PaqueteInterface $paquete, array $parameters) {
		return $this->processForm($paquete, $parameters, 'PUT');
	}

	/**
	 * Partially update a Paquete.
	 *
	 * @api
	 *
	 * @param PaqueteInterface $paquete
	 * @param array $parameters
	 *
	 * @return PaqueteInterface
	 */
	public function patch(PaqueteInterface $paquete, array $parameters) {
		return $this->processForm($paquete, $parameters, 'PATCH');
	}


	/**
	 * Processes the form.
	 *
	 * @param PaqueteInterface $paquete
	 * @param array         $parameters
	 * @param String        $method
	 *
	 * @return PaqueteInterface
	 *
	 * @throws \Virtualtraining\RevisionBundle\Exception\InvalidFormException
	 */
	private function processForm(PaqueteInterface $paquete, array $parameters, $method = "PUT"){
		$form = $this->formFactory->create(new PaqueteType(), $paquete, array('method' => $method));
		$form->submit($parameters, 'PATCH' !== $method);
		if ($form->isValid()) {

			$paquete = $form->getData();
			$this->om->persist($paquete);
			$this->om->flush($paquete);

			return $paquete;
		}

		throw new InvalidFormException('Invalid submitted data', $form);
	}

	private function createPaquete(){
		return new $this->entityClass();
	}

} 