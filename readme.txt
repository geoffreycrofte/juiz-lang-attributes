=== Juiz Lang Attribute ===
Contributors: CreativeJuiz
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=P39NJPCWVXGDY&lc=FR&item_name=Juiz%20Lang%20Attributes2d%20WP%20Plugin&item_number=%23wp%2djla&currency_code=EUR&bn=PP%2dDonationsBF%3abtn_donate_SM%2egif%3aNonHosted
Tags: lang, hreflang, alternate, attribute, SEO, accessibility, translation
Requires at least: 4.5
Tested up to: 5.1.1
Stable tag: 1.1.0

Add a custom HREFLANG meta box on your post to manually edit the link between your post and a translation (which could be outside your domain). Also add the `lang` and `hreflang` attributes to the TinyMCE editor.

== Description ==

To improve your SEO and the accessibility of your content, you are supposed to announce translations of your pages to Google to avoid duplicate content.
The Editor button to add `lang` and `hreflang` attributes on your content are here to improve accessibility when screen readers are passing on words from different languages than your main language.

**Example of cases you need this plugin:**

* You translated a blog post in your language from another blog, (hreflang alternate links)
* You publish the same article in 2 languages on 2 different websites, (hreflang alternate links)
* You use in your content a jargon from another language. (`lang` attribute)
* You link from your post other posts in another language. (`hreflang` attribute)

**You can donate to support**

* [Donate what you want with Paypal](https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=P39NJPCWVXGDY&lc=FR&item_name=Juiz%20Lang%20Attributes2d%20WP%20Plugin&item_number=%23wp%2djla&currency_code=EUR&bn=PP%2dDonationsBF%3abtn_donate_SM%2egif%3aNonHosted)
* [Flattr this thing!](https://flattr.com/submit/auto?user_id=CreativeJuiz&url=http://wordpress.org/plugins/juiz-lang-attributes/&title=Juiz%20Lang%20Attributes-%20WordPress%20Plugin&description=Add%20lang%20and%20hreflang%20attributes%20to%20the%20editor%20to%20improve%20accessibility%20and%20SEO&tags=WordPress,Social,Share,Buttons,Network,Twitter,Facebook,Linkedin&category=software)

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
It happens sometimes when you alreay have another plugin that does dirty things with your editor. I can't control him anyway. Try to deactivate the dirty plugin to be sure it comes for it and see if the Juiz Lang Attributes buttons appear.

* **My editor (Gutenberg) doesn't display the buttons. Why?**
For the moment I don't support Gutenberg editor. Working on a way to support it.
Thanks.


== Screenshots ==

1. Metabox for post
2. TinyMCE with new buttons
3. Attributes well placed on your HTML

== Other plugins ==

**<a href="http://wordpress.org/plugins/juiz-social-post-sharer/">Juiz Social Post Sharer</a>**: if you need social buttons.
**<a href="https://fr.wordpress.org/plugins/juiz-outdated-post-message/">Juiz Outdated Post Message</a>**: if you want to put a warning on old post on your blog.
**<a href="https://wordpress.org/plugins/embed-can-i-use/">Embed Can I Use</a>**: if you talk about support of HTML 5, CSS3 or JS API, you need to embed Can I Use support tables.


== Changelog ==

= 1.1.0 =
* Feature: Gutenberg Editor Support
* Cleaning-up: Useless files removed.

= 1.0.2 =
* Improvement: Show the attributes in the editor while hovering or focusing them. (when the element is focusable)

= 1.0.1 =
* Features:
  * Style the buttons as activated when the cursor is on an element with hreflang or lang attribute.
  * Remove the attributes when click again on the button while the attribute is already set.


= 1.0.0 =
* Initial: Try it ;)
