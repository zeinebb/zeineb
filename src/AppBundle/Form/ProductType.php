<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProductType extends AbstractType {
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) 
        {
        $builder
                ->add('reference',TextType::class,[
                    'label'=> 'Product Reference',
                    ])                    
                ->add('productLabel',TextType::class)
                ->add('buyPrice',TextType::class)
                ->add('salesPrice',TextType::class)
                ->add('vat',TextType::class)
                ->add('Create',SubmitType::class)
                ;     
        }
}
