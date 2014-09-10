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

use Virtualtraining\RevisionBundle\Model\EntradaInterface;
use Virtualtraining\RevisionBundle\Form\EntradaType;
use Virtualtraining\RevisionBundle\Exception\InvalidFormException;

class EntradaHandler implements EntradaHandlerInterface{

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
	 * Get an Entrada given the identifier
	 *
	 * @api
	 *
	 * @param mixed $id
	 *
	 * @return EntradaInterface
	 */
	public function get($id){
		return $this->repository->find($id);
	}

	/**
	 * Get a list of Entradas.
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
	 * Get a list of Entradas given idPaquete they belong to.
	 *
	 * @param mixed $idPaquete
	 * @param int $limit  the limit of the result
	 * @param int $offset starting from the offset
	 *
	 * @return array
	 */
	public function allByPaquete($idPaquete, $limit = 5, $offset = 0) {
		return $this->repository->findBy(array('idPaquete'=>$idPaquete), null, $limit, $offset);
	}

	/**
	 * Post Entrada, creates a new Entrada.
	 *
	 * @api
	 *
	 * @param array $parameters
	 *
	 * @return EntradaInterface
	 */
	public function post(array $parameters) {
		$entrada = $this->createEntrada(); // factory method create an empty Entrada

		// Process form does all the magic, validate and hydrate the Entrada Object.
		return $this->processForm($entrada, $parameters, 'POST');
	}

	/**
	 * Edit an Entrada.
	 *
	 * @api
	 *
	 * @param EntradaInterface $entrada
	 * @param array $parameters
	 *
	 * @return EntradaInterface
	 */
	public function put(EntradaInterface $entrada, array $parameters) {
		// TODO: Implement put() method.
	}

	/**
	 * Partially update an Entrada.
	 *
	 * @api
	 *
	 * @param EntradaInterface $entrada
	 * @param array $parameters
	 *
	 * @return EntradaInterface
	 */
	public function patch(EntradaInterface $entrada, array $parameters) {
		// TODO: Implement patch() method.
	}

	/**
	 * Processes the form.
	 *
	 * @param EntradaInterface $entrada
	 * @param array         $parameters
	 * @param String        $method
	 *
	 * @return EntradaInterface
	 *
	 * @throws \Virtualtraining\RevisionBundle\Exception\InvalidFormException
	 */
	private function processForm(EntradaInterface $entrada, array $parameters, $method = "PUT"){
		$form = $this->formFactory->create(new EntradaType(), $entrada, array('method' => $method));
		$form->submit($parameters['Entrada'], 'PATCH' !== $method);
		if ($form->isValid()) {

			$entrada = $form->getData();
			$this->om->persist($entrada);
			$this->om->flush($entrada);

			return $entrada;
		}

		throw new InvalidFormException('Invalid submitted data', $form);
	}

	private function createEntrada(){
		return new $this->entityClass();
	}

} 