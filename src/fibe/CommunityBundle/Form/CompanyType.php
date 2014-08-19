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
        ->add('id')
      ->add('label')
      ->add('additionalInformation', new AdditionalInformationsType())
//      ->add('additional_information', new AdditionalInformationsType())
      ->add('members', 'entity', array(
        'class'    => 'fibeCommunityBundle:Person',
        'label'    => 'Members',
        'multiple' => true,
        'required' => false
      ))
    ;
  }

  /**
   * @param OptionsResolverInterface $resolver
   */
  public function setDefaultOptions(OptionsResolverInterface $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'fibe\CommunityBundle\Entity\Company',
      'csrf_protection' => false,
      'cascade_validation' => true,
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
