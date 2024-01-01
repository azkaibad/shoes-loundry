
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>SoleSplash | {{ $title }}</title>
        <!-- Customized Bootstrap Stylesheet -->
    {{-- <link href="css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css"> --}}
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    {{-- <link href="css/style.css" rel="stylesheet"> --}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
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
                padding-bottom: 30px;
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

            #progressbar {
    margin-bottom: 3vh;
    overflow: hidden;
    color: #1363DF;
    padding-left: 0px;
    margin-top: 3vh
}

#progressbar li {
    list-style-type: none;
    font-size: x-small;
    width: 25%;
    float: left;
    position: relative;
    font-weight: 400;
    color: rgb(160, 159, 159);
}

#progressbar #step1:before {
    content: "";
    color: #1363DF;
    width: 5px;
    height: 5px;
    margin-left: 0px !important;
    /* padding-left: 11px !important */
}

#progressbar #step2:before {
    content: "";
    color: #fff;
    width: 5px;
    height: 5px;
    margin-left: 32%;
}

#progressbar #step3:before {
    content: "";
    color: #fff;
    width: 5px;
    height: 5px;
    margin-right: 32% ; 
    /* padding-right: 11px !important */
}

#progressbar #step4:before {
    content: "";
    color: #fff;
    width: 5px;
    height: 5px;
    margin-right: 0px !important;
    /* padding-right: 11px !important */
}

#progressbar li:before {
    line-height: 29px;
    display: block;
    font-size: 12px;
    background: #ddd;
    border-radius: 50%;
    margin: auto;
    z-index: -1;
    margin-bottom: 1vh;
}

#progressbar li:after {
    content: '';
    height: 2px;
    background: #ddd;
    position: absolute;
    left: 0%;
    right: 0%;
    margin-bottom: 2vh;
    top: 1px;
    z-index: 1;
}
.progress-track{
    padding: 0 8%;
}
#progressbar li:nth-child(2):after {
    margin-right: auto;
}

#progressbar li:nth-child(1):after {
    margin: auto;
}

#progressbar li:nth-child(3):after {
    float: left;
    width: 68%;
}
#progressbar li:nth-child(4):after {
    margin-left: auto;
    width: 132%;
}

#progressbar  li.active{
    color: black;
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: #1363DF;
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
									<img
										src="/dashboard/images/logos/logo.png"
										style="width: 100%; max-width: 300px"
									/>
								</td>

								<td>
									Invoice : {{ $pesanan->kode_pesanan }}<br />
									Created: {{ $pesanan->pick_up_date }}<br />
									Due: {{ $pesanan->delivery_date }}
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
									SoleSplash<br />
									Sadewa 3, <br />
									Pendrikan kidul, Semarang Tengah
								</td>

								<td>
									{{ $pesanan->name }}<br />
									{{ $pesanan->alamat }}<br />
									{{ $pesanan->no_telp }}
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Service</td>
					<td>Harga</td>
				</tr>

				<tr class="item">
					<td>{{ $pesanan->service->service_name }}</td>
					<td>{{ $pesanan->service->harga }}</td>
				</tr>

				<tr class="total">
					<td></td>

					<td>Total: {{ $pesanan->service->harga }}</td>
				</tr>

                {{-- <tr class="heading">
					<td>Status</td>

                    <td>{{ $pesanan->status}}</td>
				</tr> --}}

                
			</table>

            <div class="tracking">
                <div class="title">Tracking Order</div>
            </div>
            <div class="progress-track">
                <ul id="progressbar">
                    {{-- <li class="step0  {{ ($pesanan->status === 'pengambilan') ? 'active' : '' }}" id="step1">Pengambilan</li>
                    <li class="step0 text-center {{ ($pesanan->status === 'proses') ? 'active' : '' }}" id="step2">Proses</li>
                    <li class="step0 text-right {{ ($pesanan->status === 'pengiriman') ? 'active' : '' }}" id="step3">Pengiriman</li>
                    <li class="step0 text-right {{ ($pesanan->status === 'selesai') ? 'active' : '' }}" id="step4">Selesai</li> --}}
                    <li class="step0 {{ ($pesanan->status === 'tunggu_bayar' || $pesanan->status === 'pengambilan' || $pesanan->status === 'proses' || $pesanan->status === 'selesai') ? 'active' : '' }}" id="step1">Pengambilan</li>
                    <li class="step0 {{ ($pesanan->status === 'pengambilan' || $pesanan->status === 'proses' || $pesanan->status === 'selesai') ? 'active' : '' }} text-center" id="step2">Proses</li>
                    <li class="step0 {{ ($pesanan->status === 'proses' || $pesanan->status === 'selesai') ? 'active' : '' }} text-end" id="step3">Pengiriman</li>
                    <li class="step0 {{ ($pesanan->status === 'selesai') ? 'active' : '' }} text-end" id="step4">Selesai</li>
                </ul>

            </div>
		</div>
	</body>

</html>