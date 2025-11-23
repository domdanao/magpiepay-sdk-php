# # QRPhResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Unique identifier for the QRPh request. |
**reference_id** | **string** | Client-provided reference for correlating the request. |
**type** | **string** | QR code type, either static or dynamic. |
**amount** | **int** |  | [optional]
**submerchant_id** | **string** |  | [optional]
**status** | **string** | Current status of the QRPh request. |
**metadata** | **array<string,mixed>** |  | [optional]
**qrph_payload** | **string** |  | [optional]
**qrph_image** | **string** |  | [optional]
**checkout_url** | **string** |  | [optional]
**payment_id** | **string** |  | [optional]
**paid_at** | **string** |  | [optional]
**expires_at** | **string** |  | [optional]
**cancelled_at** | **string** |  | [optional]
**cancellation_reason** | **string** |  | [optional]
**created_at** | **string** | ISO timestamp when the QRPh request was created. |
**updated_at** | **string** | ISO timestamp when the QRPh request was last updated. |
**livemode** | **bool** | Indicates whether the request was created in live or test mode. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
