# # PayoutResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Unique payout identifier. |
**reference_id** | **string** | Client-provided reference tying to the payout request. |
**channel** | **string** | Payment channel (instapay/pesonet). |
**amount** | **int** | Amount in centavos. |
**magpie_fee** | **int** |  | [optional]
**source_account_id** | **string** | Org bank account used as source. |
**destination** | [**\MagpiePay\Model\PayoutDestinationResponse**](PayoutDestinationResponse.md) | Destination bank account data. |
**purpose** | **string** |  | [optional]
**status** | **string** | Current status of the payout. |
**provider** | **string** |  | [optional]
**provider_ref** | **array<string,mixed>** | Provider-specific reference data. | [optional]
**provider_message** | **string** |  | [optional]
**metadata** | **array<string,mixed>** | Merchant-defined metadata. | [optional]
**created_at** | **string** | ISO timestamp when payout was created. |
**updated_at** | **string** | ISO timestamp when the payout was last modified. |
**posted_at** | **string** |  | [optional]
**completed_at** | **string** |  | [optional]
**failed_at** | **string** |  | [optional]
**failure_code** | **string** |  | [optional]
**failure_message** | **string** |  | [optional]
**livemode** | **bool** | True when the payout was created in live mode. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
