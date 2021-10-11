<template>
    <table id="cart" class="table table-hover table-condensed">

        <thead>

            <tr>

                <th style="width:50%">Product</th>

                <th style="width:10%">Price</th>

                <th style="width:8%">Quantity</th>

                <th style="width:22%" class="text-center">Subtotal</th>

                <th style="width:10%"></th>

            </tr>

        </thead>

        <tbody>

            <!-- @php $total = 0 @endphp

            @if(session('cart'))

                @foreach(session('cart') as $id => $details)

                    @php $total += $details['price'] * $details['quantity'] @endphp -->

                    <tr data-id="">

                        <td data-th="Product">

                            <div class="row">

                                <div class="col-sm-3 hidden-xs"><img src="" width="100" height="100" class="img-responsive"/></div>

                                <div class="col-sm-9">

                                    <h4 class="nomargin"></h4>

                                </div>

                            </div>

                        </td>

                        <td data-th="Price"></td>

                        <td data-th="Quantity">

                            <input type="number" value="" class="form-control quantity update-cart" />

                        </td>

                        <td data-th="Subtotal" class="text-center"></td>

                        <td class="actions" data-th="">

                            <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>

                        </td>

                    </tr>

                <!-- @endforeach

            @endif -->

        </tbody>

        <tfoot>

            <tr>

                <td colspan="5" class="text-right"><h3><strong>Total</strong></h3></td>

            </tr>

            <tr>

                <td colspan="5" class="text-right">

                    <a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>

                    <button class="btn btn-success">Checkout</button>

                </td>

            </tr>

        </tfoot>

    </table>
</template>

<script>
export default {
    name: 'Cart',

}
</script>

<style>

</style>