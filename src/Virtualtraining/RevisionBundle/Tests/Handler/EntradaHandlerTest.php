<?php
/**
 * Created by PhpStorm.
 * User: kaladan
 * Date: 20/08/14
 * Time: 18:12
 */

namespace Virtualtraining\RevisionBundle\Tests\Handler;


class EntradaHandlerTest {
	public function get($idPaquete){
		$id = 1;
		$page = $this->getPage(); // create a Page object
		// I expect that the Page repository is called with find(1)
		$this->repository->expects($this->once())
			->method('find')
			->with($this->equalTo($idPaquete))
			->will($this->returnValue($page));

		$this->pageHandler->get($idPaquete); // call the get.
	}
} 