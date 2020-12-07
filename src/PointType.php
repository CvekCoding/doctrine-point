<?php
declare(strict_types=1);

namespace Cvek\Point;

use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class PointType extends Type
{
    public const POINT = 'point';

    public function getName(): string
    {
        return self::POINT;
    }

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform): string
    {
        return strtoupper(self::POINT);
    }

    /**
     * @param mixed $value
     */
    public function convertToPHPValue($value, AbstractPlatform $platform): ?Point
    {
        if (empty($value)) {
            return null;
        }

        [$latitude, $longitude] = \sscanf($value, '(%f, %f)');

        return new Point($latitude, $longitude);
    }

    /**
     * @param mixed $value
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform): string
    {
        if ($value instanceof Point) {
            $value = \sprintf('%F, %F', $value->getLatitude(), $value->getLongitude());
        }

        return $value;
    }

    public function canRequireSQLConversion(): bool
    {
        return true;
    }

    /**
     * @param string $value
     */
    public function convertToPHPValueSQL($value, $platform): string
    {
        return sprintf('(%s)::text', $value);
    }

    /**
     * @param string $sqlExpr
     */
    public function convertToDatabaseValueSQL($sqlExpr, AbstractPlatform $platform): string
    {
        return sprintf('%s::point', $sqlExpr);
    }
}
