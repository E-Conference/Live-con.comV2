<?php

namespace fibe\EventBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use fibe\EventBundle\Form\DataTransformer\ArrayToStringTransformer;

class SecondType extends AbstractType
{
     public function buildForm(FormBuilderInterface $builder, array $options)
     {
     }

     public function setDefaultOptions(OptionsResolverInterface $resolver)
     {
    //     $resolver->setDefaults(array(
    //         'choices'         => Recur::getSecond(),
    //         'multiple'        => true,
    //         'expanded'        => false,
    //         'invalid_message' => 'The selected second does not exist',
    //     ));
     }

     public function getParent()
     {
    //     return 'choice';
     }

     public function getName()
     {
    //     return 'second';
     }
}
