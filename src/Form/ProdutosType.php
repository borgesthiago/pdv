<?php

namespace App\Form;

use App\Entity\Produtos;
use App\Entity\Fornecedor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ProdutosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome')
            ->add('preco')
            ->add('qtd')
            ->add('descricao')
            ->add('fornecedor', EntityType::class, [
                'class' => Fornecedor::class,
                'choice_label' => 'empresa',
                'placeholder' => 'Selecione'
                ]) 
            ->add('status', ChoiceType::class, array(
                'choices'  => array(
                    'Ativo'    =>1,
                    'Inativo' =>0
                )))  
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produtos::class,
        ]);
    }
}
