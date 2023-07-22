<?php

namespace App;

use Asciisd\Zoho\Zohoable;
use Asciisd\Zoho\CriteriaBuilder;

class Invoice extends Zohoable {
    
    // This is the Zoho module API Name
    protected $zoho_module_name = 'Payments';

    public function searchCriteria() {
        // Return the string of criteria that you want to find the current record in CRM with.
        return CriteriaBuilder::where('PaymentID', $this->payment_id)
                              ->andWhere('Order_ID', $this->order_id)
                              ->toString();
    }

    public function zohoMandatoryFields() {
        // Return an array of mandatory fields to create a module from this model
        return ['Base_Currency' => $this->currency];
    }

    // Add any additional methods or logic for the Invoice model here, if needed
}
