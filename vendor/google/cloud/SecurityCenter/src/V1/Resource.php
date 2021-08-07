<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/securitycenter/v1/resource.proto

namespace Google\Cloud\SecurityCenter\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Information related to the Google Cloud resource.
 *
 * Generated from protobuf message <code>google.cloud.securitycenter.v1.Resource</code>
 */
class Resource extends \Google\Protobuf\Internal\Message
{
    /**
     * The full resource name of the resource. See:
     * https://cloud.google.com/apis/design/resource_names#full_resource_name
     *
     * Generated from protobuf field <code>string name = 1;</code>
     */
    private $name = '';
    /**
     * The full resource name of project that the resource belongs to.
     *
     * Generated from protobuf field <code>string project = 2;</code>
     */
    private $project = '';
    /**
     * The human readable name of project that the resource belongs to.
     *
     * Generated from protobuf field <code>string project_display_name = 3;</code>
     */
    private $project_display_name = '';
    /**
     * The full resource name of resource's parent.
     *
     * Generated from protobuf field <code>string parent = 4;</code>
     */
    private $parent = '';
    /**
     * The human readable name of resource's parent.
     *
     * Generated from protobuf field <code>string parent_display_name = 5;</code>
     */
    private $parent_display_name = '';
    /**
     * Output only. Contains a Folder message for each folder in the assets ancestry.
     * The first folder is the deepest nested folder, and the last folder is the
     * folder directly under the Organization.
     *
     * Generated from protobuf field <code>repeated .google.cloud.securitycenter.v1.Folder folders = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $folders;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *           The full resource name of the resource. See:
     *           https://cloud.google.com/apis/design/resource_names#full_resource_name
     *     @type string $project
     *           The full resource name of project that the resource belongs to.
     *     @type string $project_display_name
     *           The human readable name of project that the resource belongs to.
     *     @type string $parent
     *           The full resource name of resource's parent.
     *     @type string $parent_display_name
     *           The human readable name of resource's parent.
     *     @type \Google\Cloud\SecurityCenter\V1\Folder[]|\Google\Protobuf\Internal\RepeatedField $folders
     *           Output only. Contains a Folder message for each folder in the assets ancestry.
     *           The first folder is the deepest nested folder, and the last folder is the
     *           folder directly under the Organization.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Securitycenter\V1\Resource::initOnce();
        parent::__construct($data);
    }

    /**
     * The full resource name of the resource. See:
     * https://cloud.google.com/apis/design/resource_names#full_resource_name
     *
     * Generated from protobuf field <code>string name = 1;</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * The full resource name of the resource. See:
     * https://cloud.google.com/apis/design/resource_names#full_resource_name
     *
     * Generated from protobuf field <code>string name = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;

        return $this;
    }

    /**
     * The full resource name of project that the resource belongs to.
     *
     * Generated from protobuf field <code>string project = 2;</code>
     * @return string
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * The full resource name of project that the resource belongs to.
     *
     * Generated from protobuf field <code>string project = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setProject($var)
    {
        GPBUtil::checkString($var, True);
        $this->project = $var;

        return $this;
    }

    /**
     * The human readable name of project that the resource belongs to.
     *
     * Generated from protobuf field <code>string project_display_name = 3;</code>
     * @return string
     */
    public function getProjectDisplayName()
    {
        return $this->project_display_name;
    }

    /**
     * The human readable name of project that the resource belongs to.
     *
     * Generated from protobuf field <code>string project_display_name = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setProjectDisplayName($var)
    {
        GPBUtil::checkString($var, True);
        $this->project_display_name = $var;

        return $this;
    }

    /**
     * The full resource name of resource's parent.
     *
     * Generated from protobuf field <code>string parent = 4;</code>
     * @return string
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * The full resource name of resource's parent.
     *
     * Generated from protobuf field <code>string parent = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setParent($var)
    {
        GPBUtil::checkString($var, True);
        $this->parent = $var;

        return $this;
    }

    /**
     * The human readable name of resource's parent.
     *
     * Generated from protobuf field <code>string parent_display_name = 5;</code>
     * @return string
     */
    public function getParentDisplayName()
    {
        return $this->parent_display_name;
    }

    /**
     * The human readable name of resource's parent.
     *
     * Generated from protobuf field <code>string parent_display_name = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setParentDisplayName($var)
    {
        GPBUtil::checkString($var, True);
        $this->parent_display_name = $var;

        return $this;
    }

    /**
     * Output only. Contains a Folder message for each folder in the assets ancestry.
     * The first folder is the deepest nested folder, and the last folder is the
     * folder directly under the Organization.
     *
     * Generated from protobuf field <code>repeated .google.cloud.securitycenter.v1.Folder folders = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getFolders()
    {
        return $this->folders;
    }

    /**
     * Output only. Contains a Folder message for each folder in the assets ancestry.
     * The first folder is the deepest nested folder, and the last folder is the
     * folder directly under the Organization.
     *
     * Generated from protobuf field <code>repeated .google.cloud.securitycenter.v1.Folder folders = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Cloud\SecurityCenter\V1\Folder[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setFolders($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\SecurityCenter\V1\Folder::class);
        $this->folders = $arr;

        return $this;
    }

}

