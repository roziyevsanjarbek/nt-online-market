@extends('layouts.app')

@section('title', 'Best Offers')

@props([
    'parentCategories',
    'productsMenu',
    'newArrivalProductFruits',
    'newArrivalProductSpicesAndSnacks',
    'discount_name',
    'discount_price' => null,
    'products',
    'categories',
    'discounts',
])

@section('content')
    <x-header title="Online Market" />

    <!-- Loader -->
    <div class="bb-loader w-full h-screen fixed top-0 left-0 flex items-center justify-center bg-white z-50">
        <img src="{{ asset('assets/img/logo/loader.png') }}" alt="loader" class="absolute">
        <span class="loader w-15 h-15 relative"></span>
    </div>

    <!-- Navbar -->
    <x-navbar :parentCategories="$parentCategories" :productsMenu="$productsMenu" />

    <!-- Breadcrumb -->
    <section class="section-breadcrumb mb-[50px] max-[1199px]:mb-[35px] border-b border-[#eee] bg-[#f8f8fb]">
        <div class="container mx-auto px-[12px]">
            <div class="flex flex-wrap w-full py-[20px] items-center">
                <div class="min-[768px]:w-1/2 w-full">
                    <h2 class="text-lg font-bold text-[#3d4750] max-[767px]:text-center max-[767px]:mb-[10px]">Best Offers</h2>
                </div>
                <div class="min-[768px]:w-1/2 w-full">
                    <ul class="flex justify-end max-[767px]:justify-center text-sm text-[#686e7d]">
                        <li><a href="/" class="font-semibold">Home</a></li>
                        <li class="px-[5px]"><i class="ri-arrow-right-double-fill"></i></li>
                        <li>Offers</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Offer Section -->
    <section class="section-deal py-[50px] max-[1199px]:py-[35px]">
        <div class="container mx-auto px-[12px]">
            <div class="mb-[20px] pb-[20px] flex justify-between flex-col md:flex-row text-center md:text-left">
                <div>
                    <h2 class="text-2xl font-bold text-[#3d4750]">{{ $discount_name }}</h2>
                    <p class="mt-2 text-sm text-[#686e7d]">Don't wait. The time will never be just right.</p>
                </div>
                <div id="dealend" class="dealend-timer mt-4 md:mt-0"></div>
            </div>

            @if ($products->isNotEmpty())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach ($products as $product)
                        @php
                            $activeDiscount = $product->discounts->first();
                            $originalPrice = $product->sale_price;
                            $discountAmount = $activeDiscount ? ($originalPrice * ($activeDiscount->discount_price / 100)) : 0;
                            $finalPrice = $originalPrice - $discountAmount;
                        @endphp

                        <div class="bg-white border border-[#eee] rounded-[20px] overflow-hidden" data-product-id="{{ $product->id }}">
                            <!-- Product Image -->
                            <div class="relative border-b border-[#eee] group">
                                <span class="absolute top-2 left-2 bg-white px-2 py-1 text-xs font-medium text-[#777] rounded">New</span>
                                @if($activeDiscount)
                                    <span class="absolute top-2 right-2 bg-red-500 px-2 py-1 text-xs font-medium text-white rounded">-{{ $activeDiscount->discount_price }}%</span>
                                @endif
                                <a href="javascript:void(0)">
                                    <div class="relative overflow-hidden rounded-t-[20px]">
                                        <img class="w-full" src="{{ asset('assets/img/product/1.jpg') }}" alt="{{ $product->name }}">
                                        <img class="absolute top-0 left-0 w-full opacity-0 group-hover:opacity-100 transition" src="{{ asset('assets/img/product/back-1.jpg') }}" alt="{{ $product->name }}">
                                    </div>
                                </a>
                                <!-- Actions -->
                                <ul class="absolute bottom-2 left-0 right-0 flex justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                                    <li><a href="#" title="Wishlist" class="btn-icon"><i class="ri-heart-line"></i></a></li>
                                    <li><a href="#" title="Quick View" class="btn-icon bb-modal-toggle"><i class="ri-eye-line"></i></a></li>
                                    <li><a href="compare.html" title="Compare" class="btn-icon"><i class="ri-repeat-line"></i></a></li>
                                    <li><a href="#" title="Add To Cart" class="btn-icon"><i class="ri-shopping-bag-4-line"></i></a></li>
                                </ul>
                            </div>

                            <!-- Product Info -->
                            <div class="p-5">
                                <div class="flex justify-between mb-2 text-sm text-[#777]">
                                    <a href="/filter?products[]={{ $product->category->name }}">{{ $product->category->name }}</a>
                                    <span class="text-yellow-400">
                                        @for ($i = 0; $i < 4; $i++)
                                            <i class="ri-star-fill"></i>
                                        @endfor
                                        <i class="ri-star-line text-[#777]"></i>
                                    </span>
                                </div>
                                <h4 class="text-[#3d4750] font-semibold text-sm truncate">
                                    <a href="/filter?products[]={{ $product->category->name }}">{{ $product->name }}</a>
                                </h4>
                                <div class="flex justify-between items-center mt-2">
                                    <div class="text-sm font-bold text-[#686e7d]">
                                        ${{ number_format($finalPrice, 2) }}
                                        @if($activeDiscount)
                                            <span class="line-through text-xs ml-1">${{ number_format($originalPrice, 2) }}</span>
                                        @endif
                                    </div>
                                    <span class="text-sm text-[#686e7d]">{{ $product->volume->name }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-[#686e7d]">No discounted products available at the moment.</p>
            @endif
        </div>
    </section>

    <!-- Footer va boshqa komponentlar -->
    <x-footer />
    <x-cart-sidebar />
    <x-category-popup :categories="$categories" :products="$products" />
    <x-quick-view-modal />
    <x-newsletter-modal />
    <x-tools-sidebar />
    <x-back-to-top />
    <x-plugins />
@endsection
