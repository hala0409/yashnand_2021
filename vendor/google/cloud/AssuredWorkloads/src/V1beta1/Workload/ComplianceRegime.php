<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/assuredworkloads/v1beta1/assuredworkloads_v1beta1.proto

namespace Google\Cloud\AssuredWorkloads\V1beta1\Workload;

use UnexpectedValueException;

/**
 * Supported Compliance Regimes.
 *
 * Protobuf type <code>google.cloud.assuredworkloads.v1beta1.Workload.ComplianceRegime</code>
 */
class ComplianceRegime
{
    /**
     * Unknown compliance regime.
     *
     * Generated from protobuf enum <code>COMPLIANCE_REGIME_UNSPECIFIED = 0;</code>
     */
    const COMPLIANCE_REGIME_UNSPECIFIED = 0;
    /**
     * Information protection as per DoD IL4 requirements.
     *
     * Generated from protobuf enum <code>IL4 = 1;</code>
     */
    const IL4 = 1;
    /**
     * Criminal Justice Information Services (CJIS) Security policies.
     *
     * Generated from protobuf enum <code>CJIS = 2;</code>
     */
    const CJIS = 2;
    /**
     * FedRAMP High data protection controls
     *
     * Generated from protobuf enum <code>FEDRAMP_HIGH = 3;</code>
     */
    const FEDRAMP_HIGH = 3;
    /**
     * FedRAMP Moderate data protection controls
     *
     * Generated from protobuf enum <code>FEDRAMP_MODERATE = 4;</code>
     */
    const FEDRAMP_MODERATE = 4;
    /**
     * Assured Workloads For US Regions data protection controls
     *
     * Generated from protobuf enum <code>US_REGIONAL_ACCESS = 5;</code>
     */
    const US_REGIONAL_ACCESS = 5;
    /**
     * Health Insurance Portability and Accountability Act controls
     *
     * Generated from protobuf enum <code>HIPAA = 6;</code>
     */
    const HIPAA = 6;
    /**
     * Health Information Trust Alliance controls
     *
     * Generated from protobuf enum <code>HITRUST = 7;</code>
     */
    const HITRUST = 7;

    private static $valueToName = [
        self::COMPLIANCE_REGIME_UNSPECIFIED => 'COMPLIANCE_REGIME_UNSPECIFIED',
        self::IL4 => 'IL4',
        self::CJIS => 'CJIS',
        self::FEDRAMP_HIGH => 'FEDRAMP_HIGH',
        self::FEDRAMP_MODERATE => 'FEDRAMP_MODERATE',
        self::US_REGIONAL_ACCESS => 'US_REGIONAL_ACCESS',
        self::HIPAA => 'HIPAA',
        self::HITRUST => 'HITRUST',
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
class_alias(ComplianceRegime::class, \Google\Cloud\AssuredWorkloads\V1beta1\Workload_ComplianceRegime::class);

