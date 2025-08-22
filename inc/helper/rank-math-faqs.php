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
			// Add icon elements to questions
			$('.rank-math-question').each(function() {
				if (!$(this).find('.rank-math-question-icon').length) {
					$(this).append('<div class="rank-math-question-icon"><svg class="icon-plus" width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M8 3.33334V12.6667" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M3.33334 8H12.6667" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><svg class="icon-minus" width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3.33334 8H12.6667" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>');
				}
			});
			
			// Hide all answers initially
			$('.rank-math-block').find('.rank-math-answer').hide();
			
			// Set first FAQ as active by default
			$('.rank-math-list-item:first-of-type').find('.rank-math-question').addClass('collapse');
			$('.rank-math-list-item:first-of-type').find('.rank-math-answer').addClass('collapse').css('display', 'block');
			$('.rank-math-list-item:first-of-type').addClass('faq-active');
			
			// Handle FAQ question clicks
			$('.rank-math-block').find('.rank-math-question').click(function () {  
				var $this = $(this);
				var $answer = $this.nextAll('.rank-math-answer').eq(0);
				var $listItem = $this.closest('.rank-math-list-item');
				
				// Toggle current answer
				if ($answer.hasClass('collapse')) {
					// Close current answer
					$answer.removeClass('collapse').slideUp('fast');
					$listItem.removeClass('faq-active');
				} else {
					// Open current answer
					$answer.addClass('collapse').slideDown('fast');
					$listItem.addClass('faq-active');
				}
				
				// Close other answers
				$('.rank-math-answer').not($answer).removeClass('collapse').slideUp('fast');
				$('.rank-math-list-item').not($listItem).removeClass('faq-active');
			});

			// Handle FAQ question state management
			$('.rank-math-block .rank-math-question').click(function () {
				var $this = $(this);
				var $listItem = $this.closest('.rank-math-list-item');
				
				// Remove active state from other questions
				$('.rank-math-block .rank-math-question').not($this).removeClass('collapse');
				$('.rank-math-list-item').not($listItem).removeClass('faq-active');

				// Toggle current question state
				if ($this.hasClass('collapse')) {
					$this.removeClass('collapse');
					$listItem.removeClass('faq-active');
				} else {
					$this.addClass('collapse');
					$listItem.addClass('faq-active');
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