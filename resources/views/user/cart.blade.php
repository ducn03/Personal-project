@extends('user.layout.layout')
@section('title', 'Shop')
@section('content')

    <nav class="container animate-box">
        <br>
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <span>Become our customer</span>
                    <h2>Shopping Cart.</h2>
                    <p>
                        Here everything's better.</p>
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table id="cart" class="table table-hover">
            <thead>
                <tr>
                    <th style="width:50%">Product</th>
                    <th style="width:10%">Price</th>
                    <th style="width:10%">Quantity</th>
                    <th style="width:12%" class="text-center">Subtotal</th>
                    <th style="width:18%"></th>
                </tr>
            </thead>
            <tbody>

                <?php $total = 0; ?>

                @if (session('cart'))
                    @foreach (session('cart') as $id => $details)
                        <?php $total += $details['price'] * $details['quantity']; ?>

                        <tr>
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-sm-3 hidden-xs"><img
                                            src="{{ url('asset/admin/images/product/' . $details['image']) }}"
                                            width="100" height="100" /></div>
                                    <div class="col-sm-9">
                                        <h4 class="nomargin">{{ $details['name'] }}</h4>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price">${{ $details['price'] }}</td>
                            <td data-th="Quantity">
                                <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity"
                                    min="1" max="100"
                                    oninput="this.value = !!this.value && Math.abs(this.value) >= 1 && Math.abs(this.value) <= 100 ? Math.abs(this.value) : null" />
                            </td>
                            <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}
                            </td>
                            <td class="actions" data-th="">
                                <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i
                                        class="update_cart ti-save"></i></button>
                                <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i
                                        class="remove_cart ti-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                @endif

            </tbody>
            <tfoot>
                <tr class="visible-xs">
                    <td class="text-center"><strong>Total {{ $total }}</strong></td>
                </tr>
                <tr>
                    <td><a href="{{ url('/') }}" class="continue_shopping_cart"><i class="ti-left"></i>
                            Continue Shopping</a></td>
                    <td colspan="2" class="hidden-xs"></td>
                    <td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>
                </tr>
            </tfoot>
        </table>

    </nav>

    <!--checkOut-->
    <div class="container">
        <div style="border-bottom:1px solid"></div><br>
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <span>Become our customer</span>
                    <h2>Order.</h2>
                    <p>
                        Here everything's better.</p>
                </div>
            </div>
        </div>
        <form action="{{ url('/storeOrder') }}" method="POST">
            @csrf
            <div class="row">

                @if (session('user_2'))
                    <input type="hidden" name="member_id" id="member_id" value="{{ session('user_2')->id }}">
                @endif

                @php
                    use Carbon\Carbon;
                    // date_default_timezone_set('Asia/Saigon');
                    $mytime = Carbon::now();
                    $disable = session('cart') ? '' : 'disabled';
                @endphp

                <input type="hidden" name="date" id="date" value="{{ $mytime }}">
                <input type="hidden" value="{{ $total }}" name="total_amount" id="total_amount">
                @if (session('user_2'))
                    <div class="col-md-6 text-center animate-box">
                        Name <input class="form-control" type="text" name="name" id="name"
                            value="{{ session('user_2')->fullname }}" readonly>
                    </div>
                    <div class="col-md-6 text-center animate-box">
                        Email <input class="form-control" type="text" name="shipping_email" id="shipping_email"
                            value="{{ session('user_2')->email }}" readonly></div>
                @else
                    <div class="col-md-6 text-center animate-box">
                        Name <input class="form-control" type="text" name="name" id="name" value=""
                            required>
                    </div>
                    <div class="col-md-6 text-center animate-box">
                        Email <input class="form-control" type="text" name="shipping_email" id="shipping_email"
                            value="" required></div>
                @endif

                <div class="col-md-6
                            text-center animate-box">
                    Address <input class="form-control" type="text" name="shipping_address" id="shipping_address"
                        required>
                </div>
                <div class="col-md-6 text-center animate-box">
                    Phone <input class="form-control" type="text" name="phone" id="phone" required>
                </div>
                <div class="col-md-12 text-center animate-box">
                    Note
                    <textarea class="form-control" rows="5" name="note" id="note" value="no notes"></textarea>
                </div>
                <div class="col-md-12 text-center animate-box">

                </div>

                <div class="text-center">
                    <h3>Payment methods</h3>
                    <input name="payment_term" id="payment_term" type="radio" value="0" checked> cash payment
                    &nbsp&nbsp&nbsp
                    <input name="payment_term" id="payment_term" type="radio" value="1"> online paying
                    <br>
                    <h3>Total</h3>
                    Total: ${{ $total }}
                    <br><br>
                    <button class="btn btn-primary" {{ $disable }}>Pay</button>
                </div><br>
            </div>
        </form>

    </div>


@endsection
@section('script-section')
    <script type="text/javascript">
        $(".update-cart").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: "{{ url('/update-cart') }}",
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Are you sure")) {
                $.ajax({
                    url: "{{ url('/remove-from-cart') }}",
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.attr("data-id")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endsection
