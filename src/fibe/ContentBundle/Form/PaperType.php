<?php

namespace fibe\ContentBundle\Form;

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
      ->add('title')
      ->add('abstract', 'textarea', array('required' => true))
      ->add('publisher', 'text', array('label' => 'Publisheur', 'required' => false))
      ->add('publishDate', 'text', array('label' => 'Published date', 'required' => false))
      ->add('url')
      ->add('topics', 'entity', array(
        'class'    => 'fibeContentBundle:Topic',
        'label'    => 'Topics',
        'choices'  => $this->user->getCurrentMainEvent()->getTopics()->toArray(),
        'multiple' => true,
        'required' => false
      ))
      ->add('authors', 'entity', array(
        'class'    => 'fibeCommunityBundle:Person',
        'label'    => 'Authors',
        'choices'  => $this->user->getCurrentMainEvent()->getPersons()->toArray(),
        'multiple' => true,
        'required' => false
      ));
  }


  /**
   * {@inheritdoc}
   */
  public function setDefaultOptions(OptionsResolverInterface $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'fibe\ContentBundle\Entity\Paper'
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
