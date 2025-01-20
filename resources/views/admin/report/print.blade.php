<!DOCTYPE html>
<html>
<head>
    <title>{{$invoice->invoice_no}}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 400;
            src: url('{{ public_path('ucp/dist/fonts/roboto/Roboto-Regular.ttf') }}') format('truetype');
        }
        body {
            font-family: 'Roboto';
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Roboto', sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
	</head>

	<body>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
                                    MENZIL DÜKANY
									<!-- <img
										src="https://sparksuite.github.io/simple-html-invoice-template/images/logo.png"
										style="width: 100%; max-width: 300px"
									/> -->
								</td>

								<td>
									{{ __('translates.invoice') . ' # ' . ' : ' . $invoice->invoice_no }} <br />
									{{ __('translates.created') . ' : ' . date("d-m-Y", strtotime( $invoice->date)) }}<br />
									{{ __('translates.due') . ' : ' . date("d-m-Y", strtotime("+1 month", strtotime( $invoice->date))) }}
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
                                    {{ __('translates.agreement') . ' # ' . ' : ' . $agreement->agreement_no }}<br />
									{{ __('translates.Payments to end agreement') . ' : ' . $agreement->price_to_pay . 'tmt' }}<br />
									{{ __('translates.agreement_type') . ' : ' . $agreement->agreement_type->{'name_'.app()->currentLocale()}  }}
								</td>

								<td>
									{{ $client->surname . ' ' . $client->name }}<br />
									{{ $client->father_name }}
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<!-- <tr class="heading">
					<td>Payment Method</td>

					<td>Check #</td>
				</tr>

				<tr class="details">
					<td>Check</td>

					<td>1000</td>
				</tr> -->

				<tr class="heading">
                    <td>{{ __('translates.action') }}</td>

                    <td>{{ __('translates.price') }}</td>
				</tr>

				<tr class="item">
                    <td>{{ __('translates.invocie_action') }}</td>

                    <td>{{ $invoice->price . 'tmt'}}</td>
				</tr>			

				<tr class="total">
					<td></td>

					<td>{{ __('translates.total') . ' : ' .  $invoice->price . 'tmt' }}</td>
				</tr>
			</table>
		</div>
	
    </body>
</html>