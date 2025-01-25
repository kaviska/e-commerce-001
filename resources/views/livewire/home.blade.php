{{-- add liware navigation compoment --}}

<div>


<!-- Welcome Banner -->
<?php if (isset($_SESSION['welcome_message'])): ?>
    <div class="bg-[#001952] text-white text-sm sm:text-base font-semibold py-2 tracking-wider text-center" style="font-family: 'League Spartan', sans-serif;">
        <?php echo $_SESSION['welcome_message']; ?>
    </div>
    <?php unset($_SESSION['welcome_message']);?>
<?php endif; ?>


<!--Promo Banner -->
<div class="flex items-center justify-center text-red-700 font-bold py-2 tracking-widest text-base sm:text-lg md:text-xl lg:text-2xl">
    Free Standard delivery on orders over 10,000 LKR
</div>

<!-- Main Banner Section -->
<section class="relative bg-blue-100 ">
    <img src="{{ asset('assets/images/doggo-banner.jpg') }}" alt="Main Banner" class="w-full h-[50vh] sm:h-[60vh] md:h-[70vh] lg:h-[90vh] object-cover">
    
    <div class="absolute inset-0 flex items-center justify-center sm:justify-end sm:pr-8 md:pr-12 lg:pr-16">
        <div class="text-center sm:text-center">
            <h2 class="text-3xl sm:text-4xl md:text-6xl lg:text-8xl text-black tracking-wider" style="font-family: 'Fredericka the Great', cursive;">
                EXTRA 15% OFF <br> SITEWIDE!
            </h2>
            <p class="text-lg sm:text-xl md:text-2xl text-[#FF3131] mt-2" style="font-family: 'Archivo Black', sans-serif;">
                USE CODE: SAVE15
            </p>
        </div>
    </div>
</section>



<!-- Bestsellers Section -->
<section class="my-12 relative  py-12">
    <div class="container mx-auto mt-20 px-4">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-semibold text-[#001952] tracking-widest" style="font-family: 'League Spartan', sans-serif;">
                OUR BESTSELLERS
            </h2>
            <a href="#" class="text-sm text-black-1000 flex items-center font-bold hover:underline shadow-2xl tracking-wide -mb-8">
                View All
                <i class="fas fa-chevron-right ml-2"></i>
            </a>
        </div>
        <hr class="border-t-2 border-gray-300 mb-6">
        
        <!-- Swiper Slider -->
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($bestSellingProducts as $product)

                <div class="swiper-slide bg-white shadow-2xl w-[100px] my-10 rounded-lg p-4 text-center">
                <a href="{{ url('/product/'.$product->id) }}">

                    <img src="{{ asset('assets/images/'.$product->image) }}" alt="{{ $product->name }}" class="mx-auto w-32 h-48 object-contain mb-4 pb-4">
                    <div class="w-4/5 border-b-2 border-gray-300 mx-auto"></div>
                    <h3 class="text-lg tracking-wide font-medium text-[#001952]" style="font-family: 'Cabin Condensed', sans-serif;">
                        {{ $product->name }}
                    </h3>
                    <p class="text-[#001952] my-2">
                        @for ($i = 0; $i < $product->rating; $i++)
                            <i class="fa-solid fa-star"></i>
                        @endfor
                        @for ($i = 0; $i < 5 - $product->rating; $i++)
                            <i class="fa-regular fa-star"></i>
                        @endfor
                    </p>
                    <p class="text-[#CC690F] text-2xl font-semibold" style="font-family: 'League Spartan', sans-serif;">
                        {{ $product->price }} LKR
                    </p>
                </a>

                </div>
                @endforeach
            </div>

            <!-- Navigation Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</section>

<!-- Promo Section -->
<div class="container mx-auto px-4">
    <img src="{{asset('assets/images/promo.png')}}" alt="Product 3" 
     class="mx-auto w-full h-auto object-contain  sm:w-full sm:h-auto md:w-full md:h-auto lg:w-full lg:h-[70vh] xl:w-full xl:h-[80vh] mt-12 mb-12 pb-4">
</div>




<!-- Featured Section Slider -->
<section class="py-12 my-10 relative ">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-semibold text-[#001952] tracking-widest" style="font-family: 'League Spartan', sans-serif;">FEATURED ITEMS</h2>
            <a href="#" class="text-sm text-black-1000 flex items-center font-bold hover:underline shadow-2xl tracking-wide -mb-8">
                View All
                <i class="fas fa-chevron-right ml-2"></i>
            </a>
        </div>
        <hr class="border-t-2 border-gray-300 mb-6">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($featuredProducts as $product)
                <div class="swiper-slide bg-white shadow-2xl my-20 rounded-lg p-4 text-center ">
                <a href="{{ url('/product/'.$product->id) }}">

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
            </a>
               
                </div>
                @endforeach
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</section>
<style>
    .swiper-container {
    width: 100%;
    overflow: hidden;
}

.swiper-wrapper {
    display: flex;
}

.swiper-slide {
    flex-shrink: 0;
    width: auto;
}

</style>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 3,
            spaceBetween: 10,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 50,
                },
            },
        });
    });
</script>

</div>

<script>
    
</script>