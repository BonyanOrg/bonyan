<?php
/**
 * Convert Rank Math FAQ Block Into Accordion
 */
function turn_rm_faq_to_accordion() {
	?>
<script>
(function ($) {

	var rankMath = {
		accordion: function () {
			$('.rank-math-block').find('.rank-math-answer').hide();
			$('.rank-math-list-item:first-of-type').find('.rank-math-question').addClass('collapse');
			$('.rank-math-list-item:first-of-type').find('.rank-math-answer').addClass('collapse').css('display', 'block');
			$('.rank-math-list-item:first-of-type').find('.rank-math-answer').parent().addClass('faq-active');
			
			$('.rank-math-block').find('.rank-math-question').click(function () {  
				//Expand or collapse this panel
				$(this).nextAll('.rank-math-answer').eq(0).slideToggle('fast', function () {
					if ($(this).hasClass('collapse')) {
						$(this).removeClass('collapse');
					}
					else {
						$(this).addClass('collapse');
					}
				});
				//Hide the other panels
				$(".rank-math-answer").not($(this).nextAll('.rank-math-answer').eq(0)).slideUp('fast');
			});

			$('.rank-math-block .rank-math-question').click(function () {
				$('.rank-math-block .rank-math-question').not($(this)).removeClass('collapse');
				$('.rank-math-list-item').removeClass('faq-active');

				if ($(this).hasClass('collapse')) {
					$(this).removeClass('collapse');
					$(this).parent().removeClass('faq-active');
				}
				else {
					$(this).addClass('collapse');
					$(this).parent().addClass('faq-active');
				}
			});
		}
	};

	rankMath.accordion();

})(jQuery);
</script>
	<?php
}
add_action( 'wp_footer', 'turn_rm_faq_to_accordion' );