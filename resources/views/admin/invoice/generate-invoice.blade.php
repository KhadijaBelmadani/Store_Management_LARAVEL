<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Facture #{{ $order->id }}</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            /* background-color: #2874f0; */
            color: black;

        }
        /* .trend{
                fonnt:-family:
            } */
    </style>
</head>
<body>

    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2" class="trend">
                    TrendTrove
                    {{-- <img src="admin/images/nvlogo.png" style="width: 155px;height:70px"/> --}}
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    <span>Facture Id: #{{ $order->id }}</span> <br>
                    <span>Date: {{ date('d/m/Y') }}</span> <br>
                    <span>Code postal : {{ $order->codepostal }}</span> <br>
                    <span>Address: {{ $order->address }}</span> <br>
                </th>
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="2">Détails de la Commande</th>
                <th width="50%" colspan="2">Détails d'utilisateur</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Id Commande:</td>
                <td>{{ $order->id }}</td>

                <td>Le nom Complet :</td>
                <td>{{ $order->fullName }}</td>
            </tr>
            <tr>
                <td>Numéro du colis suivis:</td>
                <td>{{ $order->traking_mo }}</td>

                <td>Email:</td>
                <td>{{ $order->email }}</td>
            </tr>
            <tr>
                <td>Date de Commande:</td>
                <td>{{ $order->created_at->format('d-m-Y h:i A') }}</td>

                <td>Phone:</td>
                <td>{{ $order->phone }}</td>
            </tr>
            <tr>
                <td>Mode de Payement:</td>
                <td>{{ $order->payment_mode }}</td>

                <td>Address:</td>
                <td>{{ $order->address }}</td>
            </tr>
            <tr>
                <td>L'état de la Commande:</td>
                <td>{{ $order->Status_message }}</td>

                <td>Le code postal:</td>
                <td>{{ $order->codepostal }}</td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <td class="no-border text-start heading" colspan="5">
                    Les produits de La Commande:
                </td>
            </tr>
            <tr class="bg-blue">
                <th>ID</th>
                {{-- <th>Image</th> --}}
                <th>Produit</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
                            @php
                                $totalPrice = 0;
                            @endphp

                            @foreach ($order->orderItems as $orderItem )
                                <tr>
                                    <td>{{ $orderItem->id}}</td>
                                    {{-- <td>
                                        @if ($orderItem->product->productImages)
                                        <img src="{{ asset($orderItem->product->productImages[0]->Image) }}"
                                        style="width: 50px; height: 50px" alt="">
                                        @else
                                        <img src="" style="width: 50px; height: 50px" alt="">
                                        @endif

                                    </td> --}}
                                    <td>{{ $orderItem->product->Nom }}</td>
                                    <td>{{ $orderItem->Prix}} Dh</td>
                                    <td>{{ $orderItem->Quantité}}</td>
                                    <td class="fw-bold">{{ $orderItem->Quantité * $orderItem->Prix}} Dh</td>
                                    @php
                                        $totalPrice += $orderItem->Quantité * $orderItem->Prix;
                                    @endphp

                                </tr>

                            @endforeach
                            <tr>
                                <td colspan="4"  style="font-size:20px;font-weight:bold" class=" total-heading text-center">Le Prix Total:</td>
                                <td colspan="1"   class="total-heading fw-bold">{{ $totalPrice }} Dh</td>
                            </tr>
        </tbody>
    </table>

    <br>
    <p class="text-center ">
        Merci pour votre achat chez trendTrove
        {{-- <br> <img src="{{ asset('admin/images/nvlogo.png') }}" style="width: 155px;height:70px"/> --}}
    </p>

</body>
</html>
