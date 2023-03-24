$('.personal-slider').slick({
	slidesToShow: 1,
	infinite: true,
	arrows: false,
	draggable: false
});
$('.personal a[data-slide]').click(function(e) {
   e.preventDefault();
   var slideno = $(this).data('slide');
   $('.personal-slider').slick('slickGoTo', slideno);
 });

$('.personal-slider').on('beforeChange', function(event,slick,currentSlide, nextSlide){
	$('.personal a[data-slide="'+nextSlide+'"]').addClass("active");
	$('.personal a[data-slide="'+currentSlide+'"]').removeClass("active");
});