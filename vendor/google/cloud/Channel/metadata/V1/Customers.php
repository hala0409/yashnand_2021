<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/channel/v1/customers.proto

namespace GPBMetadata\Google\Cloud\Channel\V1;

class Customers
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Cloud\Channel\V1\Common::initOnce();
        \GPBMetadata\Google\Protobuf\Timestamp::initOnce();
        \GPBMetadata\Google\Type\PostalAddress::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
\'google/cloud/channel/v1/customers.protogoogle.cloud.channel.v1google/api/resource.proto$google/cloud/channel/v1/common.protogoogle/protobuf/timestamp.proto google/type/postal_address.protogoogle/api/annotations.proto"�
Customer
name (	B�A
org_display_name (	B�A;
org_postal_address (2.google.type.PostalAddressB�AB
primary_contact_info (2$.google.cloud.channel.v1.ContactInfo
alternate_email (	
domain (	B�A4
create_time (2.google.protobuf.TimestampB�A4
update_time (2.google.protobuf.TimestampB�A
cloud_identity_id	 (	B�A
language_code
 (	B�AL
cloud_identity_info (2*.google.cloud.channel.v1.CloudIdentityInfoB�A
channel_partner_id (	:R�AO
$cloudchannel.googleapis.com/Customer\'accounts/{account}/customers/{customer}"�
ContactInfo

first_name (	
	last_name (	
display_name (	B�A
email (	
title (	B�A
phone (	Bo
com.google.cloud.channel.v1BCustomersProtoPZ>google.golang.org/genproto/googleapis/cloud/channel/v1;channelbproto3'
        , true);

        static::$is_initialized = true;
    }
}

