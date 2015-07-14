<?php

namespace Common\ValueObject\Bundle\Form\Type;

use Common\ValueObject\Bundle\Form\DataTransformer\IpToStringTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * IP type.
 *
 * @author Marcos Passos <marcos@croct.com>
 */
class IpType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addModelTransformer(new IpToStringTransformer());
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
        return 'common_ip';
    }
}
