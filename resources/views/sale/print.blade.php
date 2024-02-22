<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>POS Bill</title>
    <style>
        body{
            background: rgb(232, 232, 232);
            font-size: 15px;
            font-family: "Helvetica";
        }
        .main{
            width: 80mm;
            background: #fff;
            overflow: hidden;
            margin: 0px auto;
            padding: 10px;
        }
        .logo{
            width: 100%;
            overflow: hidden;
            height: 130px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .logo img{
            width:80%;
        }
        .header p{
            margin: 2px 0px;
        }
        .content{
            overflow: hidden;
            width: 100%;
        }
        .content table{
            width: 100%;
            border-collapse: collapse;
        }

        .bg-dark{
            background: black;
            color:#ffff;
        }

        .text-left{
            text-align: left !important;
        }
        .text-right{
            text-align: right !important;
        }
        .text-center{
            text-align: center !important;
        }
        .area-title{

            font-size: 18px;
        }
        tr.bottom-border {
            border-bottom: 1px solid #ccc; /* Add a 1px solid border at the bottom of rows with the "my-class" class */
        }
        .uppercase{
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <div class="main" id="main">
        <div style="text-align: center;">
            <img style="width:100%;margin:0 auto;height:100px;" src="{{ asset('assets/images/header.jpg') }}" alt="">
         </div>
        <div class="header">
           {{--  <p class="text-center"><strong>081-2502481</strong></p>
            <p class="text-center"><strong>Fatima Jinnah Road Near Bugti Gali Zarghoon Plaza Quetta</strong></strong></p> --}}
            <div class="area-title">
                <p class="text-center bg-dark">Sale Receipt</p>
            </div>
            <table>
                <tr>
                    <td width="15%">Bill # </td>
                    <td width="35%"> {{ $invoice->id }}</td>
                    <td width="15%">Date: </td>
                    <td width="35%"> {{ date("d-m-Y", strtotime($invoice->date)) }}</td>
                    {{-- <td width="15%"> Ref # </td>
                    <td width="55%"> {{ $sale->referenceNo }}</td> --}}
                </tr>
                <tr>
                    <td width="15%"> Customer: </td>
                    <td width="55%" colspan="3">
                        @if (@$invoice->customer_account->title)
                        {{ @$invoice->customer_account->title }} ({{ @$invoice->customer_account->type }})
                    @else
                        {{ $invoice->walking }} (Walk In)
                    @endif</td>
                </tr>
            </table>
        </div>
        <div class="content">
            <table>
                <thead class="bg-dark">
                    <tr>
                        <th class="text-left" colspan="4">Description</th>
                    </tr>
                    <tr>
                        <th class="text-left">Qty</th>
                        <th class="text-left">Price</th>
                        <th class="text-left">Dis</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                        $items = 0;
                        $qty = 0;
                        $discount = 0;
                    @endphp
                   @foreach ($details as $item)
                   @php
                       $price = $item->price - $item->discount;
                       $total += $price * $item->qty;
                       $items += 1;
                       $qty += $item->qty;
                       $discount += $item->discount; 
                   @endphp
                            <tr>
                                <td colspan="4" class="uppercase">{{ $item->product->name }}</td>
                            </tr>
                            <tr class="bottom-border">
                                <td >{{ $item->qty }}</td>
                                <td>{{ round($item->price, 0) }}</td>
                                <td>{{ round($item->discount, 0) }}</td>
                                <td class="text-right">{{ round($price * $item->qty,0)}}</td>
                            </tr>
                   @endforeach
                   <tr>
                    <td>
                        <td colspan="1">Total Discount</td>
                        <td class="text-left">{{$discount}}</td>
                    </td>
                   </tr>
                   <tr>
                    <td colspan="3">
                        Item(s) = {{ $items }} |
                        Total Quantity = {{ $qty }}
                    </td>
                    <td colspan="3" class="text-right" style="font-size: 18px"><strong>{{ number_format($total,0) }}</strong></td>
                   </tr>
                   @if ($invoice->discount > 0)
                   <tr>
                    <td colspan="3" class="text-right">Discount:</td>
                    <td colspan="3" class="text-right">{{ number_format($invoice->discount,0) }}</td>
                   </tr>
                   <tr>
                    <td colspan="3" class="text-right">Net Amount:</td>
                    <td colspan="3" class="text-right" style="font-size: 20px"><strong>{{ number_format($total - $invoice->discount, 0) }}</strong></td>
                   </tr> 
                   @endif
                   @if ($invoice->isPaid != "Yes")
                   <tr>
                    <td colspan="3" class="text-right">Paid:</td>
                    <td colspan="3" class="text-right" style="font-size: 15px">{{ number_format($invoice->amount,0) }}</td>
                   </tr>
                   <tr>
                    <td colspan="3" class="text-right">Remaining:</td>
                    <td colspan="3" class="text-right" style="font-size: 15px"><strong>{{ number_format(($total - $invoice->discount) - $invoice->amount, 0) }}</strong></td>
                   </tr>
                   @endif
                </tbody>
            </table>
        </div>
        <div class="notes">
            <p>Printed By: {{auth()->user()->name}}</p>
            {{-- <h5>خریدا ہوا مال واپس نہیں ہو گا۔</h5>
            <h5>چینج ہو گا 5 دن میں۔</h5> --}}
            <span>{{ $invoice->desc }}</span>
            <hr>
            <h5 class="text-center">Thank your for your business</h5>
            <p class="text-center">Goods once sold will not be returned without bill and barcode label. No warranty will be claimed for imported items. No warrenty will be claimed for defected / dameged items. No returns and Exchange after 10 days</p>
        </div>
        <div class="footer">
            <hr>
            <h5 class="text-center">Developed by Diamond Software <br> diamondsoftwarequetta.com </h5>
        </div>
    </div>
</body>
@php
    if($target == 'pos')
    {
        $url = "/pos";
    }
    else
    {
        $url = "/sale/history";
    }
@endphp
</html>
<script src="{{ asset('src/plugins/src/jquery-ui/jquery-ui.min.js') }}"></script>
<script>
setTimeout(function() {
    window.print();
    }, 2000);

        setTimeout(function() {
            window.location.href = "{{ url($url)}}";
    }, 5000);

</script>
