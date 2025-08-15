/**
 * Hero Donation Form Functionality
 * Handles donation type selection, amount selection, and form submission
 */

( function( $ ) {
	// Price configurations for each donation type
	const priceConfigs = {
		'one-time': {
			amounts: [ 60, 87, 120, 290 ],
			descriptions: {
				60: '$60 gift could provide emergency food supplies for a family in need.',
				87: '$87 gift could provide a family with a food parcel containing canned beans, hummus, olive oil, bottles of water and other essentials.',
				120: '$120 gift could provide clean water and sanitation supplies for a community.',
				290: '$290 gift could provide comprehensive emergency relief including food, water, and medical supplies.',
			},
		},
		monthly: {
			amounts: [ 25, 50, 100, 200 ],
			descriptions: {
				25: '$25 monthly could provide ongoing food support for a family in crisis.',
				50: '$50 monthly could provide consistent food parcels and essential supplies for a family.',
				100: '$100 monthly could provide sustainable water and sanitation solutions.',
				200: '$200 monthly could provide comprehensive ongoing support including food, water, medical care, and education.',
			},
		},
	};

	// Global variables to track selections
	let selectedDonationType = 'one-time';
	let selectedAmount = 87;

	// Initialize hero donation form
	function initHeroDonationForm() {
		const donationForm = $( '.hero-donation-form' );

		if ( donationForm.length === 0 ) {
			return;
		}

		// Remove existing event handlers to prevent duplicates
		$( document ).off( 'click', '.donation-type-btn' );
		$( document ).off( 'click', '.amount-btn' );
		$( document ).off( 'click', '.donate-now-btn' );
		$( '.custom-amount-field' ).off( 'input' );

		// Donation type selector - using event delegation
		$( document ).on( 'click', '.donation-type-btn', function( e ) {
			e.preventDefault();
			e.stopPropagation();

			const $this = $( this );
			const type = $this.data( 'type' );

			// Update active state
			$( '.donation-type-btn' ).removeClass( 'active' );
			$this.addClass( 'active' );

			// Update global variable
			selectedDonationType = type;

			// Update price buttons for the selected type
			updatePriceButtons( type );

			// Set first amount as active and update description
			const firstAmount = priceConfigs[ type ].amounts[ 0 ];
			selectedAmount = firstAmount;

			updateImpactDescription( type, firstAmount );
		} );

		// Amount selection - using event delegation
		$( document ).on( 'click', '.amount-btn', function( e ) {
			e.preventDefault();
			e.stopPropagation();

			const $this = $( this );
			const amount = $this.data( 'amount' );

			// Update active state
			$( '.amount-btn' ).removeClass( 'active' );
			$this.addClass( 'active' );

			// Update global variable
			selectedAmount = amount;

			// Update impact description based on current type and new amount
			const activeType = $( '.donation-type-btn.active' ).data( 'type' ) || 'one-time';
			updateImpactDescription( activeType, amount );

			// Clear custom amount field
			$( '.custom-amount-field' ).val( '' );
		} );

		// Custom amount input
		$( '.custom-amount-field' ).on( 'input', function() {
			const $this = $( this );
			const value = $this.val();

			// Remove non-numeric characters except decimal point
			const cleanValue = value.replace( /[^0-9.]/g, '' );
			$this.val( cleanValue );

			// Remove active state from preset amounts when custom amount is entered
			if ( cleanValue.length > 0 ) {
				$( '.amount-btn' ).removeClass( 'active' );
			}
		} );

		// Donate now button - using event delegation
		$( document ).on( 'click', '.donate-now-btn', function( e ) {
			e.preventDefault();
			e.stopPropagation();

			const $this = $( this );
			const target = $this.data( 'target' );
			const giveFormId = $this.data( 'giveformid' );

			// Validate form ID
			if ( ! giveFormId || giveFormId === '' ) {
				alert( 'Donation form is not properly configured. Please contact support.' );
				return;
			}

			// Get selected amount
			let finalAmount = '';
			const activeAmountBtn = $( '.amount-btn.active' );
			const customAmount = $( '.custom-amount-field' ).val();

			if ( activeAmountBtn.length > 0 ) {
				finalAmount = activeAmountBtn.data( 'amount' );
			} else if ( customAmount ) {
				finalAmount = customAmount;
			} else {
				finalAmount = selectedAmount;
			}

			// Validate amount
			if ( ! finalAmount || parseFloat( finalAmount ) <= 0 ) {
				alert( 'Please select or enter a valid donation amount.' );
				return;
			}

			// Handle donation based on target
			if ( target === 'givewp-modal' ) {
				// Open GiveWP modal with amount
				openGiveWPModal( giveFormId, finalAmount );
			} else if ( target === 'donation-modal' ) {
				// Open custom donation modal
				openDonationModal( finalAmount );
			}
		} );
	}

	// Update price buttons for the selected donation type
	function updatePriceButtons( type ) {
		const config = priceConfigs[ type ];
		const amountsContainer = $( '.donation-amounts' );

		// Clear existing buttons
		amountsContainer.empty();

		// Create new buttons for the selected type
		config.amounts.forEach( ( amount ) => {
			const button = $(
				`<button class="amount-btn" data-amount="${ amount }">$${ amount }</button>`
			);
			amountsContainer.append( button );
		} );

		// Set first amount as active
		$( `.amount-btn[data-amount="${ config.amounts[ 0 ] }"]` ).addClass( 'active' );
	}

	// Update impact description based on donation type and amount
	function updateImpactDescription( type = 'one-time', amount = 87 ) {
		const config = priceConfigs[ type ];
		const description =
      config.descriptions[ amount ] || config.descriptions[ config.amounts[ 0 ] ];
		$( '.impact-description p' ).text( description );
	}

	// Open GiveWP modal with amount - skip to step 3 (donation form) directly
	function openGiveWPModal( formId, amount ) {
		// Set the form data on the continue-as-guest button
		const continueAsGuest = document.querySelector( '.continue-as-guest' );
		if ( continueAsGuest ) {
			continueAsGuest.setAttribute( 'data-giveformid', formId );
			continueAsGuest.setAttribute( 'data-amount', amount || 50 );
		}

		// Close any existing modals
		if ( document.body.classList.contains( 'modal-active' ) ) {
			document
				.querySelectorAll( '.user-action-modal' )
				.forEach( ( userActionModal ) => {
					userActionModal.classList.remove( 'opened' );
					userActionModal.closest( 'body' ).classList.remove( 'modal-active' );
					userActionModal.style.display = 'none';
					userActionModal.style.opacity = '0';
				} );
		}

		// Open the givewp modal directly (skip login/guest steps)
		const targetedModal = document.getElementById( 'givewp-modal' );
		if ( targetedModal !== null ) {
			targetedModal.classList.add( 'opened' );
			targetedModal.closest( 'body' ).classList.add( 'modal-active' );
			targetedModal.style.display = 'flex';

			setTimeout( () => {
				targetedModal.style.opacity = '1';
			}, 100 );

			// Load the GiveWP form content directly
			loadGiveWPForm( formId, amount );
		}
	}

	// Load GiveWP form content using the same AJAX call as other donation buttons
	function loadGiveWPForm( formId, amount ) {
		$.ajax( {
			dataType: 'json',
			method: 'POST',
			url: ajax_script_object.ajaxurl,
			data: {
				action: 'show_donate_form',
				nonce: ajax_script_object.nonce,
				type: '', // Empty type for normal donation (not quick_donation)
				form_id: formId,
				amount: amount || 50,
				charity_type: selectedDonationType, // Pass the donation type as charity_type
				groups_details: '',
			},
			statusCode: {
				400( data ) {
					toastr.error( data.responseJSON.error_message );
				},
				200( data ) {
					$( '#give_form_container' ).remove();

					// Modify the form HTML to include frequency parameter if it's monthly
					let formHtml = data.give_form;
					if (
						selectedDonationType === 'monthly' &&
            formHtml.includes( '?giveDonationFormInIframe=1' )
					) {
						formHtml = formHtml.replace(
							'?giveDonationFormInIframe=1',
							'?giveDonationFormInIframe=1&recurring=monthly'
						);
					}

					$( '#givewp-modal' ).append(
						`<div id="give_form_container"> ${ formHtml } </div>`
					);
				},
			},
		} );
	}

	// Open custom donation modal
	function openDonationModal( amount ) {
		// Trigger custom donation modal
		const modal = $( '#donation-modal' );
		if ( modal.length > 0 ) {
			// Set amount in modal
			modal.find( 'input[name="amount"]' ).val( amount );
			modal.modal( 'show' );
		} else {
			// Fallback: redirect to donation page
			const donationUrl = `${ window.location.origin }/donate/?amount=${ amount }`;
			window.open( donationUrl, '_blank' );
		}
	}

	// Initialize when document is ready
	$( document ).ready( function() {
		initHeroDonationForm();
	} );

	// Re-initialize for dynamic content (like Swiper slides)
	$( document ).on( 'swiper-slide-change', function() {
		setTimeout( initHeroDonationForm, 100 );
	} );

	// Also re-initialize on any DOM changes
	$( document ).on( 'DOMNodeInserted', '.hero-donation-form', function() {
		setTimeout( initHeroDonationForm, 100 );
	} );
}( jQuery ) );
