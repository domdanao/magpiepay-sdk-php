# # PayoutCreateRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**reference_id** | **string** | Client-provided reference for the payout. |
**channel** | **string** | Channel to use for the payout. |
**amount** | **int** | Amount in centavos. |
**source_account_id** | **string** | Org bank account ID to debit. |
**destination** | [**\MagpiePay\Model\PayoutDestination**](PayoutDestination.md) | Destination account details. |
**purpose** | **string** |  | [optional]
**metadata** | **array<string,mixed>** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
