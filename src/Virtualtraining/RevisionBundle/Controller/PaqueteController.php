<?php
/**
 * Created by PhpStorm.
 * User: kaladan
 * Date: 20/08/14
 * Time: 13:05
 */

namespace Virtualtraining\RevisionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Util\Codes;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Request\ParamFetcherInterface;

use Symfony\Component\Form\FormTypeInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

use Virtualtraining\RevisionBundle\Form\PaqueteType;
use Virtualtraining\RevisionBundle\Model\PaqueteInterface;
use Virtualtraining\RevisionBundle\Exception\InvalidFormException;

class PaqueteController extends FOSRestController{

	/**
	 * List all Paquetes.
	 *
	 * @ApiDoc(
	 *   resource = true,
	 *   description = "Gets a list of Paquetes",
	 *   output = "Virtualtraining\RevisionBundle\Entity\Paquete",
	 *   statusCodes = {
	 *     200 = "Returned when successful",
	 *     404 = "Returned when the page is not found"
	 *   }
	 * )
	 *
	 * @Annotations\QueryParam(name="offset", requirements="\d+", nullable=true, description="Offset from which to start listing paquetes.")
	 * @Annotations\QueryParam(name="limit", requirements="\d+", default="5", description="How many paquetes to return.")
	 *
	 * @Annotations\View(templateVar="paquete")
	 *
	 *
	 * @param Request               $request      the request object
	 * @param ParamFetcherInterface $paramFetcher param fetcher service
	 *
	 * @return array
	 *
	 */
	public function getPaquetesAction(Request $request, ParamFetcherInterface $paramFetcher){
		$offset = $paramFetcher->get('offset');
		$offset = null == $offset ? 0 : $offset;
		$limit = $paramFetcher->get('limit');

		return $this->container->get('virtualtraining_revision.paquete.handler')->all($limit, $offset);
	}

	/**
	 * Get single Paquete.
	 *
	 * @ApiDoc(
	 *   resource = true,
	 *   description = "Gets a Paquete for a given id",
	 *   output = "Virtualtraining\RevisionBundle\Entity\Paquete",
	 *   statusCodes = {
	 *     200 = "Returned when successful",
	 *     404 = "Returned when the page is not found"
	 *   }
	 * )
	 *
	 * @Annotations\View(templateVar="paquete")
	 *
	 * @param int     $id      the paquete id
	 *
	 * @return array
	 *
	 * @throws NotFoundHttpException when page not exist
	 */
	public function getPaqueteAction($id){
		$paquete = $this->container->get('virtualtraining_revision.paquete.handler')->get($id);

		return $paquete;
	}


	/**
	 * List all Entradas which belongs to a given Paquete id.
	 *
	 * @ApiDoc(
	 *   resource = true,
	 *   description = "Gets a list of Entradas",
	 *   output = "Virtualtraining\RevisionBundle\Entity\Entrada",
	 *   statusCodes = {
	 *     200 = "Returned when successful",
	 *     404 = "Returned when the page is not found"
	 *   }
	 * )
	 *
	 * @Annotations\View(templateVar="entradas")
	 *
	 *
	 * @param int     $id      the paquete id
	 *
	 * @return array
	 *
	 */
	public function getPaqueteEntradasAction($id){
		return $this->container->get('virtualtraining_revision.entrada.handler')->allByPaquete($id);
	}


	/**
	 * Presents the form to use to create a new Paquete.
	 *
	 * @ApiDoc(
	 *   resource = true,
	 *   statusCodes = {
	 *     200 = "Returned when successful"
	 *   }
	 * )
	 *
	 * @Annotations\View(
	 *  templateVar = "form"
	 * )
	 *
	 * @return FormTypeInterface
	 */
	public function newPaqueteAction()
	{
		return $this->createForm(new PaqueteType());
	}

	/**
	 * Create a Paquete from the submitted data.
	 *
	 * @ApiDoc(
	 *   resource = true,
	 *   description = "Creates a new Paquete from the submitted data.",
	 *   input = "Virtualtraining\RevisionBundle\Form\PaqueeteType",
	 *   statusCodes = {
	 *     200 = "Returned when successful",
	 *     400 = "Returned when the form has errors"
	 *   }
	 * )
	 *
	 * @Annotations\View(
	 *  template = "VirtualtrainingRevisionBundle:Paquete:newPaquete.html.twig",
	 *  statusCode = Codes::HTTP_BAD_REQUEST,
	 *  templateVar = "form"
	 * )
	 *
	 * @param Request $request the request object
	 *
	 * @return FormTypeInterface|View
	 */
	public function postPaqueteAction(Request $request)
	{
		try {
			$newPaquete = $this->container->get('virtualtraining_revision.paquete.handler')->post(
				$request->request->all()
			);

			$routeOptions = array(
				'id' => $newPaquete->getId(),
				'_format' => $request->get('_format')
			);

			return $this->routeRedirectView('get_paquetes', $routeOptions, Codes::HTTP_CREATED);

		} catch (InvalidFormException $exception) {

			return $exception->getForm();
		}
	}

	/**
	 * Fetch a list of Paquetes or throw an 404 Exception.
	 *
	 * @param mixed $id
	 *
	 * @return PaqueteInterface
	 *
	 * @throws NotFoundHttpException
	 */
	protected function getOr404($id){

		if (!($paquete = $this->container->get('virtualtraining_revision.paquete.handler')->get($id))) {
			throw new NotFoundHttpException(sprintf('The resource \'%s\' was not found.',$id));
		}

		return $paquete;
	}
} 