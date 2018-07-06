# MenuLink plugin for CakePHP 3

This is a handy and really simple plugin for displaying the active menu item based on the url. If you have a link pointing to the current url, it will get an "active" css class. You should add your own css definitin for `a.active` to your css file.

## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

```
composer require rrd108/cakephp-menulink
```

## Usage

### Load the plugin

Load the plugin in your `/config/bootstrap.php` file

```php
Plugin::load('MenuLink');
```

### Load and use the helper

You can load the helper in two different ways, the reccomended way or the override way.

#### Recommended way

In your `/src/View/AppView.php` file at your `initialize()` method load the helper like this.

```php
$this->loadHelper('MenuLink.MenuLink');
```

In this case in your view files you should use the helper like this.

```php
$this->MenuLink->menuLink(
    'Link text',
    [
        'controller' => 'posts', 
        'action' => 'index'
    ],
    [$options]
);
```
The menuLink call handles the same paramaeters as the core Html helper's [link method](https://book.cakephp.org/3.0/en/views/helpers/html.html#creating-links)

#### Override the Html helper

This is a little bit more comfortable way to do the same above. As this way overrides the core Html helper it can conflict with other helpers trying to override the same thing.

In your `/src/View/AppView.php` file at your `initialize()` method load the helper like this.

```php
$this->loadHelper('Html', ['className' => 'MenuLink.MenuLink']);
```

In this case in your view files you should use the helper like this.

```php
$this->Html->menuLink(
    'Link text',
    [
        'controller' => 'posts', 
        'action' => 'index'
    ],
    [$options]
);
```
The menuLink call handles the same paramaeters as the core Html helper's [link method](https://book.cakephp.org/3.0/en/views/helpers/html.html#creating-links)

In both ways your active link will look like this, but others will do not have this css class definition.
```html
<a href="/posts/index" class="active">Link text</a>
```
