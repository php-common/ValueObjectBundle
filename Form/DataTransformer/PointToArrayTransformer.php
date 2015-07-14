<?php

namespace Common\ValueObject\Bundle\Form\DataTransformer;

use Common\ValueObject\Geography\Point;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

/**
 * Transforms a point object into array and vice versa.
 *
 * @author Marcos Passos <marcos@croct.com>
 */
class PointToArrayTransformer implements DataTransformerInterface
{
    /**
     * {@inheritdoc}
     */
    public function transform($point)
    {
        if (!$point) {
            return ['latitude' => null, 'longitude' => null];
        }

        if (!$point instanceof Point) {
            throw new TransformationFailedException(sprintf('Expected a %s.', Point::class));
        }

        return [
            'latitude' => $point->getLatitude(),
            'longitude' => $point->getLongitude()
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function reverseTransform($value)
    {
        if (null === $value) {
            return;
        }

        if (!is_array($value)) {
            throw new TransformationFailedException('Expected an array.');
        }

        if ('' === implode('', $value)) {
            return;
        }

        $emptyFields = [];
        foreach (['latitude', 'longitude'] as $field) {
            if (!isset($value[$field])) {
                $emptyFields[] = $field;
            }
        }

        if (count($emptyFields) > 0) {
            throw new TransformationFailedException(
                sprintf('The fields "%s" should not be empty', implode('", "', $emptyFields)
                ));
        }

        try {
            return new Point($value['latitude'], $value['longitude']);
        } catch (\InvalidArgumentException $exception) {
            throw new TransformationFailedException($exception->getMessage());
        }
    }
}
