<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/datalabeling/v1beta1/dataset.proto

namespace Google\Cloud\DataLabeling\V1beta1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Statistics about annotation specs.
 *
 * Generated from protobuf message <code>google.cloud.datalabeling.v1beta1.LabelStats</code>
 */
class LabelStats extends \Google\Protobuf\Internal\Message
{
    /**
     * Map of each annotation spec's example count. Key is the annotation spec
     * name and value is the number of examples for that annotation spec.
     * If the annotated dataset does not have annotation spec, the map will return
     * a pair where the key is empty string and value is the total number of
     * annotations.
     *
     * Generated from protobuf field <code>map<string, int64> example_count = 1;</code>
     */
    private $example_count;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array|\Google\Protobuf\Internal\MapField $example_count
     *           Map of each annotation spec's example count. Key is the annotation spec
     *           name and value is the number of examples for that annotation spec.
     *           If the annotated dataset does not have annotation spec, the map will return
     *           a pair where the key is empty string and value is the total number of
     *           annotations.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Datalabeling\V1Beta1\Dataset::initOnce();
        parent::__construct($data);
    }

    /**
     * Map of each annotation spec's example count. Key is the annotation spec
     * name and value is the number of examples for that annotation spec.
     * If the annotated dataset does not have annotation spec, the map will return
     * a pair where the key is empty string and value is the total number of
     * annotations.
     *
     * Generated from protobuf field <code>map<string, int64> example_count = 1;</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getExampleCount()
    {
        return $this->example_count;
    }

    /**
     * Map of each annotation spec's example count. Key is the annotation spec
     * name and value is the number of examples for that annotation spec.
     * If the annotated dataset does not have annotation spec, the map will return
     * a pair where the key is empty string and value is the total number of
     * annotations.
     *
     * Generated from protobuf field <code>map<string, int64> example_count = 1;</code>
     * @param array|\Google\Protobuf\Internal\MapField $var
     * @return $this
     */
    public function setExampleCount($var)
    {
        $arr = GPBUtil::checkMapField($var, \Google\Protobuf\Internal\GPBType::STRING, \Google\Protobuf\Internal\GPBType::INT64);
        $this->example_count = $arr;

        return $this;
    }

}

