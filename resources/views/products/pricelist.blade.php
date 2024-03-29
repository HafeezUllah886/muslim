<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Price List</title>
    <style>

        body {
            -webkit-print-color-adjust: exact;
            background-color: #F6F6F6;
            margin: 0;
            padding: 0;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 0;
            padding: 0;
        }

        p {
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            margin-right: auto;
            margin-left: auto;
        }

        .brand-section {
            background-color: #114d89;
            padding: 10px 40px;
        }

        .logo {
            width: 50%;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .col-6 {
            width: 50%;
            flex: 0 0 auto;
        }

        .text-white {
            color: #fff;
        }

        .company-details {
            float: right;
            text-align: right;
        }

        .body-section {
            padding: 16px;
          /*   border-left: 2px solid #898811;
            border-right: 2px solid #898811; */

        }

        .body-section1 {
            background-color: #114d89;
            color: white;
            border-radius: 4px;
        }

        .heading {
            font-size: 20px;
            margin-bottom: 08px;
        }

        .sub-heading {
            color: #262626;
            margin-bottom: 05px;
        }

        table {
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }

        table thead tr {
            border: 1px solid #111;
            background-color: #f2f2f2;
        }

        table td {
            vertical-align: middle !important;
            text-align: center;
           
        }

        table th,
        table td {
            padding-top: 0px;
            padding-bottom: 0px;
        }

        /* .table-bordered {
            box-shadow: 0px 0px 5px 0.5px gray;
        } */

        .table-bordered td,
        .table-bordered th {
            border: 1px solid #114d89;
        }

        .text-right {
            text-align: end;
            padding-right: 3px;
            ;
        }

        .w-20 {
            width: 10%;
        }

        .w-15 {
            width: 22%;
        }

        .w-5 {
            width: 5%;
        }

        .w-10 {
            width: 18%;
        }

        .float-right {
            float: right;
        }

        .container1 {
          /*   border: 2px solid #898811; */
            color: #ffffff;
            height: 90px;
            border-radius: 6px;
        }

        .sub-container {
            background-color: #114d89;
            ;
            margin: 5px;
            padding-bottom: 2px;
            display: flex;
            height: 78px;
            border-radius: 6px;


        }

        .m-query1 {
            font-size: 22px;
        }

        .m-query2 {
            font-size: 11px;
        }

        img {
            margin-top: -36px;
            padding: 2px;
            width: 92%;
            height: 148px;
            margin-left: 2px;

        }

        .text1 {
            text-align: center;
            width: 70%;
            padding-top: 11px;
        }

        .qoute {
            width: 21%;
            margin: auto;
            text-align: center;
            background-color: #114d89;
            color: white;
            border-radius: 5px;
            font-size: 12px;
        }

        @media screen and (max-width: 1014px) {
            .m-query1 {
                margin-top: 6PX;
                font-size: 28px;
            }

            .m-query2 {
                font-size: 11px;
            }
        }

        @media screen and (max-width: 900px) {
            .m-query1 {
                font-size: 24px;
            }

            .m-query2 {
                font-size: 14px;
            }

            img {
                width: 99%;
                height: 171%;
                margin-top: -50px;
                margin-left: 8px;
            }
        }

        .div3 {}

        #myDiv {
            width: 128px;
            font-size: 18px;
            margin-top: 19px;
        }

        .dot {
            height: 60px;
            width: 65px;
            background-color: #114d89;
            color: white;
            /* color: #b80000; */
            border-radius: 50%;
            display: inline-block;
            border: 5px solid white;
            margin: -14px;
            margin-left: 7px;
            text-align: center;
        }
        .urdu{
        font-family: "Jameel Noori Nastaleeq" !important;
      
    }
    </style>
</head>

<body>

    <div class="container">
       
        <img style="margin:0;width:100%;height:100px;" src="{{ asset('assets/images/header.jpg') }}" alt="">
        <center><h2 class="text-center">Price List</h2></center>
        <div class="body-section" style="padding:0px;">
            
            <div class="row">
                <div class="col-12" style="width:100%;">
                    
                    <table style="width:100%;">
                        <tr style="width:100%;">
                            <td style="width:30%;">
                                <h4 style="text-align: left; padding:0px 10px;" class="text-dark">Print Date: {{ date('d M Y') }}</h4>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="body-section">
            <!-- <h3 class="heading">Ordered Items</h3>
            <br> -->
            <table class="table-bordered" style="font-size: 15px">
                <thead>
                    <tr style="background-color: #114d89;color:#fff;">
                        <th >#</th>
                        <th colspan="2">Product</th>
                        <th >Brand</th>
                        <th >Bike</th>
                        <th >Model</th>
                        <th >Price</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($products as $key => $product)
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td style="text-align:left;">{{ $product->name }}</td>
                            <td style="text-align:right;" class="urdu">{{ $product->urdu }}</td>
                            <td>{{ $product->brand }}</td>
                            <td>{{ $product->bike }}</td>
                            <td>{{ $product->model }}</td>
                            <td>{{ $product->price }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

      {{--  <div class="body-section body-section1">
            <p style="text-align: center; font-size:25px;" class="urdu">نوٹ: بل میں کمی پیشی کی صورت میں 5 دن کے اندر اطلاع دیں۔
            </p>
        </div>  --}}
    </div>
    <div style="text-align: right; margin-right:10px;">
        <div class="mt-2" style="font-size: 10px; ">Powered by Diamond Software - Diamondsoftwareqta.com</p>
        </div>
</body>

</html>
<script>
    window.print();

        setTimeout(function() {
        window.location.href = "{{ url('/products')}}";
    }, 5000);

</script>