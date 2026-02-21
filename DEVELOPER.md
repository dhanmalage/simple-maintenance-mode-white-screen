# Simple Maintenance Mode White Screen - Developer Documentation

## Overview

Simple Maintenance Mode White Screen is a lightweight WordPress plugin that displays a customizable maintenance page, coming soon page, or white screen to non-logged-in visitors. It is built with simplicity and performance in mind, with no external dependencies beyond WordPress core.

- **Version:** 2.0
- **Requires WordPress:** 5.2+
- **Requires PHP:** 7.0+
- **License:** GPL v2 or later
- **Text Domain:** `simple-maintenance-mode-white-screen`

---

## File Structure

```
simple-maintenance-mode-white-screen/
├── simple-maintenance-mode-white-screen.php   # Main plugin file
├── uninstall.php                              # Database cleanup on plugin deletion
├── readme.txt                                 # WordPress.org plugin directory readme
├── includes/
│   ├── settings-page.php                      # Admin settings page template
│   └── template.php                           # Frontend maintenance page template
├── assets/
│   ├── css/
│   │   └── maintenance-mode.css               # Default maintenance page styles (reference)
│   └── js/
│       └── smmws-admin.js                     # Admin settings page JavaScript
├── languages/
│   └── simple-maintenance-mode-white-screen.pot  # Translation template
└── assets/
    └── screenshot-1.png                       # Plugin screenshot
```

---

## Plugin Constants

Defined in the main plugin file after the direct access check:

| Constant           | Value                        | Description                          |
|--------------------|------------------------------|--------------------------------------|
| `SMMWS_VERSION`    | `'2.0'`                      | Current plugin version               |
| `SMMWS_PLUGIN_DIR` | `plugin_dir_path(__FILE__)`   | Absolute path to the plugin directory|

---

## Prefix Convention

All functions, options, transients, CSS classes, and IDs use the `smmws_` (underscore) or `smmws-` (hyphen) prefix to avoid naming collisions with other plugins or themes.

- **PHP functions:** `smmws_` (e.g., `smmws_add_admin_menu`)
- **Database options:** `smmws_` (e.g., `smmws_enabled`)
- **Nonce names:** `smmws_` (e.g., `smmws_settings_nonce`)
- **Transients:** `smmws_` (e.g., `smmws_settings_saved`)
- **CSS classes/IDs:** `smmws-` (e.g., `smmws-color-picker`)
- **JavaScript handle:** `smmws-admin`
- **Localized JS object:** `smmws_admin_vars`

---

## Hooks and Filters Used

### Actions

| Hook                  | Callback                        | Priority | Purpose                                           |
|-----------------------|---------------------------------|----------|---------------------------------------------------|
| `admin_menu`          | `smmws_add_admin_menu`          | 10       | Registers the admin menu page                     |
| `admin_enqueue_scripts` | `smmws_enqueue_admin_scripts` | 10       | Loads CSS/JS on the settings page only             |
| `admin_init`          | `smmws_handle_settings_save`    | 10       | Processes settings form submission (PRG pattern)   |
| `admin_bar_menu`      | `smmws_admin_bar_indicator`     | 100      | Adds red indicator to admin bar when active         |
| `wp_head`             | `smmws_admin_bar_styles`        | 10       | Outputs admin bar indicator CSS (frontend)         |
| `admin_head`          | `smmws_admin_bar_styles`        | 10       | Outputs admin bar indicator CSS (admin)            |
| `template_redirect`   | `smmws_enable_maintenance_mode` | 10       | Intercepts frontend requests for maintenance page  |

### Filters

| Hook                                          | Callback                     | Purpose                                  |
|-----------------------------------------------|------------------------------|------------------------------------------|
| `plugin_action_links_{plugin_basename}`        | `smmws_plugin_action_links`  | Adds "Settings" link on Plugins page      |

---

## Database Options

All options are stored in the `wp_options` table and are created on first save. They are not auto-loaded on plugin activation, meaning the plugin has zero database footprint until the user saves settings for the first time.

| Option Key            | Type    | Default   | Sanitization Function     | Description                              |
|-----------------------|---------|-----------|---------------------------|------------------------------------------|
| `smmws_enabled`       | integer | `0`       | Cast to `1` or `0`        | Whether maintenance mode is active       |
| `smmws_text`          | string  | `''`      | `wp_kses_post`            | Maintenance page message (HTML allowed)  |
| `smmws_font_size`     | string  | `'26'`    | `sanitize_text_field`     | Font size in pixels (10-100)             |
| `smmws_bg_color`      | string  | `''`      | `sanitize_hex_color`      | Background color hex value               |
| `smmws_text_color`    | string  | `''`      | `sanitize_hex_color`      | Text color hex value                     |
| `smmws_font_family`   | string  | `''`      | `sanitize_text_field`     | CSS font-family value                    |
| `smmws_logo`          | string  | `''`      | `esc_url_raw`             | URL to the uploaded logo image           |

### Transients

| Transient Key          | Expiry  | Purpose                                      |
|------------------------|---------|----------------------------------------------|
| `smmws_settings_saved` | 30 sec  | Triggers success notice after PRG redirect    |

---

## Functions Reference

### `smmws_add_admin_menu()`

Registers a top-level admin menu page under the "Maintenance Mode" label with the `dashicons-hammer` icon at position 80. Requires the `manage_options` capability.

### `smmws_plugin_action_links( $links )`

Prepends a "Settings" link to the plugin's action links on the Plugins admin page.

### `smmws_enqueue_admin_scripts( $hook_suffix )`

Conditionally enqueues assets only on the plugin's settings page (`toplevel_page_simple-maintenance-mode-white-screen`):
- `wp-color-picker` (style and script) for color picker fields.
- `wp.media` for the logo upload functionality.
- `smmws-admin` custom script (`assets/js/smmws-admin.js`) with jQuery and wp-color-picker as dependencies.
- Localized strings passed via `wp_localize_script` under the `smmws_admin_vars` object.

### `smmws_handle_settings_save()`

Handles form submission on `admin_init`. Performs three security checks before processing:
1. Verifies the nonce (`smmws_settings_nonce` against `smmws_save_settings` action).
2. Verifies the user has the `manage_options` capability.
3. Confirms the request method is POST.

After saving, sets a transient and redirects using `wp_safe_redirect` (Post/Redirect/Get pattern).

### `smmws_settings_page()`

Renders the settings page by including `includes/settings-page.php`.

### `smmws_admin_bar_indicator( $wp_admin_bar )`

Adds a "Maintenance Mode: ON" node to the WordPress admin bar when maintenance mode is enabled. Only visible to users with the `manage_options` capability. Links to the plugin settings page.

### `smmws_admin_bar_styles()`

Outputs inline CSS to style the admin bar indicator with a red background (`#dc3232`) and white text. Hooked to both `wp_head` and `admin_head` so the indicator is styled on both frontend and admin pages.

### `smmws_enable_maintenance_mode()`

The core maintenance mode function. Hooked to `template_redirect`, it checks:
1. The visitor is **not** logged in.
2. The `smmws_enabled` option is set to `1`.

If both conditions are met, it:
- Retrieves all display settings from the database.
- Sends a `503 Service Unavailable` HTTP status code.
- Sends a `Retry-After: 3600` header (1 hour).
- Includes the `includes/template.php` template.
- Calls `exit` to prevent WordPress from rendering the theme.

---

## Template Files

### `includes/settings-page.php`

The admin settings page template. It:
- Checks for the `smmws_settings_saved` transient and displays a success notice.
- Reads all current option values from the database.
- Renders a standard WordPress `form-table` with fields for all settings.
- Uses WordPress escaping functions (`esc_html__`, `esc_attr__`, `esc_attr`, `esc_url`, `esc_textarea`).
- Outputs a nonce field via `wp_nonce_field`.

### `includes/template.php`

The frontend maintenance page template. It is a standalone HTML document that:
- Sets the `lang` attribute via `language_attributes()`.
- Uses the site name (`get_bloginfo('name')`) as the page title.
- Applies user-configured styles inline (background color, text color, font family, font size).
- Falls back to sensible defaults when settings are empty (white background, black text, Arial font).
- Conditionally displays the logo and maintenance text.
- Escapes all output using `esc_attr`, `esc_url`, and `wp_kses_post`.

---

## Security Measures

### Direct Access Prevention
Every PHP file checks for `ABSPATH` (or `WP_UNINSTALL_PLUGIN` in `uninstall.php`) and exits if accessed directly.

### Nonce Verification
The settings form uses `wp_nonce_field` / `wp_verify_nonce` with the action `smmws_save_settings` and field name `smmws_settings_nonce`.

### Capability Check
The save handler verifies `current_user_can('manage_options')` in addition to the nonce check. The admin menu page itself also requires `manage_options`.

### Input Sanitization
All user input is sanitized before saving to the database:
- Text fields: `sanitize_text_field` + `wp_unslash`
- HTML content: `wp_kses_post` + `wp_unslash`
- Color values: `sanitize_hex_color` + `wp_unslash`
- URLs: `esc_url_raw` + `wp_unslash`
- Nonce: `sanitize_key`

### Output Escaping
All output is escaped using the appropriate WordPress function:
- HTML context: `esc_html`, `esc_html__`
- Attribute context: `esc_attr`, `esc_attr__`
- URL context: `esc_url`
- Textarea context: `esc_textarea`
- JavaScript context: Handled via `wp_localize_script`
- Rich HTML output: `wp_kses_post`

### HTTP Response
The maintenance page returns a `503 Service Unavailable` status code with a `Retry-After` header, which signals to search engines that the site is temporarily down and should be recrawled later.

---

## Uninstall Behavior

The `uninstall.php` file runs only when the plugin is deleted through the WordPress admin (not on deactivation). It removes all 7 database options:

- `smmws_enabled`
- `smmws_text`
- `smmws_font_size`
- `smmws_bg_color`
- `smmws_text_color`
- `smmws_font_family`
- `smmws_logo`

Deactivating the plugin preserves all settings so users can reactivate without reconfiguring.

---

## Internationalization

- **Text Domain:** `simple-maintenance-mode-white-screen`
- **Domain Path:** `/languages`
- **Translation Template:** `languages/simple-maintenance-mode-white-screen.pot`

All user-facing strings use WordPress translation functions (`__`, `esc_html__`, `esc_attr__`). JavaScript strings are passed through `wp_localize_script` to maintain translation support.

---

## Maintenance Mode Behavior

### What is blocked
- All frontend page requests for non-logged-in visitors (via `template_redirect`).

### What is NOT blocked
- WordPress admin pages (`/wp-admin/`).
- The login page (`wp-login.php`).
- REST API endpoints (`/wp-json/`).
- RSS feeds and XML sitemaps.
- AJAX requests (`admin-ajax.php`).
- Requests from logged-in users (any role).

### How visitors are identified
The plugin uses WordPress `is_user_logged_in()` to determine whether a visitor should see the maintenance page. All logged-in users, regardless of role, bypass maintenance mode.

---

## Available Font Families

The font family selector offers the following web-safe options:

| Value                        | Display Label    |
|------------------------------|------------------|
| *(empty)*                    | Default (Theme Font) |
| `Arial, sans-serif`         | Arial            |
| `Verdana, sans-serif`       | Verdana          |
| `Trebuchet MS, sans-serif`  | Trebuchet MS     |
| `Georgia, serif`            | Georgia          |
| `Times New Roman, serif`    | Times New Roman  |
| `Courier New, monospace`    | Courier New      |
| `system-ui, sans-serif`     | System UI        |

---

## Upgrade Compatibility

The plugin stores all settings as individual `wp_options` entries with sensible defaults. When upgrading from an older version:
- Existing settings are preserved automatically.
- New settings that don't exist yet fall back to their defaults.
- No migration or activation hook is needed.
