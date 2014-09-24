<?php

namespace fibe\ContentBundle\Form;

use Doctrine\Common\Persistence\ObjectManager;
use fibe\ContentBundle\Form\DataTransformer\GetOrCreateTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class GetOrCreateType
 *
 * @package fibe\ContentBundle\Form
 */
class GetOrCreateType extends AbstractType
{
  /**
   * @var ObjectManager
   */
  private $om;

  /**
   * @param ObjectManager $om
   */
  public function __construct(ObjectManager $om)
  {
    $this->om = $om;
  }

  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $transformer = new GetOrCreateTransformer($this->om,$options['uniqField']);
    $builder->addModelTransformer($transformer);
  }

  /**
   * {@inheritdoc}
   */
  public function setDefaultOptions(OptionsResolverInterface $resolver)
  {
    $resolver
      ->setDefaults(array(
        'allow_add' => true,
        'allow_delete' => true
      ))
    ;
    $resolver->setRequired(array(
      'uniqField',
    ));
  }

  public function getParent()
  {
    return 'collection';
  }

  /**
   * Returns the name of this type.
   *
   * @return string The name of this type
   */
  public function getName()
  {
    return 'fibe_contentbundle_selecttype';
  }
}
