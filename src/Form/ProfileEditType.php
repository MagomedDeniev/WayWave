<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProfileEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('avatarFile', VichImageType::class, [
                'label' => 'Аватар',
                'required' => false,
                'download_uri' => false,
                'image_uri' => false,
                'allow_delete' => false,
                'attr' => [
                    'class' => 'custom-file-input'
                ]
            ])
            ->add('fullName', TextType::class, [
                'label' => 'ФИО',
                'attr' => [
                    'placeholder' => 'ФИО'
                ]
            ])
            ->add('number', NumberType::class, [
                'label' => 'Контактный номер',
                'attr' => [
                    'placeholder' => 'Контактный номер'
                ],
                'constraints' => [
                    new NotBlank(
                        ['message' => 'Поле не может быть пустым']
                    )
                ]
            ])
            ->add('email', TextType::class, [
                'label' => 'Почта',
                'attr' => [
                    'placeholder' => 'Почта'
                ]
            ])
            ->add('newsletter', CheckboxType::class, [
                'label' => 'Подписка на новости',
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
