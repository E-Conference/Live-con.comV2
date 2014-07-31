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
      ->add('name')
      ->add('logo', 'file', ['required' => false,
                             'label'    => 'Logo (jpeg - png - 2MO)',
                             'attr'     => ['placeholder' => 'logoPath']])
      ->add('url', 'url', ['required' => false])
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
