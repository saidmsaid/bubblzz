
<div class="nav-cart-item clearfix" id="{{ $carts->id }}">
    <div class="nav-cart-item-image">
        <a href="{{url('/category/'.$carts->product()->first()->category->category_slug.'/'.$carts->product()->first()->product_slug)}}"><img src="{{asset('storage/public/products/'.$carts->product()->first()->default_image)}}" alt="product"></a>
    </div>
    <div class="nav-cart-item-desc">
        <a href="{{url('/category/'.$carts->product()->first()->category->category_slug.'/'.$carts->product()->first()->product_slug)}}">{{$carts->product()->first()->name}}</a>
        <span class="nav-cart-item-price" ><strong id="q{{$carts->product()->first()->id}}">{{$carts->quantity}}</strong> <span id="p{{$carts->id}}"> x EGP {{($carts->product()->first()->offer != 0)?$carts->product()->first()->offer:$carts->product()->first()->price}}</span></span>
        <form action="{{route('cart.destroy',$carts->id)}}" method="post" id="delCart">
        	<input type="hidden" name="_method" value="DELETE">
        	<input type="hidden" name="_token" value="{{csrf_token()}}">
        	<button   class="nav-cart-item-quantity" id="cartDel" data-id="{{ $carts->id }}" style="border:none;float: right;color:#ff65ad">x</button>
        </form>
        
    </div>
</div>
