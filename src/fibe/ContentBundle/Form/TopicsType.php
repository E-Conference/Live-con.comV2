<?php

namespace fibe\ContentBundle\Form;

use Doctrine\Common\Persistence\ObjectManager;
use fibe\ContentBundle\Form\DataTransformer\GetOrCreateTopicTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class TopicType
 *
 * @package fibe\ContentBundle\Form
 */
class TopicsType extends AbstractType
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
    $transformer = new GetOrCreateTopicTransformer($this->om);
    $builder->addModelTransformer($transformer);
  }

  /**
   * {@inheritdoc}
   */
  public function setDefaultOptions(OptionsResolverInterface $resolver)
  {
    $resolver
      ->setDefaults(array(
        'type' => new TopicType(),
        'by_reference' => 'true',
        'allow_add' => true,
        'allow_delete' => true
      ))
    ;
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
    return 'fibe_contentbundle_topicstype';
  }
}
