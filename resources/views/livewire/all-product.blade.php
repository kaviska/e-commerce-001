<div class="flex gap-12 items-center mx-48 my-8 flex-wrap">    
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    @foreach($products as $product)
   
    <a href="{{ url('/product/' . $product->id) }}">
    <div class="swiper-slide bg-white shadow-2xl w-[400px] rounded-lg p-4 text-center">
        <img src="{{ asset('assets/images/'.$product->image) }}" alt="{{ $product->name }}" class="mx-auto w-32 h-48 object-contain mb-4 pb-4">
        <div class="w-4/5 border-b-2 border-gray-300 mx-auto"></div>
        <h3 class="text-lg tracking-wide font-medium text-[#001952]" style="font-family: 'Cabin Condensed', sans-serif;">{{ $product->name }}</h3>
        <p class="text-[#001952] my-2">
            @for ($i = 0; $i < $product->rating; $i++)
                <i class="fa-solid fa-star"></i>
            @endfor
            @for ($i = 0; $i < 5 - $product->rating; $i++)
                <i class="fa-regular fa-star"></i>
            @endfor
        </p>
        <p class="text-[#CC690F] text-2xl font-semibold" style="font-family: 'League Spartan', sans-serif;">{{ $product->price }} LKR</p>
    </div>
</a>
    @endforeach
</div>
