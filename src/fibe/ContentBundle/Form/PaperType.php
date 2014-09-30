<?php

namespace fibe\ContentBundle\Form;

use fibe\CommunityBundle\Form\PersonType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class PaperType
 *
 * @package fibe\ContentBundle\Form
 */
class PaperType extends AbstractType
{

  /**
   * {@inheritdoc}
   */
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('label')
      ->add('abstract', 'textarea', array('required' => true))
      ->add('publisher', 'text', array('label' => 'Publisheur', 'required' => false))
      ->add('publishDate', 'text', array('label' => 'Published date', 'required' => false))
      ->add('url')
      ->add('topics', 'fibe_restbundle_collection_type', array(
        'type' => new TopicType(),
        'uniqField' => 'label',
      ))
      ->add('authors', 'fibe_restbundle_collection_type', array(
        'type' => new PersonType(),
        'uniqField' => 'email',
      ))
    ;
  }


  /**
   * {@inheritdoc}
   */
  public function setDefaultOptions(OptionsResolverInterface $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'fibe\ContentBundle\Entity\Paper',
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
    return 'fibe_contentbundle_papertype';
  }
}
