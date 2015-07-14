<?php

namespace Common\ValueObject\Bundle\Form\Type;

use Common\ValueObject\Bundle\Form\DataTransformer\UrlToStringTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * URL type.
 *
 * @author Marcos Passos <marcos@croct.com>
 */
class UrlType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addModelTransformer(new UrlToStringTransformer());
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
        return 'common_url';
    }
}
