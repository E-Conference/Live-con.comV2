<?php

namespace fibe\Bundle\WWWConfBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VEventType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
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
            'data_class' => 'fibe\EventBundle\Entity\VEvent'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'fibe_bundle_wwwconfbundle_vevent';
    }
}
