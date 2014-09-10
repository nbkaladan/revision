<?php
/**
 * Created by PhpStorm.
 * User: kaladan
 * Date: 21/08/14
 * Time: 13:01
 */

namespace Virtualtraining\RevisionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PaqueteType extends AbstractType{
	/**
	 * @param FormBuilderInterface $builder
	 * @param array $options
	 */
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('descripcion')
			->add('idEntorno', new EntornoType())
		;
	}

	/**
	 * @param OptionsResolverInterface $resolver
	 */
	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
				'data_class' => 'Virtualtraining\RevisionBundle\Entity\Paquete',
				'csrf_protection' => false,
				'cascade_validation' => true,
			));
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return 'Paquete';
	}
} 