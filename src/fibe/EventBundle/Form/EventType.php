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
            ->add('locations', 'fibe_restbundle_collection_type', array(
                'type' => new LocationType(),
                'uniqField' => 'label',))

            ->add('papers', 'fibe_restbundle_collection_type', array(
                'type' => new PaperType(),
                'uniqField' => 'label',))

//            ->add('mainEvent', 'fibe_restbundle_entity_type', array(
//                'class'    => 'fibeEventBundle:MainEvent',
//                'uniqField' => 'label',
//                'required' => false,
//                'multiple' => false,
//            ))
            ->add('topics', 'fibe_restbundle_collection_type', array(
                'type' => new TopicType(),
                'uniqField' => 'label',

      ))
        ;
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
