<?php

namespace Common\ValueObject\Bundle\Form\Type;

use Common\ValueObject\Bundle\Form\DataTransformer\PointToArrayTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Point type.
 *
 * @author Marcos Passos <marcos@croct.com>
 */
class PointType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('latitude', 'text', ['required' => false]);
        $builder->add('longitude', 'text', ['required' => false]);

        $builder->addViewTransformer(new PointToArrayTransformer());
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => null,
            'error_bubbling' => false,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'common_point';
    }
}
