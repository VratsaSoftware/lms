<?php

namespace App\Services;

use Illuminate\Http\Request;

// use GuzzleHttp\Exception\GuzzleException;
// use GuzzleHttp\Client as GuzzleClient;
use File;

class ePayService
{
    public $client;
    private $page;
    private $min;
    private $encoded;
    private $checksum;
    private $url_ok;
    private $url_cancel;
    private $currency;
    private $exp_time;
    private $descr;
    private $invoice;

    public function __construct($process)
    {
        //$this->client = new GuzzleClient();
        $this->page = 'paylogin';
        $this->min = 2779014582;
        $invoiceNum = (int) File::get(public_path('ePayInvoiceNums.txt'));
        $this->invoice = $invoiceNum;
        File::put(public_path( 'ePayInvoiceNums.txt'), ($invoiceNum + 1));
        $this->amount = (int)$process['levels'];
        $this->currency = 'BGN';
        $this->exp_time = '30.11.2019';
        $this->descr = 'Payment VSC 9-month coding course - ' . $process['user_email'];
        $this->url_ok = route('course.payment.create');
        $this->url_cancel = route('course.payment.create');

        //$this->encoded =  base64_encode('DATA');
        $password = '';
        //$this->checksum = hash_hmac('sha1', $this->encoded, $password);

        $data = <<<DATA
PAGE={$this->page}
MIN={$this->min}
INVOICE={$this->invoice}
AMOUNT={$this->amount}
EXP_TIME={$this->exp_time}
DESCR={$this->descr}
URL_OK={$this->url_ok}
URL_CANCEL={$this->url_cancel}
DATA;

        $this->encoded = base64_encode($data);
        $this->checksum = $this->hmac('sha1', $this->encoded, $password);

        $this->completeData = [
            'PAGE' => $this->page,
            'MIN' => $this->min,
            'INVOICE' => $this->invoice,
            'AMOUNT' => $this->amount,
            'CURRENCY' => $this->currency,
            'EXP_TIME' => $this->exp_time,
            'DESCR' => $this->descr,
            'URL_OK' => $this->url_ok,
            'URL_CANCEL' => $this->url_cancel,
            'ENCODED' => $this->encoded,
            'CHECKSUM' => $this->checksum
        ];
    }

    private function hmac($algo, $data, $passwd)
    {
        /* md5 and sha1 only */
        $algo = strtolower($algo);
        $p = array('md5' => 'H32', 'sha1' => 'H40');
        if (strlen($passwd) > 64) {
            $passwd = pack($p[$algo], $algo($passwd));
        }
        if (strlen($passwd) < 64) {
            $passwd = str_pad($passwd, 64, chr(0));
        }

        $ipad = substr($passwd, 0, 64) ^ str_repeat(chr(0x36), 64);
        $opad = substr($passwd, 0, 64) ^ str_repeat(chr(0x5C), 64);

        return ($algo($opad . pack($p[$algo], $algo($ipad . $data))));
    }

    public function sendPayment()
    {
        $curl = curl_init();
        // Set some options - we are passing in a useragent too here
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://epay.bg/',
            CURLOPT_USERAGENT => 'Codular Sample cURL Request',
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => $this->completeData
        ]);
        // Send the request & save response to $resp
        $resp = curl_exec($curl);
        // Close request to clear up some resources
        curl_close($curl);

        return $resp;

        // $response = $this->client->request('POST', 'https://demo.epay.bg/', [
        //     'form_params' => $this->completeData
        // ]);

        // return $response->getBody()->getContents();
    }
}
