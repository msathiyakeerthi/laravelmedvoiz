<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->string('name', 128)->primary();
            $table->text('value')->nullable();
        });

        DB::table('settings')->insert(
            [      
                [
                    'name' => 'invoice_vendor',
                    'value' => 'CloudTranscribeMedical'
                ], 
                [
                    'name' => 'invoice_vendor_website',
                    'value' => ''
                ],               
                [
                    'name' => 'invoice_address',
                    'value' => ''
                ],
                [
                    'name' => 'invoice_city',
                    'value' => ''
                ],
                [
                    'name' => 'invoice_country',
                    'value' => ''
                ],
                [
                    'name' => 'invoice_phone',
                    'value' => ''
                ],
                [
                    'name' => 'invoice_postal_code',
                    'value' => ''
                ],
                [
                    'name' => 'invoice_state',
                    'value' => ''
                ],
                [
                    'name' => 'invoice_vat_number',
                    'value' => ''
                ],                
                [
                    'name' => 'invoice_currency',
                    'value' => 'USD'
                ],
                [
                    'name' => 'invoice_language',
                    'value' => 'en'
                ],               
                [
                    'name' => 'legal_privacy_url',
                    'value' => ''
                ],
                [
                    'name' => 'legal_terms_url',
                    'value' => ''
                ],
                [
                    'name' => 'title',
                    'value' => 'Cloud Medical Transcribe - Medical Speech to Text Converter'
                ],
                [
                    'name' => 'author',
                    'value' => 'Berkine'
                ],
                [
                    'name' => 'keywords',
                    'value' => 'cloud, medical speech to text, berkine, aws'
                ],
                [
                    'name' => 'description',
                    'value' => 'Cloud Medical Transcribe - Medical Speech to Text Converter'
                ],
                [
                    'name' => 'referral_headline',
                    'value' => 'Invite your friends to CloudTranscribeMedical, if they sign up, you will get 1000 extra credits and you will also get 50% commission of thier first purchase.'
                ],
                [
                    'name' => 'referral_guideline',
                    'value' => '1. Share your referral link with your friends to register
                                2. After they successfully register and verify their emails you will get 1000 free TTS bonus credits for each friend
                                3. For their first purchase on CloudTranscribeMedical, you will receive 50% of commissions
                                4. Include your Bank Requisites or Paypal ID in My Gateway tab to receive your commissions
                                5. Request payouts under My Payouts tab or use your balance to purchase TTS credits
                                6. Checkout all your referrals under My Referrals tab'
                ],
                [
                    'name' => 'bank_instructions',
                    'value' => 'Make your payment directly into our bank account. Please use your Order ID Number as the payment reference. Text to Speech Credits will not be allocated to your account until the funds have cleared in our bank account. Thank you.'
                ],
                [
                    'name' => 'bank_requisites',
                    'value' => 'Bank Name: 
                                Account Name:
                                Account Number/IBAN:
                                BIC/Swift:
                                Routing Number:'
                ],
                [
                    'name' => 'css',
                    'value' => ''
                ],
                [
                    'name' => 'js',
                    'value' => ''
                ],
                [
                    'name' => 'license',
                    'value' => ''
                ],
                [
                    'name' => 'username',
                    'value' => ''
                ],

            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
