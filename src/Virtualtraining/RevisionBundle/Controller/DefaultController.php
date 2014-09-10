<?php

namespace Virtualtraining\RevisionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Virtualtraining\RevisionBundle\Entity\EntornoPaquete;
use Virtualtraining\RevisionBundle\Entity\DespliegueEntornoPaquete;

class DefaultController extends Controller {
	public function indexAction() {

		//$repository = $this->getDoctrine()->getRepository('VirtualtrainingRevisionBundle:Paquete');

		$despl_repo = $this->getDoctrine()->getRepository('VirtualtrainingRevisionBundle:Despliegue');
		$despliegues = $despl_repo->findBy(array(), array('orden'=>'asc'));

		$entorno_repo = $this->getDoctrine()->getRepository('VirtualtrainingRevisionBundle:Entorno');
		$entornos = $entorno_repo->findAll();

		$paqu_repo = $this->getDoctrine()->getRepository('VirtualtrainingRevisionBundle:Paquete');
		$paquetes = $paqu_repo->findAll();


		$resul = array();
		for ($i = 0, $l = count($despliegues); $i<$l; $i++){
			$despliegue = new DespliegueEntornoPaquete($despliegues[$i]);
			for ($j = 0, $l2 = count($entornos); $j<$l2; $j++){
				$entorno = new EntornoPaquete($entornos[$j]);
				for ($k = 0, $l3 = count($paquetes); $k<$l3; $k++){
					if (is_a($paquetes[$k]->getIdEntorno(), "Virtualtraining\RevisionBundle\Entity\Entorno") && $entorno->getId() == $paquetes[$k]->getIdEntorno()->getId()){
						$aux_paquete = $entorno->getPaquetes();
						array_push($aux_paquete, $paquetes[$k]);
						$entorno->setPaquetes($aux_paquete);
					}
				}
				$aux_entornos = $despliegue->getEntornos();
				array_push($aux_entornos, $entorno);
				$despliegue->setEntornos($aux_entornos);
			}
			array_push($resul, $despliegue);
		}

		return $this->render(	'VirtualtrainingRevisionBundle:Default:frontend.html.twig',
								array( 'resul'=>$resul)
		);
	}
}
