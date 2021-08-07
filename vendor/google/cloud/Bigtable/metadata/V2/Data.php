<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/bigtable/v2/data.proto

namespace GPBMetadata\Google\Bigtable\V2;

class Data
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(
            '
�
google/bigtable/v2/data.protogoogle.bigtable.v2"@
Row
key (,
families (2.google.bigtable.v2.Family"C
Family
name (	+
columns (2.google.bigtable.v2.Column"D
Column
	qualifier (\'
cells (2.google.bigtable.v2.Cell"?
Cell
timestamp_micros (
value (
labels (	"�
RowRange
start_key_closed (H 
start_key_open (H 
end_key_open (H
end_key_closed (HB
	start_keyB	
end_key"L
RowSet
row_keys (0

row_ranges (2.google.bigtable.v2.RowRange"�
ColumnRange
family_name (	 
start_qualifier_closed (H 
start_qualifier_open (H 
end_qualifier_closed (H
end_qualifier_open (HB
start_qualifierB
end_qualifier"N
TimestampRange
start_timestamp_micros (
end_timestamp_micros ("�

ValueRange
start_value_closed (H 
start_value_open (H 
end_value_closed (H
end_value_open (HB
start_valueB
	end_value"�
	RowFilter4
chain (2#.google.bigtable.v2.RowFilter.ChainH >

interleave (2(.google.bigtable.v2.RowFilter.InterleaveH <
	condition (2\'.google.bigtable.v2.RowFilter.ConditionH 
sink (H 
pass_all_filter (H 
block_all_filter (H 
row_key_regex_filter (H 
row_sample_filter (H "
family_name_regex_filter (	H \'
column_qualifier_regex_filter (H >
column_range_filter (2.google.bigtable.v2.ColumnRangeH D
timestamp_range_filter (2".google.bigtable.v2.TimestampRangeH 
value_regex_filter	 (H <
value_range_filter (2.google.bigtable.v2.ValueRangeH %
cells_per_row_offset_filter
 (H $
cells_per_row_limit_filter (H \'
cells_per_column_limit_filter (H !
strip_value_transformer (H !
apply_label_transformer (	H 7
Chain.
filters (2.google.bigtable.v2.RowFilter<

Interleave.
filters (2.google.bigtable.v2.RowFilter�
	Condition7
predicate_filter (2.google.bigtable.v2.RowFilter2
true_filter (2.google.bigtable.v2.RowFilter3
false_filter (2.google.bigtable.v2.RowFilterB
filter"�
Mutation8
set_cell (2$.google.bigtable.v2.Mutation.SetCellH K
delete_from_column (2-.google.bigtable.v2.Mutation.DeleteFromColumnH K
delete_from_family (2-.google.bigtable.v2.Mutation.DeleteFromFamilyH E
delete_from_row (2*.google.bigtable.v2.Mutation.DeleteFromRowH a
SetCell
family_name (	
column_qualifier (
timestamp_micros (
value (y
DeleteFromColumn
family_name (	
column_qualifier (6

time_range (2".google.bigtable.v2.TimestampRange\'
DeleteFromFamily
family_name (	
DeleteFromRowB

mutation"�
ReadModifyWriteRule
family_name (	
column_qualifier (
append_value (H 
increment_amount (H B
ruleB�
com.google.bigtable.v2B	DataProtoPZ:google.golang.org/genproto/googleapis/bigtable/v2;bigtable�Google.Cloud.Bigtable.V2�Google\\Cloud\\Bigtable\\V2�Google::Cloud::Bigtable::V2bproto3'
        , true);

        static::$is_initialized = true;
    }
}

