<?php

namespace fibe\EventBundle\Form;

use fibe\ContentBundle\Form\LocationType;
use fibe\ContentBundle\Form\PaperType;
use fibe\ContentBundle\Form\TopicType;
use fibe\EventBundle\Form\VEventType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EventType extends VEventType
{
       
    protected $categoriesLevels;

    public function __construct()
    { 
//        $this->categoriesLevels = $cat;
    }

        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
            ->add('locations', 'collection', array(
                'type' => new LocationType(),
                'required' => 'false',
                'allow_add' => true
            ))

            ->add('papers', 'collection', array(
                'type' => new PaperType(),
                'required' => 'false',
                'allow_add' => true
            ))

            ->add('mainEvent', new MainEventType())
            ->add('topics', 'collection', array(
                'type' => new TopicType(),
                'required' => 'false',
                'allow_add' => true
            ));

    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'fibe\EventBundle\Entity\Event',
            'csrf_protection' => false
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'fibe_eventbundle_event';
    }
}
