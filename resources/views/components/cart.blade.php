

    <!-- Start Shopping Cart Modal -->
    <div class="modal right fade shoppingCartModal" id="shoppingCartModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                <div class="modal-body">
                    <h3> {{ $report->count() }} </h3>

                    <div class="product-cart-content">
                        @foreach($report as $cart)
                            <div class="product-cart">
                                <div class="product-image">
                                    <img src="{{ asset('assets/'.$cart->product->photo)  }}" alt="image">
                                </div>

                                <div class="product-content">
                                    <h3>
                                        <a href="{{ route('site.home') }}">{{ $cart->product->title }}</a>
                                    </h3>
                                    <div class="product-price">
                                        <span>{{ $cart->quantity }}</span>
                                        <span>x</span>
                                        <span class="price">
                                            {{ $cart->product->price }}
                                        </span>
                                    </div>


                                </div>
                            </div>
                        @endforeach

                    </div>

                    <div class="product-cart-subtotal">
                            <span>
                                المجموع الكلي :
                                {{ $price }}
                            </span>

                    </div>

                    <div class="product-cart-btn">
                        <a href="#" class="btn btn-primary">اتمام الدفع</a>
                        <a href="{{ route('site.cart.index') }}" class="btn btn-light">عرض السلة</a>
                        <a href="{{ route('site.cart.delete-all') }}" class="btn btn-danger mt-2">حذف الكل</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shopping Cart Modal -->


