<?php

namespace App\Form;

use App\Entity\Vendas;
use App\Entity\TipoVenda;
use App\Entity\Cliente;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class VendasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        /*->add('dataEmissao', DateType::class, array(
            'widget' => 'single_text',
            'label' => 'Emissão',
            'format' => 'yyyy-MM-dd',
            'required' => false
        ))
        ->add('cliente', EntityType::class, [
            'class' => Cliente::class,
            'choice_label' => 'nome',
            'placeholder' => 'Selecione'
        ]) 
            ->add('valor')
            ->add('quantidade')
            ->add('desconto')
            ->add('comissao')
            ->add('tipo_venda', EntityType::class, [
                'class' => TipoVenda::class,
                'choice_label' => 'descricao',
                'placeholder' => 'Selecione'
                ]) 
                */
            //->add('tipo_venda')
            //->add('cliente')
            //->add('recebimentos')
            //->add('funcionario')
            //  ->add('produtos')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Vendas::class,
        ]);
    }
}
