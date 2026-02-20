# Simple Maintenance Mode White Screen

A lightweight WordPress plugin that displays a white screen or custom message to visitors while your site is under maintenance. Logged-in administrators can continue browsing the site normally.

## Requirements

- WordPress 5.2 or higher
- PHP 7.0 or higher

## Installation

1. Upload the `simple-maintenance-mode-white-screen` folder to `/wp-content/plugins/`.
2. Activate the plugin through **Plugins > Installed Plugins**.
3. Navigate to **Maintenance Mode** in the admin sidebar to configure settings.

## Usage

### Enabling Maintenance Mode

1. Go to **Maintenance Mode** in the WordPress admin menu.
2. Check the **Enable Maintenance Mode** checkbox.
3. Click **Save Settings**.

When enabled, all non-logged-in visitors will see the maintenance page. Logged-in users with administrator privileges will see the site normally.

### Customizing the Maintenance Page

| Setting | Description | Default |
|---------|-------------|---------|
| **Enable Maintenance Mode** | Toggle maintenance mode on/off | Off |
| **Maintenance Mode Text** | Message displayed to visitors. Leave blank for a plain white screen. | Empty |
| **Font Size (px)** | Font size of the maintenance message (10-100px) | 26px |

### Admin Bar Indicator

When maintenance mode is active, a red **Maintenance Mode: ON** indicator appears in the WordPress admin bar on all pages. Clicking it takes you directly to the plugin settings page. The indicator is only visible to administrators.

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
└── readme.txt                      # WordPress.org readme
```

## How It Works

- The plugin hooks into `template_redirect` to intercept frontend requests.
- If maintenance mode is enabled and the visitor is not logged in, the plugin serves a standalone HTML page and exits — bypassing the active theme entirely.
- Form submissions are processed on `admin_init` (before output) using the Post/Redirect/Get pattern to avoid header conflicts.
- Settings are stored in the `wp_options` table as `smmws_enabled`, `smmws_text`, and `smmws_font_size`.

## Hooks and Filters

| Hook | Type | Description |
|------|------|-------------|
| `admin_menu` | Action | Registers the settings page under the admin menu |
| `admin_init` | Action | Processes form submissions before output |
| `admin_bar_menu` | Action | Adds the maintenance mode indicator to the admin bar |
| `wp_head` / `admin_head` | Action | Injects admin bar indicator styles |
| `template_redirect` | Action | Intercepts frontend requests to display the maintenance page |
| `plugin_action_links_*` | Filter | Adds a "Settings" link on the plugins list page |

## Uninstall Behavior

- **Deactivating** the plugin preserves all settings. You can reactivate later without reconfiguring.
- **Deleting** the plugin removes all options (`smmws_enabled`, `smmws_text`, `smmws_font_size`) from the database via `uninstall.php`.

## Translation

The plugin is translation-ready with the text domain `simple-maintenance-mode-white-screen`. A `.pot` file is included in the `languages/` directory.

## License

This plugin is licensed under the [GPL-2.0+](https://www.gnu.org/licenses/gpl-2.0.html).
