<?php


namespace fibe\EventBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CategoryGlobalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('label')
            ->add('description')
            ->add('categories', 'entity', array(
                'class' => 'fibeEventBundle:MainEvent',
                'required' => 'false',
                'multiple' => true,
            ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'fibe\EventBundle\Entity\CategoryGlobal',
            'csrf_protection' => false
        ));
    }

    public function getName()
    {
        return 'fibe_eventbundle_categoryglobal_type';
    }
}
