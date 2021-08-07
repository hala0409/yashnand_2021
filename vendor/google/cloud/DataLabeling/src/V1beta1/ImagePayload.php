<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/datalabeling/v1beta1/data_payloads.proto

namespace Google\Cloud\DataLabeling\V1beta1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Container of information about an image.
 *
 * Generated from protobuf message <code>google.cloud.datalabeling.v1beta1.ImagePayload</code>
 */
class ImagePayload extends \Google\Protobuf\Internal\Message
{
    /**
     * Image format.
     *
     * Generated from protobuf field <code>string mime_type = 1;</code>
     */
    private $mime_type = '';
    /**
     * A byte string of a thumbnail image.
     *
     * Generated from protobuf field <code>bytes image_thumbnail = 2;</code>
     */
    private $image_thumbnail = '';
    /**
     * Image uri from the user bucket.
     *
     * Generated from protobuf field <code>string image_uri = 3;</code>
     */
    private $image_uri = '';
    /**
     * Signed uri of the image file in the service bucket.
     *
     * Generated from protobuf field <code>string signed_uri = 4;</code>
     */
    private $signed_uri = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $mime_type
     *           Image format.
     *     @type string $image_thumbnail
     *           A byte string of a thumbnail image.
     *     @type string $image_uri
     *           Image uri from the user bucket.
     *     @type string $signed_uri
     *           Signed uri of the image file in the service bucket.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Datalabeling\V1Beta1\DataPayloads::initOnce();
        parent::__construct($data);
    }

    /**
     * Image format.
     *
     * Generated from protobuf field <code>string mime_type = 1;</code>
     * @return string
     */
    public function getMimeType()
    {
        return $this->mime_type;
    }

    /**
     * Image format.
     *
     * Generated from protobuf field <code>string mime_type = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setMimeType($var)
    {
        GPBUtil::checkString($var, True);
        $this->mime_type = $var;

        return $this;
    }

    /**
     * A byte string of a thumbnail image.
     *
     * Generated from protobuf field <code>bytes image_thumbnail = 2;</code>
     * @return string
     */
    public function getImageThumbnail()
    {
        return $this->image_thumbnail;
    }

    /**
     * A byte string of a thumbnail image.
     *
     * Generated from protobuf field <code>bytes image_thumbnail = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setImageThumbnail($var)
    {
        GPBUtil::checkString($var, False);
        $this->image_thumbnail = $var;

        return $this;
    }

    /**
     * Image uri from the user bucket.
     *
     * Generated from protobuf field <code>string image_uri = 3;</code>
     * @return string
     */
    public function getImageUri()
    {
        return $this->image_uri;
    }

    /**
     * Image uri from the user bucket.
     *
     * Generated from protobuf field <code>string image_uri = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setImageUri($var)
    {
        GPBUtil::checkString($var, True);
        $this->image_uri = $var;

        return $this;
    }

    /**
     * Signed uri of the image file in the service bucket.
     *
     * Generated from protobuf field <code>string signed_uri = 4;</code>
     * @return string
     */
    public function getSignedUri()
    {
        return $this->signed_uri;
    }

    /**
     * Signed uri of the image file in the service bucket.
     *
     * Generated from protobuf field <code>string signed_uri = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setSignedUri($var)
    {
        GPBUtil::checkString($var, True);
        $this->signed_uri = $var;

        return $this;
    }

}
