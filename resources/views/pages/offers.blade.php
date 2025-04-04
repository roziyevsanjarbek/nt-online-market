@props(['parentCategories', 'productsMenu','$newArrivalProductFruits','$newArrivalProductSpicesAndSnacks','discount_name','discount_price'])
@yield('content')
<x-header title="Online Market"></x-header>


<!-- Loader -->
<div
    class="bb-loader min-w-full w-full h-screen fixed top-[0] left-[0] flex items-center justify-center bg-[#fff] z-[45]">
    <img src="assets/img/logo/loader.png" alt="loader" class="absolute">
    <span class="loader w-[60px] h-[60px] relative"></span>
</div>

<!-- Header -->

<x-navbar :parentCategories="$parentCategories" :productsMenu="$productsMenu"></x-navbar>


<!-- Breadcrumb -->
<section class="section-breadcrumb mb-[50px] max-[1199px]:mb-[35px] border-b-[1px] border-solid border-[#eee] bg-[#f8f8fb]">
    <div class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
        <div class="flex flex-wrap w-full">
            <div class="w-full px-[12px]">
                <div class="flex flex-wrap w-full bb-breadcrumb-inner m-[0] py-[20px] items-center">
                    <div class="min-[768px]:w-[50%] min-[576px]:w-full w-full px-[12px]">
                        <h2 class="bb-breadcrumb-title font-quicksand tracking-[0.03rem] leading-[1.2] text-[16px] font-bold text-[#3d4750] max-[767px]:text-center max-[767px]:mb-[10px]">Best Offers</h2>
                    </div>
                    <div class="min-[768px]:w-[50%] min-[576px]:w-full w-full px-[12px]">
                        <ul class="bb-breadcrumb-list mx-[-5px] flex justify-end max-[767px]:justify-center">
                            <li class="bb-breadcrumb-item text-[14px] font-normal px-[5px]"><a href="index.html" class="font-Poppins text-[14px] leading-[28px] tracking-[0.03rem] font-semibold text-[#686e7d]">Home</a></li>
                            <li class="text-[14px] font-normal px-[5px]"><i class="ri-arrow-right-double-fill text-[14px] font-semibold leading-[28px]"></i></li>
                            <li class="bb-breadcrumb-item font-Poppins text-[#686e7d] text-[14px] leading-[28px] font-normal tracking-[0.03rem] px-[5px] active">Offers</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-deal overflow-hidden py-[50px] max-[1199px]:py-[35px]">
    <div class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
        <div class="flex flex-wrap w-full">
            <div class="w-full px-[12px]">
                <div class="section-title bb-deal mb-[20px] pb-[20px] z-[5] relative flex justify-between max-[991px]:pb-[0] max-[991px]:flex-col max-[991px]:justify-center max-[991px]:text-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="section-detail max-[991px]:mb-[12px]">
                        <h2 class="bb-title font-quicksand mb-[0] p-[0] text-[25px] font-bold text-[#3d4750] relative inline capitalize leading-[1] tracking-[0.03rem] max-[767px]:text-[23px]">{{$discount_name}}</span></h2>
                        <p class="font-Poppins max-w-[400px] mt-[10px] text-[14px] text-[#686e7d] leading-[18px] font-light tracking-[0.03rem] max-[991px]:mx-[auto]">Don't wait. The time will never be just right.</p>
                    </div>
                    <div id="dealend" class="dealend-timer"></div>
                </div>
            </div>
            <div class="w-full px-[12px] bb-deal-block owl-carousel">
                @foreach ($products as $product)
                    <div class="bb-deal-card p-[12px]" data-product-id="{{ $product->id }}" data-aos="fade-up" data-aos-duration="100" data-aos-delay="200">
                        <!-- Mahsulot ma'lumotlari -->
                        <div class="bb-pro-box bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[20px]">
                            <div
                                class="bb-pro-img overflow-hidden relative border-b-[1px] border-solid border-[#eee] z-[4]">
                                        <span
                                            class="flags transition-all duration-[0.3s] ease-in-out absolute z-[5] top-[10px] left-[6px]">
                                            <span class="text-[14px] text-[#777] font-medium uppercase">New</span>
                                        </span>
                                <a href="javascript:void(0)">
                                    <div
                                        class="inner-img relative block overflow-hidden pointer-events-none rounded-t-[20px]">
                                        <img class="main-img transition-all duration-[0.3s] ease-in-out w-full"
                                             src="assets/img/product/1.jpg" alt="product-1">
                                        <img
                                            class="hover-img transition-all duration-[0.3s] ease-in-out absolute z-[2] top-[0] left-[0] opacity-[0] w-full"
                                            src="assets/img/product/back-1.jpg" alt="product-1">
                                    </div>
                                </a>
                                <ul class="bb-pro-actions transition-all duration-[0.3s] ease-in-out my-[0] mx-[auto] absolute z-[9] left-[0] right-[0] bottom-[0] flex flex-row items-center justify-center opacity-[0]">
                                    <li class="bb-btn-group transition-all duration-[0.3s] ease-in-out w-[35px] h-[35px] mx-[2px] flex items-center justify-center bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[10px]">
                                        <a href="javascript:void(0)" title="Wishlist"
                                           class="w-[35px] h-[35px] flex items-center justify-center">
                                            <i class="ri-heart-line text-[18px] leading-[10px]"></i>

                                        </a>
                                    </li>
                                    <li class="bb-btn-group transition-all duration-[0.3s] ease-in-out w-[35px] h-[35px] mx-[2px] flex items-center justify-center bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[10px]">
                                        <a href="javascript:void(0)" title="Quick View"
                                           class="bb-modal-toggle w-[35px] h-[35px] flex items-center justify-center">
                                            <i class="ri-eye-line transition-all duration-[0.3s] ease-in-out text-[18px] text-[#777] leading-[10px]"></i>
                                        </a>
                                    </li>
                                    <li class="bb-btn-group transition-all duration-[0.3s] ease-in-out w-[35px] h-[35px] mx-[2px] flex items-center justify-center bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[10px]">
                                        <a href="compare.html" title="Compare"
                                           class="w-[35px] h-[35px] flex items-center justify-center">
                                            <i class="ri-repeat-line transition-all duration-[0.3s] ease-in-out text-[18px] text-[#777] leading-[10px]"></i>
                                        </a>
                                    </li>
                                    <li class="bb-btn-group transition-all duration-[0.3s] ease-in-out w-[35px] h-[35px] mx-[2px] flex items-center justify-center bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[10px]">
                                        <a href="javascript:void(0)" title="Add To Cart"
                                           class="w-[35px] h-[35px] flex items-center justify-center">
                                            <i class="ri-shopping-bag-4-line transition-all duration-[0.3s] ease-in-out text-[18px] text-[#777] leading-[10px]"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="bb-pro-contact p-[20px]">
                                <div class="bb-pro-subtitle mb-[8px] flex flex-wrap justify-between">
                                    <a href="/filter?products[]={{$product->name}}"
                                       class="transition-all duration-[0.3s] ease-in-out font-Poppins text-[13px] leading-[16px] text-[#777] font-light tracking-[0.03rem]">
                                        {{ $product->category->name }}
                                    </a>
                                    <span class="bb-pro-rating">
                                                <i class="ri-star-fill float-left text-[15px] mr-[3px] leading-[18px] text-[#fea99a]"></i>
                                                <i class="ri-star-fill float-left text-[15px] mr-[3px] leading-[18px] text-[#fea99a]"></i>
                                                <i class="ri-star-fill float-left text-[15px] mr-[3px] leading-[18px] text-[#fea99a]"></i>
                                                <i class="ri-star-fill float-left text-[15px] mr-[3px] leading-[18px] text-[#fea99a]"></i>
                                                <i class="ri-star-line float-left text-[15px] mr-[3px] leading-[18px] text-[#777]"></i>
                                            </span>
                                </div>
                                <h4 class="bb-pro-title mb-[8px] text-[16px] leading-[18px]">
                                    <a href="/filter?products[]={{$product->category->name}}"
                                       class="transition-all duration-[0.3s] ease-in-out font-quicksand w-full block whitespace-nowrap overflow-hidden text-ellipsis text-[15px] leading-[18px] text-[#3d4750] font-semibold tracking-[0.03rem]">
                                        {{$product->name}}
                                    </a>
                                </h4>
                                <div class="bb-price flex flex-wrap justify-between">
                                    <div class="inner-price mx-[-3px]">
                                            <span
                                                class="new-price px-[3px] text-[16px] text-[#686e7d] font-bold">${{$discount_price}}</span>
                                        <span
                                            class="old-price px-[3px] text-[14px] text-[#686e7d] line-through">${{$product->sale_price }}</span>
                                    </div>
                                    <span class="last-items text-[14px] text-[#686e7d]">{{ $product->volume->name }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>



</section>
<!-- Footer -->
<x-footer></x-footer>
<!-- Cart sidebar -->
<x-cart-sidebar></x-cart-sidebar>
<!-- Category Popup -->
<x-category-popup :categories="$categories" :products="$products"></x-category-popup>
<!-- Quick view Modal -->
<x-quick-view-modal></x-quick-view-modal>
<!-- Newsletter Modal -->
<x-newsletter-modal></x-newsletter-modal>
<!-- Tools Sidebar -->
<x-tools-sidebar></x-tools-sidebar>
<!-- Back to top  -->
<x-back-to-top></x-back-to-top>
<!-- Plugins -->
<x-plugins></x-plugins>

</body>
</html>
