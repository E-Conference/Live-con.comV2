<?php

namespace fibe\CommunityBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CompanyType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $builder
        ->add('name')
        ->add('page', 'text', array('required' => false, 'label' => 'Homepage'))
        ->add('country')
        ->add('members', 'entity', array(
          'class'    => 'fibeWWWConfBundle:Person',
          'label'    => 'Members',
          'multiple' => true,
          'choices'  => $this->user->getCurrentMainEvent()->getPersons()->toArray(),
          'required' => false
        ));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'fibe\Bundle\WWWConfBundle\Entity\Company'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'fibe_bundle_wwwconfbundle_company';
    }
}
