<?php

include("config.php");


try {
    $config = new NavOnlineInvoice\Config($apiUrl, $userData, $softwareData);
    $reporter = new NavOnlineInvoice\Reporter($config);

    $invoiceQueryParams = [
        "mandatoryQueryParams" => [
            "invoiceIssueDate" => [
                "dateFrom" => "2019-01-01",
                "dateTo" => "2019-01-28",
            ],
        ],
    ];

    $page = 1;

    $invoiceDigestResult = $reporter->queryInvoiceDigest($invoiceQueryParams, $page, "OUTBOUND");

    print "Query results XML elem:\n";
    var_dump($invoiceDigestResult);

} catch(Exception $ex) {
    print get_class($ex) . ": " . $ex->getMessage();
}
