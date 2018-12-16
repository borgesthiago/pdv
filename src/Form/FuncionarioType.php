<?php

namespace App\Form;

use App\Entity\Funcionario;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Form\Type\CpfType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class FuncionarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome')
            ->add('cpf', CpfType::class, [
                'required' => false
            ])
            ->add('endereco')
            ->add('telefone')
            ->add('celular')
            ->add('salario')
            //->add('user')
            ->add('admissao', DateType::class, array(
                'widget' => 'single_text',
                'label' => 'Admissão',
                // this is actually the default format for single_text
                'format' => 'yyyy-MM-dd',
                'required' => false
            ))
            ->add('demissao', DateType::class, array(
                'widget' => 'single_text',
                'label' => 'Demissão',
                // this is actually the default format for single_text
                'format' => 'yyyy-MM-dd',
                'required' => false
            ))
        ;
        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Funcionario::class,
        ]);
    }
}
