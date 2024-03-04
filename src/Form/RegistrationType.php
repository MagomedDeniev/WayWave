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

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
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
            ->add('newsletter', CheckboxType::class, [
                'label' => 'Подписка на новости',
                'required' => false
            ])
            ->add('email', TextType::class, [
                'label' => 'Почта',
                'attr' => [
                    'placeholder' => 'Почта'
                ]
            ])
            ->add('agreeTerms', CheckboxType::class, [
                                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Тест 1',
                'second_options' => [
                    'label' => 'Повторите пароль',
                    'attr' => [
                        'placeholder' => 'Повторите пароль'
                    ]
                ],
                'first_options' => [
                    'label' => 'Пароль',
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Тест 5',
                        ]),
                        new Length([
                            'min' => 6,
                            'max' => 80,
                            'minMessage' => 'Тест 6',
                            'maxMessage' => 'Тест 7'
                        ]),
                    ],
                    'attr' => [
                        'minlength' => 6,
                        'maxlength' => 80,
                        'placeholder' => 'Пароль'
                    ]
                ],
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
