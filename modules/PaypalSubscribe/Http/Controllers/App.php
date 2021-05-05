<?php

namespace Modules\PaypalSubscribe\Http\Controllers;
use PayPal\Api\Agreement;

class App
{

    public function validate($user)
    {
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                config('paypal-subscribe.client_id'),     // ClientID
                config('paypal-subscribe.secret')    // ClientID
            )
        );
        $apiContext->setConfig(array('mode' => config('paypal-subscribe.mode')));

        $createdAgreement = $user->paypal_subscribtion_id;

        if ($createdAgreement != null) {
            try {
                $agreement = Agreement::get($createdAgreement, $apiContext);
               
                if ($createdAgreement."" == $agreement->getId()."" && $agreement->getState() != 'Inactive') {
                    //$data['intent'] = $createdAgreement;
                    $user->update_url = $agreement->getLinks()[1]->href;
                    $user->cancel_url = $agreement->getLinks()[2]->href;
                    $user->update();
                } 
                
                if($createdAgreement."" == $agreement->getId()."" && $agreement->getState() == 'Cancelled'){
                
                    $user->update_url = "";
                    $user->cancel_url = "";
                    $user->plan_id = null;
                    $user->paypal_subscribtion_id = "";
                    $user->update();
                }
            } catch (Exception $ex) {
                //ResultPrinter::printError("Retrieved an Agreement", "Agreement", $agreement->getId(), $createdAgreement->getId(), $ex);
                //exit(1);
                $user->plan_id = null;
                $user->cancel_url = null;
                $user->update_url = null;
                $user->update();
            }
        } else {
            $user->plan_id = null;
            $user->cancel_url = null;
            $user->update_url = null;
            $user->update();
        }
    }
}
