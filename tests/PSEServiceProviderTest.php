<?php

namespace PlacetoPay\PSE\Tests;

use PHPUnit\Framework\TestCase;
use PlacetoPay\PSE\PSEServiceProvider;
use PlacetoPay\PSE\Struct\ArrayOfBank;
use PlacetoPay\PSE\Transaction;
use Silex\Application;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class PSEServiceProviderTest extends TestCase
{
    public function testSilexApp()
    {
        $app = new Application();

        $app->register(new PSEServiceProvider(), array(
            'pse.login' => '6dd490faf9cb87a9862245da41170ff2',
            'pse.tranKey' => '024h1IlD',
            'cache' => function () {
                return new FilesystemAdapter();
            }
        ));

        $bankList = $app['pse']->getBankList();
        $this->assertInstanceOf(ArrayOfBank::class, $bankList);

        $transaction = $app['pse.transaction'];
        $this->assertInstanceOf(Transaction::class, $transaction);
    }
}
