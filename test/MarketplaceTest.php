<?php

namespace Test;

use API\MarketplaceRequest;
use Models\General\Address;
use Models\Bank\Bank;
use Models\Bank\BankData;
use Models\Merchant\Merchant;
use Models\Merchant\MerchantSplit;
use Models\Merchant\MerchantSplitTax;

require_once __DIR__.'/../vendor/autoload.php';

/**
 * Class MarketplaceTest
 *
 * @package Safe2Pay\Test
 */
class MarketplaceTest
{

    public static function Add()
    {
        //Endereço
        $address = new Address("90620000", "Avenida Princesa Isabel","828", "lado ímpar", "Santana", "RS", "Porto Alegre", "Brasil");
        //Dados bancários da subconta
        $bankData = new BankData(new Bank("041"),"1676", "0","41776","7","3");
        //Split de taxas
        //Código da forma de pagamento
        // 1 - Boleto bancário
        // 2 - Cartão de crédito
        // 3 - Criptomoeda
        // 4 - Cartão de débito 
        $merchantSplit =  array(
            new MerchantSplit(false,"1",array(new MerchantSplitTax("1","1.00"))),
            new MerchantSplit(false,"2",array(new MerchantSplitTax("1","1.75"))),
            new MerchantSplit(false,"3",array(new MerchantSplitTax("1","1.50"))),
        ); 
        //Dados principais da subconta
        $marketplace = new Merchant
        (
            "53797700000115",
            "Francisco e Laís Filmagens ME",
            "Teste",
            $address,
            "Lucas",
            "04270435062",
            "4ba9b029f@HOTMAIL.COM",
            "Responsável técnico",
            "32001774117",
            "Teste12@teste.com",
            $bankData,
            $merchantSplit
        );

        var_dump(MarketplaceRequest::Add($marketplace));
    }

    public static function Update()
    {
        //Endereço
        $address = new Address("90620000", "Avenida Princesa Isabel","828", "lado ímpar", "Santana", "RS", "Porto Alegre", "Brasil");
        //Dados bancários da subconta
        $bankData = new BankData(new Bank("041"),"1676", "0","41776","7","3");
        //Split de taxas
        //Código da forma de pagamento
        // 1 - Boleto bancário
        // 2 - Cartão de crédito
        // 3 - Criptomoeda
        // 4 - Cartão de débito 
        $merchantSplit =  array(
            new MerchantSplit(false,"1",array(new MerchantSplitTax("1","1.00"))),
            new MerchantSplit(false,"2",array(new MerchantSplitTax("1","1.75"))),
            new MerchantSplit(false,"3",array(new MerchantSplitTax("1","1.50"))),
        ); 
        //Dados principais da subconta
        $marketplace = new Merchant
        (
            "22404217000108",
            "Francisco e Laís Filmagens ME",
            "Teste",
            $address,
            "Lucas",
            "04270435062",
            "4ba9b029f@HOTMAIL.COM",
            "Responsável técnico",
            "32001774117",
            "4ba95b02f@GMAIL.COM",
            $bankData,
            $merchantSplit
        );

        var_dump(MarketplaceRequest::Update($marketplace, 783));
    }

    public static function Delete()
    {
        $Id = 717;
        var_dump(MarketplaceRequest::Delete($Id));
    }

    public static function List()
    {
        $PageNumber = 1;
        $RowsPage = 10;

        var_dump(MarketplaceRequest::List($PageNumber,$RowsPage));
    }

    public static function Get()
    {
        $Id = 717;
        var_dump(MarketplaceRequest::Get($Id));
    }
}

// MarketplaceTest::List();
// MarketplaceTest::Get();
// MarketplaceTest::Delete();
// MarketplaceTest::Add();
// MarketplaceTest::Update();