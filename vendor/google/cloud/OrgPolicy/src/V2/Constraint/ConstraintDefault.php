<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/orgpolicy/v2/constraint.proto

namespace Google\Cloud\OrgPolicy\V2\Constraint;

use UnexpectedValueException;

/**
 * Specifies the default behavior in the absence of any `Policy` for the
 * `Constraint`. This must not be `CONSTRAINT_DEFAULT_UNSPECIFIED`.
 * Immutable after creation.
 *
 * Protobuf type <code>google.cloud.orgpolicy.v2.Constraint.ConstraintDefault</code>
 */
class ConstraintDefault
{
    /**
     * This is only used for distinguishing unset values and should never be
     * used.
     *
     * Generated from protobuf enum <code>CONSTRAINT_DEFAULT_UNSPECIFIED = 0;</code>
     */
    const CONSTRAINT_DEFAULT_UNSPECIFIED = 0;
    /**
     * Indicate that all values are allowed for list constraints.
     * Indicate that enforcement is off for boolean constraints.
     *
     * Generated from protobuf enum <code>ALLOW = 1;</code>
     */
    const ALLOW = 1;
    /**
     * Indicate that all values are denied for list constraints.
     * Indicate that enforcement is on for boolean constraints.
     *
     * Generated from protobuf enum <code>DENY = 2;</code>
     */
    const DENY = 2;

    private static $valueToName = [
        self::CONSTRAINT_DEFAULT_UNSPECIFIED => 'CONSTRAINT_DEFAULT_UNSPECIFIED',
        self::ALLOW => 'ALLOW',
        self::DENY => 'DENY',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }
        return constant($const);
    }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ConstraintDefault::class, \Google\Cloud\OrgPolicy\V2\Constraint_ConstraintDefault::class);

