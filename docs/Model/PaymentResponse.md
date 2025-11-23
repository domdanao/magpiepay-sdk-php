# # PaymentResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Unique identifier for the payment record. |
**qrph_id** | **string** | Associated QRPh request identifier. |
**status** | **string** |  | [optional]
**amount** | **int** |  | [optional]
**magpie_mdr** | **string** |  | [optional]
**magpie_fee** | **int** |  | [optional]
**merchant_net_amount** | **int** |  | [optional]
**payment_source** | **string** |  | [optional]
**paid_at** | **string** |  | [optional]
**created_at** | **string** | ISO timestamp when the payment record was created. |
**updated_at** | **string** | ISO timestamp when the payment record was last updated. |
**livemode** | **bool** | Whether the payment was processed in live mode. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
