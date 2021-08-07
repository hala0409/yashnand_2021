<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/compute/v1/compute.proto

namespace Google\Cloud\Compute\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * InstanceGroupManagers.applyUpdatesToInstances
 *
 * Generated from protobuf message <code>google.cloud.compute.v1.InstanceGroupManagersApplyUpdatesRequest</code>
 */
class InstanceGroupManagersApplyUpdatesRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Flag to update all instances instead of specified list of ?instances?. If the flag is set to true then the instances may not be specified in the request.
     *
     * Generated from protobuf field <code>bool all_instances = 403676512;</code>
     */
    private $all_instances = null;
    /**
     * The list of URLs of one or more instances for which you want to apply updates. Each URL can be a full URL or a partial URL, such as zones/[ZONE]/instances/[INSTANCE_NAME].
     *
     * Generated from protobuf field <code>repeated string instances = 29097598;</code>
     */
    private $instances;
    /**
     * The minimal action that you want to perform on each instance during the update:
     * - REPLACE: At minimum, delete the instance and create it again.
     * - RESTART: Stop the instance and start it again.
     * - REFRESH: Do not stop the instance.
     * - NONE: Do not disrupt the instance at all.  By default, the minimum action is NONE. If your update requires a more disruptive action than you set with this flag, the necessary action is performed to execute the update.
     *
     * Generated from protobuf field <code>string minimal_action = 270567060;</code>
     */
    private $minimal_action = null;
    /**
     * The most disruptive action that you want to perform on each instance during the update:
     * - REPLACE: Delete the instance and create it again.
     * - RESTART: Stop the instance and start it again.
     * - REFRESH: Do not stop the instance.
     * - NONE: Do not disrupt the instance at all.  By default, the most disruptive allowed action is REPLACE. If your update requires a more disruptive action than you set with this flag, the update request will fail.
     *
     * Generated from protobuf field <code>string most_disruptive_allowed_action = 66103053;</code>
     */
    private $most_disruptive_allowed_action = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type bool $all_instances
     *           Flag to update all instances instead of specified list of ?instances?. If the flag is set to true then the instances may not be specified in the request.
     *     @type string[]|\Google\Protobuf\Internal\RepeatedField $instances
     *           The list of URLs of one or more instances for which you want to apply updates. Each URL can be a full URL or a partial URL, such as zones/[ZONE]/instances/[INSTANCE_NAME].
     *     @type string $minimal_action
     *           The minimal action that you want to perform on each instance during the update:
     *           - REPLACE: At minimum, delete the instance and create it again.
     *           - RESTART: Stop the instance and start it again.
     *           - REFRESH: Do not stop the instance.
     *           - NONE: Do not disrupt the instance at all.  By default, the minimum action is NONE. If your update requires a more disruptive action than you set with this flag, the necessary action is performed to execute the update.
     *     @type string $most_disruptive_allowed_action
     *           The most disruptive action that you want to perform on each instance during the update:
     *           - REPLACE: Delete the instance and create it again.
     *           - RESTART: Stop the instance and start it again.
     *           - REFRESH: Do not stop the instance.
     *           - NONE: Do not disrupt the instance at all.  By default, the most disruptive allowed action is REPLACE. If your update requires a more disruptive action than you set with this flag, the update request will fail.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Compute\V1\Compute::initOnce();
        parent::__construct($data);
    }

    /**
     * Flag to update all instances instead of specified list of ?instances?. If the flag is set to true then the instances may not be specified in the request.
     *
     * Generated from protobuf field <code>bool all_instances = 403676512;</code>
     * @return bool
     */
    public function getAllInstances()
    {
        return isset($this->all_instances) ? $this->all_instances : false;
    }

    public function hasAllInstances()
    {
        return isset($this->all_instances);
    }

    public function clearAllInstances()
    {
        unset($this->all_instances);
    }

    /**
     * Flag to update all instances instead of specified list of ?instances?. If the flag is set to true then the instances may not be specified in the request.
     *
     * Generated from protobuf field <code>bool all_instances = 403676512;</code>
     * @param bool $var
     * @return $this
     */
    public function setAllInstances($var)
    {
        GPBUtil::checkBool($var);
        $this->all_instances = $var;

        return $this;
    }

    /**
     * The list of URLs of one or more instances for which you want to apply updates. Each URL can be a full URL or a partial URL, such as zones/[ZONE]/instances/[INSTANCE_NAME].
     *
     * Generated from protobuf field <code>repeated string instances = 29097598;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getInstances()
    {
        return $this->instances;
    }

    /**
     * The list of URLs of one or more instances for which you want to apply updates. Each URL can be a full URL or a partial URL, such as zones/[ZONE]/instances/[INSTANCE_NAME].
     *
     * Generated from protobuf field <code>repeated string instances = 29097598;</code>
     * @param string[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setInstances($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->instances = $arr;

        return $this;
    }

    /**
     * The minimal action that you want to perform on each instance during the update:
     * - REPLACE: At minimum, delete the instance and create it again.
     * - RESTART: Stop the instance and start it again.
     * - REFRESH: Do not stop the instance.
     * - NONE: Do not disrupt the instance at all.  By default, the minimum action is NONE. If your update requires a more disruptive action than you set with this flag, the necessary action is performed to execute the update.
     *
     * Generated from protobuf field <code>string minimal_action = 270567060;</code>
     * @return string
     */
    public function getMinimalAction()
    {
        return isset($this->minimal_action) ? $this->minimal_action : '';
    }

    public function hasMinimalAction()
    {
        return isset($this->minimal_action);
    }

    public function clearMinimalAction()
    {
        unset($this->minimal_action);
    }

    /**
     * The minimal action that you want to perform on each instance during the update:
     * - REPLACE: At minimum, delete the instance and create it again.
     * - RESTART: Stop the instance and start it again.
     * - REFRESH: Do not stop the instance.
     * - NONE: Do not disrupt the instance at all.  By default, the minimum action is NONE. If your update requires a more disruptive action than you set with this flag, the necessary action is performed to execute the update.
     *
     * Generated from protobuf field <code>string minimal_action = 270567060;</code>
     * @param string $var
     * @return $this
     */
    public function setMinimalAction($var)
    {
        GPBUtil::checkString($var, True);
        $this->minimal_action = $var;

        return $this;
    }

    /**
     * The most disruptive action that you want to perform on each instance during the update:
     * - REPLACE: Delete the instance and create it again.
     * - RESTART: Stop the instance and start it again.
     * - REFRESH: Do not stop the instance.
     * - NONE: Do not disrupt the instance at all.  By default, the most disruptive allowed action is REPLACE. If your update requires a more disruptive action than you set with this flag, the update request will fail.
     *
     * Generated from protobuf field <code>string most_disruptive_allowed_action = 66103053;</code>
     * @return string
     */
    public function getMostDisruptiveAllowedAction()
    {
        return isset($this->most_disruptive_allowed_action) ? $this->most_disruptive_allowed_action : '';
    }

    public function hasMostDisruptiveAllowedAction()
    {
        return isset($this->most_disruptive_allowed_action);
    }

    public function clearMostDisruptiveAllowedAction()
    {
        unset($this->most_disruptive_allowed_action);
    }

    /**
     * The most disruptive action that you want to perform on each instance during the update:
     * - REPLACE: Delete the instance and create it again.
     * - RESTART: Stop the instance and start it again.
     * - REFRESH: Do not stop the instance.
     * - NONE: Do not disrupt the instance at all.  By default, the most disruptive allowed action is REPLACE. If your update requires a more disruptive action than you set with this flag, the update request will fail.
     *
     * Generated from protobuf field <code>string most_disruptive_allowed_action = 66103053;</code>
     * @param string $var
     * @return $this
     */
    public function setMostDisruptiveAllowedAction($var)
    {
        GPBUtil::checkString($var, True);
        $this->most_disruptive_allowed_action = $var;

        return $this;
    }

}

