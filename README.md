# Fundrasing platform based on WordPress - Give WP plugin

## Basic information, the scope of work, and achievable goals
A. Developing and designing the website of Bonyan Organization

B. Scope of work: technical and electronic services

<h3 align="left">Languages and Tools:</h3>
<p align="left"> <a href="https://getbootstrap.com" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/bootstrap/bootstrap-plain-wordmark.svg" alt="bootstrap" width="40" height="40"/> </a> <a href="https://www.w3schools.com/css/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/css3/css3-original-wordmark.svg" alt="css3" width="40" height="40"/> </a> <a href="https://www.w3.org/html/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/html5/html5-original-wordmark.svg" alt="html5" width="40" height="40"/> </a> <a href="https://www.mysql.com/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/mysql/mysql-original-wordmark.svg" alt="mysql" width="40" height="40"/> </a> <a href="https://www.php.net" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/php/php-original.svg" alt="php" width="40" height="40"/> </a> <a href="https://sass-lang.com" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/sass/sass-original.svg" alt="sass" width="40" height="40"/> </p>


## Core functions

1. Account management: account creation, login, profile, settings, personal information, and personal dashboard (password-protected admin access).

2. Campaign management.

3. Sharing: The campaign can be shared via social media, such as Facebook, Instagram, LinkedIn, Twitter, and possibly Pinterest and Google (share option via WhatsApp).

4. Payment: Donors must be able to pay their tickets through credit card with payment gateways (Stripe / PayPal) and support for recurring payments.

5. Review: Donors should have the opportunity to provide reviews of and interact with the events that occurred.

6. Countdown timer: a timer that shows how much time is left for the campaign to end.

7. Current overview: Each campaign should show, e.g., the number of tickets sold / number of investors, the amount of money raised so far, and the target amount to be raised.

8. Manage the Frequently Asked Questions section

9. Blog

10. Checkout supports Multiple Currencies and includes the following options:

- Donate as a visitor without logging in

- Donate now - in one click.

- One page to complete your donation

11. Advanced / Custom Search

12. Wish List Management



## User functions

1. Invitation to Contribute: Send specific requests to contribute a certain amount within the personal social network.

2. Personal Recommendations (Recommendation System): The system will provide advice and suggestion or make specific offers. Logged-in visitors see a personalized recommendation based on social profiles, platform web page content, and actions.

3. Login with your social account.

4. Real-time notifications: reminders and/or messages related to upcoming events and event updates.

5. Agenda/Calendar: An overview showing the dates of events to be held (including those that have taken place).

6. Promotion function: the function of exchanging and promoting events at various levels:

Community (everyone), Events (only participants in a specific event), Social Media (within social networks).

7. Reports and Statistics: Data analytics and tools for advanced analysis of web page visits.



## Donation services and marketing functions

- Online helpdesk: chatting with a technical support employee (Facebook Messenger \ Tawk).

- Preparing and analyzing reports on donations.

- Linking the site to the e-mail marketing tools (Mailchimp).

Linking the website to CRM (Zoho).

Linking the site to the affiliation system.

Set up Breadcrumbs for SEO.

- Highly compatible with search engine optimization (SEO).

- Links compatible with search engines.

Create an HTML sitemap.

Set up and connect the Google Analytics tool.

Set up Google Search Console.

Create and submit an XML sitemap.

Email templates for the registration and donation process.





## 🛠️ Development Guide

### Prerequisites
- Docker and Docker Compose installed
- Node.js for build process
- Composer for PHP dependencies

### Theme Development Workflow

#### 🎨 Editing Theme Styles

To customize the theme styles:

1. **Edit SCSS Files**
   ```bash
   # Edit variables and styles
   assets/scss/_variables.scss     # Theme variables
   assets/scss/style.scss          # Main theme styles
   assets/scss/components/         # Component styles
   ```

2. **Build Styles**
   ```bash
   # Build main theme styles
   npx gulp styles
   
   # Build component styles (for WPBakery components)
   npx gulp components-styles
   
   # Build Bootstrap styles (if needed)
   npx gulp bootstrap
   ```

3. **View Changes**
   - Go to your local site: `http://localhost:8080`
   - Hard refresh browser: `Ctrl + Shift + R` (Windows) or `Cmd + Shift + R` (Mac)

#### 🔧 Development Commands

**Start Development Environment:**
```bash
# Start Docker containers
docker-compose up -d

# Check container status
docker-compose ps
```

**Build Assets:**
```bash
# Build all main styles
npx gulp styles

# Build all WPBakery component styles
npx gulp components-styles

# Build Bootstrap framework
npx gulp bootstrap

# Build JavaScript
npx gulp script-js

# Build RTL styles (if needed)
npx gulp style-rtl
```

**Available Gulp Tasks:**
- `npx gulp styles` - Main theme CSS
- `npx gulp components-styles` - All WPBakery components
- `npx gulp bootstrap` - Bootstrap framework
- `npx gulp script-js` - JavaScript files
- `npx gulp style-rtl` - RTL version of styles

#### 📁 File Structure for Styles
```
assets/scss/
├── _variables.scss           # Theme color variables
├── style.scss               # Main theme styles
├── components/
│   ├── wpb/                 # WPBakery component styles
│   │   ├── quick-donation.scss
│   │   ├── primary-carousel.scss
│   │   └── ...
│   └── blog-card.scss       # Other component styles
└── rtl/
    └── style-rtl.scss       # RTL styles

dist/css/                    # Compiled CSS files
├── style.min.css           # Main theme (compiled)
├── bootstrap.min.css       # Bootstrap (compiled)
└── components/             # Component CSS (compiled)
```

#### 🎯 Quick Style Change Workflow
1. Edit SCSS files in `assets/scss/`
2. Run `npx gulp styles && npx gulp components-styles`
3. Refresh browser with `Ctrl + Shift + R`

#### 🔄 PHP File Change Workflow
When you change any PHP files (header.php, footer.php, functions.php, template-parts/, inc/, etc.):

1. **Edit PHP files** as needed
2. **Run the refresh script**:
   ```bash
   .\refresh-theme.bat
   ```
3. **Check your changes** at http://localhost:8080

**Why this script is needed:**
- WordPress internally caches compiled theme files
- Docker volume mounting has sync issues in this environment
- The script automatically syncs files and refreshes the theme by switching themes temporarily

**What the script does:**
1. Copies all PHP files to the WordPress container
2. Switches theme temporarily to force WordPress to reload
3. Switches back to Bonyan theme
4. Clears PHP caches

**Note:** SCSS changes work immediately with Gulp, but PHP changes require this refresh script.

#### 🚀 Adding New Components
1. Create SCSS file in `assets/scss/components/wpb/`
2. Add Gulp task in `gulpfile.js`
3. Register component in `inc/wpbakery/`
4. Build with `npx gulp components-styles`

### Docker Environment
- **WordPress**: http://localhost:8080
- **phpMyAdmin**: http://localhost:8081  
- **Database**: MySQL on port 3306

Data persists between container restarts in Docker volumes.

## Resources

- Tools that will be used in the website (CRM - HelpDesk - Affiliation - MA)

- Final Design

- Website wireframes

- Client’s Modifications Study

- Sitemap

- Design guideline

- Github

- Zoho, Mautic, iDev and GiveWP Credentials Zoho, Integromat


## Installation

- Step 1: Download and Extract
- Step 2: Download and Extract 
``Using phpMyAdmin``
- Step 3: Set up wp-config.php
- Step 4: Upload the files
`` In the Root Directory ``

- Step 5: Run the Install Script
``Setup configuration file. ``

- Finishing installation

## Contributing

Pull requests are welcome. For major changes, please open an issue first
to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License

[MIT](https://choosealicense.com/licenses/mit/)
