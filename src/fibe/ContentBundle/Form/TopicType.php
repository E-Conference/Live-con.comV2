<?php

namespace fibe\ContentBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class TopicType
 *
 * @package fibe\ContentBundle\Form
 */
class TopicType extends AbstractType
{
  /**
   * {@inheritdoc}
   */
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('id')
      ->add('label')
      ->add('papers', 'entity', array(
        'class' => 'fibeContentBundle:Paper',
        'required' => 'false',
        'multiple' => true,
      ))
      ->add('papers', 'entity', array(
        'class' => 'fibeContentBundle:Paper',
        'required' => 'false',
        'multiple' => true,
      ))
      ->add('vEvent', 'entity', array(
        'class' => 'fibeEventBundle:VEvent',
        'required' => 'false',
        'multiple' => true,
      ))
    ;
  }

  /**
   * {@inheritdoc}
   */
  public function setDefaultOptions(OptionsResolverInterface $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'fibe\ContentBundle\Entity\Topic'
    ));
  }

  /**
   * Returns the name of this type.
   *
   * @return string The name of this type
   */
  public function getName()
  {
    return 'fibe_contentbundle_topictype';
  }
}
