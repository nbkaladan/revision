<?php
/**
 * Created by PhpStorm.
 * User: kaladan
 * Date: 20/07/14
 * Time: 14:00
 */


namespace Virtualtraining\RevisionBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * PaqueteRepository
 *
 */
class PaqueteRepository extends EntityRepository{
	public function findPaquetesByEntornoAndDespliegue(){
		$em = $this->getEntityManager();

		$dql = 'select 	d.id as id_despliegue,
						d.descripcion as despliegue_descripcion,
						e.id as id_entorno,
						e.descripcion as entorno_descripcion,
						p.id as id_paquete,
						p.descripcion as paquete_descripcion
				from 	RevisionBundle:Despliegue d
						inner join RevisionBundle:Resultado_despliegue_ent res on (res.id_despliegue = d.id)
						inner join RevisionBundle:Entrada ent on (ent.id = res.id_resultado)
						inner join RevisionBundle:Paquete p on (ent.id_paquete = p.id)
						inner join RevisionBundle:Entorno e on (p.id_entorno = e.id)

				union

				select 	d.id as id_despliegue,
						d.descripcion as despliegue_descripcion,
						aux.id_entorno as id_entorno,
						aux.entorno_descripcion as entorno_descripcion,
						aux.id_paquete as id_paquete,
						aux.paquete_descripcion as paquete_descripcion
						from RevisionBundle:Despliegue d
						inner join (
							select	e2.id as id_entorno,
									e2.descripcion as entorno_descripcion,
									p2.id as id_paquete,
									p2.descripcion as paquete_descripcion,
									1 as orden
							from 	RevisionBundle:Paquete p2
									left join RevisionBundle:Entorno e2 on (p2.id_entorno = e2.id)
									left join RevisionBundle:Entrada ent2 on (ent2.id_paquete = p2.id)
									left join RevisionBundle:Resultado_despliegue_ent res2 on (ent2.id = res2.id_resultado)
							where	ent2.id is null
						) aux on (aux.orden = d.orden )';

		$consuta = $em->createQuery($dql);
		return $consuta->getResult();
	}
}