// FAQs Accordion
document.addEventListener( 'DOMContentLoaded', function() {
	const faqItems = document.querySelectorAll( '.faq-item' );

	faqItems.forEach( function( faqItem ) {
		const faqQuestion = faqItem.querySelector( '.faq-question' );
		const faqAnswer = faqItem.querySelector( '.faq-answer' );

		faqQuestion.addEventListener( 'click', function() {
			const isActive = faqItem.classList.contains( 'active' );

			// Close all other FAQ items
			faqItems.forEach( function( item ) {
				if ( item !== faqItem ) {
					item.classList.remove( 'active' );
					const answer = item.querySelector( '.faq-answer' );
					answer.style.maxHeight = '0px';
					answer.style.opacity = '0';
				}
			} );

			// Toggle current FAQ item
			if ( isActive ) {
				faqItem.classList.remove( 'active' );
				faqAnswer.style.maxHeight = '0px';
				faqAnswer.style.opacity = '0';
			} else {
				faqItem.classList.add( 'active' );
				// Remove any max-height constraint and let it fit content naturally
				faqAnswer.style.maxHeight = 'none';
				faqAnswer.style.opacity = '1';
			}
		} );

		// Handle keyboard navigation
		faqQuestion.addEventListener( 'keydown', function( e ) {
			if ( e.key === 'Enter' || e.key === ' ' ) {
				e.preventDefault();
				faqQuestion.click();
			}
		} );

		// Set initial state for active items
		if ( faqItem.classList.contains( 'active' ) ) {
			faqAnswer.style.maxHeight = 'none';
			faqAnswer.style.opacity = '1';
		}
	} );

	// Handle window resize to recalculate heights
	window.addEventListener( 'resize', function() {
		const activeFaq = document.querySelector( '.faq-item.active' );
		if ( activeFaq ) {
			const activeAnswer = activeFaq.querySelector( '.faq-answer' );
			activeAnswer.style.maxHeight = 'none';
		}
	} );

	// COMMENTED OUT - Auto-scroll functionality removed
	/*
    // Add smooth scroll to active FAQ if it's not in viewport
    function scrollToActiveFaq() {
        const activeFaq = document.querySelector('.faq-item.active');
        if (activeFaq) {
            const rect = activeFaq.getBoundingClientRect();
            const isInViewport = rect.top >= 0 && rect.bottom <= window.innerHeight;

            if (!isInViewport) {
                activeFaq.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }
        }
    }

    // Call scroll function after a short delay to ensure smooth animation
    setTimeout(scrollToActiveFaq, 100);
    */
} );
