<style>
    .svgInject{
        width: 20px;
    }
</style>
<div class="header-action-icon-2">
    <a href="{{route('shop.wishList')}}">
        <img class="svgInject" alt="wishList" src="{{asset('assets/imgs/theme/icons/icon-heart.svg')}}">
        @if(Cart::instance('wishlist')->count()>0)
            <span class="pro-count blue">{{Cart::instance('wishlist')->count()}}</span>
        @endif
    </a>
</div>
