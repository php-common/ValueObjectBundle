<?php

namespace Common\ValueObject\Bundle\Form\DataTransformer;

use Common\ValueObject\Internet\Url;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use InvalidArgumentException;

/**
 * Transforms an URL object into string and vice versa.
 *
 * @author Marcos Passos <marcos@croct.com>
 */
class UrlToStringTransformer implements DataTransformerInterface
{
    /**
     * {@inheritdoc}
     */
    public function transform($value)
    {
        if (null === $value) {
            return null;
        }

        if (!$value instanceof Url) {
            throw new TransformationFailedException(sprintf('Expected a %s.', Url::class));
        }

        return (string) $value;
    }

    /**
     * {@inheritdoc}
     */
    public function reverseTransform($value)
    {
        if (null === $value) {
            return null;
        }

        try {
            return new Url($value);
        } catch (InvalidArgumentException $exception) {
            throw new TransformationFailedException($exception->getMessage());
        }
    }
}
