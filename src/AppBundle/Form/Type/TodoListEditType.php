<?php
namespace AppBundle\Form\Type;

use AppBundle\Entity\TodoList;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TodoListEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('task', TextType::class, [
                'label' => 'common.task',
                'attr'  => [
                    'placeholder' => 'common.task.placeholder',
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'common.edit',
                'attr'  => [
                    'class' => 'btn-primary',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\TodoList',
        ]);
    }
}
