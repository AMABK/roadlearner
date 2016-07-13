<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Road Learner Quotation</title>
        <style>
            @font-face {
                font-family: SourceSansPro;
            }

            .clearfix:after {
                content: "";
                display: table;
                clear: both;
            }

            a {
                color: #0087C3;
                text-decoration: none;
            }

            body {
                position: relative;
                width: auto;  
                height: auto; 
                margin: 0 auto; 
                color: #555555;
                background: #FFFFFF; 
                font-family: Arial, sans-serif; 
                font-size: 14px; 
                font-family: SourceSansPro;
            }

            header {
                padding: 10px 0;
                margin-bottom: 20px;
                border-bottom: 1px solid #AAAAAA;
            }

            #logo {
                float: left;
                margin-top: 8px;
            }

            #logo img {
                height: 70px;
            }

            #company {
                float: right;
                text-align: right;
            }


            #details {
                margin-bottom: 50px;
            }

            #client {
                padding-left: 6px;
                border-left: 6px solid #0087C3;
                float: left;
            }

            #client .to {
                color: #777777;
            }

            h2.name {
                font-size: 1.4em;
                font-weight: normal;
                margin: 0;
            }

            #invoice {
                position: relative;
                float: right;
                text-align: right;
            }

            #invoice h1 {
                color: #0087C3;
                font-size: 2.4em;
                line-height: 1em;
                font-weight: normal;
                margin: 0  0 10px 0;
            }

            #invoice .date {
                font-size: 1.1em;
                color: #777777;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                border-spacing: 0;
                margin-bottom: 20px;
            }

            table th,
            table td {
                padding: 20px;
                background: #EEEEEE;
                text-align: center;
                border-bottom: 1px solid #FFFFFF;
            }

            table th {
                white-space: nowrap;        
                font-weight: normal;
            }

            table td {
                text-align: right;
            }

            table td h3{
                color: #57B223;
                font-size: 1.2em;
                font-weight: normal;
                margin: 0 0 0.2em 0;
            }

            table .no {
                color: #353333;
                font-size: 1.6em;
                background: #DDDDDD;
            }

            table .desc {
                text-align: left;
            }

            table .unit {
                background: #DDDDDD;
            }

            table .qty {
            }

            table .total {
                background: #DDDDDD;
                color: #353333;
            }

            table td.unit,
            table td.qty,
            table td.total {
                font-size: 1.2em;
            }

            table tbody tr:last-child td {
                border: none;
            }

            table tfoot td {
                padding: 10px 20px;
                background: #FFFFFF;
                border-bottom: none;
                font-size: 1.2em;
                white-space: nowrap; 
                border-top: 1px solid #AAAAAA; 
            }

            table tfoot tr:first-child td {
                border-top: none; 
            }

            table tfoot tr:last-child td {
                color: #57B223;
                font-size: 1.4em;
                border-top: 1px solid #57B223; 

            }

            table tfoot tr td:first-child {
                border: none;
            }

            #thanks{
                font-size: 2em;
                margin-bottom: 50px;
            }

            #notices{
                padding-left: 6px;
                border-left: 6px solid #0087C3;  
            }

            #notices .notice {
                font-size: 1.2em;
            }

            footer {
                color: #777777;
                width: 100%;
                height: 30px;
                position: absolute;
                bottom: 0;
                border-top: 1px solid #AAAAAA;
                padding: 8px 0;
                text-align: center;
            }


        </style>
    </head>
    <body>
        <header class="clearfix">
            <div id="logo">
                <?php
                $image = '/quote/logo.png';
                $import = unserialize($data['import']);
                ?>
                <img src="{{ public_path() . $image }}">
            </div>
            <div id="company">
                <h2 class="name">Road Learner Import Calculator</h2>
                <div><a href="http://www.roadlearner.com">http://www.roadlearner.com</a></div>
                <div class="email"><a href="mailto:info@roadlearner.com"><i class="fa fa-envelope" aria-hidden="true"></i> info@roadlearner.com</a></div>
            </div>
        </div>
    </header>
    <main>
        <div id="details" class="clearfix">
            <div id="client">
                <div class="to">QUOTATION TO:</div>
                <h2 class="name">{{ucwords($data['name'])}}</h2>
                <div class="email"><a href="mailto:{{$data['email']}}">{{$data['email']}}</a></div>
            </div>
            <div id="invoice">
                <h1>Auto Quote </h1>
                <div class="date">Date of Quote: {{date('l jS \of F Y h:i:s A')}}</div>
            </div>
        </div>
        <table border="0" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th class="no">#</th>
                    <th class="desc">ITEM</th>
                    <th class="total">COST</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="no">01</td>
                    <td class="desc"><h3>Import Duty</h3>{{$import['import_duty_percent']}}% of the Custom Value</td>
                    <td class="total">{{number_format(money_format('%!i',$import['import_duty']), 2)}}</td>
                </tr>
                <tr>
                    <td class="no">02</td>
                    <td class="desc"><h3>Excise Duty</h3>{{$import['excise_duty_percent']}}% of the Excise Value</td>
                    <td class="total">{{number_format(money_format('%!i',$import['excise_duty']), 2)}}</td>
                </tr>
                <tr>
                    <td class="no">03</td>
                    <td class="desc"><h3>VAT</h3>{{$import['vat_percent']}}% of the VAT Value</td>
                    <td class="total">{{number_format(money_format('%!i',$import['vat']), 2)}}</td>
                </tr>
                <tr>
                    <td class="no">04</td>
                    <td class="desc"><h3>RDL</h3>{{$import['rdl_percent']}}% of the Custom Value</td>
                    <td class="total">{{number_format(money_format('%!i',$import['rdl']), 2)}}</td>
                </tr>
                <tr>
                    <td class="no">05</td>
                    <td class="desc"><h3>IDF Fees</h3>{{$import['idf_fees_percent']}}% of the Custom Value</td>
                    <td class="total">{{number_format(money_format('%!i',$import['idf_fees']), 2)}}</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <td >TAXES</td>
                    <td>KES {{number_format(money_format('%!i', $import['taxes']), 2)}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td >BUYING PRICE</td>
                    <td>KES {{number_format(money_format('%!i', $import['buying_price']), 2)}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td >GRAND TOTAL</td>
                    <td>KES {{number_format(money_format('%!i', $import['grand_total']), 2)}}</td>
                </tr>
            </tfoot>
        </table>
        <div id="thanks">Thank you!</div>
        <div id="notices">
            <div>NOTICE:</div>
            <div class="notice">Quote was created by an automated and is valid without the signature and seal.</div>
        </div>
    </main>
    <footer>
        Road Learner only provides estimates and is not liable for any losses incurred for using its services or otherwise.
    </footer>
</body>
</html>