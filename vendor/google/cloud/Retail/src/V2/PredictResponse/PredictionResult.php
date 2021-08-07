<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/retail/v2/prediction_service.proto

namespace Google\Cloud\Retail\V2\PredictResponse;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * PredictionResult represents the recommendation prediction results.
 *
 * Generated from protobuf message <code>google.cloud.retail.v2.PredictResponse.PredictionResult</code>
 */
class PredictionResult extends \Google\Protobuf\Internal\Message
{
    /**
     * ID of the recommended product
     *
     * Generated from protobuf field <code>string id = 1;</code>
     */
    private $id = '';
    /**
     * Additional product metadata / annotations.
     * Possible values:
     * * `product`: JSON representation of the product. Will be set if
     *   `returnProduct` is set to true in `PredictRequest.params`.
     * * `score`: Prediction score in double value. Will be set if
     *   `returnScore` is set to true in `PredictRequest.params`.
     *
     * Generated from protobuf field <code>map<string, .google.protobuf.Value> metadata = 2;</code>
     */
    private $metadata;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $id
     *           ID of the recommended product
     *     @type array|\Google\Protobuf\Internal\MapField $metadata
     *           Additional product metadata / annotations.
     *           Possible values:
     *           * `product`: JSON representation of the product. Will be set if
     *             `returnProduct` is set to true in `PredictRequest.params`.
     *           * `score`: Prediction score in double value. Will be set if
     *             `returnScore` is set to true in `PredictRequest.params`.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Retail\V2\PredictionService::initOnce();
        parent::__construct($data);
    }

    /**
     * ID of the recommended product
     *
     * Generated from protobuf field <code>string id = 1;</code>
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * ID of the recommended product
     *
     * Generated from protobuf field <code>string id = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setId($var)
    {
        GPBUtil::checkString($var, True);
        $this->id = $var;

        return $this;
    }

    /**
     * Additional product metadata / annotations.
     * Possible values:
     * * `product`: JSON representation of the product. Will be set if
     *   `returnProduct` is set to true in `PredictRequest.params`.
     * * `score`: Prediction score in double value. Will be set if
     *   `returnScore` is set to true in `PredictRequest.params`.
     *
     * Generated from protobuf field <code>map<string, .google.protobuf.Value> metadata = 2;</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * Additional product metadata / annotations.
     * Possible values:
     * * `product`: JSON representation of the product. Will be set if
     *   `returnProduct` is set to true in `PredictRequest.params`.
     * * `score`: Prediction score in double value. Will be set if
     *   `returnScore` is set to true in `PredictRequest.params`.
     *
     * Generated from protobuf field <code>map<string, .google.protobuf.Value> metadata = 2;</code>
     * @param array|\Google\Protobuf\Internal\MapField $var
     * @return $this
     */
    public function setMetadata($var)
    {
        $arr = GPBUtil::checkMapField($var, \Google\Protobuf\Internal\GPBType::STRING, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Protobuf\Value::class);
        $this->metadata = $arr;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PredictionResult::class, \Google\Cloud\Retail\V2\PredictResponse_PredictionResult::class);

