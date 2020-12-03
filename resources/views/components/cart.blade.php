

    <!-- Start Shopping Cart Modal -->
    <div class="modal right fade shoppingCartModal" id="shoppingCartModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                <div class="modal-body">

                    <div class="product-cart-content">
                        @foreach($report as $cart)
                            <div class="product-cart">
                                <a href="{{ route('site.products.show',$cart->product->id) }}">
                                    <div class="product-image">
                                        <img src="{{ asset('assets/'.$cart->product->photo)  }}" alt="image">
                                    </div>
                                </a>


                                <div class="product-content">
                                    <h3>
                                        <a href="{{ route('site.products.show',$cart->product->id) }}">{{ $cart->product->title }}</a>
                                    </h3>



                                </div>
                            </div>
                        @endforeach

                    </div>



                    <div class="product-cart-btn">
                        <a href="{{ route('site.cart.index') }}" class="btn btn-light">عرض الكل</a>
                        <a href="{{ route('site.cart.delete-all') }}" class="btn btn-danger mt-2">حذف الكل</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shopping Cart Modal -->


