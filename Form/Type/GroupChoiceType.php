<?php

namespace Kamran\TagsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;


class GroupChoiceType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $optionArray = array('a'=>'Apple','b'=>'Bat','c'=>'Cat','d'=>'Dog');

        foreach($optionArray as $key=>$value){
            $options = array('label'=>$value , 'required'=> false);
            $builder->add($key, 'checkbox', $options);
        } 

    }


    /**
    * {@inheritdoc}
    */
    public function finishView(FormView $view, FormInterface $form, array $options)
    {
        /*
        $view->vars['mode'] = $options['mode'];
        parent::finishView($view, $form, $options);
        */
    }


    /**
    * {@inheritdoc}
    */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        
        /*$resolver->setDefaults(array(
                'mode' => 'htmlmixed',
            ));
         */   
    }

    /**
    * {@inheritdoc}
    */
    /*public function getParent()
    {
        return 'form';
    }*/

    /**
    * {@inheritdoc}
    */
    public function getName()
    {
        return 'groupchoice';
    }

}