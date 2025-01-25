<!-- filepath: /c:/xampp/htdocs/My Project/assigment-e-coomerce-laravel/e-commerce-001/resources/views/livewire/home.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Comforts</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/ada978dc6b.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Featured Section Slider -->
    <section class="py-12 relative">
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
                    <div class="swiper-slide bg-white shadow-2xl rounded-lg p-4 text-center">
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
                    @endforeach
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var swiper = new Swiper('.swiper-container', {
                slidesPerView: 1,
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
</body>
</html>