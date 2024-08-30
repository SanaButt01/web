<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class PaymentController extends Controller
{
    public function createPaymentIntent(Request $request)
    {
        $amount = $request->input('amount');
        $customerName = $request->input('customerName');
        $customerEmail = $request->input('customerEmail');

        Stripe::setApiKey(config('services.stripe.secret')); 
       
        // In a Laravel controller, the line Stripe::setApiKey(config('services.stripe.secret')); is used to configure the Stripe library with your Stripe API key. Here’s what each part does:
        
        // Stripe::setApiKey(...): This is a method provided by the Stripe PHP library. It sets the API key that the Stripe library will use to authenticate requests to Stripe's servers.
        
        // config('services.stripe.secret'): This function retrieves the Stripe API key from your Laravel configuration files. Specifically, it gets the value from the services.php configuration file, where API keys and other service-related settings are typically stored.
        
        // services.php is located in the config directory.
        // The stripe.secret key refers to the value stored under 'stripe' => ['secret' => 'your_stripe_secret_key'] in that configuration file.
        // In simple terms, this line ensures that the Stripe library is using the correct API key to interact with Stripe’s services, and this key is securely stored in your configuration files.

        try {
            $paymentIntent = PaymentIntent::create([
                'amount' => $amount,
                'currency' => 'pkr',
                'receipt_email' => $customerEmail,
                'metadata' => [
                    'customer_name' => $customerName,
                ],
            ]);

            return response()->json([
                'clientSecret' => $paymentIntent->client_secret,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
