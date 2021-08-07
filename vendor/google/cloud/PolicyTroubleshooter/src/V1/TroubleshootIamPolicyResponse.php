<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/policytroubleshooter/v1/checker.proto

namespace Google\Cloud\PolicyTroubleshooter\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Response for [TroubleshootIamPolicy][google.cloud.policytroubleshooter.v1.IamChecker.TroubleshootIamPolicy].
 *
 * Generated from protobuf message <code>google.cloud.policytroubleshooter.v1.TroubleshootIamPolicyResponse</code>
 */
class TroubleshootIamPolicyResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * Indicates whether the member has the specified permission for the specified
     * resource, based on evaluating all of the applicable IAM policies.
     *
     * Generated from protobuf field <code>.google.cloud.policytroubleshooter.v1.AccessState access = 1;</code>
     */
    private $access = 0;
    /**
     * List of IAM policies that were evaluated to check the member's permissions,
     * with annotations to indicate how each policy contributed to the final
     * result.
     * The list of policies can include the policy for the resource itself. It can
     * also include policies that are inherited from higher levels of the resource
     * hierarchy, including the organization, the folder, and the project.
     * To learn more about the resource hierarchy, see
     * https://cloud.google.com/iam/help/resource-hierarchy.
     *
     * Generated from protobuf field <code>repeated .google.cloud.policytroubleshooter.v1.ExplainedPolicy explained_policies = 2;</code>
     */
    private $explained_policies;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $access
     *           Indicates whether the member has the specified permission for the specified
     *           resource, based on evaluating all of the applicable IAM policies.
     *     @type \Google\Cloud\PolicyTroubleshooter\V1\ExplainedPolicy[]|\Google\Protobuf\Internal\RepeatedField $explained_policies
     *           List of IAM policies that were evaluated to check the member's permissions,
     *           with annotations to indicate how each policy contributed to the final
     *           result.
     *           The list of policies can include the policy for the resource itself. It can
     *           also include policies that are inherited from higher levels of the resource
     *           hierarchy, including the organization, the folder, and the project.
     *           To learn more about the resource hierarchy, see
     *           https://cloud.google.com/iam/help/resource-hierarchy.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Policytroubleshooter\V1\Checker::initOnce();
        parent::__construct($data);
    }

    /**
     * Indicates whether the member has the specified permission for the specified
     * resource, based on evaluating all of the applicable IAM policies.
     *
     * Generated from protobuf field <code>.google.cloud.policytroubleshooter.v1.AccessState access = 1;</code>
     * @return int
     */
    public function getAccess()
    {
        return $this->access;
    }

    /**
     * Indicates whether the member has the specified permission for the specified
     * resource, based on evaluating all of the applicable IAM policies.
     *
     * Generated from protobuf field <code>.google.cloud.policytroubleshooter.v1.AccessState access = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setAccess($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\PolicyTroubleshooter\V1\AccessState::class);
        $this->access = $var;

        return $this;
    }

    /**
     * List of IAM policies that were evaluated to check the member's permissions,
     * with annotations to indicate how each policy contributed to the final
     * result.
     * The list of policies can include the policy for the resource itself. It can
     * also include policies that are inherited from higher levels of the resource
     * hierarchy, including the organization, the folder, and the project.
     * To learn more about the resource hierarchy, see
     * https://cloud.google.com/iam/help/resource-hierarchy.
     *
     * Generated from protobuf field <code>repeated .google.cloud.policytroubleshooter.v1.ExplainedPolicy explained_policies = 2;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getExplainedPolicies()
    {
        return $this->explained_policies;
    }

    /**
     * List of IAM policies that were evaluated to check the member's permissions,
     * with annotations to indicate how each policy contributed to the final
     * result.
     * The list of policies can include the policy for the resource itself. It can
     * also include policies that are inherited from higher levels of the resource
     * hierarchy, including the organization, the folder, and the project.
     * To learn more about the resource hierarchy, see
     * https://cloud.google.com/iam/help/resource-hierarchy.
     *
     * Generated from protobuf field <code>repeated .google.cloud.policytroubleshooter.v1.ExplainedPolicy explained_policies = 2;</code>
     * @param \Google\Cloud\PolicyTroubleshooter\V1\ExplainedPolicy[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setExplainedPolicies($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\PolicyTroubleshooter\V1\ExplainedPolicy::class);
        $this->explained_policies = $arr;

        return $this;
    }

}

