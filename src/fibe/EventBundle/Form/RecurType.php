<?php

namespace fibe\EventBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use fibe\EventBundle\Entity\Recur;

class RecurType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    //     $builder
    //         ->add('frequency', 'choice', array(
    //             'choices'  => Recur::getFrequencies()
    //         ))
    //         ->add('byYearday', 'year_day')
    //         ->add('byMonth', 'month')
    //         ->add('byMonthday', 'month_day')
    //         ->add('byDay', 'week_day')
    //         ->add('byHour', 'hour')
    //         ->add('byMinute', 'minute')
    //         ->add('bySecond', 'second')
    //         ->add('rinterval', 'integer', array(
    //             'label'    => 'Repeat each',
    //             'required' => false
    //         ))
    //         ->add('over', 'choice', array(
    //             'choices' => array(
    //                 'never'  => 'never',
    //                 'rcount' => 'count',
    //                 'until'  => 'until'
    //             ),
    //             'multiple'      => false,
    //             'expanded'      => true,
    //             'attr'          => array('class' => 'over_selection'),
    //             'data'          => 'never'
    //         ))
    //         ->add('rcount', 'integer', array(
    //             'label'    => 'Count occurence',
    //             'required' => false
    //         ))
    //         ->add('until')
    //     ;
  }

  public function setDefaultOptions(OptionsResolverInterface $resolver)
  {
    //     $resolver->setDefaults(array(
    //         'data_class' => 'fibe\EventBundle\Entity\Recur'
    //     ));
  }

  public function getName()
  {
    //     return 'fibe_eventbundle_recurtype';
  }
}
