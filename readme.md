# Piwik plugin

A plugin for [Kirby 2 CMS](http://getkirby.com) that generates piwik analytics code to use in your templates.

## Installation

Copy or link the `piwik` directory to `site/plugins/` **or** use the [Kirby CLI](https://github.com/getkirby/cli):

```
kirby plugin:install schnti/kirby-piwik
```

### Config Variables

**Tracking**
* ka.piwik.tracking: Boolean (enable tracking, default: false)
* ka.piwik.trackingIfLoggedIn: Boolean (enable tracking when user is logged in, default: true)
* ka.piwik.url: String (piwik endpoint)
* ka.piwik.id: Int (page ID in your piwik installation)

**Widget**
* ka.piwik.widget: Boolean (show widget, default: false)
* ka.piwik.apitoken: String (your piwik API token)

```php
c::set('ka.piwik.url', 'stats.yourpage.com');
c::set('ka.piwik.id', 28);
c::set('ka.piwik.tracking', true);
c::set('ka.piwik.trackingIfLoggedIn', true);
c::set('ka.piwik.widget', true);
c::set('ka.piwik.apitoken', 'abcdefghijklmnopqrstuvwxyz');
```

## How to use it

### Tracking

use this right before closing `</body>` tag

```php
<?= piwik(); ?>
```

### OptOut

In your text file you can use it as follows:

```
(piwikOptOut:)
```