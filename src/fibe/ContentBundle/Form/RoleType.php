<?php

namespace fibe\ContentBundle\Form;

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
  private $user;

  /**
   * Constructor
   *
   * @param $user
   */
  public function __construct($user)
  {
    $this->user = $user;
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('person', 'entity', array(
        'class'       => 'fibeCommunityBundle:Person',
        'label'       => 'Select Person',
        'choices'     => $this->user->getCurrentMainEvent()->getPersons()->toArray(),
        'required'    => true,
        'empty_value' => '',
      ))
      ->add('type', null, array(
        'required'    => true,
        'label'       => 'Select role',
        'empty_value' => '',
      ));
  }

  /**
   * {@inheritdoc}
   */
  public function setDefaultOptions(OptionsResolverInterface $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'fibe\ContentBundle\Entity\Role'
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
