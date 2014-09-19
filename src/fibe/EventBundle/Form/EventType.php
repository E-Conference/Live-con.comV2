<?php

namespace fibe\EventBundle\Form;

use fibe\ContentBundle\Form\LocationType;
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
            ->add('locations', 'entity', array(
                'class'    => 'fibeContentBundle:Location',
                'multiple' => true,
                'required' => false
            ))
            ->add('papers', 'entity', array(
                    'class'    => 'fibeContentBundle:Paper',
                    'label'    => 'Papers',
                    //'choices'  => $this->user->getCurrentMainEvent()->getPapers()->toArray(),
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
