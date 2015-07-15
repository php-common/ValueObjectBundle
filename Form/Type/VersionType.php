<?php

namespace Common\ValueObject\Bundle\Form\Type;

use Common\ValueObject\Bundle\Form\DataTransformer\VersionToStringTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Version type.
 *
 * @author Marcos Passos <marcos@marcospassos.com>
 */
class VersionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addModelTransformer(new VersionToStringTransformer());
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'text';
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'common_version';
    }
}
