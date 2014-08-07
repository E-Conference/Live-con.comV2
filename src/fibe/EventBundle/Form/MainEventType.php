<?php

namespace fibe\EventBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MainEventType extends AbstractType
{

  protected $user;

    /**
     * @param $user
     */
    public function __construct($user)
    {
      $this->user = $user;
    }

        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      parent::buildForm($builder, $options);
      $builder
        ->add('logo', 'file', array('required' => false,
          'label'    => 'Logo (jpeg - png - 2MO)',
          'attr'     => array('placeholder' => 'logoPath')))

      ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'fibe\EventBundle\Entity\MainEvent'
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
