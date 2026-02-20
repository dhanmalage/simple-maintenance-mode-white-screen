=== Simple Maintenance Mode White Screen ===
Contributors: punsisi
Donate link: https://buymeacoffee.com/dhanmalage
Tags: maintenance mode, coming soon, under construction, maintenance page, under maintenance
Requires at least: 5.2
Tested up to: 6.9
Stable tag: 2.0
Requires PHP: 7.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Lightweight maintenance mode plugin. Show a coming soon page, under construction notice, or white screen to visitors while you work on your site.

== Description ==

Simple Maintenance Mode White Screen is a lightweight WordPress maintenance mode plugin that lets you quickly put your site into maintenance mode with one click. Display a custom coming soon page, under construction notice, or a clean white screen while you update, redesign, or build your WordPress website.

Unlike bloated alternatives, this plugin is fast, simple, and does exactly what you need — no page builders, no subscriptions, no unnecessary features.

**Key Features:**

* **One-click maintenance mode** — Enable or disable maintenance mode instantly from the WordPress admin
* **Custom maintenance message** — Write your own coming soon or under construction text with basic HTML support (bold, italic, links)
* **Logo upload** — Add your brand logo to the maintenance page using the WordPress media library
* **Background color picker** — Customize the maintenance page background color
* **Text color picker** — Choose a text color that matches your brand
* **Font family selector** — Pick from web-safe fonts or use your theme default
* **Adjustable font size** — Set the perfect text size for your maintenance message (10-100px)
* **Admin bar indicator** — A red "Maintenance Mode: ON" badge in the admin bar reminds you when maintenance mode is active
* **Logged-in users bypass** — Administrators and logged-in users can browse the site normally while visitors see the maintenance page
* **Clean uninstall** — All plugin data is removed from the database when you delete the plugin
* **Translation ready** — Fully translatable with included .pot file

**Perfect for:**

* Putting your WordPress site under maintenance while making updates
* Showing a coming soon page while building a new website
* Displaying an under construction notice during a site redesign
* Temporarily hiding your site from the public with a white screen

== Installation ==

1. Upload the `simple-maintenance-mode-white-screen` folder to the `/wp-content/plugins/` directory, or install directly from the WordPress plugin directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Go to the 'Maintenance Mode' menu in the admin dashboard to configure your maintenance page.
4. Check "Enable Maintenance Mode" and click Save Settings. Your site is now in maintenance mode.

== Frequently Asked Questions ==

= How do I enable maintenance mode on my WordPress site? =
Go to the "Maintenance Mode" menu in your WordPress admin dashboard, check the "Enable Maintenance Mode" checkbox, and click "Save Settings". All non-logged-in visitors will immediately see the maintenance page.

= Can I customize the maintenance page design? =
Yes. You can set a custom background color, text color, font family, font size, upload a logo, and write a custom message with basic HTML formatting. All design options are available in the plugin settings.

= Will logged-in users see the maintenance page? =
No. All logged-in users bypass the maintenance page and can browse the site normally. This allows administrators to preview changes while the site is under maintenance.

= Can I use this as a coming soon page? =
Yes. You can add your logo, set custom colors, and write a coming soon message. The plugin works well as a simple coming soon or under construction page while you build your site.

= Does the maintenance page support HTML? =
Yes. The maintenance message field supports basic HTML tags such as bold, italic, links, line breaks, and headings. This allows you to format your maintenance or coming soon message.

= How do I know if maintenance mode is active? =
When maintenance mode is enabled, a red "Maintenance Mode: ON" indicator appears in the WordPress admin bar on every page. Clicking it takes you directly to the plugin settings.

= Will this plugin affect my SEO? =
The maintenance page is a standalone page that only appears to non-logged-in visitors. Search engine crawlers that are not logged in will see the maintenance page. For extended maintenance periods, consider adding appropriate meta tags.

= What happens when I delete the plugin? =
All plugin settings are cleanly removed from the database when you delete the plugin through the WordPress admin. Deactivating the plugin preserves your settings so you can reactivate later without reconfiguring.

== Screenshots ==
1. Backend view of plugin settings after plugin activated.

== Changelog ==

= 2.0 =
* Enhancement - Added background color picker for the maintenance page.
* Enhancement - Added text color picker for the maintenance page.
* Enhancement - Added font family selector with web-safe font options.
* Enhancement - Added optional logo upload for the maintenance page.
* Enhancement - Added basic HTML support in maintenance mode text.

= 1.8 =
* Enhancement - Added admin bar indicator when maintenance mode is active with link to settings.
* Enhancement - Moved form processing to admin_init for proper Post/Redirect/Get pattern.
* Enhancement - Replaced query parameter with transient for settings saved notice.

= 1.7 =
* Fix - esc_html() replaced with esc_html__() for proper translation support on settings saved notice.

= 1.6 =
* Fix - Inconsistent default font size across plugin files.

= 1.5 =
* Added uninstall.php for clean database cleanup when plugin is deleted.

= 1.4 =
* Author name updated.

= 1.3 =
* Author URL updated.
* Tested up to 6.9

= 1.2 =
* Fix - Maintenance mode page title updated. It will be using site title. get_bloginfo( 'name' ).
* Tested up to 6.8

= 1.1 =
* Updates after initial review.
* Enhancement - Readme.txt update.
* Fix - Fuctions/Variables name prefixs updated.

= 1.0 =
* Initial release of the plugin.

== Upgrade Notice ==

= 1.1 =
* Upgrade to fix the issues and get up to date with Wordpress standards.

= 1.0 =
Initial release. No upgrade is necessary.

== License ==
This plugin is licensed under the GPL-2.0+ License. See LICENSE for more details.
