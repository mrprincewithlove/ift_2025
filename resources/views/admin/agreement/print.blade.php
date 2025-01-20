<!DOCTYPE html>
<html>
<head>
    <title>{{$agreement->agreement_no}}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- <link rel="stylesheet" href="http://http://127.0.0.1:8000/public/ucp/dist/css/app.css"/> -->
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
            padding: 3px;
            border: 1px solid #eee;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 18px;
            font-family: 'Roboto', sans-serif;
            /* font-family: 'Arial'; */
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 2px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 2px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 20px;
            line-height: 20px;
            color: #333;
            text-align: center;
        }
        .invoice-box table tr.top table td.title2 {
            font-size: 14px;
            line-height: 14px;
            color: #333;
            text-align: center;
        }

        .invoice-box table tr.information table td {
            font-size: 12px;
            line-height: 14px;
            padding-bottom: 5px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 5px;
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
            font-family: 'Roboto', sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
        .page-break {
            page-break-after: always;
        }
    </style>
	</head>

	<body>
		<div class="invoice-box"> 
            
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="4">
						<table>
							<tr>
								<td class="title">
                                    HARYDYŇ ALUW-SATUW ŞERTNAMASY 
                                    {{ ' # ' . $agreement->agreement_no }} <br />									
								</td>
							</tr>
						</table>
					</td>
                </tr>
                <tr>                    
                    <td colspan="4">
						<table>
							<tr>
								<td class="title">
                                    {{ date("d-m-Y", strtotime( $agreement->date)) }}
								</td>

								<td>									
									ş.Aşganat                                    
								</td>
							</tr>
						</table>
					</td>
                </tr>
                <tr class="top">
					<td colspan="4">
						<table>
							<tr>
								<td class="title2">
                                    1. ŞERTNAMANYŇ TARAPLARY
								</td>
							</tr>
						</table>
					</td>
                </tr> 
				<tr class="information">
					<td colspan="4">
						<table>
							<tr>
								<td>
                                Bir tarapdan (TELEKEÇI) seriýa A № 0014762 patentiň, №0024588 03.11.2022ý. berlen bellige alyş şahadatnamanyň esasynda hereket edýän telekeçi Toýtyýew Baýramnazar Amangeldiýewiç, 
                                beýleki tarapdan (KARZ-ALYJY) <strong>{{ $client->surname . ' ' . $client->name . ' ' . $client->father_name }} </strong>, <strong>{{ $client->pasport_number }} </strong> belgili pasport <strong>{{ date("d-m-Y", strtotime( $client->pasport_given_at ))}}</strong> senesinde, 
                                <strong>{{ $client->pasport_given_by }}</strong> tarapyndan berlen, <strong>{{ $client->p_street . ', ' . $client->p_corpus . ', ' . $client->p_apartment . ', ' . $client->p_door}} </strong> salgy boýunça ýazgyda duran, telefon belgisi <strong>{{ $client->mobile }}</strong>
								</td>
							</tr>
						</table>
					</td>
				</tr>
                <tr class="top">
					<td colspan="4">
						<table>
							<tr>
								<td class="title2">
                                    2. ŞERTNAMANYŇ MAZMUNY
								</td>
							</tr>
						</table>
					</td>
                </tr>
                <tr class="information">
					<td colspan="4">
						<table>
							<tr>
								<td>
                                    TELEKEÇI harytlary şu Şertnamada bellenilen şertlerde KARZ-ALYJA karzyna berýär.
								</td>
							</tr>
						</table>
					</td>
				</tr> 
                <tr class="top">
					<td colspan="4">
						<table>
							<tr>
								<td class="title2">
                                    3.KARZ BERMEGIŇ ŞERTLERI
								</td>
							</tr>
						</table>
					</td>
                </tr>
                <tr class="information">
					<td colspan="4">
						<table>
							<tr>
								<td>
                                    TELEKEÇI  harytlaryny <strong>{{ $agreement_type->period_month }}</strong> aý möhlet bilen, <strong>{{ date("d-m-Y", strtotime( $invoices->first()->date))}}</strong> başlap,  <strong>{{ date("d-m-Y", strtotime( $invoices->last()->date ))}}</strong> çenli  garaşaryna berýär. 
                                    Hasaplaşyklar şertnamanyň baglaşylan pursatyndaky hereket edýän baha boýunça amala aşyrylýar, bahalaryň soňky üýtgemelerinde täzeden hasaplamaklyk milli manadyň hümmeti Türkmenistanyň merkezi banky tarapyndan üýtgedilen halatlarynda ABŞ dollarynyň kursuna görä ýerine ýetiriler. </br>
                                    KARZ-ALYJY tarapyndan karzy üzmeklik <strong>{{ $agreement_type->period_month }}</strong> aýyň dowamynda, her aýda ( <strong>{{ $invoices->last()->price}} manat </strong>) nagt we nagt däl görnüşinde </br>
                                    Ulanylan we gaby açylan haryt yzyna alynmaýar.
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr class="top">
					<td colspan="4">
						<table>
							<tr>
								<td class="title2">
                                    4. ŞERTNAMANYŇ HEREKET EDIŞ MÖHLETI
								</td>
							</tr>
						</table>
					</td>
                </tr>
                <tr class="information">
					<td colspan="4">
						<table>
							<tr>
								<td>
                                    Şu Şertnama iki nusgada düzülip taraplar harydy sanap we hil taýdan barlap gol çeken pursatyndan güýje girýär we karz doly tölenýänçä güýjini saklaýar.
								</td>
							</tr>
						</table>
					</td>
				</tr>
                <tr class="top">
					<td colspan="4">
						<table>
							<tr>
								<td class="title2">
                                    5. JEDELLERI ÇÖZMEGIŇ TERTIBI
								</td>
							</tr>
						</table>
					</td>
                </tr> 
                <tr class="information">
					<td colspan="4">
						<table>
							<tr>
								<td>
                                    Şu Şertnama boýunça KARZ-ALYJY bilen jedeller dörän halatynda Taraplar şol jedelleri özara gepleşikleri geçirmek arkaly çözmek boýunça ähli çäreleri görerler. Taraplaryň şol jedelleri özara çözüp bilmedik ýagdaýynda Türkmenistanda hereket edýän 
                                    kanunçylyk esasynda çözülmelidir.
								</td>
							</tr>
						</table>
					</td>
				</tr>
                <tr class="top">
					<td colspan="4">
						<table>
							<tr>
								<td class="title2">
                                    6. ŞU ŞERTNAMA BOÝUNÇA HARYTLARYŇ MAZMUNY WE NYRH YLALAŞYGY.
								</td>
							</tr>
						</table>
					</td>
                </tr> 				
				<tr class="heading">
                    <td>{{ __('translates.action') }}</td>
                    <td>{{ __('translates.quantity') }}</td>
                    <td>{{ __('translates.price') }}</td>
                    <td>{{ __('translates.total') }}</td>
				</tr>
                @php $sum = 0; @endphp
                @foreach($agreementProducts as $prod)
                    <tr class="item">
                        <td>{{ $prod->product->name }}</td>
                        <td>{{ $prod->quantity }}</td>
                        <td>{{ $prod->unit_price . 'tmt'}}</td>
                        <td>{{ number_format($prod->total_price, 0, '.', ' ') . 'tmt'}}</td>
                        @php $sum = $sum + $prod->total_price; @endphp
                    </tr>			
                @endforeach
				<tr class="total">
					<td></td>
					<td></td>
					<td></td>

					<td>{{ __('translates.total') . ' : ' . number_format($sum, 0, '.', ' ') . 'tmt' }}</td>
				</tr> 
                @if($agreement_type->discount_percent > 0)
                    <tr class="total">
                        <td></td>
                        <td></td>
                        <td colspan="2" style="text-align:right"> {{ $agreement_type->discount_percent . '% Ýeňillikli ' . __('translates.total') . ' : ' . number_format($agreement->agreement_price, 0, '.', ' ') . 'tmt' }} </td>					
                    </tr>
                @endif
                <tr class="top">
					<td colspan="4">
						<table>
							<tr>
								<td class="title2">
                                    7. TARAPLARYŇ HUKUK SALGYLARY									
								</td>
							</tr>
						</table>
					</td>
                </tr>
                <tr class="information" style="font-size: 12px; line-height: 14px;">
                    <td colspan="2"> 
                        SATYJY </br>
                        Telekeçi: Toýtyýew B.A </br>
                        PTB "Senagat" , "Dostluk" şah. ş.Aşgabat</br>
                        H/h 23 206 934 170 769 000 296 000 </br>
                        K/h 21 101 934 110 100 200 000 000 </br>
                        MFO 390 101 707 </br>
                        S/k 206 122 504 021 </br>
                        Tel: 46-82-90; +993 65 95 96 36; +993 62 23 39 43
                    </td>

                    <td colspan="2">
                        ALYJY</br>
                        {{ $client->surname . ' ' . $client->name . ' ' . $client->father_name }} </br>
                        {{ $client->pasport_number }} belgili pasport {{ date("d-m-Y", strtotime( $client->pasport_given_at ))}} senesinde, 
                            {{ $client->pasport_given_by }} tarapyndan berlen </br>
                        Salgysy: {{ $client->p_street . ', ' . $client->p_corpus . ', ' . $client->p_apartment . ', ' . $client->p_door}} </br>
                        Telefon belgisi {{ $client->mobile }}
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
						<table>
							<tr>
								<td colspan="2" class="title2">
                                    Satyş hünärmeni _________________________									
								</td>
                                <td colspan="2" class="title2">
                                    Goly _____________________________									
								</td>
							</tr>
						</table>
					</td>
                </tr>
			</table>
            <!-- new page -->
            <div class="page-break"></div>
            <table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="4">
						<table>
							<tr>
								<td class="title">
                                    HARYDYŇ ŞERTNAMA DEGIŞLI TÖLEG TABLITSASY                                    								
								</td>
							</tr>
						</table>
					</td>
                </tr>
                <tr>                    
                    <td colspan="4">
						<table>
							<tr>
								<td class="title">
                                    {{ date("d-m-Y", strtotime( $agreement->date)) }}
								</td>

								<td>									
                                    Şertnama{{ ' # ' . $agreement->agreement_no }}                                   
								</td>
							</tr>
						</table>
					</td>
                </tr>
                <tr class="heading">
                    <td>Tölege degişli aýlar</td>
                    <td>Degişli töleg</td>
                    <td>Edilen töleg</td>
                    <td>Galan bergi</td>
				</tr>
                @php $sum = 0;  @endphp
                @foreach($invoices as $inv)
                    <tr class="item">
                        <td>{{ ($inv->status == 'prepayment') ? 'Öňünden töleg' : date("d-m-Y", strtotime( $inv->date))  }}</td>
                        <td>{{ ($inv->status != 'prepayment') ? $inv->price . 'tmt' : '' }}</td>
                        <td>{{ ($inv->status == 'prepayment') ? number_format($inv->price, 0, '.', ' ') . 'tmt' : '' }}</td>
                        <td></td>
                        @php if ($inv->status != 'prepayment') $sum = $sum + $inv->price; @endphp
                    </tr>			
                @endforeach
				<tr class="total">
					<td></td>
					<td>{{ __('translates.total') . ' : ' . number_format($sum, 0, '.', ' ') . 'tmt' }}</td>
					<td>{{ number_format($agreement->prepayment, 0, '.', ' ') . 'tmt' }}</td>

					<!-- <td>{{ __('translates.total') . ' : ' .  $agreement->agreement_price - $agreement->prepayment . 'tmt' }}</td> -->
					<td>{{ __('translates.total') . ' : ' . number_format($agreement->agreement_price - $agreement->prepayment, 0, '.', ' ') . 'tmt' }}</td>
				</tr> 
                <tr></tr>
                <tr>
                    <td colspan="4">
						<table>
							<tr>
								<td colspan="2" class="title2">
                                    Satyş hünärmeni _________________________									
								</td>
                                <td colspan="2" class="title2">
                                    Goly _____________________________									
								</td>
							</tr>
						</table>
					</td>
                </tr>
            </table>
		</div>
	
    </body>
</html>