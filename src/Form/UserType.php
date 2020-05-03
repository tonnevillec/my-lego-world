<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Contracts\Translation\TranslatorInterface;

class UserType extends AbstractType
{

    /**
     * @var TranslatorInterface
     */
    protected $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', null, [
                'label_attr' => [
                    'class' => 'label'
                ],
                'label' => ucfirst($this->translator->trans('user.username.label'))
            ])
            ->add('gender', ChoiceType::class, [
                'label_attr' => [
                    'class' => 'label'
                ],
                'label'     => ucfirst($this->translator->trans('user.gender.label')),
                'choices'   => [
                    ''      => null,
                    'M.'    => 'M.',
                    'Mme.'  => 'Mme.',
                ],
                'required'  => false
            ])
            ->add('firstname', null, [
                'label_attr' => [
                    'class' => 'label'
                ],
                'label' => ucfirst($this->translator->trans('user.firstname.label')),
                'required'  => false
            ])
            ->add('lastname', null, [
                'label_attr' => [
                    'class' => 'label'
                ],
                'label' => ucfirst($this->translator->trans('user.lastname.label')),
                'required'  => false
            ])
            ->add('address', null, [
                'label_attr' => [
                    'class' => 'label'
                ],
                'label' => ucfirst($this->translator->trans('user.address.label')),
                'required'  => false
            ])
            ->add('postal_code', null, [
                'label_attr' => [
                    'class' => 'label'
                ],
                'label' => ucfirst($this->translator->trans('user.postal_code.label')),
                'required'  => false
            ])
            ->add('city', null, [
                'label_attr' => [
                    'class' => 'label'
                ],
                'label' => ucfirst($this->translator->trans('user.city.label')),
                'required'  => false
            ])
            ->add('birthdate', BirthdayType::class, [
                'label_attr' => [
                    'class' => 'label'
                ],
                'label' => ucfirst($this->translator->trans('user.birthdate.label')),
                'required'  => false
            ])
            ->add('phone_number', TelType::class, [
                'label_attr' => [
                    'class' => 'label'
                ],
                'label' => ucfirst($this->translator->trans('user.phone_number.label')),
                'required'  => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
