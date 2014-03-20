# MUIH

[![Build Status](https://travis-ci.org/myclabs/MUIH.png?branch=master)](https://travis-ci.org/myclabs/MUIH) [![Coverage Status](https://coveralls.io/repos/myclabs/MUIH/badge.png)](https://coveralls.io/r/myclabs/MUIH) [![Latest Stable Version](https://poser.pugx.org/myclabs/muih/v/stable.png)](https://packagist.org/packages/myclabs/muih) [![Total Downloads](https://poser.pugx.org/myclabs/muih/downloads.png)](https://packagist.org/packages/myclabs/muih) [![License](https://poser.pugx.org/myclabs/muih/license.png)](https://packagist.org/packages/myclabs/muih)

MUIH, for Myc-lab User Interface Helper, is a PHP and Javascript library containing helpers for creation of Bootstrap 3 UI elements.

It is aiming to provide plain php objects for html/js component and helper for Zend1, Zend2 and twig(to be implemented).


Usage:

```php
$button = new Button('Some Label', 'info');
$button->display();
```

This will echo a simple html button.
Alternatively, you can use render() to get the code.


```php
$modal = new Modal('Some Content');

$modal->setHeaderContent('Some Title');
$modal->addAttribute('id', 'some_id');
$modal->getBody()->addClass('some-class');

$modal->display();
```

This will echo a modal #some_id element, with body having .some-class class.


```php
echo $this->button('Show Modal')->showModal('some_id');
```

You can also use helper fer Zend1 and Zend2.