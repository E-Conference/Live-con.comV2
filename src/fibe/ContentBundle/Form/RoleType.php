<?php

namespace fibe\ContentBundle\Form;

use fibe\CommunityBundle\Form\PersonType;
use fibe\EventBundle\Form\EventType;
use fibe\EventBundle\Form\MainEventType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class RoleType
 *
 * @package fibe\ContentBundle\Form
 */
class RoleType extends AbstractType
{

  /**
   * {@inheritdoc}
   */
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('person', 'fibe_restbundle_entity_type', array(
      'class'    => 'fibeCommunityBundle:Person',
      'uniqField' => 'email',
      'multiple' => false,
      ))
      ->add('event', 'fibe_restbundle_entity_type', array(
          'class'    => 'fibeEventBundle:Event',
          'uniqField' => 'label',
          'required' => false,
          'multiple' => false,
      ))
      ->add('roleLabel', 'fibe_restbundle_entity_type', array(
          'class'    => 'fibeContentBundle:RoleLabel',
          'uniqField' => 'label',
          'required' => false,
          'multiple' => false,
      ))
      ->add('mainEvent', 'fibe_restbundle_entity_type', array(
          'class'    => 'fibeEventBundle:MainEvent',
          'uniqField' => 'label',
          'required' => false,
          'multiple' => false,
      ));
  }

  /**
   * {@inheritdoc}
   */
  public function setDefaultOptions(OptionsResolverInterface $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'fibe\ContentBundle\Entity\Role',
      'csrf_protection' => false
    ));
  }

  /**
   * Returns the name of this type.
   *
   * @return string The name of this type
   */
  public function getName()
  {
    return 'fibe_contentbundle_roletype';
  }
}
