<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Funcionario;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class)
            ->add('roles',  ChoiceType::class, array(
                'choices' => ['Administrador' => '["ROLE_SUPER_ADMIN"]', 'Gerente' => 'ROLE_ADMIN', 'Operador' => 'ROLE_USER'],                
                'multiple' => true,
                'label' => 'Nível'
            ))
            ->add('password', PasswordType::class, array(
                'label' => 'Senha',
                'required' => false
            ))
            ->add('status', ChoiceType::class, array(
                'choices'  => array(
                    'Ativo'    =>1,
                    'Inativo' =>0
                )))  
                ->add('funcionario', EntityType::class, [
                    'class' => Funcionario::class,
                    'choice_label' => 'nome',
                    'placeholder' => 'Selecione',
                    'required'  => false
                    ])           
        ;
       // $builder->add('funcionario', ChoiceType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
