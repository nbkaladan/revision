<?php

namespace Virtualtraining\RevisionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {
	public function indexAction() {

		//$repository = $this->getDoctrine()->getRepository('VirtualtrainingRevisionBundle:Paquete');

		$despl_repo = $this->getDoctrine()->getRepository('VirtualtrainingRevisionBundle:Despliegue');
		$despliegues = $despl_repo->findBy(array(), array('orden'=>'asc'));

		$entorno_repo = $this->getDoctrine()->getRepository('VirtualtrainingRevisionBundle:Entorno');
		$entornos = $entorno_repo->findAll();

		/*
		$paqu_repo = $this->getDoctrine()->getRepository('VirtualtrainingRevisionBundle:Paquete');
		$paquetes = $paqu_repo->findPaquetesByEntornoAndDespliegue();
		*/
		return $this->render('VirtualtrainingRevisionBundle:Default:frontend.html.twig', array('despliegues'=>$despliegues,
																								'entornos'=>$entornos));
	}
}
