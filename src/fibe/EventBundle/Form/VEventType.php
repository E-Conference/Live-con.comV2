<?php

namespace fibe\EventBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VEventType extends AbstractType
{
       
    protected $categoriesLevels;

    public function __construct($cat)
    { 
        $this->categoriesLevels = $cat;
    }

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
            ->add('category', 'entity', array(
                'class' => 'fibeEventBundle:Category',
                'query_builder' => function(EntityRepository $er) {
             return $er->extractQueryBuilder($cat);
            },
              ));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'fibe\Bundle\WWWConfBundle\Entity\VEvent'
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
