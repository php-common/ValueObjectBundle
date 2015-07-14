<?php

namespace Common\ValueObject\Bundle\Form\DataTransformer;

use Common\ValueObject\Internet\Email;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

/**
 * Transforms an email object into string and vice versa.
 *
 * @author Marcos Passos <marcos@croct.com>
 */
class EmailToStringTransformer implements DataTransformerInterface
{
    /**
     * {@inheritdoc}
     */
    public function transform($value)
    {
        if (null === $value) {
            return null;
        }

        if (!$value instanceof Email) {
            throw new TransformationFailedException(sprintf('Expected a %s.', Email::class));
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
            return new Email($value);
        } catch (\InvalidArgumentException $exception) {
            throw new TransformationFailedException($exception->getMessage());
        }
    }
}
