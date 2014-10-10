<?php

namespace fibe\EventBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MainEventType extends VEventType
{

    protected $user;

    public function __construct()
    {
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
            ->add('acronym')
            ->add('label')
            ->add('startAt', 'datetime', array(
                'widget' => 'single_text',
            ))
            ->add('endAt', 'datetime', array(
                'widget' => 'single_text',
            ))
            ->add('description')
            ->add('comment')
            ->add('url')
            ->add('categoryVersions', 'entity', array(
                'class' => 'fibeEventBundle:CategoryVersion',
                'required' => 'false',
                'multiple' => true,
            ));;
//        ->add('logo', 'file', array('required' => false,
//          'label'    => 'Logo (jpeg - png - 2MO)',
//          'attr'     => array('placeholder' => 'logoPath')))

        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'fibe\EventBundle\Entity\MainEvent',
            'csrf_protection' => false
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'fibe_eventbundle_mainevent';
    }
}
