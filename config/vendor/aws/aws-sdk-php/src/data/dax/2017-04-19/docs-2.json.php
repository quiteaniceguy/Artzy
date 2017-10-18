<?php
// This file was auto-generated from sdk-root/src/data/dax/2017-04-19/docs-2.json
return [ 'version' => '2.0', 'service' => '<p>DAX is a managed caching service engineered for Amazon DynamoDB. DAX dramatically speeds up database reads by caching frequently-accessed data from DynamoDB, so applications can access that data with sub-millisecond latency. You can create a DAX cluster easily, using the AWS Management Console. With a few simple modifications to your code, your application can begin taking advantage of the DAX cluster and realize significant improvements in read performance.</p>', 'operations' => [ 'CreateCluster' => '<p>Creates a DAX cluster. All nodes in the cluster run the same DAX caching software.</p>', 'CreateParameterGroup' => '<p>Creates a new parameter group. A parameter group is a collection of parameters that you apply to all of the nodes in a DAX cluster.</p>', 'CreateSubnetGroup' => '<p>Creates a new subnet group.</p>', 'DecreaseReplicationFactor' => '<p>Removes one or more nodes from a DAX cluster.</p> <note> <p>You cannot use <code>DecreaseReplicationFactor</code> to remove the last node in a DAX cluster. If you need to do this, use <code>DeleteCluster</code> instead.</p> </note>', 'DeleteCluster' => '<p>Deletes a previously provisioned DAX cluster. <i>DeleteCluster</i> deletes all associated nodes, node endpoints and the DAX cluster itself. When you receive a successful response from this action, DAX immediately begins deleting the cluster; you cannot cancel or revert this action.</p>', 'DeleteParameterGroup' => '<p>Deletes the specified parameter group. You cannot delete a parameter group if it is associated with any DAX clusters.</p>', 'DeleteSubnetGroup' => '<p>Deletes a subnet group.</p> <note> <p>You cannot delete a subnet group if it is associated with any DAX clusters.</p> </note>', 'DescribeClusters' => '<p>Returns information about all provisioned DAX clusters if no cluster identifier is specified, or about a specific DAX cluster if a cluster identifier is supplied.</p> <p>If the cluster is in the CREATING state, only cluster level information will be displayed until all of the nodes are successfully provisioned.</p> <p>If the cluster is in the DELETING state, only cluster level information will be displayed.</p> <p>If nodes are currently being added to the DAX cluster, node endpoint information and creation time for the additional nodes will not be displayed until they are completely provisioned. When the DAX cluster state is <i>available</i>, the cluster is ready for use.</p> <p>If nodes are currently being removed from the DAX cluster, no endpoint information for the removed nodes is displayed.</p>', 'DescribeDefaultParameters' => '<p>Returns the default system parameter information for the DAX caching software.</p>', 'DescribeEvents' => '<p>Returns events related to DAX clusters and parameter groups. You can obtain events specific to a particular DAX cluster or parameter group by providing the name as a parameter.</p> <p>By default, only the events occurring within the last hour are returned; however, you can retrieve up to 14 days\' worth of events if necessary.</p>', 'DescribeParameterGroups' => '<p>Returns a list of parameter group descriptions. If a parameter group name is specified, the list will contain only the descriptions for that group.</p>', 'DescribeParameters' => '<p>Returns the detailed parameter list for a particular parameter group.</p>', 'DescribeSubnetGroups' => '<p>Returns a list of subnet group descriptions. If a subnet group name is specified, the list will contain only the description of that group.</p>', 'IncreaseReplicationFactor' => '<p>Adds one or more nodes to a DAX cluster.</p>', 'ListTags' => '<p>List all of the tags for a DAX cluster. You can call <code>ListTags</code> up to 10 times per second, per account.</p>', 'RebootNode' => '<p>Reboots a single node of a DAX cluster. The reboot action takes place as soon as possible. During the reboot, the node status is set to REBOOTING.</p>', 'TagResource' => '<p>Associates a set of tags with a DAX resource. You can call <code>TagResource</code> up to 5 times per second, per account. </p>', 'UntagResource' => '<p>Removes the association of tags from a DAX resource. You can call <code>UntagResource</code> up to 5 times per second, per account. </p>', 'UpdateCluster' => '<p>Modifies the settings for a DAX cluster. You can use this action to change one or more cluster configuration parameters by specifying the parameters and the new values.</p>', 'UpdateParameterGroup' => '<p>Modifies the parameters of a parameter group. You can modify up to 20 parameters in a single request by submitting a list parameter name and value pairs.</p>', 'UpdateSubnetGroup' => '<p>Modifies an existing subnet group.</p>', ], 'shapes' => [ 'AvailabilityZoneList' => [ 'base' => NULL, 'refs' => [ 'CreateClusterRequest$AvailabilityZones' => '<p>The Availability Zones (AZs) in which the cluster nodes will be created. All nodes belonging to the cluster are placed in these Availability Zones. Use this parameter if you want to distribute the nodes across multiple AZs.</p>', 'DecreaseReplicationFactorRequest$AvailabilityZones' => '<p>The Availability Zone(s) from which to remove nodes.</p>', 'IncreaseReplicationFactorRequest$AvailabilityZones' => '<p>The Availability Zones (AZs) in which the cluster nodes will be created. All nodes belonging to the cluster are placed in these Availability Zones. Use this parameter if you want to distribute the nodes across multiple AZs.</p>', ], ], 'AwsQueryErrorMessage' => [ 'base' => NULL, 'refs' => [ 'InvalidParameterCombinationException$message' => NULL, 'InvalidParameterValueException$message' => NULL, ], ], 'ChangeType' => [ 'base' => NULL, 'refs' => [ 'Parameter$ChangeType' => '<p>The conditions under which changes to this parameter can be applied. For example, <code>requires-reboot</code> indicates that a new value for this parameter will only take effect if a node is rebooted.</p>', ], ], 'Cluster' => [ 'base' => '<p>Contains all of the attributes of a specific DAX cluster.</p>', 'refs' => [ 'ClusterList$member' => NULL, 'CreateClusterResponse$Cluster' => '<p>A description of the DAX cluster that you have created.</p>', 'DecreaseReplicationFactorResponse$Cluster' => '<p>A description of the DAX cluster, after you have decreased its replication factor.</p>', 'DeleteClusterResponse$Cluster' => '<p>A description of the DAX cluster that is being deleted.</p>', 'IncreaseReplicationFactorResponse$Cluster' => '<p>A description of the DAX cluster. with its new replication factor.</p>', 'RebootNodeResponse$Cluster' => '<p>A description of the DAX cluster after a node has been rebooted.</p>', 'UpdateClusterResponse$Cluster' => '<p>A description of the DAX cluster, after it has been modified.</p>', ], ], 'ClusterAlreadyExistsFault' => [ 'base' => '<p>You already have a DAX cluster with the given identifier.</p>', 'refs' => [], ], 'ClusterList' => [ 'base' => NULL, 'refs' => [ 'DescribeClustersResponse$Clusters' => '<p>The descriptions of your DAX clusters, in response to a <i>DescribeClusters</i> request.</p>', ], ], 'ClusterNameList' => [ 'base' => NULL, 'refs' => [ 'DescribeClustersRequest$ClusterNames' => '<p>The names of the DAX clusters being described.</p>', ], ], 'ClusterNotFoundFault' => [ 'base' => '<p>The requested cluster ID does not refer to an existing DAX cluster.</p>', 'refs' => [], ], 'ClusterQuotaForCustomerExceededFault' => [ 'base' => '<p>You have attempted to exceed the maximum number of DAX clusters for your AWS account.</p>', 'refs' => [], ], 'CreateClusterRequest' => [ 'base' => NULL, 'refs' => [], ], 'CreateClusterResponse' => [ 'base' => NULL, 'refs' => [], ], 'CreateParameterGroupRequest' => [ 'base' => NULL, 'refs' => [], ], 'CreateParameterGroupResponse' => [ 'base' => NULL, 'refs' => [], ], 'CreateSubnetGroupRequest' => [ 'base' => NULL, 'refs' => [], ], 'CreateSubnetGroupResponse' => [ 'base' => NULL, 'refs' => [], ], 'DecreaseReplicationFactorRequest' => [ 'base' => NULL, 'refs' => [], ], 'DecreaseReplicationFactorResponse' => [ 'base' => NULL, 'refs' => [], ], 'DeleteClusterRequest' => [ 'base' => NULL, 'refs' => [], ], 'DeleteClusterResponse' => [ 'base' => NULL, 'refs' => [], ], 'DeleteParameterGroupRequest' => [ 'base' => NULL, 'refs' => [], ], 'DeleteParameterGroupResponse' => [ 'base' => NULL, 'refs' => [], ], 'DeleteSubnetGroupRequest' => [ 'base' => NULL, 'refs' => [], ], 'DeleteSubnetGroupResponse' => [ 'base' => NULL, 'refs' => [], ], 'DescribeClustersRequest' => [ 'base' => NULL, 'refs' => [], ], 'DescribeClustersResponse' => [ 'base' => NULL, 'refs' => [], ], 'DescribeDefaultParametersRequest' => [ 'base' => NULL, 'refs' => [], ], 'DescribeDefaultParametersResponse' => [ 'base' => NULL, 'refs' => [], ], 'DescribeEventsRequest' => [ 'base' => NULL, 'refs' => [], ], 'DescribeEventsResponse' => [ 'base' => NULL, 'refs' => [], ], 'DescribeParameterGroupsRequest' => [ 'base' => NULL, 'refs' => [], ], 'DescribeParameterGroupsResponse' => [ 'base' => NULL, 'refs' => [], ], 'DescribeParametersRequest' => [ 'base' => NULL, 'refs' => [], ], 'DescribeParametersResponse' => [ 'base' => NULL, 'refs' => [], ], 'DescribeSubnetGroupsRequest' => [ 'base' => NULL, 'refs' => [], ], 'DescribeSubnetGroupsResponse' => [ 'base' => NULL, 'refs' => [], ], 'Endpoint' => [ 'base' => '<p>Represents the information required for client programs to connect to the configuration endpoint for a DAX cluster, or to an individual node within the cluster.</p>', 'refs' => [ 'Cluster$ClusterDiscoveryEndpoint' => '<p>The configuration endpoint for this DAX cluster, consisting of a DNS name and a port number. Client applications can specify this endpoint, rather than an individual node endpoint, and allow the DAX client software to intelligently route requests and responses to nodes in the DAX cluster.</p>', 'Node$Endpoint' => '<p>The endpoint for the node, consisting of a DNS name and a port number. Client applications can connect directly to a node endpoint, if desired (as an alternative to allowing DAX client software to intelligently route requests and responses to nodes in the DAX cluster.</p>', ], ], 'Event' => [ 'base' => '<p>Represents a single occurrence of something interesting within the system. Some examples of events are creating a DAX cluster, adding or removing a node, or rebooting a node.</p>', 'refs' => [ 'EventList$member' => NULL, ], ], 'EventList' => [ 'base' => NULL, 'refs' => [ 'DescribeEventsResponse$Events' => '<p>An array of events. Each element in the array represents one event.</p>', ], ], 'IncreaseReplicationFactorRequest' => [ 'base' => NULL, 'refs' => [], ], 'IncreaseReplicationFactorResponse' => [ 'base' => NULL, 'refs' => [], ], 'InsufficientClusterCapacityFault' => [ 'base' => '<p>There are not enough system resources to create the cluster you requested (or to resize an already-existing cluster). </p>', 'refs' => [], ], 'Integer' => [ 'base' => NULL, 'refs' => [ 'CreateClusterRequest$ReplicationFactor' => '<p>The number of nodes in the DAX cluster. A replication factor of 1 will create a single-node cluster, without any read replicas. For additional fault tolerance, you can create a multiple node cluster with one or more read replicas. To do this, set <i>ReplicationFactor</i> to 2 or more.</p> <note> <p>AWS recommends that you have at least two read replicas per cluster.</p> </note>', 'DecreaseReplicationFactorRequest$NewReplicationFactor' => '<p>The new number of nodes for the DAX cluster.</p>', 'Endpoint$Port' => '<p>The port number that applications should use to connect to the endpoint.</p>', 'IncreaseReplicationFactorRequest$NewReplicationFactor' => '<p>The new number of nodes for the DAX cluster.</p>', ], ], 'IntegerOptional' => [ 'base' => NULL, 'refs' => [ 'Cluster$TotalNodes' => '<p>The total number of nodes in the cluster.</p>', 'Cluster$ActiveNodes' => '<p>The number of nodes in the cluster that are active (i.e., capable of serving requests).</p>', 'DescribeClustersRequest$MaxResults' => '<p>The maximum number of results to include in the response. If more results exist than the specified <code>MaxResults</code> value, a token is included in the response so that the remaining results can be retrieved.</p> <p>The value for <code>MaxResults</code> must be between 20 and 100.</p>', 'DescribeDefaultParametersRequest$MaxResults' => '<p>The maximum number of results to include in the response. If more results exist than the specified <code>MaxResults</code> value, a token is included in the response so that the remaining results can be retrieved.</p> <p>The value for <code>MaxResults</code> must be between 20 and 100.</p>', 'DescribeEventsRequest$Duration' => '<p>The number of minutes\' worth of events to retrieve.</p>', 'DescribeEventsRequest$MaxResults' => '<p>The maximum number of results to include in the response. If more results exist than the specified <code>MaxResults</code> value, a token is included in the response so that the remaining results can be retrieved.</p> <p>The value for <code>MaxResults</code> must be between 20 and 100.</p>', 'DescribeParameterGroupsRequest$MaxResults' => '<p>The maximum number of results to include in the response. If more results exist than the specified <code>MaxResults</code> value, a token is included in the response so that the remaining results can be retrieved.</p> <p>The value for <code>MaxResults</code> must be between 20 and 100.</p>', 'DescribeParametersRequest$MaxResults' => '<p>The maximum number of results to include in the response. If more results exist than the specified <code>MaxResults</code> value, a token is included in the response so that the remaining results can be retrieved.</p> <p>The value for <code>MaxResults</code> must be between 20 and 100.</p>', 'DescribeSubnetGroupsRequest$MaxResults' => '<p>The maximum number of results to include in the response. If more results exist than the specified <code>MaxResults</code> value, a token is included in the response so that the remaining results can be retrieved.</p> <p>The value for <code>MaxResults</code> must be between 20 and 100.</p>', ], ], 'InvalidARNFault' => [ 'base' => '<p>The Amazon Resource Name (ARN) supplied in the request is not valid.</p>', 'refs' => [], ], 'InvalidClusterStateFault' => [ 'base' => '<p>The requested DAX cluster is not in the <i>available</i> state.</p>', 'refs' => [], ], 'InvalidParameterCombinationException' => [ 'base' => '<p>Two or more incompatible parameters were specified.</p>', 'refs' => [], ], 'InvalidParameterGroupStateFault' => [ 'base' => '<p>One or more parameters in a parameter group are in an invalid state.</p>', 'refs' => [], ], 'InvalidParameterValueException' => [ 'base' => '<p>The value for a parameter is invalid.</p>', 'refs' => [], ], 'InvalidSubnet' => [ 'base' => '<p>An invalid subnet identifier was specified.</p>', 'refs' => [], ], 'InvalidVPCNetworkStateFault' => [ 'base' => '<p>The VPC network is in an invalid state.</p>', 'refs' => [], ], 'IsModifiable' => [ 'base' => NULL, 'refs' => [ 'Parameter$IsModifiable' => '<p>Whether the customer is allowed to modify the parameter.</p>', ], ], 'KeyList' => [ 'base' => NULL, 'refs' => [ 'UntagResourceRequest$TagKeys' => '<p>A list of tag keys. If the DAX cluster has any tags with these keys, then the tags are removed from the cluster.</p>', ], ], 'ListTagsRequest' => [ 'base' => NULL, 'refs' => [], ], 'ListTagsResponse' => [ 'base' => NULL, 'refs' => [], ], 'Node' => [ 'base' => '<p>Represents an individual node within a DAX cluster.</p>', 'refs' => [ 'NodeList$member' => NULL, ], ], 'NodeIdentifierList' => [ 'base' => NULL, 'refs' => [ 'Cluster$NodeIdsToRemove' => '<p>A list of nodes to be removed from the cluster.</p>', 'DecreaseReplicationFactorRequest$NodeIdsToRemove' => '<p>The unique identifiers of the nodes to be removed from the cluster.</p>', 'ParameterGroupStatus$NodeIdsToReboot' => '<p>The node IDs of one or more nodes to be rebooted.</p>', ], ], 'NodeList' => [ 'base' => NULL, 'refs' => [ 'Cluster$Nodes' => '<p>A list of nodes that are currently in the cluster.</p>', ], ], 'NodeNotFoundFault' => [ 'base' => '<p>None of the nodes in the cluster have the given node ID.</p>', 'refs' => [], ], 'NodeQuotaForClusterExceededFault' => [ 'base' => '<p>You have attempted to exceed the maximum number of nodes for a DAX cluster.</p>', 'refs' => [], ], 'NodeQuotaForCustomerExceededFault' => [ 'base' => '<p>You have attempted to exceed the maximum number of nodes for your AWS account.</p>', 'refs' => [], ], 'NodeTypeSpecificValue' => [ 'base' => '<p>Represents a parameter value that is applicable to a particular node type.</p>', 'refs' => [ 'NodeTypeSpecificValueList$member' => NULL, ], ], 'NodeTypeSpecificValueList' => [ 'base' => NULL, 'refs' => [ 'Parameter$NodeTypeSpecificValues' => '<p>A list of node types, and specific parameter values for each node.</p>', ], ], 'NotificationConfiguration' => [ 'base' => '<p>Describes a notification topic and its status. Notification topics are used for publishing DAX events to subscribers using Amazon Simple Notification Service (SNS).</p>', 'refs' => [ 'Cluster$NotificationConfiguration' => '<p>Describes a notification topic and its status. Notification topics are used for publishing DAX events to subscribers using Amazon Simple Notification Service (SNS).</p>', ], ], 'Parameter' => [ 'base' => '<p>Describes an individual setting that controls some aspect of DAX behavior.</p>', 'refs' => [ 'ParameterList$member' => NULL, ], ], 'ParameterGroup' => [ 'base' => '<p>A named set of parameters that are applied to all of the nodes in a DAX cluster.</p>', 'refs' => [ 'CreateParameterGroupResponse$ParameterGroup' => '<p>Represents the output of a <i>CreateParameterGroup</i> action.</p>', 'ParameterGroupList$member' => NULL, 'UpdateParameterGroupResponse$ParameterGroup' => '<p>The parameter group that has been modified.</p>', ], ], 'ParameterGroupAlreadyExistsFault' => [ 'base' => '<p>The specified parameter group already exists.</p>', 'refs' => [], ], 'ParameterGroupList' => [ 'base' => NULL, 'refs' => [ 'DescribeParameterGroupsResponse$ParameterGroups' => '<p>An array of parameter groups. Each element in the array represents one parameter group.</p>', ], ], 'ParameterGroupNameList' => [ 'base' => NULL, 'refs' => [ 'DescribeParameterGroupsRequest$ParameterGroupNames' => '<p>The names of the parameter groups.</p>', ], ], 'ParameterGroupNotFoundFault' => [ 'base' => '<p>The specified parameter group does not exist.</p>', 'refs' => [], ], 'ParameterGroupQuotaExceededFault' => [ 'base' => '<p>You have attempted to exceed the maximum number of parameter groups.</p>', 'refs' => [], ], 'ParameterGroupStatus' => [ 'base' => '<p>The status of a parameter group.</p>', 'refs' => [ 'Cluster$ParameterGroup' => '<p>The parameter group being used by nodes in the cluster.</p>', ], ], 'ParameterList' => [ 'base' => NULL, 'refs' => [ 'DescribeDefaultParametersResponse$Parameters' => '<p>A list of parameters. Each element in the list represents one parameter.</p>', 'DescribeParametersResponse$Parameters' => '<p>A list of parameters within a parameter group. Each element in the list represents one parameter.</p>', ], ], 'ParameterNameValue' => [ 'base' => '<p>An individual DAX parameter.</p>', 'refs' => [ 'ParameterNameValueList$member' => NULL, ], ], 'ParameterNameValueList' => [ 'base' => NULL, 'refs' => [ 'UpdateParameterGroupRequest$ParameterNameValues' => '<p>An array of name-value pairs for the parameters in the group. Each element in the array represents a single parameter.</p>', ], ], 'ParameterType' => [ 'base' => NULL, 'refs' => [ 'Parameter$ParameterType' => '<p>Determines whether the parameter can be applied to any nodes, or only nodes of a particular type.</p>', ], ], 'RebootNodeRequest' => [ 'base' => NULL, 'refs' => [], ], 'RebootNodeResponse' => [ 'base' => NULL, 'refs' => [], ], 'SecurityGroupIdentifierList' => [ 'base' => NULL, 'refs' => [ 'CreateClusterRequest$SecurityGroupIds' => '<p>A list of security group IDs to be assigned to each node in the DAX cluster. (Each of the security group ID is system-generated.)</p> <p>If this parameter is not specified, DAX assigns the default VPC security group to each node.</p>', 'UpdateClusterRequest$SecurityGroupIds' => '<p>A list of user-specified security group IDs to be assigned to each node in the DAX cluster. If this parameter is not specified, DAX assigns the default VPC security group to each node.</p>', ], ], 'SecurityGroupMembership' => [ 'base' => '<p>An individual VPC security group and its status.</p>', 'refs' => [ 'SecurityGroupMembershipList$member' => NULL, ], ], 'SecurityGroupMembershipList' => [ 'base' => NULL, 'refs' => [ 'Cluster$SecurityGroups' => '<p>A list of security groups, and the status of each, for the nodes in the cluster.</p>', ], ], 'SourceType' => [ 'base' => NULL, 'refs' => [ 'DescribeEventsRequest$SourceType' => '<p>The event source to retrieve events for. If no value is specified, all events are returned.</p>', 'Event$SourceType' => '<p>Specifies the origin of this event - a cluster, a parameter group, a node ID, etc.</p>', ], ], 'String' => [ 'base' => NULL, 'refs' => [ 'AvailabilityZoneList$member' => NULL, 'Cluster$ClusterName' => '<p>The name of the DAX cluster.</p>', 'Cluster$Description' => '<p>The description of the cluster.</p>', 'Cluster$ClusterArn' => '<p>The Amazon Resource Name (ARN) that uniquely identifies the cluster. </p>', 'Cluster$NodeType' => '<p>The node type for the nodes in the cluster. (All nodes in a DAX cluster are of the same type.)</p>', 'Cluster$Status' => '<p>The current status of the cluster.</p>', 'Cluster$PreferredMaintenanceWindow' => '<p>A range of time when maintenance of DAX cluster software will be performed. For example: <code>sun:01:00-sun:09:00</code>. Cluster maintenance normally takes less than 30 minutes, and is performed automatically within the maintenance window.</p>', 'Cluster$SubnetGroup' => '<p>The subnet group where the DAX cluster is running.</p>', 'Cluster$IamRoleArn' => '<p>A valid Amazon Resource Name (ARN) that identifies an IAM role. At runtime, DAX will assume this role and use the role\'s permissions to access DynamoDB on your behalf.</p>', 'ClusterNameList$member' => NULL, 'CreateClusterRequest$ClusterName' => '<p>The cluster identifier. This parameter is stored as a lowercase string.</p> <p> <b>Constraints:</b> </p> <ul> <li> <p>A name must contain from 1 to 20 alphanumeric characters or hyphens.</p> </li> <li> <p>The first character must be a letter.</p> </li> <li> <p>A name cannot end with a hyphen or contain two consecutive hyphens.</p> </li> </ul>', 'CreateClusterRequest$NodeType' => '<p>The compute and memory capacity of the nodes in the cluster.</p>', 'CreateClusterRequest$Description' => '<p>A description of the cluster.</p>', 'CreateClusterRequest$SubnetGroupName' => '<p>The name of the subnet group to be used for the replication group.</p> <important> <p>DAX clusters can only run in an Amazon VPC environment. All of the subnets that you specify in a subnet group must exist in the same VPC.</p> </important>', 'CreateClusterRequest$PreferredMaintenanceWindow' => '<p>Specifies the weekly time range during which maintenance on the DAX cluster is performed. It is specified as a range in the format ddd:hh24:mi-ddd:hh24:mi (24H Clock UTC). The minimum maintenance window is a 60 minute period. Valid values for <code>ddd</code> are:</p> <ul> <li> <p> <code>sun</code> </p> </li> <li> <p> <code>mon</code> </p> </li> <li> <p> <code>tue</code> </p> </li> <li> <p> <code>wed</code> </p> </li> <li> <p> <code>thu</code> </p> </li> <li> <p> <code>fri</code> </p> </li> <li> <p> <code>sat</code> </p> </li> </ul> <p>Example: <code>sun:05:00-sun:09:00</code> </p> <note> <p>If you don\'t specify a preferred maintenance window when you create or modify a cache cluster, DAX assigns a 60-minute maintenance window on a randomly selected day of the week.</p> </note>', 'CreateClusterRequest$NotificationTopicArn' => '<p>The Amazon Resource Name (ARN) of the Amazon SNS topic to which notifications will be sent.</p> <note> <p>The Amazon SNS topic owner must be same as the DAX cluster owner.</p> </note>', 'CreateClusterRequest$IamRoleArn' => '<p>A valid Amazon Resource Name (ARN) that identifies an IAM role. At runtime, DAX will assume this role and use the role\'s permissions to access DynamoDB on your behalf.</p>', 'CreateClusterRequest$ParameterGroupName' => '<p>The parameter group to be associated with the DAX cluster.</p>', 'CreateParameterGroupRequest$ParameterGroupName' => '<p>The name of the parameter group to apply to all of the clusters in this replication group.</p>', 'CreateParameterGroupRequest$Description' => '<p>A description of the parameter group.</p>', 'CreateSubnetGroupRequest$SubnetGroupName' => '<p>A name for the subnet group. This value is stored as a lowercase string. </p>', 'CreateSubnetGroupRequest$Description' => '<p>A description for the subnet group</p>', 'DecreaseReplicationFactorRequest$ClusterName' => '<p>The name of the DAX cluster from which you want to remove nodes.</p>', 'DeleteClusterRequest$ClusterName' => '<p>The name of the cluster to be deleted.</p>', 'DeleteParameterGroupRequest$ParameterGroupName' => '<p>The name of the parameter group to delete.</p>', 'DeleteParameterGroupResponse$DeletionMessage' => '<p>A user-specified message for this action (i.e., a reason for deleting the parameter group).</p>', 'DeleteSubnetGroupRequest$SubnetGroupName' => '<p>The name of the subnet group to delete.</p>', 'DeleteSubnetGroupResponse$DeletionMessage' => '<p>A user-specified message for this action (i.e., a reason for deleting the subnet group).</p>', 'DescribeClustersRequest$NextToken' => '<p>An optional token returned from a prior request. Use this token for pagination of results from this action. If this parameter is specified, the response includes only results beyond the token, up to the value specified by <code>MaxResults</code>.</p>', 'DescribeClustersResponse$NextToken' => '<p>Provides an identifier to allow retrieval of paginated results.</p>', 'DescribeDefaultParametersRequest$NextToken' => '<p>An optional token returned from a prior request. Use this token for pagination of results from this action. If this parameter is specified, the response includes only results beyond the token, up to the value specified by <code>MaxResults</code>.</p>', 'DescribeDefaultParametersResponse$NextToken' => '<p>Provides an identifier to allow retrieval of paginated results.</p>', 'DescribeEventsRequest$SourceName' => '<p>The identifier of the event source for which events will be returned. If not specified, then all sources are included in the response.</p>', 'DescribeEventsRequest$NextToken' => '<p>An optional token returned from a prior request. Use this token for pagination of results from this action. If this parameter is specified, the response includes only results beyond the token, up to the value specified by <code>MaxResults</code>.</p>', 'DescribeEventsResponse$NextToken' => '<p>Provides an identifier to allow retrieval of paginated results.</p>', 'DescribeParameterGroupsRequest$NextToken' => '<p>An optional token returned from a prior request. Use this token for pagination of results from this action. If this parameter is specified, the response includes only results beyond the token, up to the value specified by <code>MaxResults</code>.</p>', 'DescribeParameterGroupsResponse$NextToken' => '<p>Provides an identifier to allow retrieval of paginated results.</p>', 'DescribeParametersRequest$ParameterGroupName' => '<p>The name of the parameter group.</p>', 'DescribeParametersRequest$Source' => '<p>How the parameter is defined. For example, <code>system</code> denotes a system-defined parameter.</p>', 'DescribeParametersRequest$NextToken' => '<p>An optional token returned from a prior request. Use this token for pagination of results from this action. If this parameter is specified, the response includes only results beyond the token, up to the value specified by <code>MaxResults</code>.</p>', 'DescribeParametersResponse$NextToken' => '<p>Provides an identifier to allow retrieval of paginated results.</p>', 'DescribeSubnetGroupsRequest$NextToken' => '<p>An optional token returned from a prior request. Use this token for pagination of results from this action. If this parameter is specified, the response includes only results beyond the token, up to the value specified by <code>MaxResults</code>.</p>', 'DescribeSubnetGroupsResponse$NextToken' => '<p>Provides an identifier to allow retrieval of paginated results.</p>', 'Endpoint$Address' => '<p>The DNS hostname of the endpoint.</p>', 'Event$SourceName' => '<p>The source of the event. For example, if the event occurred at the node level, the source would be the node ID.</p>', 'Event$Message' => '<p>A user-defined message associated with the event.</p>', 'IncreaseReplicationFactorRequest$ClusterName' => '<p>The name of the DAX cluster that will receive additional nodes.</p>', 'KeyList$member' => NULL, 'ListTagsRequest$ResourceName' => '<p>The name of the DAX resource to which the tags belong.</p>', 'ListTagsRequest$NextToken' => '<p>An optional token returned from a prior request. Use this token for pagination of results from this action. If this parameter is specified, the response includes only results beyond the token.</p>', 'ListTagsResponse$NextToken' => '<p>If this value is present, there are additional results to be displayed. To retrieve them, call <code>ListTags</code> again, with <code>NextToken</code> set to this value.</p>', 'Node$NodeId' => '<p>A system-generated identifier for the node.</p>', 'Node$AvailabilityZone' => '<p>The Availability Zone (AZ) in which the node has been deployed.</p>', 'Node$NodeStatus' => '<p>The current status of the node. For example: <code>available</code>.</p>', 'Node$ParameterGroupStatus' => '<p>The status of the parameter group associated with this node. For example, <code>in-sync</code>.</p>', 'NodeIdentifierList$member' => NULL, 'NodeTypeSpecificValue$NodeType' => '<p>A node type to which the parameter value applies.</p>', 'NodeTypeSpecificValue$Value' => '<p>The parameter value for this node type.</p>', 'NotificationConfiguration$TopicArn' => '<p>The Amazon Resource Name (ARN) that identifies the topic. </p>', 'NotificationConfiguration$TopicStatus' => '<p>The current state of the topic.</p>', 'Parameter$ParameterName' => '<p>The name of the parameter.</p>', 'Parameter$ParameterValue' => '<p>The value for the parameter.</p>', 'Parameter$Description' => '<p>A description of the parameter</p>', 'Parameter$Source' => '<p>How the parameter is defined. For example, <code>system</code> denotes a system-defined parameter.</p>', 'Parameter$DataType' => '<p>The data type of the parameter. For example, <code>integer</code>:</p>', 'Parameter$AllowedValues' => '<p>A range of values within which the parameter can be set.</p>', 'ParameterGroup$ParameterGroupName' => '<p>The name of the parameter group.</p>', 'ParameterGroup$Description' => '<p>A description of the parameter group.</p>', 'ParameterGroupNameList$member' => NULL, 'ParameterGroupStatus$ParameterGroupName' => '<p>The name of the parameter group.</p>', 'ParameterGroupStatus$ParameterApplyStatus' => '<p>The status of parameter updates. </p>', 'ParameterNameValue$ParameterName' => '<p>The name of the parameter.</p>', 'ParameterNameValue$ParameterValue' => '<p>The value of the parameter.</p>', 'RebootNodeRequest$ClusterName' => '<p>The name of the DAX cluster containing the node to be rebooted.</p>', 'RebootNodeRequest$NodeId' => '<p>The system-assigned ID of the node to be rebooted.</p>', 'SecurityGroupIdentifierList$member' => NULL, 'SecurityGroupMembership$SecurityGroupIdentifier' => '<p>The unique ID for this security group.</p>', 'SecurityGroupMembership$Status' => '<p>The status of this security group.</p>', 'Subnet$SubnetIdentifier' => '<p>The system-assigned identifier for the subnet.</p>', 'Subnet$SubnetAvailabilityZone' => '<p>The Availability Zone (AZ) for subnet subnet.</p>', 'SubnetGroup$SubnetGroupName' => '<p>The name of the subnet group.</p>', 'SubnetGroup$Description' => '<p>The description of the subnet group.</p>', 'SubnetGroup$VpcId' => '<p>The Amazon Virtual Private Cloud identifier (VPC ID) of the subnet group.</p>', 'SubnetGroupNameList$member' => NULL, 'SubnetIdentifierList$member' => NULL, 'Tag$Key' => '<p>The key for the tag. Tag keys are case sensitive. Every DAX cluster can only have one tag with the same key. If you try to add an existing tag (same key), the existing tag value will be updated to the new value.</p>', 'Tag$Value' => '<p>The value of the tag. Tag values are case-sensitive and can be null. </p>', 'TagResourceRequest$ResourceName' => '<p>The name of the DAX resource to which tags should be added.</p>', 'UntagResourceRequest$ResourceName' => '<p>The name of the DAX resource from which the tags should be removed.</p>', 'UpdateClusterRequest$ClusterName' => '<p>The name of the DAX cluster to be modified.</p>', 'UpdateClusterRequest$Description' => '<p>A description of the changes being made to the cluster.</p>', 'UpdateClusterRequest$PreferredMaintenanceWindow' => '<p>A range of time when maintenance of DAX cluster software will be performed. For example: <code>sun:01:00-sun:09:00</code>. Cluster maintenance normally takes less than 30 minutes, and is performed automatically within the maintenance window.</p>', 'UpdateClusterRequest$NotificationTopicArn' => '<p>The Amazon Resource Name (ARN) that identifies the topic.</p>', 'UpdateClusterRequest$NotificationTopicStatus' => '<p>The current state of the topic.</p>', 'UpdateClusterRequest$ParameterGroupName' => '<p>The name of a parameter group for this cluster.</p>', 'UpdateParameterGroupRequest$ParameterGroupName' => '<p>The name of the parameter group.</p>', 'UpdateSubnetGroupRequest$SubnetGroupName' => '<p>The name of the subnet group.</p>', 'UpdateSubnetGroupRequest$Description' => '<p>A description of the subnet group.</p>', ], ], 'Subnet' => [ 'base' => '<p>Represents the subnet associated with a DAX cluster. This parameter refers to subnets defined in Amazon Virtual Private Cloud (Amazon VPC) and used with DAX.</p>', 'refs' => [ 'SubnetList$member' => NULL, ], ], 'SubnetGroup' => [ 'base' => '<p>Represents the output of one of the following actions:</p> <ul> <li> <p> <i>CreateSubnetGroup</i> </p> </li> <li> <p> <i>ModifySubnetGroup</i> </p> </li> </ul>', 'refs' => [ 'CreateSubnetGroupResponse$SubnetGroup' => '<p>Represents the output of a <i>CreateSubnetGroup</i> operation.</p>', 'SubnetGroupList$member' => NULL, 'UpdateSubnetGroupResponse$SubnetGroup' => '<p>The subnet group that has been modified.</p>', ], ], 'SubnetGroupAlreadyExistsFault' => [ 'base' => '<p>The specified subnet group already exists.</p>', 'refs' => [], ], 'SubnetGroupInUseFault' => [ 'base' => '<p>The specified subnet group is currently in use.</p>', 'refs' => [], ], 'SubnetGroupList' => [ 'base' => NULL, 'refs' => [ 'DescribeSubnetGroupsResponse$SubnetGroups' => '<p>An array of subnet groups. Each element in the array represents a single subnet group.</p>', ], ], 'SubnetGroupNameList' => [ 'base' => NULL, 'refs' => [ 'DescribeSubnetGroupsRequest$SubnetGroupNames' => '<p>The name of the subnet group.</p>', ], ], 'SubnetGroupNotFoundFault' => [ 'base' => '<p>The requested subnet group name does not refer to an existing subnet group.</p>', 'refs' => [], ], 'SubnetGroupQuotaExceededFault' => [ 'base' => '<p>The request cannot be processed because it would exceed the allowed number of subnets in a subnet group.</p>', 'refs' => [], ], 'SubnetIdentifierList' => [ 'base' => NULL, 'refs' => [ 'CreateSubnetGroupRequest$SubnetIds' => '<p>A list of VPC subnet IDs for the subnet group.</p>', 'UpdateSubnetGroupRequest$SubnetIds' => '<p>A list of subnet IDs in the subnet group.</p>', ], ], 'SubnetInUse' => [ 'base' => '<p>The requested subnet is being used by another subnet group.</p>', 'refs' => [], ], 'SubnetList' => [ 'base' => NULL, 'refs' => [ 'SubnetGroup$Subnets' => '<p>A list of subnets associated with the subnet group. </p>', ], ], 'SubnetQuotaExceededFault' => [ 'base' => '<p>The request cannot be processed because it would exceed the allowed number of subnets in a subnet group.</p>', 'refs' => [], ], 'TStamp' => [ 'base' => NULL, 'refs' => [ 'DescribeEventsRequest$StartTime' => '<p>The beginning of the time interval to retrieve events for, specified in ISO 8601 format.</p>', 'DescribeEventsRequest$EndTime' => '<p>The end of the time interval for which to retrieve events, specified in ISO 8601 format.</p>', 'Event$Date' => '<p>The date and time when the event occurred.</p>', 'Node$NodeCreateTime' => '<p>The date and time (in UNIX epoch format) when the node was launched.</p>', ], ], 'Tag' => [ 'base' => '<p>A description of a tag. Every tag is a key-value pair. You can add up to 50 tags to a single DAX cluster.</p> <p>AWS-assigned tag names and values are automatically assigned the <code>aws:</code> prefix, which the user cannot assign. AWS-assigned tag names do not count towards the tag limit of 50. User-assigned tag names have the prefix <code>user:</code>.</p> <p>You cannot backdate the application of a tag.</p>', 'refs' => [ 'TagList$member' => NULL, ], ], 'TagList' => [ 'base' => NULL, 'refs' => [ 'CreateClusterRequest$Tags' => '<p>A set of tags to associate with the DAX cluster. </p>', 'ListTagsResponse$Tags' => '<p>A list of tags currently associated with the DAX cluster.</p>', 'TagResourceRequest$Tags' => '<p>The tags to be assigned to the DAX resource. </p>', 'TagResourceResponse$Tags' => '<p>The list of tags that are associated with the DAX resource.</p>', 'UntagResourceResponse$Tags' => '<p>The tag keys that have been removed from the cluster.</p>', ], ], 'TagNotFoundFault' => [ 'base' => '<p>The tag does not exist.</p>', 'refs' => [], ], 'TagQuotaPerResourceExceeded' => [ 'base' => '<p>You have exceeded the maximum number of tags for this DAX cluster.</p>', 'refs' => [], ], 'TagResourceRequest' => [ 'base' => NULL, 'refs' => [], ], 'TagResourceResponse' => [ 'base' => NULL, 'refs' => [], ], 'UntagResourceRequest' => [ 'base' => NULL, 'refs' => [], ], 'UntagResourceResponse' => [ 'base' => NULL, 'refs' => [], ], 'UpdateClusterRequest' => [ 'base' => NULL, 'refs' => [], ], 'UpdateClusterResponse' => [ 'base' => NULL, 'refs' => [], ], 'UpdateParameterGroupRequest' => [ 'base' => NULL, 'refs' => [], ], 'UpdateParameterGroupResponse' => [ 'base' => NULL, 'refs' => [], ], 'UpdateSubnetGroupRequest' => [ 'base' => NULL, 'refs' => [], ], 'UpdateSubnetGroupResponse' => [ 'base' => NULL, 'refs' => [], ], ],];
