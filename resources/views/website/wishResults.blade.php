
<div class="nav-cart-item clearfix" id="{{ $wish->id }}">
    <div class="nav-cart-item-image">
        <a href="{{url('/category/'.$wish->product()->first()->category->category_slug.'/'.$wish->product()->first()->product_slug)}}"><img src="{{asset('storage/public/products/'.$wish->product()->first()->default_image)}}" alt="product"></a>
    </div>
    <div class="nav-cart-item-desc">
        <a href="{{url('/category/'.$wish->product()->first()->category->category_slug.'/'.$wish->product_slug)}}">{{$wish->product()->first()->name}}</a>
        <span class="nav-cart-item-price" ><strong id="q{{$wish->product()->first()->id}}">{{$wish->quantity}}</strong> <span id="p{{$wish->id}}"> x $ {{($wish->product()->first()->offer !== 0)?$wish->product()->first()->offer:$wish->product()->first()->price}}</span></span>
        <form action="{{route('wishlist.destroy',$wish->id)}}" method="post" id="delCart">
        	<input type="hidden" name="_method" value="DELETE">
        	<input type="hidden" name="_token" value="{{csrf_token()}}">
        	<button   class="nav-cart-item-quantity" id="cartDel" data-id="{{ $wish->id }}" style="border:none;float: right;">x</button>
        </form>
        
    </div>
</div>
