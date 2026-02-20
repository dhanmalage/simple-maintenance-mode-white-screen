# Simple Maintenance Mode White Screen

Lightweight WordPress maintenance mode plugin. Show a coming soon page, under construction notice, or white screen to visitors while you work on your site.

## Requirements

- WordPress 5.2 or higher
- PHP 7.0 or higher

## Installation

1. Upload the `simple-maintenance-mode-white-screen` folder to `/wp-content/plugins/`, or install directly from the WordPress plugin directory.
2. Activate the plugin through **Plugins > Installed Plugins**.
3. Navigate to **Maintenance Mode** in the admin sidebar to configure settings.

## Usage

### Enabling Maintenance Mode

1. Go to **Maintenance Mode** in the WordPress admin menu.
2. Check the **Enable Maintenance Mode** checkbox.
3. Click **Save Settings**.

When enabled, all non-logged-in visitors will see the maintenance page. Logged-in users can browse the site normally.

### Settings Reference

| Setting | Description | Default |
|---------|-------------|---------|
| **Enable Maintenance Mode** | Toggle maintenance mode on/off | Off |
| **Maintenance Mode Text** | Message displayed to visitors. Leave blank for a plain white screen. Supports basic HTML tags (`<strong>`, `<em>`, `<a>`, `<br>`, `<h1>`-`<h6>`, etc.). | Empty |
| **Font Size (px)** | Font size of the maintenance message (10-100px) | 26px |
| **Font Family** | Font used on the maintenance page | Default (Theme Font) |
| **Background Color** | Background color of the maintenance page | White (#ffffff) |
| **Text Color** | Text color on the maintenance page | Black (#000000) |
| **Logo** | Optional logo image displayed above the maintenance text. Uses the WordPress media library. | None |

### Available Font Families

| Value | Label |
|-------|-------|
| *(empty)* | Default (Theme Font) |
| `Arial, sans-serif` | Arial |
| `Verdana, sans-serif` | Verdana |
| `Trebuchet MS, sans-serif` | Trebuchet MS |
| `Georgia, serif` | Georgia |
| `Times New Roman, serif` | Times New Roman |
| `Courier New, monospace` | Courier New |
| `system-ui, sans-serif` | System UI |

### Admin Bar Indicator

When maintenance mode is active, a red **Maintenance Mode: ON** indicator appears in the WordPress admin bar on all pages (both frontend and backend). Clicking it navigates directly to the plugin settings page. The indicator is only visible to users with the `manage_options` capability (administrators).

### HTML Support in Maintenance Text

The maintenance message field supports safe HTML tags via `wp_kses_post`. You can use:

- `<strong>`, `<b>` for bold text
- `<em>`, `<i>` for italic text
- `<a href="...">` for links
- `<br>` for line breaks
- `<h1>` through `<h6>` for headings
- `<p>`, `<ul>`, `<ol>`, `<li>` for paragraphs and lists

Unsafe tags (scripts, iframes, etc.) are automatically stripped.

## File Structure

```
simple-maintenance-mode-white-screen/
├── assets/
│   └── css/
│       └── maintenance-mode.css    # Frontend maintenance page styles
├── includes/
│   ├── settings-page.php           # Admin settings page template
│   └── template.php                # Frontend maintenance page template
├── languages/
│   └── *.pot                       # Translation template
├── simple-maintenance-mode-white-screen.php  # Main plugin file
├── uninstall.php                   # Database cleanup on plugin deletion
└── readme.txt                      # WordPress.org plugin directory readme
```

## How It Works

1. The plugin hooks into `template_redirect` to intercept all frontend requests.
2. If maintenance mode is enabled (`smmws_enabled` option is `1`) and the visitor is **not** logged in, the plugin serves a standalone HTML page and calls `exit` — bypassing the active theme entirely.
3. Logged-in users are never affected and see the site normally.
4. Form submissions are processed on `admin_init` (before any output) using the Post/Redirect/Get pattern. A transient is used for the success notice to avoid `$_GET` parameter issues with WordPress Coding Standards.
5. Admin scripts (`wp-color-picker`, `wp.media`) are only enqueued on the plugin settings page via `admin_enqueue_scripts` with a hook suffix check.

## Database Options

All options are stored in the `wp_options` table with the `smmws_` prefix:

| Option Name | Type | Default | Sanitization |
|-------------|------|---------|-------------|
| `smmws_enabled` | int (0/1) | `0` | Cast to int |
| `smmws_text` | string | `''` | `wp_kses_post` |
| `smmws_font_size` | string | `'26'` | `sanitize_text_field` |
| `smmws_bg_color` | string (hex) | `''` | `sanitize_hex_color` |
| `smmws_text_color` | string (hex) | `''` | `sanitize_hex_color` |
| `smmws_font_family` | string | `''` | `sanitize_text_field` |
| `smmws_logo` | string (URL) | `''` | `esc_url_raw` |

When a design option is empty, the template uses hardcoded fallbacks (white background, black text, Arial font, no logo) to maintain backward compatibility with older versions.

## Hooks Reference

| Hook | Type | Function | Description |
|------|------|----------|-------------|
| `admin_menu` | Action | `smmws_add_admin_menu` | Registers the settings page under the admin menu |
| `plugin_action_links_*` | Filter | `smmws_plugin_action_links` | Adds a "Settings" link on the plugins list page |
| `admin_enqueue_scripts` | Action | `smmws_enqueue_admin_scripts` | Loads color picker and media uploader on settings page |
| `admin_init` | Action | `smmws_handle_settings_save` | Processes form submissions before output |
| `admin_bar_menu` | Action | `smmws_admin_bar_indicator` | Adds the maintenance mode indicator to the admin bar |
| `wp_head` | Action | `smmws_admin_bar_styles` | Injects admin bar indicator styles (frontend) |
| `admin_head` | Action | `smmws_admin_bar_styles` | Injects admin bar indicator styles (backend) |
| `template_redirect` | Action | `smmws_enable_maintenance_mode` | Intercepts frontend requests to display the maintenance page |

## Uninstall Behavior

- **Deactivating** the plugin preserves all settings in the database. You can reactivate later without reconfiguring.
- **Deleting** the plugin via the WordPress admin triggers `uninstall.php`, which removes all 7 options from the `wp_options` table.

## Translation

The plugin is translation-ready with the text domain `simple-maintenance-mode-white-screen`. A `.pot` template file is included in the `languages/` directory for generating translations.

## License

This plugin is licensed under the [GPL-2.0+](https://www.gnu.org/licenses/gpl-2.0.html).
