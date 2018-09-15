<?php
/**
 * Created by PhpStorm.
 * User: web1
 * Date: 08/03/2018
 * Time: 18:17
 */

namespace App\PDO\MySql\Dimerc;
use App\Entities\MySql\Magento\TelemarketingOrderEntity;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use DB;


class TelemarketingOrderPDO extends Model
{
    public static function getTelemarketingOrderByIncrementId($in_incrementid)
    {
        $sql = "SELECT * "
            . " FROM telemarketing_order "
            . " WHERE order_increment_id = :increment_id";

        $resultado = DB::connection('mysqlmagento_dimerc')->select($sql, [
            'increment_id' => $in_incrementid
        ]);

        $arrayReturn = TelemarketingOrderPDO::returnTelemarketingOrderFormat($resultado);
        return $arrayReturn;
    }

    public static function getGuiaIdByTmktOrderId($in_incrementid)
    {
        try {
            $sql = "SELECT mzb_get_documento_dropship(3, :increment_id) AS resultado"
                . " FROM dual";

            DB::connection('oracle_dmventas')->enableQueryLog();
            $respSql = DB::connection('oracle_dmventas')->select($sql, [
                'increment_id' => $in_incrementid
            ]);

            if (count($respSql) > 0) {
                return $respSql[0]->resultado;
            }
        } catch (\Exception $e) {

        }

        return null;

    }

    public static function returnTelemarketingOrderFormat($registros)
    {
        $arrayReturn = null;
        foreach ($registros as $registro) {
            $tel = new TelemarketingOrderEntity();
            $tel->setTelemarketingOrderId($registro->telemarketing_order_id);
            $tel->setOrderId($registro->order_id);
            $tel->setInvoiceId($registro->invoice_id);
            $tel->setOrderIncrementId($registro->order_increment_id);
            $tel->setInvoiceIncrementId($registro->invoice_increment_id);
            $tel->setVatFirst($registro->vat_first);
            $tel->setVatLast($registro->vat_last);
            $tel->setBaseSubtotal($registro->base_subtotal);
            $tel->setPaymentMethodId($registro->payment_method_id);
            $tel->setPaymentMethodCuotas($registro->payment_method_cuotas);
            $tel->setAuthorizationCode($registro->authorization_code);
            $tel->setCardNumber($registro->card_number);
            $tel->setPaymentTypeCode($registro->paymentTypeCode);
            $tel->setPaymentType($registro->payment_type);
            $tel->setTokenInput($registro->tokenInput);
            $tel->setAccountingDate($registro->accountingDate);
            $tel->setCardExpirationDate($registro->cardExpirationDate);
            $tel->setResponseCode($registro->responseCode);
            $tel->setCommerceCode($registro->commerceCode);
            $tel->setSessionId($registro->sessionId);
            $tel->setVCI($registro->VCI);
            $tel->setCodemp($registro->codemp);
            $tel->setAmount($registro->amount);
            $tel->setBillingCompany($registro->billing_company);
            $tel->setBillingFirstname($registro->billing_firstname);
            $tel->setBillingLastname($registro->billing_lastname);
            $tel->setBillingEmail($registro->billing_email);
            $tel->setBillingStreet($registro->billing_street);
            $tel->setBillingCityId($registro->billing_city_id);
            $tel->setBillingCity($registro->billing_city);
            $tel->setBillingRegion($registro->billing_region);
            $tel->setBillingTelephone($registro->billing_telephone);
            $tel->setShippingStreet($registro->shipping_street);
            $tel->setShippingCityId($registro->shipping_city_id);
            $tel->setShippingCity($registro->shipping_city);
            $tel->setShippingRegion($registro->shipping_region);
            $tel->setShippingTelephone($registro->shipping_telephone);
            $tel->setBaseShippingAmount($registro->base_shipping_amount);
            $tel->setBaseDiscountAmount($registro->base_discount_amount);
            $tel->setBaseDiscountPercentage($registro->base_discount_percentage);
            $tel->setCencos($registro->cencos);
            $tel->setComment($registro->comment);
            $tel->setOc($registro->oc);
            $tel->setDocumentType($registro->document_type);
            $tel->setTransactiondate($registro->transactiondate);
            $tel->setVendorId($registro->vendor_id);
            $tel->setVendorRut($registro->vendor_rut);
            $tel->setStatus($registro->status);
            $arrayReturn[] = $tel;
        }

        return $arrayReturn;
    }
}