(function () {
  let swiperBestellers = new Swiper(".swiper-bestsellers", {
    slidesPerView: 3,
    //slidesPerColumn: 3,
    spaceBetween: 10,
    pagination: {
      el: ".swiper-pagination-bestsellers",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next-bestsellers",
      prevEl: ".swiper-button-prev-bestsellers",
    },
  });

  let swiperBrands = new Swiper(".swiper-brands", {
    slidesPerView: 3,
    //slidesPerColumn: 3,
    spaceBetween: 10,
    pagination: {
      el: ".swiper-pagination-brands",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next-brands",
      prevEl: ".swiper-button-prev-brands",
    },
  });
})();
