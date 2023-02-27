<div class="quick-donation custom-widget">
    <div class="container">
        <div class="quick-donation--title text-center text-lg-start mb-3">
            <h2>Quick Donation</h2>
        </div>
        <div class="quick-donation--content">
            <div class="quick-donation--amount">
                <div class="select-holder programs-select">
                    <div class="select-icon">
                        <i class="fa-solid fa-angle-down"></i>
                    </div>
                    <select name="program" id="program">
                        <option value="">Choose the program</option>
                        <option value="food-security-and-Livelihood-fsl">Food Security and Livelihood - FSL</option>
                        <option value="protection-and-sponsorship">Protection and Sponsorship</option>
                        <option value="shelter-and-non-alimentary-aid">Shelter and Non-alimentary Aid</option>
                        <option value="health">Health</option>
                        <option value="education">Education</option>
                        <option value="water-and-sanitation">Water and Sanitation</option>
                    </select>
                </div>

                <div class="quick-donation--amount-btns">
                    <div class="quick-donation-amount--item" data-price_value="10">
                        <span>10$</span>
                    </div>
                    <div class="quick-donation-amount--item" data-price_value="50">
                        <span>50$</span>
                    </div>
                    <div class="quick-donation-amount--item" data-price_value="100">
                        <span>100$</span>
                    </div>

                    <div class="quick-donation-amount--item other-amount">
                        <input type="text" pattern="\d*" placeholder="other" class="only-number">
                    </div>
                </div>

                <div class="select-holder charity-type-select">
                    <div class="select-icon">
                        <i class="fa-solid fa-angle-down"></i>
                    </div>

                    <select name="charity" id="charity">
                        <option value="">General Charity</option>
                        <option value="sadaqah">Sadaqah</option>
                        <option value="zakat">Zakat</option>
                    </select>
                </div>

                <div class="quick-donation--cta btn-with-animated-icon">
                    <button class="primary-btn donation-btn no-border radius-15">
                        <span><?php _e('Donate', 'bonyan'); ?></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>