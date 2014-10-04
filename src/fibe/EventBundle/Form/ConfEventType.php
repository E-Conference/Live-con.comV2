<?php

namespace fibe\EventBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


/**
 * Class ConfEventType
 * @package fibe\EventBundle\Form
 */
class ConfEventType extends EventType
{


  /**
   * @param FormBuilderInterface $builder
   * @param array $options
   */
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    parent::buildForm($builder, $options);
    $builder
      ->add('attach', 'text', array('required' => false, 'label' => 'Twitter widget id'))
      ->add('acronym', 'text', array('required' => false,
        'label' => 'Acronym',
        'attr' => array('placeholder' => 'Acronym')));
  }

  /**
   * @param OptionsResolverInterface $resolver
   */
  public function setDefaultOptions(OptionsResolverInterface $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'fibe\EventBundle\Entity\VEvent'
    ));
  }

  /**
   * @return string
   */
  public function getName()
  {
    return 'fibe_eventbundle_confeventtype';
  }
}
