<?php

namespace fibe\CommunityBundle\Form;

use fibe\CommunityBundle\Entity\AdditionalInformations;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CompanyType extends AbstractType
{
  /**
   * @param FormBuilderInterface $builder
   * @param array                $options
   */
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('label')
      ->add('members', 'entity', array(
        'class'    => 'fibeCommunityBundle:Person',
        'label'    => 'Members',
        'multiple' => true,
        'required' => false
      ))
      ->add('additional_information', new AdditionalInformationsType());
  }

  /**
   * @param OptionsResolverInterface $resolver
   */
  public function setDefaultOptions(OptionsResolverInterface $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'fibe\CommunityBundle\Entity\Company',
      'csrf_protection' => false
    ));
  }

  /**
   * @return string
   */
  public function getName()
  {
    return 'fibe_bundle_communitybundle_company';
  }
}
