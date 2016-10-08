<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nickName', TextType::class, [
                'label' => 'common.username',
                'attr' => [
                    'placeholder' => 'common.username',
                    'autofocus' => true,
                ],
                'required' => true,
            ])
            ->add('email', EmailType::class, [
                'label' => 'common.email',
                'attr' => [
                    'placeholder' => 'common.email',
                ],
                'required' => true,
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'password.must_match',
                'required' => true,
                'first_options'  => [
                    'label' => 'common.password',
                    'attr' => [
                        'placeholder' => 'common.password',
                    ],
                ],
                'second_options' => [
                    'label' => 'common.password_repeat',
                    'attr' => [
                        'placeholder' => 'common.password_repeat',
                    ],
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\User',
        ]);
    }
}
