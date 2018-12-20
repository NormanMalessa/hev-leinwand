<?php

namespace AppBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ContentForm extends EntityManagerAwareForm {
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('title', TextType::class)
            ->add('content', TextareaType::class, [
                'attr' => [
                    'rows' => 10
                ]
            ])
            ->add('save', SubmitType::class, ['label' => 'Save'])
        ;
    }
}