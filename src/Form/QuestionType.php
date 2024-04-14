<?php

namespace App\Form;

use App\Entity\Question;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Quiz;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use App\Form\ReponseType;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;
class QuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('quiz', EntityType::class, [
            'class' => 'App\Entity\Quiz', // Specify the entity class for the dropdown
            'choice_label' => 'id', // Assuming Offre entity has a 'name' property to display
        ])
            ->add('quest' , TextType::class , [
                'constraints' => [
                    new NotBlank(),
                    new Regex([
                        'pattern' => '/\?$/',
                        'message' => "La question doit se terminer par un point d'interrogation."
                    ]),
                ],
            ])
            ->add('listeRep', TextType::class)
            ->add('submit', SubmitType::class, ['label' => 'Submit']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Question::class,
        ]);
    }
}
