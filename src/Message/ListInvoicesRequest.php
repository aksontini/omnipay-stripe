<?php

/**
 * Stripe List Invoices Request.
 */
namespace Omnipay\Stripe\Message;

/**
 * Stripe List Invoices Request.
 *
 * @see Omnipay\Stripe\Gateway
 * @link https://stripe.com/docs/api#list_invoices
 */
class ListInvoicesRequest extends AbstractRequest
{
    public function getData()
    {
        $data = array();

        return $data;
    }

    public function getLimit()
    {
        if (this->parameters->has('limit'))
            return $this->getParameter('limit');
        else 
            return 10;
    }  

    public function getEndpoint()
    {
        $endpoint = $this->endpoint.'/invoices';
        if ($limit = $this->getParameter('limit'))
        if ($customerReference = $this->getCustomerReference()) {
            return $endpoint . '?limit=' .$this->getLimit() .'&customer=' . $customerReference;
        }

        return $endpoint;
    }

    public function getHttpMethod()
    {
        return 'GET';
    }
}
