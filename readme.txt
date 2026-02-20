=== Simple Maintenance Mode White Screen ===
Contributors: punsisi
Donate link: https://buymeacoffee.com/dhanmalage
Tags: maintenance, maintenance mode, simple, downtime, under construction
Requires at least: 5.2
Tested up to: 6.9
Stable tag: 1.7
Requires PHP: 7.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Enable maintenance mode with white screen or custom text displayed on the frontend.

== Description ==

Simple Maintenance Mode allows you to enable a maintenance mode on your WordPress site. When enabled, visitors will see a custom message or a white screen (if no text is entered). It includes a settings page where you can customize the maintenance mode message and font size.

== Installation ==

1. Upload the plugin to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Go to the 'Maintenance Mode' menu in the admin dashboard to configure the plugin settings.
4. Enable or disable maintenance mode and set your custom message.

== Frequently Asked Questions ==

= How do I activate maintenance mode? =
You can activate maintenance mode by checking the "Enable Maintenance Mode" checkbox in the plugin settings.

= How do I change the maintenance message? =
Simply enter your message in the "Maintenance Mode Text" textarea in the settings. If you leave it blank, a white screen will appear on the frontend.

= Can I customize the font size of the message? =
Yes, you can set the font size in the "Font Size (px)" field in the plugin settings.

== Screenshots ==
1. Backend view of plugin settings after plugin activated.

== Changelog ==

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
