<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/default/css/style.css">
        
        <style>
            body {
                color: #555;
                font-size: 1em;
                font-family: Arial, Verdana, sans-serif;
            }
            table {
                width:100%;
                border-spacing:0;
                border-collapse: collapse;
            }

            .text-right {
                text-align: right;
            }

            .color-l { color: #bbb; }
            .color-n { color: #888; }
            .color-d { color: #555; }

            .border-bottom-l {
                border-bottom-width: 1px;
                border-style: solid;
                border-color: #bbb;
            }
            .border-bottom-n {
                border-bottom-width: 1px;
                border-style: solid;
                border-color: #888;
            }
            .border-bottom-d {
                border-bottom-width: 1px;
                border-style: solid;
                border-color: #666;
            }

            .border-top-l {
                border-top-width: 1px;
                border-style: solid;
                border-color: #bbb;
            }
            .border-top-n {
                border-top-width: 1px;
                border-style: solid;
                border-color: #888;
            }
            .border-top-d {
                border-top-width: 1px;
                border-style: solid;
                border-color: #555;
            }

            .background-l { background-color: #eee; }

            #header table {
                width:100%;
                padding: 0;
            }

            .company-details,
            .company-details h3,
            .company-details p,
            .invoice-details {
                text-align: right;
            }

            .company-name,
            .quote-id {
                color: #333 !important;
            }
            .invoice-details td {
                padding: 0.2em 0.3em;
            }
            .invoice-items td,
            .invoice-items th {
                padding: 0.2em 0.4em 0.4em;
            }

        </style>
        
	</head>
	<body>
        <div id="header">
            <table>
                <tr>
                    <td style="width:70%">
                        <div style="display: block; height: 2cm"></div>

                        <div class="invoice-to">
                            <p><?php echo lang('bill_to'); ?>:</p>
                            <p><b><?php echo $quote->client_name; ?></b><br/>
                                <?php if ($quote->client_vat_id) {
                                    echo lang('vat_id_short') . ': ' . $quote->client_vat_id . '<br/>';
                                } ?>
                                <?php if ($quote->client_tax_code) {
                                    echo lang('tax_code_short') . ': ' . $quote->client_tax_code . '<br/>';
                                } ?>
                                <?php if ($quote->client_address_1) {
                                    echo $quote->client_address_1 . '<br/>';
                                } ?>
                                <?php if ($quote->client_address_2) {
                                    echo $quote->client_address_2 . '<br/>';
                                } ?>
                                <?php if ($quote->client_city) {
                                    echo $quote->client_city . ' ';
                                } ?>
                                <?php if ($quote->client_zip) {
                                    echo $quote->client_zip . '<br/>';
                                } ?>
                                <?php if ($quote->client_state) {
                                    echo $quote->client_state . '<br/>';
                                } ?>

                                <?php if ($quote->client_phone) { ?>
                                    <abbr>P:</abbr><?php echo $quote->client_phone; ?><br/>
                                <?php } ?>
                            </p>
                        </div>

                    </td>

                    <td class="text-right" style="width:30%;">
                        <div class="company-details">
                            <?php echo invoice_logo_pdf(); ?>
                            <h3 class="company-name text-right">
                                <?php echo $quote->user_name; ?>
                            </h3>
                            <p class="text-right">
                                <?php if ($quote->user_vat_id) {
                                    echo lang('vat_id_short') . ': ' . $quote->user_vat_id . '<br/>';
                                } ?>
                                <?php if ($quote->user_tax_code) {
                                    echo lang('tax_code_short') . ': ' . $quote->user_tax_code . '<br/>';
                                } ?>
                                <?php if ($quote->user_address_1) {
                                    echo $quote->user_address_1 . '<br/>';
                                }?>
                                <?php if ($quote->user_address_2) {
                                    echo $quote->user_address_2 . '<br/>';
                                } ?>
                                <?php if ($quote->user_city) {
                                    echo $quote->user_city . ' ';
                                } ?>

                                <?php if ($quote->user_zip) {
                                    echo $quote->user_zip . '<br/>';
                                } ?>
                                <?php if ($quote->user_state) {
                                    echo $quote->user_state . '<br/>';
                                } ?>
                                <?php if ($quote->user_phone) {
                                    ?><abbr>P:</abbr><?php echo $quote->user_phone; ?><br><?php
                                } ?>
                                <?php if ($quote->user_fax) {
                                    ?><abbr>F:</abbr><?php echo $quote->user_fax; ?><?php
                                } ?>
                            </p>
                        </div>
                        <br/>
                        <div class="invoice-details">
                            <table>
                                <tbody>
                                <tr>
                                    <td class="text-right color-n">
                                        <?php echo lang('quote_date'); ?>: &nbsp;
                                    </td>
                                    <td class="text-right color-n">
                                        <?php echo date_from_mysql($quote->quote_date_created, TRUE); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right color-n">
                                        <?php echo lang('expires'); ?>: &nbsp;
                                    </td>
                                    <td class="text-right color-n">
                                        <?php echo date_from_mysql($quote->quote_date_expires, TRUE); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right color-n">
                                        <?php echo lang('total'); ?>: &nbsp;
                                    </td>
                                    <td class="text-right color-n">
                                        <?php echo format_currency($quote->quote_total); ?>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </td>
                </tr>
            </table>
        </div>

        <br/>
        <h2 class="quote-id"><?php echo lang('quote'); ?> <?php echo $quote->quote_number; ?></h2>
        <br/>

        <div class="invoice-items">
            <table class="table table-striped" style="width: 100%;">
                <thead>
                    <tr class="border-bottom-d">
                        <th class="color-d"><?php echo lang('item'); ?></th>
                        <th class="color-d"><?php echo lang('description'); ?></th>
                        <th class="text-right color-d"><?php echo lang('qty'); ?></th>
                        <th class="text-right color-d"><?php echo lang('price'); ?></th>
                        <th class="text-right color-d"><?php echo lang('total'); ?></th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $linecounter = 0;
                    foreach ($items as $item) { ?>
                        <tr class="border-bottom-n <?php echo ($linecounter % 2 ? 'background-l' : '')?>">
                            <td><?php echo $item->item_name; ?></td>
                            <td><?php echo nl2br($item->item_description); ?></td>
                            <td class="text-right">
                                <?php echo format_amount($item->item_quantity); ?>
                            </td>
                            <td class="text-right">
                                <?php echo format_currency($item->item_price); ?>
                            </td>
                            <td class="text-right">
                                <?php echo format_currency($item->item_subtotal); ?>
                            </td>
                        </tr>
                        <?php $linecounter++; ?>
                    <?php } ?>

                </tbody>
            </table>
            <table>
                <tr>
                    <td class="text-right">
                        <table class="amount-summary">
                            <tr>
                                <td class="text-right color-n">
                                    <?php echo lang('subtotal'); ?>:
                                </td>
                                <td class="text-right color-n">
                                    <?php echo format_currency($quote->quote_item_subtotal); ?>
                                </td>
                            </tr>
                            <?php if ($quote->quote_item_tax_total > 0) { ?>
                            <tr>
                                <td class="text-right color-n">
                                    <?php echo lang('item_tax'); ?>:
                                </td>
                                <td class="text-right color-n">
                                    <?php echo format_currency($quote->quote_item_tax_total); ?>
                                </td>
                            </tr>
                            <?php } ?>

                            <?php foreach ($quote_tax_rates as $quote_tax_rate) : ?>
                                <tr>    
                                    <td class="text-right color-n">
                                        <?php echo $quote_tax_rate->quote_tax_rate_name . ' ' . $quote_tax_rate->quote_tax_rate_percent; ?>%
                                    </td>
                                    <td class="text-right color-n">
                                        <?php echo format_currency($quote_tax_rate->quote_tax_rate_amount); ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>

                            <tr class="amount-total border-top-n">
                                <td class="text-right color-d">
                                    <b><?php echo lang('total'); ?>:</b>
                                </td>
                                <td class="text-right color-d">
                                    <b><?php echo format_currency($quote->quote_total); ?></b>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            
        </div>
	</body>
</html>
