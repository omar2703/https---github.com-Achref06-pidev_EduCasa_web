<?php



namespace App\Form;

use App\Entity\Reponse;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Question;
use App\Repository\QuestionRepository; 
class ReponseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('question', EntityType::class, [
            'class' => 'App\Entity\Question', // Specify the entity class for the dropdown
            'choice_label' => 'id', // Assuming Offre entity has a 'name' property to display
        ])
            ->add('rep', TextType::class, [
                'label' => 'Réponse'
            ])
            ->add('statut', CheckboxType::class, [
                'label' => 'Statut'
            ])
            ->add('submit', SubmitType::class, ['label' => 'Submit'])
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reponse::class,
        ]);
    }
}

