@extends('layouts.admin')

@section('css')
@endsection

@section('content')
<style type="text/css">
.carousel{
    box-shadow: 0 0 20px;
}
.card1{
    display: flex;
    justify-content: space-around;
}
</style>

<main id="controller" class="container border">

<div class="row">
    <!-------------------------- card makanan -------------------------------->
<div class="col-md-8 py-5">

  <div class="row">
    @foreach($transactions as $tran)
    <div class="card-deck mt-2" style="max-width: 15rem;" >
    <button type="button" class="btn btn-outline-primary" a href="{{ route('add_to_cart', $tran->id) }}">
        <img src="{{ url($tran->file) }}" class="card-img-top mt-2" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{ $tran->name }}</h5>
        <p>Rp.{{ $tran->price }},</p>
    </div>
    </button>
  </div>
  @endforeach
  </div>


  </div>
<!-- aside -->
    <div class="col-md-4 py-5">
    <div class="card" style="width: 18rem;">
        <div class="card-header">
        <h5 class="text-center">PESANAN</h5>
        </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <!-- cart -->
            <table id="cart" class="table table-hover table-condensed">
                <thead>
                <tr>
                    <th style="width:50%">Product</th>
                    <th style="width:8%">Quantity</th>
                    <th style="width:10%">Price</th>
                </tr>
                </thead>
                <tbody>
                    @php $total = 0 @endphp
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                        @php $total += $details['price'] * $details['quantity'] @endphp
                        <tr data-id="{{ $id }}">
                        <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{ asset('img') }}/{{ $details['photo'] }}" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['name'] }}</h4>
                            </div>
                        </div>
                        </td>
                        <td data-th="Price">${{ $details['price'] }}</td>
                        <td data-th="Quantity">
                            <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity cart_update" min="1" />
                        </td>
                        <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                        <td class="actions" data-th="">
                            <button class="btn btn-danger btn-sm cart_remove"><i class="fa fa-trash-o"></i> Delete</button>
                        </td>
                        </tr>
                        @endforeach
                        @endif
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5" class="text-right"><h3><strong>Total ${{ $total }}</strong></h3></td>
                    </tr>
                </tfoot>
            </table>
            <!-- end cart -->

        </li>

        <li class="list-group-item">
            <div class="d-grid gap-2">
            <button class="btn btn-outline-danger" type="button">Clear Cart</button>
            </div>
        </li>
        <li class="list-group-item">
            <div class="d-grid gap-2 d-md-block text-center">
            <button class="btn btn-primary" style="--bs-btn-padding-x: 32px;" type="button">Save Bill</button>
            <button class="btn btn-primary" style="--bs-btn-padding-x: 32px;" type="button">Print Bill</button>
            </div>
        </li>
        <li class="list-group-item">
            <div class="d-grid gap-2">
            <button class="btn btn-primary" type="button">Charge</button>
            </div>
        </li>
    </ul>
    </div>
    </div>

  
</div>

</main>
@endsection

@section('js')
<script type="text/javascript">
   
    $(".cart_update").change(function (e) {
        e.preventDefault();
   
        var ele = $(this);
   
        $.ajax({
            url: '{{ route('update_cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
   
    $(".cart_remove").click(function (e) {
        e.preventDefault();
   
        var ele = $(this);
   
        if(confirm("Do you really want to remove?")) {
            $.ajax({
                url: '{{ route('remove_from_cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
   
</script>
@endsection