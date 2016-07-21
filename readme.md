# Piwik plugin

A plugin for [Kirby 2 CMS](http://getkirby.com) that generates piwik analytics code to use in your templates.

## Installation

Put the `piwik` folder in `/site/plugins`.

Copy or link the `piwik` directory to `site/plugins/` **or** use the [Kirby CLI](https://github.com/getkirby/cli):

```
kirby plugin:install schnti/kirby-piwik
```

### Config Variables

**Tracking**
* ka.piwik.tracking: true / false (Default: false)
* ka.piwik.url: 'stats.yourpage.com'
* ka.piwik.id: 1 (replace with the page ID in your piwik installation)

**Widget**
* ka.piwik.widget: true / false (Default: false)
* ka.piwik.apitoken: Your-Piwik-API Token

```php
c::set('ka.piwik.url', 'stats.yourpage.com');
c::set('ka.piwik.id', 28);
c::set('ka.piwik.tracking', true);
c::set('ka.piwik.widget', true);
c::set('ka.piwik.apitoken', 'abcdefghijklmnopqrstuvwxyz');
```

## How to use it

```php
<!-- use this right before closing </body> tag -->
<?php echo piwik(); ?>
```