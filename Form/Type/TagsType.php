<?php

namespace Kamran\TagsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class TagsType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add(
            $builder->create('name', 'text',array(
            'attr' => array(
                'class' => 'form-control',
                'placeholder'=>'Enter a Tag'
            ),
        //))->addViewTransformer(new TagsTransformer())
        ))->addModelTransformer(new TagsTransformer())    
        );
        

        /*
        $builder->add('name','text', array(
            'attr' => array(
                'class' => 'form-control',
                'placeholder'=>'Enter a Tag'
            ),
        ))->addViewTransformer(new TagsTransformer());
        */

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) {
                $form = $event->getForm();
                $data = $event->getData();

                /*
                $form->add('comments','textarea',array(
                    'mapped'=> false
                ));
                */
            }
        );

        $builder->addEventListener(FormEvents::POST_SUBMIT,
            function(FormEvent $event){
                $data = $event->getData();
                //var_dump($data);
            }
        );

    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Kamran\TagsBundle\Entity\Tags',
        ));
    }

    public function getName()
    {
        return 'tagtype_form';
    }

}