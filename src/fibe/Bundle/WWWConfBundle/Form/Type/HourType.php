<?php

/**
 * 
 * @author:  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @licence: GPL
 *
 */

namespace fibe\Bundle\WWWConfBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use fibe\Bundle\WWWConfBundle\Form\DataTransformer\ArrayToStringTransformer;
// use fibe\Bundle\WWWConfBundle\Entity\Recur;

class HourType extends AbstractType
{
    // public function buildForm(FormBuilderInterface $builder, array $options)
    // {
    // }

    // public function setDefaultOptions(OptionsResolverInterface $resolver)
    // {
    //     $resolver->setDefaults(array(
    //         'choices'         => Recur::getHour(),
    //         'multiple'        => true,
    //         'expanded'        => false,
    //         'invalid_message' => 'The selected hour does not exist',
    //     ));
    // }

    // public function getParent()
    // {
    //     return 'choice';
    // }

    // public function getName()
    // {
    //     return 'hour';
    // }
}
