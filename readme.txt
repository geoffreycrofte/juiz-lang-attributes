=== Juiz Lang Attribute ===
Contributors: CreativeJuiz
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=P39NJPCWVXGDY&lc=FR&item_name=Juiz%20Lang%20Attributes2d%20WP%20Plugin&item_number=%23wp%2djla&currency_code=EUR&bn=PP%2dDonationsBF%3abtn_donate_SM%2egif%3aNonHosted
Tags: lang, hreflang, alternate, attribute, SEO, accessibility, translation
Requires at least: 4.5
Tested up to: 6.7.1
Stable tag: 1.3.1

Add a custom HREFLANG meta box on your post to manually edit the link between your post and a translation (which could be outside your domain). Also add the `lang` and `hreflang` attributes to the TinyMCE editor and Gutenberg Editor.

== Description ==

To improve your SEO and the accessibility of your content, you must declare changes of language within your content.
You must also declare translations of your pages to Google to avoid duplicate content.

TinyMCE: For the people still in this old editor, buttons are available to add `lang` and `hreflang` attributes on your content, therefore to improve accessibility when screen readers are reading words from different languages than your main page language.

Gutenberg: For Gutenberg users, WordPress already provide the "Language" menu. When selecting a text you can add a specific language. This plugin will enhance this behaviour with its own command, and by remembering the last language code you used.
This plugin also comes with a hreflang option that you can put on links to tell users "this link lead to a French website" for example.

**Example of cases you need this plugin:**

* You translated a blog post in your language from another blog, (hreflang alternate links)
* You publish the same article in 2 languages on 2 different websites, (hreflang alternate links)
* You use in your content a jargon from another language. (`lang` attribute)
* You link from your post other posts in another language. (`hreflang` attribute)
* Your Menus have some items not translated (`lang` attributes) or lead to page in another language (`hreflang`), you can edit those attributes in the Menus admin-menu. (**WordPress 5.4** compatibility) If you have a FSE (Full Site Editing) theme, I don't know how this will work for you, but you can use the Gutenberg commands this plugin put at your disposal.

## Features available
* Custom `hreflang` alternate links for posts (page, and custom posts)
* Attributes `hreflang` and `lang` available and visible in the editor
* Attributes `hreflang` and `lang` available on your main Menus items. (**WordPress 5.4** compatibility)

## Known bugs

In old version of Gutenberg, the `hreflang` attribute on links is applied, but never save it in database. That is because `hreflang` is cleaned from WordPress posts. Indeed, it was not well recognized by the WordPress post sanitizing function.

**You can donate to support**

* [Donate what you want with Paypal](https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=P39NJPCWVXGDY&lc=FR&item_name=Juiz%20Lang%20Attributes2d%20WP%20Plugin&item_number=%23wp%2djla&currency_code=EUR&bn=PP%2dDonationsBF%3abtn_donate_SM%2egif%3aNonHosted)


**Please, use the support forum to tell me bugs encountered, and be patient**


== Installation ==

You can use one of both method :

**Installation via your Wordpress website**

1. Go to the **admin menu 'Plugins' -> 'Install'** and **search** for 'Juiz Lang Attributes'
1. **Click** 'install' and **activate it**
1. (optional) Configure the Plugin in **Settings**

**Manual Installation**

1. **Download** the plugin (it's better :p)
1. **Unzip** `juiz-lang-attributes` folder to the `/wp-content/plugins/` directory
1. **Activate the plugin** through the 'Plugins' menu in WordPress
1. It's finished !


== Frequently Asked Questions ==

* **My editor (classic editor) doesn't display the buttons. Why?**
It happens sometimes when you alreay have another plugin that does dirty things with your editor. I can't control it anyway. Try to deactivate the dirty plugin to be sure it comes for it and see if the Juiz Lang Attributes buttons appear.


== Screenshots ==

1. Metabox for post
2. TinyMCE with new buttons
3. Attributes well placed on your HTML
4. Attributes in the Appearance > Menus > Item link details
5. Gutenberg options

== Other plugins ==

**<a href="http://wordpress.org/plugins/juiz-social-post-sharer/">Juiz Social Post Sharer</a>**: if you need social buttons.
**<a href="https://fr.wordpress.org/plugins/juiz-outdated-post-message/">Juiz Outdated Post Message</a>**: if you want to put a warning on old post on your blog.
**<a href="https://wordpress.org/plugins/embed-can-i-use/">Embed Can I Use</a>**: if you talk about support of HTML 5, CSS3 or JS API, you need to embed Can I Use support tables.
**<a href="https://wordpress.org/plugins/social-integration-for-bluesky/">Social integration for BlueSky</a>**: Add a Profile Banner, a list of your recent BlueSky Posts, or an auto syndication on BlueSky with this plugin.


== Changelog ==

= 1.3.1 =
* **Bug Fix**
  * Hreflang attributes are now saved on links with Gutenberg
* Tested on WordPress 6.7.1
* Adds the `alternate` named `x-default` to your head section when using the `hreflang` alternative URL metabox.

= 1.3.0 =
* **Bug Fix**
  * Styles wouldn't display on Gutenberg.
* **Features**
  * Unfortunately it's buggy: hreflang button available for links, but database wouldn't keep it saved.

= 1.2.0 =
* **Bug fix**
  * Empty link tag on the header
* **Features**
  * Remove link x-default to avoid errors (better none than bad one)
  * NEW: add hreflang and href to Menu Items

= 1.1.2 =
* Bug: Fix JS Bug on TinyMCE Editor for both LANG and HREFLANG
* UX Improvement: keep your last value for HREFLANG or LANG, saving time while editing long posts.

= 1.1.1 =
* Bug: Fix fatal error on first installation.
* Security: Fix XSS Issue. (Thank you [Julio Potier](https://boiteaweb.fr/) - [SecuPress](https://secupress.me))

= 1.1.0 =
* Feature: Gutenberg Editor Support for lang attribute.
* Cleaning-up: Useless files removed.

= 1.0.2 =
* Improvement: Show the attributes in the editor while hovering or focusing them. (when the element is focusable)

= 1.0.1 =
* Features:
  * Style the buttons as activated when the cursor is on an element with hreflang or lang attribute.
  * Remove the attributes when click again on the button while the attribute is already set.

= 1.0.0 =
* Initial: Try it ;)
