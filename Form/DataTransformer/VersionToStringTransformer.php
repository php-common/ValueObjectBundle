<?php

namespace Common\ValueObject\Bundle\Form\DataTransformer;

use Common\ValueObject\Software\Version;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

/**
 * Transforms a version object into string and vice versa.
 *
 * @author Marcos Passos <marcos@marcospassos.com>
 */
class VersionToStringTransformer implements DataTransformerInterface
{
    /**
     * {@inheritdoc}
     */
    public function transform($value)
    {
        if (null === $value) {
            return null;
        }

        if (!$value instanceof Version) {
            throw new TransformationFailedException(sprintf('Expected a %s.', Version::class));
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
            return Version::fromString($value);
        } catch (\InvalidArgumentException $exception) {
            throw new TransformationFailedException($exception->getMessage());
        }
    }
}
