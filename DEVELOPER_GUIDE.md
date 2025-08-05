# 🏗️ Bonyan Fundraising Platform - Developer Guide

> A comprehensive guide for developers working on the Bonyan fundraising platform theme

## 📋 Table of Contents
- [Project Overview](#-project-overview)
- [Local Development Setup](#-local-development-setup)
- [Essential Plugins & Content Setup](#-essential-plugins--content-setup)
- [WPBakery Components Development](#-wpbakery-components-development)
- [Build Process & Asset Management](#-build-process--asset-management)
- [Data Persistence & Backups](#-data-persistence--backups)
- [Troubleshooting](#-troubleshooting)

---

## 🎯 Project Overview

**Bonyan** is a complete WordPress fundraising platform theme featuring:

- **Donation Integration**: Give WP, Classy, Charity Stack platforms
- **Custom Post Types**: Campaigns, Events, Main Slider, Projects, Reports, Vacancies, Tenders
- **Advanced Features**: Zakat calculator, Qurbani calculator, event calendar, user dashboard
- **Visual Builder**: 32+ custom WPBakery Page Builder components
- **Multi-platform Support**: Various donation platforms and CRM integrations

### 🔧 Tech Stack
- **WordPress 6.8+**
- **PHP 5.6+**
- **MySQL 8.0**
- **Bootstrap 5**
- **SCSS/Sass**
- **Gulp.js** (build process)
- **Docker** (development environment)

---

## 🚀 Local Development Setup

### Prerequisites
- **Docker** and **Docker Compose** installed
- **Node.js** (for build process)
- **Composer** (for PHP dependencies)

### Step 1: Clone and Setup
```bash
git clone https://github.com/BonyanOrg/bonyan.git
cd bonyan
```

### Step 2: Install Dependencies
```bash
# Install Node.js dependencies
npm install

# Install PHP dependencies
composer install
```

### Step 3: Docker Environment
The project includes a complete Docker setup with:
- **WordPress** (with PHP 8.2)
- **MySQL 8.0** database
- **phpMyAdmin** for database management

```yaml
# docker-compose.yml configuration includes:
- WordPress: http://localhost:8080
- phpMyAdmin: http://localhost:8081
- Database: MySQL on port 3306
```

### Step 4: Start Development Environment
```bash
# Start all containers
docker-compose up -d

# Check container status
docker-compose ps

# View logs (if needed)
docker-compose logs wordpress
```

### Step 5: WordPress Installation
1. Go to **http://localhost:8080**
2. Complete WordPress installation:
   - **Site Title**: "Bonyan Fundraising Platform"
   - **Admin Username**: your choice
   - **Admin Password**: your choice
   - **Admin Email**: your email

### Step 6: Build Theme Assets
```bash
# Build CSS styles
npx gulp styles
npx gulp bootstrap

# Build JavaScript
npx gulp script-js

# Build all component styles (optional, for development)
npx gulp components-styles
```

### 🔧 PHP Configuration
The Docker setup automatically configures PHP for large file uploads:
- **upload_max_filesize**: 64M
- **post_max_size**: 64M
- **memory_limit**: 256M
- **max_execution_time**: 300s

---

## 🔌 Essential Plugins & Content Setup

### Required Plugins
1. **Give WP** (Essential for donations)
   - Go to **Plugins → Add New**
   - Search "Give - Donation Plugin"
   - Install and activate

2. **WPBakery Page Builder** (For visual editing)
   - Download from [codecanyon.net](https://codecanyon.net/item/visual-composer-page-builder-for-wordpress/242431)
   - Upload via **Plugins → Add New → Upload Plugin**

### Theme Activation
1. Go to **Appearance → Themes**
2. Find "Bonyan" theme
3. Click **Activate**

### Content Setup Methods

#### Method 1: Manual Content Creation
1. **Main Slider**: Admin → Main Slider → Add New
2. **Homepage**: Pages → Add New → Template: "Home-Page"
3. **Campaigns**: Admin → Campaigns → Add New
4. **Set Homepage**: Settings → Reading → Static Page

#### Method 2: Import Demo Content (Recommended)
If you have demo content or backup files:

1. **Install Backup Plugin** (e.g., UpdraftPlus, All-in-One WP Migration)
2. **Upload Backup Files** through the plugin interface
3. **Import Database** and content
4. **Upload Media Files** if needed

### Essential Settings
- **Customizer**: Configure logos, colors, social media
- **Theme Settings**: Configure donation platforms and integrations
- **Give WP**: Set up donation forms and payment gateways

---

## 🧩 WPBakery Components Development

### Existing Components (32 total)

#### Core Functionality
- **Quick Donation** - Multi-amount donation widget
- **CTA Button** - Call-to-action donation button
- **Zakat Calculator** - Islamic charity calculator
- **Qurbani Calculator** - Sacrifice donation calculator
- **Classy Form** - Classy platform integration

#### Content Display
- **Campaigns Slider** - Campaign carousel
- **Primary Carousel** - General content slider
- **News Slider** - News/blog post slider
- **Partners** - Partner logos/links
- **Statistics** - Number counters/stats
- **Report Cards** - Report listing cards
- **Program Cards** - Program display cards

#### Interactive & Data
- **Tenders Datatable** - Tender listings table
- **Vacancies Datatable** - Job vacancy table
- **Events Calendar** - Event calendar display
- **Advanced Search** - Search functionality
- **Hierarchy Board** - Organizational chart

*[See full component list in the analysis above]*

### Component Development Pattern

#### File Structure
```
inc/wpbakery/
├── vcmaps/              # Component definitions
│   └── your_component_map.php
├── shortcodes/          # Component views
│   └── your_component_view.php
├── vcmaps.php          # Maps loader
└── shortcodes.php      # Views loader

assets/scss/components/wpb/
└── your-component.scss  # Component styles

assets/js/components/wpb/
└── your-component.js    # Component scripts (optional)
```

#### Step 1: Create Component Map
**File**: `inc/wpbakery/vcmaps/your_component_map.php`

```php
<?php
function your_component_vc()
{
    vc_map(array(
        "name" => esc_html__("Your Component Name", 'DOMAIN'),
        "description" => esc_html__("Component description", 'DOMAIN'),
        "base" => "your_component", // Shortcode name
        'category' => esc_html__('BONYAN', 'DOMAIN'),
        'icon' => get_wpb_icon_url('your_component'),
        "params" => array(
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => esc_html__("Field Label", 'text_DOMAIN'),
                "param_name" => "your_field_name",
                "value" => "",
                "description" => esc_html__("Field description", 'text_DOMAIN'),
            ),
            array(
                "type" => "dropdown",
                "heading" => esc_html__("Options", 'text_DOMAIN'),
                "param_name" => "your_dropdown",
                "value" => array(
                    'Option 1' => 'value1',
                    'Option 2' => 'value2',
                ),
            ),
            array(
                "type" => "param_group",
                "param_name" => "your_repeater",
                "heading" => esc_html__("Repeater Fields", 'text_DOMAIN'),
                "params" => array(
                    array(
                        "type" => "textfield",
                        "heading" => esc_html__("Item Title", 'text_DOMAIN'),
                        "param_name" => "item_title",
                    ),
                ),
            ),
        )
    ));
}
add_action('vc_before_init', 'your_component_vc');
```

#### Step 2: Create Component View
**File**: `inc/wpbakery/shortcodes/your_component_view.php`

```php
<?php
if (!function_exists('your_component_shortcode')) {
    function your_component_shortcode($atts)
    {
        extract(
            shortcode_atts(
                array(
                    'your_field_name' => '',
                    'your_dropdown' => '',
                    'your_repeater' => '',
                ),
                $atts
            )
        );

        // Process repeater fields
        $repeater_items = vc_param_group_parse_atts($your_repeater);

        ob_start(); ?>
        
        <div class="your-component-wrapper">
            <div class="container">
                <h3 class="component-title"><?php echo esc_html($your_field_name); ?></h3>
                
                <?php if (!empty($repeater_items)): ?>
                    <div class="component-items">
                        <?php foreach ($repeater_items as $item): ?>
                            <div class="component-item">
                                <h4><?php echo esc_html($item['item_title']); ?></h4>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <?php
        return ob_get_clean();
    }
}
add_shortcode('your_component', 'your_component_shortcode');
```

#### Step 3: Create Component Styles
**File**: `assets/scss/components/wpb/your-component.scss`

```scss
.your-component-wrapper {
    padding: 60px 0;
    
    .component-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 30px;
        text-align: center;
        color: var(--primary-color);
    }
    
    .component-items {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        
        .component-item {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            
            &:hover {
                transform: translateY(-5px);
            }
            
            h4 {
                color: #333;
                margin-bottom: 15px;
            }
        }
    }
    
    // Responsive design
    @media (max-width: 768px) {
        padding: 40px 0;
        
        .component-title {
            font-size: 2rem;
        }
    }
}
```

#### Step 4: Add Gulp Build Task
**Add to** `gulpfile.js`:

```javascript
// Add CSS task
gulp.task('wpb-your-component-css', function () {
    return gulp.src('./assets/scss/components/wpb/your-component.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
        .pipe(autoprefixer())
        .pipe(concat('your-component.min.css'))
        .pipe(sourcemaps.write('./map'))
        .pipe(gulp.dest('./dist/css/components/wpb'));
});

// Add to components-styles task (around line 592)
gulp.task('components-styles', gulp.parallel([
    // ... existing tasks ...
    'wpb-your-component-css'
]));
```

#### Step 5: Register Component
**Add to** `inc/wpbakery/vcmaps.php`:
```php
/* Your Component */
require_once "vcmaps/your_component_map.php";
```

**Add to** `inc/wpbakery/shortcodes.php`:
```php
/* Your Component */
require_once "shortcodes/your_component_view.php";
```

#### Step 6: Enqueue Styles (Optional)
**Add to** `inc/enqueue-assets.php`:
```php
wp_enqueue_style('bonyan-your-component-style', 
    get_template_directory_uri() . "/dist/css/components/wpb/your-component.min.css", 
    array('bonyan-bootstrap-style'), 
    $GLOBALS['bonyan_version']
);
```

### Available Field Types
```php
"type" => "textfield"        // Text input
"type" => "textarea"         // Multi-line text
"type" => "textarea_html"    // Rich text editor
"type" => "dropdown"         // Select dropdown
"type" => "dropdown_multi"   // Multi-select (custom)
"type" => "checkbox"         // Checkbox
"type" => "attach_image"     // Image picker
"type" => "vc_link"         // Link picker
"type" => "param_group"     // Repeater fields
"type" => "colorpicker"     // Color picker
"type" => "css_editor"      // CSS editor
```

---

## 🔧 Build Process & Asset Management

### Gulp Tasks
```bash
# Main styles
npx gulp styles          # Main theme CSS
npx gulp styles-rtl      # RTL version
npx gulp bootstrap       # Bootstrap CSS

# Component styles
npx gulp components-styles    # All WPBakery components
npx gulp wpb-quick-donation-css  # Individual component

# JavaScript
npx gulp script-js            # Main theme JS
npx gulp components-scripts   # Component JS

# Development workflow
npx gulp watch               # Watch main files
npx gulp watch-components    # Watch component files
```

### File Structure
```
dist/
├── css/
│   ├── style.min.css           # Main theme styles
│   ├── bootstrap.min.css       # Bootstrap framework
│   └── components/
│       ├── blog-card.min.css
│       └── wpb/                # WPBakery components
│           ├── quick-donation.min.css
│           ├── primary-carousel.min.css
│           └── ...
├── js/
│   ├── scripts.min.js          # Main theme JS
│   └── components/
│       └── wpb/                # Component JS
└── fonts/                      # Theme fonts
```

---

## 💾 Data Persistence & Backups

### Docker Volume Configuration
```yaml
volumes:
  wordpress_data:    # WordPress files, plugins, uploads
  db_data:          # MySQL database content
```

### What Persists
✅ **Always Persists** (survives `docker-compose down`):
- WordPress core files and plugins
- All uploads and media files
- Database content and settings
- WPBakery layouts and components
- Theme configurations

### Data Safety Commands
```bash
# Safe operations (data persists)
docker-compose down           # Stop containers
docker-compose stop          # Stop containers
docker-compose restart       # Restart containers
docker-compose up -d         # Start containers

# Dangerous operations (WILL lose data)
docker-compose down -v       # Removes volumes
docker volume rm bonyan_wordpress_data bonyan_db_data
```

### Backup Strategies

#### 1. Database Backup
```bash
# Export database
docker exec bonyan-db-1 mysqldump -u wordpress -pwordpress wordpress > backup-$(date +%Y%m%d).sql

# Import database
docker exec -i bonyan-db-1 mysql -u wordpress -pwordpress wordpress < backup.sql
```

#### 2. WordPress Files Backup
```bash
# Backup WordPress files
docker cp bonyan-wordpress-1:/var/www/html ./wordpress-backup-$(date +%Y%m%d)

# Copy specific directories
docker cp bonyan-wordpress-1:/var/www/html/wp-content/uploads ./uploads-backup
```

#### 3. Using WordPress Backup Plugins
**Recommended plugins**:
- **UpdraftPlus** - Automatic cloud backups
- **All-in-One WP Migration** - Complete site packages
- **BackWP** - Database + file backups

#### 4. Version Control Integration
```bash
# Theme files are already in git
git add .
git commit -m "Theme updates"
git push origin main

# For database content, use WordPress export
# Tools → Export → All content → Download
```

---

## 🔍 Troubleshooting

### Common Issues & Solutions

#### 1. "Critical Error on Website"
**Cause**: Usually WPBakery functions called without plugin
**Solution**: Install WPBakery Page Builder plugin

#### 2. "Upload File Exceeds Limits"
**Cause**: PHP upload limits too low
**Solution**: Already configured in Docker setup (64MB limit)

#### 3. "Theme Not Loading Properly"
**Cause**: Assets not compiled
**Solution**:
```bash
npx gulp styles
npx gulp bootstrap
npx gulp script-js
```

#### 4. "WPBakery Components Not Showing"
**Cause**: WPBakery plugin not active
**Solution**: Install and activate WPBakery Page Builder

#### 5. "Database Connection Error"
**Cause**: Docker containers not running
**Solution**:
```bash
docker-compose up -d
docker-compose ps  # Check status
```

#### 6. "Styles Not Loading"
**Cause**: Gulp build needed
**Solution**:
```bash
npx gulp components-styles  # Build all component styles
```

### Development Workflow

#### 1. Starting Development
```bash
# Start environment
docker-compose up -d

# Build assets
npx gulp styles
npx gulp script-js

# Watch for changes (optional)
npx gulp watch
```

#### 2. Adding New Component
1. Create map file in `inc/wpbakery/vcmaps/`
2. Create view file in `inc/wpbakery/shortcodes/`
3. Create styles in `assets/scss/components/wpb/`
4. Add Gulp task for the component
5. Register in loader files
6. Build and test

#### 3. Deploying Changes
1. Test locally in Docker environment
2. Commit theme files to git
3. Export WordPress content if needed
4. Deploy to staging/production

### Debug Mode
Enable WordPress debug mode by setting in Docker environment:
```yaml
environment:
  WORDPRESS_DEBUG: 1
```

### Logs Access
```bash
# WordPress logs
docker-compose logs wordpress

# Database logs
docker-compose logs db

# All containers
docker-compose logs
```

---

## 🤝 Contributing

### Code Standards
- Follow WordPress coding standards
- Use ESLint for JavaScript
- Use PHP_CodeSniffer for PHP
- Comment complex functions
- Use meaningful variable names

### Git Workflow
1. Create feature branch: `git checkout -b feature/new-component`
2. Make changes and test locally
3. Commit changes: `git commit -m "Add new component"`
4. Push branch: `git push origin feature/new-component`
5. Create pull request

### Testing
- Test all components in different screen sizes
- Verify data persistence after Docker restart
- Test with and without WPBakery plugin
- Check console for JavaScript errors

---

## 📚 Additional Resources

- [WordPress Developer Handbook](https://developer.wordpress.org/)
- [WPBakery Developer Docs](https://wpbakery.atlassian.net/wiki/spaces/VC/)
- [Give WP Developer Docs](https://givewp.com/documentation/)
- [Bootstrap 5 Documentation](https://getbootstrap.com/docs/5.0/)
- [Docker Compose Documentation](https://docs.docker.com/compose/)

---

## 📞 Support

For questions or issues with this development setup:
1. Check this guide first
2. Review the troubleshooting section
3. Check existing GitHub issues
4. Create a new issue with detailed description

---

**Happy Coding! 🚀** 