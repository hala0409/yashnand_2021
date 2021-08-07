<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/talent/v4beta1/application.proto

namespace GPBMetadata\Google\Cloud\Talent\V4Beta1;

class Application
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Cloud\Talent\V4Beta1\Common::initOnce();
        \GPBMetadata\Google\Protobuf\Timestamp::initOnce();
        \GPBMetadata\Google\Protobuf\Wrappers::initOnce();
        \GPBMetadata\Google\Type\Date::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
-google/cloud/talent/v4beta1/application.protogoogle.cloud.talent.v4beta1google/api/field_behavior.protogoogle/api/resource.proto(google/cloud/talent/v4beta1/common.protogoogle/protobuf/timestamp.protogoogle/protobuf/wrappers.protogoogle/type/date.proto"�	
Application
name (	
external_id (	B�A
profile (	B�A,
job (	B�A
jobs.googleapis.com/Job�A1
company (	B �A
jobs.googleapis.com/Company+
application_date (2.google.type.DateM
stage (29.google.cloud.talent.v4beta1.Application.ApplicationStageB�AH
state (29.google.cloud.talent.v4beta1.Application.ApplicationState:

interviews (2&.google.cloud.talent.v4beta1.Interview,
referral (2.google.protobuf.BoolValue4
create_time (2.google.protobuf.TimestampB�A/
update_time (2.google.protobuf.Timestamp
outcome_notes (	5
outcome (2$.google.cloud.talent.v4beta1.Outcome1
is_match (2.google.protobuf.BoolValueB�A
job_title_snippet (	B�A"�
ApplicationState!
APPLICATION_STATE_UNSPECIFIED 
IN_PROGRESS
CANDIDATE_WITHDREW
EMPLOYER_WITHDREW
	COMPLETED

CLOSED"�
ApplicationStage!
APPLICATION_STAGE_UNSPECIFIED 
NEW

SCREEN
HIRING_MANAGER_REVIEW
	INTERVIEW
OFFER_EXTENDED
OFFER_ACCEPTED
STARTED:w�At
jobs.googleapis.com/ApplicationQprojects/{project}/tenants/{tenant}/profiles/{profile}/applications/{application}B�
com.google.cloud.talent.v4beta1BApplicationResourceProtoPZAgoogle.golang.org/genproto/googleapis/cloud/talent/v4beta1;talent�CTSbproto3'
        , true);

        static::$is_initialized = true;
    }
}

