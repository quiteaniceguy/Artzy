<?php
// This file was auto-generated from sdk-root/src/data/codecommit/2015-04-13/docs-2.json
return [ 'version' => '2.0', 'service' => '<fullname>AWS CodeCommit</fullname> <p>This is the <i>AWS CodeCommit API Reference</i>. This reference provides descriptions of the operations and data types for AWS CodeCommit API along with usage examples.</p> <p>You can use the AWS CodeCommit API to work with the following objects:</p> <p>Repositories, by calling the following:</p> <ul> <li> <p> <a>BatchGetRepositories</a>, which returns information about one or more repositories associated with your AWS account</p> </li> <li> <p> <a>CreateRepository</a>, which creates an AWS CodeCommit repository</p> </li> <li> <p> <a>DeleteRepository</a>, which deletes an AWS CodeCommit repository</p> </li> <li> <p> <a>GetRepository</a>, which returns information about a specified repository</p> </li> <li> <p> <a>ListRepositories</a>, which lists all AWS CodeCommit repositories associated with your AWS account</p> </li> <li> <p> <a>UpdateRepositoryDescription</a>, which sets or updates the description of the repository</p> </li> <li> <p> <a>UpdateRepositoryName</a>, which changes the name of the repository. If you change the name of a repository, no other users of that repository will be able to access it until you send them the new HTTPS or SSH URL to use.</p> </li> </ul> <p>Branches, by calling the following:</p> <ul> <li> <p> <a>CreateBranch</a>, which creates a new branch in a specified repository</p> </li> <li> <p> <a>DeleteBranch</a>, which deletes the specified branch in a repository unless it is the default branch</p> </li> <li> <p> <a>GetBranch</a>, which returns information about a specified branch</p> </li> <li> <p> <a>ListBranches</a>, which lists all branches for a specified repository</p> </li> <li> <p> <a>UpdateDefaultBranch</a>, which changes the default branch for a repository</p> </li> </ul> <p>Information about committed code in a repository, by calling the following:</p> <ul> <li> <p> <a>GetBlob</a>, which returns the base-64 encoded content of an individual Git blob object within a repository</p> </li> <li> <p> <a>GetCommit</a>, which returns information about a commit, including commit messages and author and committer information</p> </li> <li> <p> <a>GetDifferences</a>, which returns information about the differences in a valid commit specifier (such as a branch, tag, HEAD, commit ID or other fully qualified reference)</p> </li> </ul> <p>Triggers, by calling the following:</p> <ul> <li> <p> <a>GetRepositoryTriggers</a>, which returns information about triggers configured for a repository</p> </li> <li> <p> <a>PutRepositoryTriggers</a>, which replaces all triggers for a repository and can be used to create or delete triggers</p> </li> <li> <p> <a>TestRepositoryTriggers</a>, which tests the functionality of a repository trigger by sending data to the trigger target</p> </li> </ul> <p>For information about how to use AWS CodeCommit, see the <a href="http://docs.aws.amazon.com/codecommit/latest/userguide/welcome.html">AWS CodeCommit User Guide</a>.</p>', 'operations' => [ 'BatchGetRepositories' => '<p>Returns information about one or more repositories.</p> <note> <p>The description field for a repository accepts all HTML characters and all valid Unicode characters. Applications that do not HTML-encode the description and display it in a web page could expose users to potentially malicious code. Make sure that you HTML-encode the description field in any application that uses this API to display the repository description on a web page.</p> </note>', 'CreateBranch' => '<p>Creates a new branch in a repository and points the branch to a commit.</p> <note> <p>Calling the create branch operation does not set a repository\'s default branch. To do this, call the update default branch operation.</p> </note>', 'CreateRepository' => '<p>Creates a new, empty repository.</p>', 'DeleteBranch' => '<p>Deletes a branch from a repository, unless that branch is the default branch for the repository. </p>', 'DeleteRepository' => '<p>Deletes a repository. If a specified repository was already deleted, a null repository ID will be returned.</p> <important> <p>Deleting a repository also deletes all associated objects and metadata. After a repository is deleted, all future push calls to the deleted repository will fail.</p> </important>', 'GetBlob' => '<p>Returns the base-64 encoded content of an individual blob within a repository.</p>', 'GetBranch' => '<p>Returns information about a repository branch, including its name and the last commit ID.</p>', 'GetCommit' => '<p>Returns information about a commit, including commit message and committer information.</p>', 'GetDifferences' => '<p>Returns information about the differences in a valid commit specifier (such as a branch, tag, HEAD, commit ID or other fully qualified reference). Results can be limited to a specified path.</p>', 'GetRepository' => '<p>Returns information about a repository.</p> <note> <p>The description field for a repository accepts all HTML characters and all valid Unicode characters. Applications that do not HTML-encode the description and display it in a web page could expose users to potentially malicious code. Make sure that you HTML-encode the description field in any application that uses this API to display the repository description on a web page.</p> </note>', 'GetRepositoryTriggers' => '<p>Gets information about triggers configured for a repository.</p>', 'ListBranches' => '<p>Gets information about one or more branches in a repository.</p>', 'ListRepositories' => '<p>Gets information about one or more repositories.</p>', 'PutRepositoryTriggers' => '<p>Replaces all triggers for a repository. This can be used to create or delete triggers.</p>', 'TestRepositoryTriggers' => '<p>Tests the functionality of repository triggers by sending information to the trigger target. If real data is available in the repository, the test will send data from the last commit. If no data is available, sample data will be generated.</p>', 'UpdateDefaultBranch' => '<p>Sets or changes the default branch name for the specified repository.</p> <note> <p>If you use this operation to change the default branch name to the current default branch name, a success message is returned even though the default branch did not change.</p> </note>', 'UpdateRepositoryDescription' => '<p>Sets or changes the comment or description for a repository.</p> <note> <p>The description field for a repository accepts all HTML characters and all valid Unicode characters. Applications that do not HTML-encode the description and display it in a web page could expose users to potentially malicious code. Make sure that you HTML-encode the description field in any application that uses this API to display the repository description on a web page.</p> </note>', 'UpdateRepositoryName' => '<p>Renames a repository. The repository name must be unique across the calling AWS account. In addition, repository names are limited to 100 alphanumeric, dash, and underscore characters, and cannot include certain characters. The suffix ".git" is prohibited. For a full description of the limits on repository names, see <a href="http://docs.aws.amazon.com/codecommit/latest/userguide/limits.html">Limits</a> in the AWS CodeCommit User Guide.</p>', ], 'shapes' => [ 'AccountId' => [ 'base' => NULL, 'refs' => [ 'RepositoryMetadata$accountId' => '<p>The ID of the AWS account associated with the repository.</p>', ], ], 'AdditionalData' => [ 'base' => NULL, 'refs' => [ 'Commit$additionalData' => '<p>Any additional data associated with the specified commit.</p>', ], ], 'Arn' => [ 'base' => NULL, 'refs' => [ 'RepositoryMetadata$Arn' => '<p>The Amazon Resource Name (ARN) of the repository.</p>', 'RepositoryTrigger$destinationArn' => '<p>The ARN of the resource that is the target for a trigger. For example, the ARN of a topic in Amazon Simple Notification Service (SNS).</p>', ], ], 'BatchGetRepositoriesInput' => [ 'base' => '<p>Represents the input of a batch get repositories operation.</p>', 'refs' => [], ], 'BatchGetRepositoriesOutput' => [ 'base' => '<p>Represents the output of a batch get repositories operation.</p>', 'refs' => [], ], 'BlobIdDoesNotExistException' => [ 'base' => '<p>The specified blob does not exist.</p>', 'refs' => [], ], 'BlobIdRequiredException' => [ 'base' => '<p>A blob ID is required but was not specified.</p>', 'refs' => [], ], 'BlobMetadata' => [ 'base' => '<p>Returns information about a specific Git blob object.</p>', 'refs' => [ 'Difference$beforeBlob' => '<p>Information about a <code>beforeBlob</code> data type object, including the ID, the file mode permission code, and the path.</p>', 'Difference$afterBlob' => '<p>Information about an <code>afterBlob</code> data type object, including the ID, the file mode permission code, and the path.</p>', ], ], 'BranchDoesNotExistException' => [ 'base' => '<p>The specified branch does not exist.</p>', 'refs' => [], ], 'BranchInfo' => [ 'base' => '<p>Returns information about a branch.</p>', 'refs' => [ 'DeleteBranchOutput$deletedBranch' => '<p>Information about the branch deleted by the operation, including the branch name and the commit ID that was the tip of the branch.</p>', 'GetBranchOutput$branch' => '<p>The name of the branch.</p>', ], ], 'BranchName' => [ 'base' => NULL, 'refs' => [ 'BranchInfo$branchName' => '<p>The name of the branch.</p>', 'BranchNameList$member' => NULL, 'CreateBranchInput$branchName' => '<p>The name of the new branch to create.</p>', 'DeleteBranchInput$branchName' => '<p>The name of the branch to delete.</p>', 'GetBranchInput$branchName' => '<p>The name of the branch for which you want to retrieve information.</p>', 'RepositoryMetadata$defaultBranch' => '<p>The repository\'s default branch name.</p>', 'UpdateDefaultBranchInput$defaultBranchName' => '<p>The name of the branch to set as the default.</p>', ], ], 'BranchNameExistsException' => [ 'base' => '<p>The specified branch name already exists.</p>', 'refs' => [], ], 'BranchNameList' => [ 'base' => NULL, 'refs' => [ 'ListBranchesOutput$branches' => '<p>The list of branch names.</p>', 'RepositoryTrigger$branches' => '<p>The branches that will be included in the trigger configuration. If you specify an empty array, the trigger will apply to all branches.</p> <note> <p>While no content is required in the array, you must include the array itself.</p> </note>', ], ], 'BranchNameRequiredException' => [ 'base' => '<p>A branch name is required but was not specified.</p>', 'refs' => [], ], 'ChangeTypeEnum' => [ 'base' => NULL, 'refs' => [ 'Difference$changeType' => '<p>Whether the change type of the difference is an addition (A), deletion (D), or modification (M).</p>', ], ], 'CloneUrlHttp' => [ 'base' => NULL, 'refs' => [ 'RepositoryMetadata$cloneUrlHttp' => '<p>The URL to use for cloning the repository over HTTPS.</p>', ], ], 'CloneUrlSsh' => [ 'base' => NULL, 'refs' => [ 'RepositoryMetadata$cloneUrlSsh' => '<p>The URL to use for cloning the repository over SSH.</p>', ], ], 'Commit' => [ 'base' => '<p>Returns information about a specific commit.</p>', 'refs' => [ 'GetCommitOutput$commit' => '<p>A commit data type object that contains information about the specified commit.</p>', ], ], 'CommitDoesNotExistException' => [ 'base' => '<p>The specified commit does not exist or no commit was specified, and the specified repository has no default branch.</p>', 'refs' => [], ], 'CommitId' => [ 'base' => NULL, 'refs' => [ 'BranchInfo$commitId' => '<p>The ID of the last commit made to the branch.</p>', 'CreateBranchInput$commitId' => '<p>The ID of the commit to point the new branch to.</p>', ], ], 'CommitIdDoesNotExistException' => [ 'base' => '<p>The specified commit ID does not exist.</p>', 'refs' => [], ], 'CommitIdRequiredException' => [ 'base' => '<p>A commit ID was not specified.</p>', 'refs' => [], ], 'CommitName' => [ 'base' => NULL, 'refs' => [ 'GetDifferencesInput$beforeCommitSpecifier' => '<p>The branch, tag, HEAD, or other fully qualified reference used to identify a commit. For example, the full commit ID. Optional. If not specified, all changes prior to the <code>afterCommitSpecifier</code> value will be shown. If you do not use <code>beforeCommitSpecifier</code> in your request, consider limiting the results with <code>maxResults</code>.</p>', 'GetDifferencesInput$afterCommitSpecifier' => '<p>The branch, tag, HEAD, or other fully qualified reference used to identify a commit.</p>', ], ], 'CommitRequiredException' => [ 'base' => '<p>A commit was not specified.</p>', 'refs' => [], ], 'CreateBranchInput' => [ 'base' => '<p>Represents the input of a create branch operation.</p>', 'refs' => [], ], 'CreateRepositoryInput' => [ 'base' => '<p>Represents the input of a create repository operation.</p>', 'refs' => [], ], 'CreateRepositoryOutput' => [ 'base' => '<p>Represents the output of a create repository operation.</p>', 'refs' => [], ], 'CreationDate' => [ 'base' => NULL, 'refs' => [ 'RepositoryMetadata$creationDate' => '<p>The date and time the repository was created, in timestamp format.</p>', ], ], 'Date' => [ 'base' => NULL, 'refs' => [ 'UserInfo$date' => '<p>The date when the specified commit was pushed to the repository.</p>', ], ], 'DefaultBranchCannotBeDeletedException' => [ 'base' => '<p>The specified branch is the default branch for the repository, and cannot be deleted. To delete this branch, you must first set another branch as the default branch.</p>', 'refs' => [], ], 'DeleteBranchInput' => [ 'base' => '<p>Represents the input of a delete branch operation.</p>', 'refs' => [], ], 'DeleteBranchOutput' => [ 'base' => '<p>Represents the output of a delete branch operation.</p>', 'refs' => [], ], 'DeleteRepositoryInput' => [ 'base' => '<p>Represents the input of a delete repository operation.</p>', 'refs' => [], ], 'DeleteRepositoryOutput' => [ 'base' => '<p>Represents the output of a delete repository operation.</p>', 'refs' => [], ], 'Difference' => [ 'base' => '<p>Returns information about a set of differences for a commit specifier.</p>', 'refs' => [ 'DifferenceList$member' => NULL, ], ], 'DifferenceList' => [ 'base' => NULL, 'refs' => [ 'GetDifferencesOutput$differences' => '<p>A differences data type object that contains information about the differences, including whether the difference is added, modified, or deleted (A, D, M).</p>', ], ], 'Email' => [ 'base' => NULL, 'refs' => [ 'UserInfo$email' => '<p>The email address associated with the user who made the commit, if any.</p>', ], ], 'EncryptionIntegrityChecksFailedException' => [ 'base' => '<p>An encryption integrity check failed.</p>', 'refs' => [], ], 'EncryptionKeyAccessDeniedException' => [ 'base' => '<p>An encryption key could not be accessed.</p>', 'refs' => [], ], 'EncryptionKeyDisabledException' => [ 'base' => '<p>The encryption key is disabled.</p>', 'refs' => [], ], 'EncryptionKeyNotFoundException' => [ 'base' => '<p>No encryption key was found.</p>', 'refs' => [], ], 'EncryptionKeyUnavailableException' => [ 'base' => '<p>The encryption key is not available.</p>', 'refs' => [], ], 'FileTooLargeException' => [ 'base' => '<p>The specified file exceeds the file size limit for AWS CodeCommit. For more information about limits in AWS CodeCommit, see <a href="http://docs.aws.amazon.com/codecommit/latest/userguide/limits.html">AWS CodeCommit User Guide</a>.</p>', 'refs' => [], ], 'GetBlobInput' => [ 'base' => '<p>Represents the input of a get blob operation.</p>', 'refs' => [], ], 'GetBlobOutput' => [ 'base' => '<p>Represents the output of a get blob operation.</p>', 'refs' => [], ], 'GetBranchInput' => [ 'base' => '<p>Represents the input of a get branch operation.</p>', 'refs' => [], ], 'GetBranchOutput' => [ 'base' => '<p>Represents the output of a get branch operation.</p>', 'refs' => [], ], 'GetCommitInput' => [ 'base' => '<p>Represents the input of a get commit operation.</p>', 'refs' => [], ], 'GetCommitOutput' => [ 'base' => '<p>Represents the output of a get commit operation.</p>', 'refs' => [], ], 'GetDifferencesInput' => [ 'base' => NULL, 'refs' => [], ], 'GetDifferencesOutput' => [ 'base' => NULL, 'refs' => [], ], 'GetRepositoryInput' => [ 'base' => '<p>Represents the input of a get repository operation.</p>', 'refs' => [], ], 'GetRepositoryOutput' => [ 'base' => '<p>Represents the output of a get repository operation.</p>', 'refs' => [], ], 'GetRepositoryTriggersInput' => [ 'base' => '<p>Represents the input of a get repository triggers operation.</p>', 'refs' => [], ], 'GetRepositoryTriggersOutput' => [ 'base' => '<p>Represents the output of a get repository triggers operation.</p>', 'refs' => [], ], 'InvalidBlobIdException' => [ 'base' => '<p>The specified blob is not valid.</p>', 'refs' => [], ], 'InvalidBranchNameException' => [ 'base' => '<p>The specified branch name is not valid.</p>', 'refs' => [], ], 'InvalidCommitException' => [ 'base' => '<p>The specified commit is not valid.</p>', 'refs' => [], ], 'InvalidCommitIdException' => [ 'base' => '<p>The specified commit ID is not valid.</p>', 'refs' => [], ], 'InvalidContinuationTokenException' => [ 'base' => '<p>The specified continuation token is not valid.</p>', 'refs' => [], ], 'InvalidMaxResultsException' => [ 'base' => '<p>The specified number of maximum results is not valid.</p>', 'refs' => [], ], 'InvalidOrderException' => [ 'base' => '<p>The specified sort order is not valid.</p>', 'refs' => [], ], 'InvalidPathException' => [ 'base' => '<p>The specified path is not valid.</p>', 'refs' => [], ], 'InvalidRepositoryDescriptionException' => [ 'base' => '<p>The specified repository description is not valid.</p>', 'refs' => [], ], 'InvalidRepositoryNameException' => [ 'base' => '<p>At least one specified repository name is not valid.</p> <note> <p>This exception only occurs when a specified repository name is not valid. Other exceptions occur when a required repository parameter is missing, or when a specified repository does not exist.</p> </note>', 'refs' => [], ], 'InvalidRepositoryTriggerBranchNameException' => [ 'base' => '<p>One or more branch names specified for the trigger is not valid.</p>', 'refs' => [], ], 'InvalidRepositoryTriggerCustomDataException' => [ 'base' => '<p>The custom data provided for the trigger is not valid.</p>', 'refs' => [], ], 'InvalidRepositoryTriggerDestinationArnException' => [ 'base' => '<p>The Amazon Resource Name (ARN) for the trigger is not valid for the specified destination. The most common reason for this error is that the ARN does not meet the requirements for the service type.</p>', 'refs' => [], ], 'InvalidRepositoryTriggerEventsException' => [ 'base' => '<p>One or more events specified for the trigger is not valid. Check to make sure that all events specified match the requirements for allowed events.</p>', 'refs' => [], ], 'InvalidRepositoryTriggerNameException' => [ 'base' => '<p>The name of the trigger is not valid.</p>', 'refs' => [], ], 'InvalidRepositoryTriggerRegionException' => [ 'base' => '<p>The region for the trigger target does not match the region for the repository. Triggers must be created in the same region as the target for the trigger.</p>', 'refs' => [], ], 'InvalidSortByException' => [ 'base' => '<p>The specified sort by value is not valid.</p>', 'refs' => [], ], 'LastModifiedDate' => [ 'base' => NULL, 'refs' => [ 'RepositoryMetadata$lastModifiedDate' => '<p>The date and time the repository was last modified, in timestamp format.</p>', ], ], 'Limit' => [ 'base' => NULL, 'refs' => [ 'GetDifferencesInput$MaxResults' => '<p>A non-negative integer used to limit the number of returned results.</p>', ], ], 'ListBranchesInput' => [ 'base' => '<p>Represents the input of a list branches operation.</p>', 'refs' => [], ], 'ListBranchesOutput' => [ 'base' => '<p>Represents the output of a list branches operation.</p>', 'refs' => [], ], 'ListRepositoriesInput' => [ 'base' => '<p>Represents the input of a list repositories operation.</p>', 'refs' => [], ], 'ListRepositoriesOutput' => [ 'base' => '<p>Represents the output of a list repositories operation.</p>', 'refs' => [], ], 'MaximumBranchesExceededException' => [ 'base' => '<p>The number of branches for the trigger was exceeded.</p>', 'refs' => [], ], 'MaximumRepositoryNamesExceededException' => [ 'base' => '<p>The maximum number of allowed repository names was exceeded. Currently, this number is 25.</p>', 'refs' => [], ], 'MaximumRepositoryTriggersExceededException' => [ 'base' => '<p>The number of triggers allowed for the repository was exceeded.</p>', 'refs' => [], ], 'Message' => [ 'base' => NULL, 'refs' => [ 'Commit$message' => '<p>The commit message associated with the specified commit.</p>', ], ], 'Mode' => [ 'base' => NULL, 'refs' => [ 'BlobMetadata$mode' => '<p>The file mode permissions of the blob. File mode permission codes include:</p> <ul> <li> <p> <code>100644</code> indicates read/write</p> </li> <li> <p> <code>100755</code> indicates read/write/execute</p> </li> <li> <p> <code>160000</code> indicates a submodule</p> </li> <li> <p> <code>120000</code> indicates a symlink</p> </li> </ul>', ], ], 'Name' => [ 'base' => NULL, 'refs' => [ 'UserInfo$name' => '<p>The name of the user who made the specified commit.</p>', ], ], 'NextToken' => [ 'base' => NULL, 'refs' => [ 'GetDifferencesInput$NextToken' => '<p>An enumeration token that when provided in a request, returns the next batch of the results.</p>', 'GetDifferencesOutput$NextToken' => '<p>An enumeration token that can be used in a request to return the next batch of the results.</p>', 'ListBranchesInput$nextToken' => '<p>An enumeration token that allows the operation to batch the results.</p>', 'ListBranchesOutput$nextToken' => '<p>An enumeration token that returns the batch of the results.</p>', 'ListRepositoriesInput$nextToken' => '<p>An enumeration token that allows the operation to batch the results of the operation. Batch sizes are 1,000 for list repository operations. When the client sends the token back to AWS CodeCommit, another page of 1,000 records is retrieved.</p>', 'ListRepositoriesOutput$nextToken' => '<p>An enumeration token that allows the operation to batch the results of the operation. Batch sizes are 1,000 for list repository operations. When the client sends the token back to AWS CodeCommit, another page of 1,000 records is retrieved.</p>', ], ], 'ObjectId' => [ 'base' => NULL, 'refs' => [ 'BlobMetadata$blobId' => '<p>The full ID of the blob.</p>', 'Commit$commitId' => '<p>The full SHA of the specified commit. </p>', 'Commit$treeId' => '<p>Tree information for the specified commit.</p>', 'GetBlobInput$blobId' => '<p>The ID of the blob, which is its SHA-1 pointer.</p>', 'GetCommitInput$commitId' => '<p>The commit ID. Commit IDs are the full SHA of the commit.</p>', 'ParentList$member' => NULL, ], ], 'OrderEnum' => [ 'base' => NULL, 'refs' => [ 'ListRepositoriesInput$order' => '<p>The order in which to sort the results of a list repositories operation.</p>', ], ], 'ParentList' => [ 'base' => NULL, 'refs' => [ 'Commit$parents' => '<p>The parent list for the specified commit.</p>', ], ], 'Path' => [ 'base' => NULL, 'refs' => [ 'BlobMetadata$path' => '<p>The path to the blob and any associated file name, if any.</p>', 'GetDifferencesInput$beforePath' => '<p>The file path in which to check for differences. Limits the results to this path. Can also be used to specify the previous name of a directory or folder. If <code>beforePath</code> and <code>afterPath</code> are not specified, differences will be shown for all paths.</p>', 'GetDifferencesInput$afterPath' => '<p>The file path in which to check differences. Limits the results to this path. Can also be used to specify the changed name of a directory or folder, if it has changed. If not specified, differences will be shown for all paths.</p>', ], ], 'PathDoesNotExistException' => [ 'base' => '<p>The specified path does not exist.</p>', 'refs' => [], ], 'PutRepositoryTriggersInput' => [ 'base' => '<p>Represents the input ofa put repository triggers operation.</p>', 'refs' => [], ], 'PutRepositoryTriggersOutput' => [ 'base' => '<p>Represents the output of a put repository triggers operation.</p>', 'refs' => [], ], 'RepositoryDescription' => [ 'base' => NULL, 'refs' => [ 'CreateRepositoryInput$repositoryDescription' => '<p>A comment or description about the new repository.</p> <note> <p>The description field for a repository accepts all HTML characters and all valid Unicode characters. Applications that do not HTML-encode the description and display it in a web page could expose users to potentially malicious code. Make sure that you HTML-encode the description field in any application that uses this API to display the repository description on a web page.</p> </note>', 'RepositoryMetadata$repositoryDescription' => '<p>A comment or description about the repository.</p>', 'UpdateRepositoryDescriptionInput$repositoryDescription' => '<p>The new comment or description for the specified repository. Repository descriptions are limited to 1,000 characters.</p>', ], ], 'RepositoryDoesNotExistException' => [ 'base' => '<p>The specified repository does not exist.</p>', 'refs' => [], ], 'RepositoryId' => [ 'base' => NULL, 'refs' => [ 'DeleteRepositoryOutput$repositoryId' => '<p>The ID of the repository that was deleted.</p>', 'RepositoryMetadata$repositoryId' => '<p>The ID of the repository.</p>', 'RepositoryNameIdPair$repositoryId' => '<p>The ID associated with the repository.</p>', ], ], 'RepositoryLimitExceededException' => [ 'base' => '<p>A repository resource limit was exceeded.</p>', 'refs' => [], ], 'RepositoryMetadata' => [ 'base' => '<p>Information about a repository.</p>', 'refs' => [ 'CreateRepositoryOutput$repositoryMetadata' => '<p>Information about the newly created repository.</p>', 'GetRepositoryOutput$repositoryMetadata' => '<p>Information about the repository.</p>', 'RepositoryMetadataList$member' => NULL, ], ], 'RepositoryMetadataList' => [ 'base' => NULL, 'refs' => [ 'BatchGetRepositoriesOutput$repositories' => '<p>A list of repositories returned by the batch get repositories operation.</p>', ], ], 'RepositoryName' => [ 'base' => NULL, 'refs' => [ 'CreateBranchInput$repositoryName' => '<p>The name of the repository in which you want to create the new branch.</p>', 'CreateRepositoryInput$repositoryName' => '<p>The name of the new repository to be created.</p> <note> <p>The repository name must be unique across the calling AWS account. In addition, repository names are limited to 100 alphanumeric, dash, and underscore characters, and cannot include certain characters. For a full description of the limits on repository names, see <a href="http://docs.aws.amazon.com/codecommit/latest/userguide/limits.html">Limits</a> in the AWS CodeCommit User Guide. The suffix ".git" is prohibited.</p> </note>', 'DeleteBranchInput$repositoryName' => '<p>The name of the repository that contains the branch to be deleted.</p>', 'DeleteRepositoryInput$repositoryName' => '<p>The name of the repository to delete.</p>', 'GetBlobInput$repositoryName' => '<p>The name of the repository that contains the blob.</p>', 'GetBranchInput$repositoryName' => '<p>The name of the repository that contains the branch for which you want to retrieve information.</p>', 'GetCommitInput$repositoryName' => '<p>The name of the repository to which the commit was made.</p>', 'GetDifferencesInput$repositoryName' => '<p>The name of the repository where you want to get differences.</p>', 'GetRepositoryInput$repositoryName' => '<p>The name of the repository to get information about.</p>', 'GetRepositoryTriggersInput$repositoryName' => '<p>The name of the repository for which the trigger is configured.</p>', 'ListBranchesInput$repositoryName' => '<p>The name of the repository that contains the branches.</p>', 'PutRepositoryTriggersInput$repositoryName' => '<p>The name of the repository where you want to create or update the trigger.</p>', 'RepositoryMetadata$repositoryName' => '<p>The repository\'s name.</p>', 'RepositoryNameIdPair$repositoryName' => '<p>The name associated with the repository.</p>', 'RepositoryNameList$member' => NULL, 'RepositoryNotFoundList$member' => NULL, 'TestRepositoryTriggersInput$repositoryName' => '<p>The name of the repository in which to test the triggers.</p>', 'UpdateDefaultBranchInput$repositoryName' => '<p>The name of the repository to set or change the default branch for.</p>', 'UpdateRepositoryDescriptionInput$repositoryName' => '<p>The name of the repository to set or change the comment or description for.</p>', 'UpdateRepositoryNameInput$oldName' => '<p>The existing name of the repository.</p>', 'UpdateRepositoryNameInput$newName' => '<p>The new name for the repository.</p>', ], ], 'RepositoryNameExistsException' => [ 'base' => '<p>The specified repository name already exists.</p>', 'refs' => [], ], 'RepositoryNameIdPair' => [ 'base' => '<p>Information about a repository name and ID.</p>', 'refs' => [ 'RepositoryNameIdPairList$member' => NULL, ], ], 'RepositoryNameIdPairList' => [ 'base' => NULL, 'refs' => [ 'ListRepositoriesOutput$repositories' => '<p>Lists the repositories called by the list repositories operation.</p>', ], ], 'RepositoryNameList' => [ 'base' => NULL, 'refs' => [ 'BatchGetRepositoriesInput$repositoryNames' => '<p>The names of the repositories to get information about.</p>', ], ], 'RepositoryNameRequiredException' => [ 'base' => '<p>A repository name is required but was not specified.</p>', 'refs' => [], ], 'RepositoryNamesRequiredException' => [ 'base' => '<p>A repository names object is required but was not specified.</p>', 'refs' => [], ], 'RepositoryNotFoundList' => [ 'base' => NULL, 'refs' => [ 'BatchGetRepositoriesOutput$repositoriesNotFound' => '<p>Returns a list of repository names for which information could not be found.</p>', ], ], 'RepositoryTrigger' => [ 'base' => '<p>Information about a trigger for a repository.</p>', 'refs' => [ 'RepositoryTriggersList$member' => NULL, ], ], 'RepositoryTriggerBranchNameListRequiredException' => [ 'base' => '<p>At least one branch name is required but was not specified in the trigger configuration.</p>', 'refs' => [], ], 'RepositoryTriggerCustomData' => [ 'base' => NULL, 'refs' => [ 'RepositoryTrigger$customData' => '<p>Any custom data associated with the trigger that will be included in the information sent to the target of the trigger.</p>', ], ], 'RepositoryTriggerDestinationArnRequiredException' => [ 'base' => '<p>A destination ARN for the target service for the trigger is required but was not specified.</p>', 'refs' => [], ], 'RepositoryTriggerEventEnum' => [ 'base' => NULL, 'refs' => [ 'RepositoryTriggerEventList$member' => NULL, ], ], 'RepositoryTriggerEventList' => [ 'base' => NULL, 'refs' => [ 'RepositoryTrigger$events' => '<p>The repository events that will cause the trigger to run actions in another service, such as sending a notification through Amazon Simple Notification Service (SNS). </p> <note> <p>The valid value "all" cannot be used with any other values.</p> </note>', ], ], 'RepositoryTriggerEventsListRequiredException' => [ 'base' => '<p>At least one event for the trigger is required but was not specified.</p>', 'refs' => [], ], 'RepositoryTriggerExecutionFailure' => [ 'base' => '<p>A trigger failed to run.</p>', 'refs' => [ 'RepositoryTriggerExecutionFailureList$member' => NULL, ], ], 'RepositoryTriggerExecutionFailureList' => [ 'base' => NULL, 'refs' => [ 'TestRepositoryTriggersOutput$failedExecutions' => '<p>The list of triggers that were not able to be tested. This list provides the names of the triggers that could not be tested, separated by commas.</p>', ], ], 'RepositoryTriggerExecutionFailureMessage' => [ 'base' => NULL, 'refs' => [ 'RepositoryTriggerExecutionFailure$failureMessage' => '<p>Additional message information about the trigger that did not run.</p>', ], ], 'RepositoryTriggerName' => [ 'base' => NULL, 'refs' => [ 'RepositoryTrigger$name' => '<p>The name of the trigger.</p>', 'RepositoryTriggerExecutionFailure$trigger' => '<p>The name of the trigger that did not run.</p>', 'RepositoryTriggerNameList$member' => NULL, ], ], 'RepositoryTriggerNameList' => [ 'base' => NULL, 'refs' => [ 'TestRepositoryTriggersOutput$successfulExecutions' => '<p>The list of triggers that were successfully tested. This list provides the names of the triggers that were successfully tested, separated by commas.</p>', ], ], 'RepositoryTriggerNameRequiredException' => [ 'base' => '<p>A name for the trigger is required but was not specified.</p>', 'refs' => [], ], 'RepositoryTriggersConfigurationId' => [ 'base' => NULL, 'refs' => [ 'GetRepositoryTriggersOutput$configurationId' => '<p>The system-generated unique ID for the trigger.</p>', 'PutRepositoryTriggersOutput$configurationId' => '<p>The system-generated unique ID for the create or update operation.</p>', ], ], 'RepositoryTriggersList' => [ 'base' => NULL, 'refs' => [ 'GetRepositoryTriggersOutput$triggers' => '<p>The JSON block of configuration information for each trigger.</p>', 'PutRepositoryTriggersInput$triggers' => '<p>The JSON block of configuration information for each trigger.</p>', 'TestRepositoryTriggersInput$triggers' => '<p>The list of triggers to test.</p>', ], ], 'RepositoryTriggersListRequiredException' => [ 'base' => '<p>The list of triggers for the repository is required but was not specified.</p>', 'refs' => [], ], 'SortByEnum' => [ 'base' => NULL, 'refs' => [ 'ListRepositoriesInput$sortBy' => '<p>The criteria used to sort the results of a list repositories operation.</p>', ], ], 'TestRepositoryTriggersInput' => [ 'base' => '<p>Represents the input of a test repository triggers operation.</p>', 'refs' => [], ], 'TestRepositoryTriggersOutput' => [ 'base' => '<p>Represents the output of a test repository triggers operation.</p>', 'refs' => [], ], 'UpdateDefaultBranchInput' => [ 'base' => '<p>Represents the input of an update default branch operation.</p>', 'refs' => [], ], 'UpdateRepositoryDescriptionInput' => [ 'base' => '<p>Represents the input of an update repository description operation.</p>', 'refs' => [], ], 'UpdateRepositoryNameInput' => [ 'base' => '<p>Represents the input of an update repository description operation.</p>', 'refs' => [], ], 'UserInfo' => [ 'base' => '<p>Information about the user who made a specified commit.</p>', 'refs' => [ 'Commit$author' => '<p>Information about the author of the specified commit. Information includes the date in timestamp format with GMT offset, the name of the author, and the email address for the author, as configured in Git.</p>', 'Commit$committer' => '<p>Information about the person who committed the specified commit, also known as the committer. Information includes the date in timestamp format with GMT offset, the name of the committer, and the email address for the committer, as configured in Git.</p> <p>For more information about the difference between an author and a committer in Git, see <a href="http://git-scm.com/book/ch2-3.html">Viewing the Commit History</a> in Pro Git by Scott Chacon and Ben Straub.</p>', ], ], 'blob' => [ 'base' => NULL, 'refs' => [ 'GetBlobOutput$content' => '<p>The content of the blob, usually a file.</p>', ], ], ],];
