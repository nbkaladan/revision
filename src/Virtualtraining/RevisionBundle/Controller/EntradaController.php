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

use Virtualtraining\RevisionBundle\Form\EntradaType;
use Virtualtraining\RevisionBundle\Model\EntradaInterface;
use Virtualtraining\RevisionBundle\Exception\InvalidFormException;

class EntradaController extends FOSRestController{

	/**
	 * List all Entradas.
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
	 * @Annotations\QueryParam(name="offset", requirements="\d+", nullable=true, description="Offset from which to start listing entradas.")
	 * @Annotations\QueryParam(name="limit", requirements="\d+", default="5", description="How many entradas to return.")
	 *
	 * @Annotations\View(templateVar="entradas")
	 *
	 *
	 * @param Request               $request      the request object
	 * @param ParamFetcherInterface $paramFetcher param fetcher service
	 *
	 * @return array
	 *
	 */
	public function getEntradasAction(Request $request, ParamFetcherInterface $paramFetcher){
		$offset = $paramFetcher->get('offset');
		$offset = null == $offset ? 0 : $offset;
		$limit = $paramFetcher->get('limit');

		return $this->container->get('virtualtraining_revision.entrada.handler')->all($limit, $offset);
	}

	/**
	 * Get single Entrada.
	 *
	 * @ApiDoc(
	 *   resource = true,
	 *   description = "Gets an Entrada for a given id",
	 *   output = "Virtualtraining\RevisionBundle\Entity\Entrada",
	 *   statusCodes = {
	 *     200 = "Returned when successful",
	 *     404 = "Returned when the page is not found"
	 *   }
	 * )
	 *
	 * @Annotations\View(templateVar="entrada")
	 *
	 * @param int     $id      the Entrada id
	 *
	 * @return array
	 *
	 * @throws NotFoundHttpException when page not exist
	 */
	public function getEntradaAction($id){
		$entrada = $this->container->get('virtualtraining_revision.entrada.handler')->get($id);

		return $entrada;
	}


	/**
	 * Presents the form to use to create a new Entrada.
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
	public function newEntradaAction()
	{
		return $this->createForm(new EntradaType());
	}

	/**
	 * Create an Entrada from the submitted data.
	 *
	 * @ApiDoc(
	 *   resource = true,
	 *   description = "Creates a new Entrada from the submitted data.",
	 *   input = "Virtualtraining\RevisionBundle\Form\EntradaType",
	 *   statusCodes = {
	 *     200 = "Returned when successful",
	 *     400 = "Returned when the form has errors"
	 *   }
	 * )
	 *
	 * @Annotations\View(
	 *  template = "VirtualtrainingRevisionBundle:Entrada:newEntrada.html.twig",
	 *  statusCode = Codes::HTTP_BAD_REQUEST,
	 *  templateVar = "form"
	 * )
	 *
	 * @param Request $request the request object
	 *
	 * @return FormTypeInterface|View
	 */
	public function postEntradaAction(Request $request)
	{
		try {
			$newEntrada = $this->container->get('virtualtraining_revision.entrada.handler')->post(
				$request->request->all()
			);

			$routeOptions = array(
				'id_paquete' => $newEntrada->getIdPaquete()->getId(),
				'_format' => $request->get('_format')
			);

			return $this->routeRedirectView('get_entradas', $routeOptions, Codes::HTTP_CREATED);

		} catch (InvalidFormException $exception) {

			return $exception->getForm();
		}
	}

	/**
	 * Fetch a list of Entradas or throw an 404 Exception.
	 *
	 * @param mixed $idPaquete
	 *
	 * @return EntradaInterface
	 *
	 * @throws NotFoundHttpException
	 */
	protected function getOr404($idPaquete){

		if (!($entrada = $this->container->get('virtualtraining_revision.entrada.handler')->get($idPaquete))) {
			throw new NotFoundHttpException(sprintf('The resource \'%s\' was not found.',$idPaquete));
		}

		return $entrada;
	}
} 