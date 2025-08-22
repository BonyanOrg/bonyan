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

			// Update the donate button's data-amount attribute
			$( '.donate-now-btn' ).attr( 'data-amount', firstAmount );

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

			// Update the donate button's data-amount attribute
			$( '.donate-now-btn' ).attr( 'data-amount', amount );

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

			// Update the donate button's data-amount attribute with custom amount
			if ( cleanValue.length > 0 ) {
				$( '.donate-now-btn' ).attr( 'data-amount', cleanValue );
				$( '.amount-btn' ).removeClass( 'active' );
			}
		} );

		// Donate now button - no custom handling needed, just update attributes
		// The button will work naturally with data-target="infaque-modal" like zakat calculator
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
