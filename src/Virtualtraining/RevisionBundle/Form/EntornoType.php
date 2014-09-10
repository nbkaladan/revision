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

class EntornoType extends AbstractType{
	/**
	 * @param FormBuilderInterface $builder
	 * @param array $options
	 */
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('descripcion')
			->add('ubicacion')
		;
	}

	/**
	 * @param OptionsResolverInterface $resolver
	 */
	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
				'data_class' => 'Virtualtraining\RevisionBundle\Entity\Entorno',
				'csrf_protection' => false,
			));
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return 'Entorno';
	}
} 