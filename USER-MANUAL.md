# Simple Maintenance Mode White Screen - User Manual

## How to Put Your WordPress Site in Maintenance Mode (Complete Guide)

Simple Maintenance Mode White Screen is a free, lightweight WordPress maintenance mode plugin that lets you display a coming soon page, under construction notice, or a clean white screen to your website visitors while you work on your site behind the scenes.

This guide walks you through every feature of the plugin step by step.

---

## Table of Contents

1. [How to Install Simple Maintenance Mode White Screen](#how-to-install-simple-maintenance-mode-white-screen)
2. [How to Enable Maintenance Mode on Your WordPress Site](#how-to-enable-maintenance-mode-on-your-wordpress-site)
3. [How to Add a Custom Maintenance Message](#how-to-add-a-custom-maintenance-message)
4. [How to Use HTML in Your Maintenance Page Message](#how-to-use-html-in-your-maintenance-page-message)
5. [How to Add a Logo to Your Maintenance Page](#how-to-add-a-logo-to-your-maintenance-page)
6. [How to Change the Background Color of Your Maintenance Page](#how-to-change-the-background-color-of-your-maintenance-page)
7. [How to Change the Text Color on Your Maintenance Page](#how-to-change-the-text-color-on-your-maintenance-page)
8. [How to Change the Font on Your Maintenance Page](#how-to-change-the-font-on-your-maintenance-page)
9. [How to Change the Font Size on Your Maintenance Page](#how-to-change-the-font-size-on-your-maintenance-page)
10. [How to Tell if Maintenance Mode is Active](#how-to-tell-if-maintenance-mode-is-active)
11. [How to Turn Off Maintenance Mode](#how-to-turn-off-maintenance-mode)
12. [How to Preview Your Maintenance Page](#how-to-preview-your-maintenance-page)
13. [How to Uninstall the Plugin](#how-to-uninstall-the-plugin)
14. [Frequently Asked Questions](#frequently-asked-questions)

---

## How to Install Simple Maintenance Mode White Screen

There are two ways to install the plugin on your WordPress website.

### Install from the WordPress Plugin Directory

1. Log in to your WordPress admin dashboard.
2. Go to **Plugins > Add New** from the left sidebar.
3. In the search bar, type **Simple Maintenance Mode White Screen**.
4. Find the plugin in the search results and click the **Install Now** button.
5. After installation completes, click the **Activate** button.

### Install by Uploading the Plugin ZIP File

1. Download the plugin ZIP file from the WordPress plugin directory.
2. Log in to your WordPress admin dashboard.
3. Go to **Plugins > Add New** from the left sidebar.
4. Click the **Upload Plugin** button at the top of the page.
5. Click **Choose File**, select the downloaded ZIP file, and click **Install Now**.
6. After installation completes, click the **Activate** button.

Once activated, a new **Maintenance Mode** menu item appears in your WordPress admin sidebar with a hammer icon.

---

## How to Enable Maintenance Mode on Your WordPress Site

Turning on maintenance mode takes just a few seconds.

1. Go to **Maintenance Mode** in your WordPress admin sidebar.
2. Check the **Enable Maintenance Mode** checkbox.
3. Click the **Save Settings** button.

Your website is now in maintenance mode. All visitors who are not logged in will see the maintenance page instead of your regular website. You and any other logged-in users can continue browsing and working on the site normally.

If you have not entered any custom text, visitors will see a clean white screen. This is useful when you want to completely hide your site content without displaying any message.

---

## How to Add a Custom Maintenance Message

You can display a custom message on your maintenance page to let visitors know your site is under construction or coming soon.

1. Go to **Maintenance Mode** in your WordPress admin sidebar.
2. Find the **Maintenance Mode Text** field.
3. Type your message in the text area. For example:
   - "We are currently performing scheduled maintenance. Please check back soon."
   - "Our new website is coming soon. Stay tuned!"
   - "This site is under construction. We will be back shortly."
4. Click **Save Settings**.

If you leave the text field empty, visitors will see a blank white screen with no message. This can be useful when you simply want to hide your site without any explanation.

---

## How to Use HTML in Your Maintenance Page Message

The maintenance text field supports basic HTML tags, giving you more control over how your message looks. You can use the following HTML tags in your maintenance message:

- `<b>` or `<strong>` to make text **bold**
- `<i>` or `<em>` to make text *italic*
- `<a href="URL">` to add a clickable link
- `<br>` to add a line break
- `<h1>` through `<h6>` for headings
- `<p>` for paragraphs
- `<ul>` and `<li>` for bullet point lists

### Example Maintenance Message with HTML

```html
<h2>We Will Be Back Soon</h2>
<p>Our website is currently undergoing scheduled maintenance.<br>
We apologize for the inconvenience and expect to be back online shortly.</p>
<p>For urgent inquiries, please email us at <a href="mailto:info@example.com">info@example.com</a>.</p>
```

This would display a formatted message with a heading, paragraph text with a line break, and a clickable email link.

---

## How to Add a Logo to Your Maintenance Page

Adding your brand logo to the maintenance page gives it a professional look and helps visitors recognize your site.

1. Go to **Maintenance Mode** in your WordPress admin sidebar.
2. Scroll down to the **Logo** setting.
3. Click the **Upload Logo** button.
4. The WordPress Media Library will open. You can either:
   - Select an existing image from your media library, or
   - Click the **Upload Files** tab to upload a new logo image from your computer.
5. Select your logo image and click the **Use as Logo** button.
6. A preview of your logo will appear below the upload button.
7. Click **Save Settings**.

The logo will appear centered above the maintenance text on your maintenance page. For the best results, use a logo image that is no wider than 300 pixels and no taller than 150 pixels. Larger images will be automatically scaled down to fit within these dimensions.

### How to Remove the Logo

If you want to remove the logo from your maintenance page:

1. Go to **Maintenance Mode** in your WordPress admin sidebar.
2. Click the **Remove Logo** button next to the logo preview.
3. Click **Save Settings**.

---

## How to Change the Background Color of Your Maintenance Page

You can customize the background color of your maintenance page to match your brand.

1. Go to **Maintenance Mode** in your WordPress admin sidebar.
2. Find the **Background Color** setting.
3. Click the color field to open the color picker.
4. Choose your desired background color by:
   - Clicking on the color palette, or
   - Entering a hex color code directly (e.g., `#f5f5f5` for light gray).
5. Click **Save Settings**.

The default background color is white (`#ffffff`). If you clear the color field and save, the maintenance page will revert to a white background.

---

## How to Change the Text Color on Your Maintenance Page

You can change the color of the text on your maintenance page to ensure it is readable against your chosen background color.

1. Go to **Maintenance Mode** in your WordPress admin sidebar.
2. Find the **Text Color** setting.
3. Click the color field to open the color picker.
4. Choose your desired text color by:
   - Clicking on the color palette, or
   - Entering a hex color code directly (e.g., `#333333` for dark gray).
5. Click **Save Settings**.

The default text color is black (`#000000`). The text color also applies to any links in your maintenance message. If you clear the color field and save, the text will revert to black.

---

## How to Change the Font on Your Maintenance Page

You can select a font family for the text displayed on your maintenance page.

1. Go to **Maintenance Mode** in your WordPress admin sidebar.
2. Find the **Font Family** setting.
3. Open the dropdown menu and select from the available fonts:
   - **Default (Theme Font)** - Uses whatever font your WordPress theme defines.
   - **Arial** - A clean, modern sans-serif font.
   - **Verdana** - A wide, highly readable sans-serif font.
   - **Trebuchet MS** - A humanist sans-serif font.
   - **Georgia** - An elegant serif font designed for screens.
   - **Times New Roman** - A classic serif font.
   - **Courier New** - A monospaced font.
   - **System UI** - Uses the operating system's default font for a native look.
4. Click **Save Settings**.

All of these fonts are web-safe fonts that work across all browsers and devices without requiring any external font loading. This keeps your maintenance page fast.

---

## How to Change the Font Size on Your Maintenance Page

You can adjust the size of the text on your maintenance page.

1. Go to **Maintenance Mode** in your WordPress admin sidebar.
2. Find the **Font Size (px)** setting.
3. Enter a number between **10** and **100**. The value represents the font size in pixels.
   - 16-20px works well for longer messages.
   - 24-32px works well for short, prominent messages.
   - 40px and above works well for single-line statements.
4. Click **Save Settings**.

The default font size is **26px**, which provides a comfortable reading size for most maintenance messages.

---

## How to Tell if Maintenance Mode is Active

When maintenance mode is enabled, a red **Maintenance Mode: ON** badge appears in the WordPress admin bar at the top of every page. This indicator is visible on both the admin dashboard and the frontend of your site (when you are logged in).

The indicator serves as a constant reminder that your site is currently showing the maintenance page to visitors. Clicking the badge takes you directly to the Maintenance Mode settings page.

Only administrators with the `manage_options` capability can see this indicator.

---

## How to Turn Off Maintenance Mode

When you are ready to make your site live again:

1. Go to **Maintenance Mode** in your WordPress admin sidebar.
2. Uncheck the **Enable Maintenance Mode** checkbox.
3. Click **Save Settings**.

Your website is now live and all visitors can access it normally. The red admin bar indicator will disappear. All your maintenance mode settings (text, colors, logo, font) are preserved, so you can quickly re-enable maintenance mode in the future without reconfiguring everything.

---

## How to Preview Your Maintenance Page

Since maintenance mode only affects visitors who are not logged in, you need to use one of these methods to see what your maintenance page looks like:

### Method 1: Use a Different Browser

Open your website URL in a browser where you are not logged in to WordPress. You will see the maintenance page exactly as your visitors see it.

### Method 2: Use an Incognito or Private Window

Open an incognito window (Chrome) or private window (Firefox, Safari, Edge) and navigate to your website URL. Since incognito windows do not carry your login session, you will see the maintenance page.

### Method 3: Log Out Temporarily

Log out of WordPress and visit your site. You will see the maintenance page. When you are done previewing, navigate to `yoursite.com/wp-admin` to log back in. The login page is always accessible even when maintenance mode is active.

---

## How to Uninstall the Plugin

### Deactivating vs Deleting

- **Deactivating** the plugin turns off maintenance mode but keeps all your settings saved in the database. You can reactivate the plugin later and your settings will still be there.
- **Deleting** the plugin removes all plugin files and all saved settings from the database. This is a complete removal.

### To Deactivate

1. Go to **Plugins** in your WordPress admin sidebar.
2. Find **Simple Maintenance Mode White Screen** in the list.
3. Click the **Deactivate** link.

### To Delete

1. Deactivate the plugin first (see above).
2. Click the **Delete** link that appears after deactivation.
3. Confirm the deletion when prompted.

All plugin data, including your maintenance text, colors, logo URL, and font settings, will be permanently removed from the database.

---

## Frequently Asked Questions

### Will my site go down when I activate the plugin?

No. Activating the plugin does not enable maintenance mode automatically. You need to go to the Maintenance Mode settings and check the "Enable Maintenance Mode" checkbox to start showing the maintenance page to visitors.

### Can logged-in users still access the site during maintenance?

Yes. All logged-in users, regardless of their WordPress role (administrator, editor, author, subscriber), can browse the site normally. Only visitors who are not logged in see the maintenance page.

### Does maintenance mode affect the WordPress admin area?

No. The WordPress admin dashboard, login page, and all admin features continue to work normally regardless of whether maintenance mode is enabled.

### Will maintenance mode affect my SEO or search engine rankings?

The plugin sends a `503 Service Unavailable` HTTP status code along with a `Retry-After` header when maintenance mode is active. This tells search engines like Google that the site is temporarily unavailable and should be recrawled later. This is the recommended HTTP status code for temporary downtime and will not cause search engines to de-index your pages, provided maintenance mode is not left on for an extended period.

### Can I use this plugin as a coming soon page?

Yes. Upload your logo, set your brand colors, choose a font, and write a coming soon message. The plugin works perfectly as a simple coming soon page while you build your website.

### Does the maintenance page work on mobile devices?

Yes. The maintenance page is fully responsive and displays correctly on all screen sizes, including smartphones and tablets. The content is centered on the screen and adjusts to fit the viewport.

### Can I add links to my maintenance page message?

Yes. You can use HTML link tags in your maintenance message. For example: `<a href="mailto:info@example.com">Email Us</a>` will create a clickable email link on your maintenance page.

### What happens to my settings if I update the plugin?

All your settings are preserved during plugin updates. Your maintenance text, colors, logo, font, and enabled status remain unchanged after updating to a new version.

### Does the plugin slow down my website?

No. The plugin is extremely lightweight and has no impact on your website's performance. It uses no external CSS or JavaScript files on the frontend, no third-party services, and no database queries beyond reading your saved settings. The maintenance page itself is a simple, fast-loading HTML page.

### Can I show a completely blank white screen?

Yes. Simply enable maintenance mode without entering any text, uploading a logo, or setting any colors. Visitors will see a plain white screen with nothing on it. This is useful when you want to completely hide your site content during development.

### Is the plugin compatible with caching plugins?

If you are using a caching plugin (such as WP Super Cache, W3 Total Cache, or WP Rocket), you may need to clear your cache after enabling or disabling maintenance mode. Caching plugins can serve a cached version of your pages to visitors, which may bypass the maintenance page. After changing maintenance mode settings, clear your site cache to ensure all visitors see the correct page.

### Does the plugin block access to the REST API?

No. The WordPress REST API (`/wp-json/`) remains accessible when maintenance mode is active. This allows external applications, mobile apps, and other integrations that rely on the REST API to continue functioning.

### Can I translate the plugin into my language?

Yes. The plugin is fully translation-ready. A `.pot` translation template file is included in the `languages` folder. You can use tools like Poedit or the Loco Translate plugin to create translations for your language.
