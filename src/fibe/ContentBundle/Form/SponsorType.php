<?php

namespace fibe\ContentBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class SponsorType
 *
 * @package fibe\ContentBundle\Form
 */
class SponsorType extends AbstractType
{
  /**
   * {@inheritdoc}
   */
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('label')
      ->add('logo', 'file', ['required' => false,
        'label' => 'Logo (jpeg - png - 2MO)',
        'attr' => ['placeholder' => 'logoPath']])
      ->add('organization', 'entity', array(
        'class' => 'fibeCommunityBundle:Organization',
        'required' => 'false',
        'multiple' => true,
      ))
      ->add('vEvent', 'entity', array(
        'class' => 'fibeEventBundle:VEvent',
        'required' => 'false',
        'multiple' => true,
      ))
      ->add('description', 'textarea', ['required' => false]);
  }

  /**
   * {@inheritdoc}
   */
  public function setDefaultOptions(OptionsResolverInterface $resolver)
  {
    $resolver->setDefaults([
      'data_class' => 'fibe\ContentBundle\Entity\Sponsor'
    ]);
  }

  /**
   * Returns the name of this type.
   *
   * @return string The name of this type
   */
  public function getName()
  {
    return 'fibe_contentbundle_sponsortype';
  }
}
