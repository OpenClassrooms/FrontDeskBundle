[![Coverage Status](https://coveralls.io/repos/github/OpenClassrooms/FrontDeskBundle/badge.svg?branch=master&service=github)](https://coveralls.io/github/OpenClassrooms/FrontDeskBundle?branch=master&service=github)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/35e8fb65-9fb3-4e98-82dd-305ef058a784/mini.png)](https://insight.sensiolabs.com/projects/35e8fb65-9fb3-4e98-82dd-305ef058a784)
[![Build Status](https://travis-ci.org/OpenClassrooms/FrontDeskBundle.svg?branch=master)](https://travis-ci.org/OpenClassrooms/FrontDeskBundle.svg?branch=master)

The FrontDeskBundle offers integration of the FrontDesk Library.
FrontDesk Library is a PHP5 library that provides FrontDesk functionality in your application.
See [FrontDesk](https://github.com/OpenClassrooms/FrontDesk) for full details.

## Installation
This bundle can be installed using composer:

```composer require openclassrooms/front-desk-bundle```

or by adding the package to the composer.json file directly:

```json
{
    "require": {
        "openclassrooms/front-desk-bundle": "*"
    }
}
```

After the package has been installed, add the bundle to the AppKernel.php file:
```php
// in AppKernel::registerBundles()
$bundles = array(
    // ...
    new OpenClassrooms\Bundle\FrontDeskBundle\OpenClassroomsFrontDeskBundle(),
    // ...
);
```

## Configuration
```yml
# app/config/config.yml

openclassrooms_frontdesk:
    key:  %frontdesk.key%
    token: %frontdesk.token%
```

## Usage

###Post Client 
```php 
$personService = $container->get('openclassrooms.frontdesk.service.person');
$personService->create(new PersonStub());
```

###Post Pack 
```php
$packService = $container->get('openclassrooms.frontdesk.service.pack');
$packService->create(new PackStub());
```
