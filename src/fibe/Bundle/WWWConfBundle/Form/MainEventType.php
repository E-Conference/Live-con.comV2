<?php

namespace fibe\Bundle\WWWConfBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MainEventType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('logoPath')
            ->add('slug')
            ->add('label')
            ->add('startAt')
            ->add('endAt')
            ->add('summary')
            ->add('description')
            ->add('comment')
            ->add('revisionSequence')
            ->add('status')
            ->add('priority')
            ->add('url')
            ->add('createdAt')
            ->add('lastModifiedAt')
            ->add('appConfig')
            ->add('module')
            ->add('persons')
            ->add('team')
            ->add('location')
            ->add('categories')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'fibe\Bundle\WWWConfBundle\Entity\MainEvent'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'fibe_bundle_wwwconfbundle_mainevent';
    }
}
