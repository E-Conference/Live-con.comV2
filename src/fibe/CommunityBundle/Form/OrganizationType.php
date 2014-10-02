<?php

namespace fibe\CommunityBundle\Form;

use fibe\CommunityBundle\Entity\AdditionalInformations;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OrganizationType extends AdditionalInformationsType
{
  /**
   * @param FormBuilderInterface $builder
   * @param array                $options
   */
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    parent::buildForm($builder, $options);
    $builder
      ->add('label')
      ->add('members', 'entity', array(
        'class'    => 'fibeCommunityBundle:Person',
        'label'    => 'Members',
        'multiple' => true,
        'required' => false
      ))
//        ->add('members', 'fibe_restbundle_collection_type', array(
//            'type' => new PersonType(),
//            'uniqField' => 'email',
//        ))

    ;
  }

  /**
   * @param OptionsResolverInterface $resolver
   */
  public function setDefaultOptions(OptionsResolverInterface $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'fibe\CommunityBundle\Entity\Organization',
      'csrf_protection' => false,
      'cascade_validation' => true,
    ));
  }

  /**
   * @return string
   */
  public function getName()
  {
    return 'fibe_bundle_communitybundle_organization';
  }
}
