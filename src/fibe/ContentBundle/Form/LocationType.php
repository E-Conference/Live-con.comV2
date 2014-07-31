<?php

/**
 *
 * @author :  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @licence: GPL
 *
 */

namespace fibe\ContentBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class LocationType
 *
 * @package fibe\ContentBundle\Form
 */
class LocationType extends AbstractType
{
  /**
   * {@inheritdoc}
   */
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('name', 'text')
      ->add('capacity')
      ->add('description')
      ->add('latitude')
      ->add('longitude')
      ->add(
        'equipments',
        'entity',
        array(
          'class'    => 'fibeWWWConfBundle:Equipment',
          'label'    => 'Equipment',
          'required' => false,
          'multiple' => true
        )
      );
  }

  /**
   * {@inheritdoc}
   */
  public function setDefaultOptions(OptionsResolverInterface $resolver)
  {
    $resolver->setDefaults(
      array(
        'data_class' => 'fibe\ContentBundle\Entity\Location'
      )
    );
  }

  /**
   * Returns the name of this type.
   *
   * @return string The name of this type
   */
  public function getName()
  {
    return 'fibe_bundle_contentbundle_locationtype';
  }
}
