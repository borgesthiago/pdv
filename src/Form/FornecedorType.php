<?php

namespace App\Form;

use App\Entity\Fornecedor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FornecedorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('empresa')
            ->add('cnpj')
            ->add('cep')
            ->add('endereco')
            ->add('bairro')
            ->add('cidade')
            ->add('uf')
            ->add('telefone')
            ->add('email')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Fornecedor::class,
        ]);
    }
}
