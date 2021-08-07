<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/gaming/v1/realms.proto

namespace GPBMetadata\Google\Cloud\Gaming\V1;

class Realms
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Cloud\Gaming\V1\Common::initOnce();
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        \GPBMetadata\Google\Protobuf\Timestamp::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
#google/cloud/gaming/v1/realms.protogoogle.cloud.gaming.v1google/api/resource.proto#google/cloud/gaming/v1/common.proto google/protobuf/field_mask.protogoogle/protobuf/timestamp.protogoogle/api/annotations.proto"�
ListRealmsRequest9
parent (	B)�A�A#!gameservices.googleapis.com/Realm
	page_size (B�A

page_token (	B�A
filter (	B�A
order_by (	B�A"q
ListRealmsResponse-
realms (2.google.cloud.gaming.v1.Realm
next_page_token (	
unreachable (	"J
GetRealmRequest7
name (	B)�A�A#
!gameservices.googleapis.com/Realm"�
CreateRealmRequest9
parent (	B)�A�A#!gameservices.googleapis.com/Realm
realm_id (	B�A1
realm (2.google.cloud.gaming.v1.RealmB�A"M
DeleteRealmRequest7
name (	B)�A�A#
!gameservices.googleapis.com/Realm"}
UpdateRealmRequest1
realm (2.google.cloud.gaming.v1.RealmB�A4
update_mask (2.google.protobuf.FieldMaskB�A"�
PreviewRealmUpdateRequest1
realm (2.google.cloud.gaming.v1.RealmB�A4
update_mask (2.google.protobuf.FieldMaskB�A5
preview_time (2.google.protobuf.TimestampB�A"e
PreviewRealmUpdateResponse
etag (	9
target_state (2#.google.cloud.gaming.v1.TargetState"�
Realm
name (	4
create_time (2.google.protobuf.TimestampB�A4
update_time (2.google.protobuf.TimestampB�A9
labels (2).google.cloud.gaming.v1.Realm.LabelsEntry
	time_zone (	B�A
etag (	
description (	-
LabelsEntry
key (	
value (	:8:^�A[
!gameservices.googleapis.com/Realm6projects/{project}/locations/{location}/realms/{realm}B\\
com.google.cloud.gaming.v1PZ<google.golang.org/genproto/googleapis/cloud/gaming/v1;gamingbproto3'
        , true);

        static::$is_initialized = true;
    }
}

