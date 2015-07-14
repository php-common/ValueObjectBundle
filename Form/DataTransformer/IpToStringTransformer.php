<?php

namespace Common\ValueObject\Bundle\Form\DataTransformer;

use Common\ValueObject\Internet\Ip;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

/**
 * Transforms an IP object into string and vice versa.
 *
 * @author Marcos Passos <marcos@croct.com>
 */
class IpToStringTransformer implements DataTransformerInterface
{
    public function transform($value)
    {
        if (null === $value) {
            return null;
        }

        if (!$value instanceof Ip) {
            throw new TransformationFailedException(sprintf('Expected a %s.', Ip::class));
        }

        return (string) $value;
    }

    public function reverseTransform($value)
    {
        if (null === $value) {
            return null;
        }

        try {
            return new Ip($value);
        } catch (\InvalidArgumentException $exception) {
            throw new TransformationFailedException($exception->getMessage());
        }
    }
}
