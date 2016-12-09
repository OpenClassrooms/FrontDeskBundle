[![SensioLabsInsight](https://insight.sensiolabs.com/projects/35e8fb65-9fb3-4e98-82dd-305ef058a784/mini.png)](https://insight.sensiolabs.com/projects/35e8fb65-9fb3-4e98-82dd-305ef058a784)
[![Build Status](https://travis-ci.org/OpenClassrooms/FrontDeskBundle.svg?branch=master)](https://travis-ci.org/OpenClassrooms/FrontDeskBundle.svg?branch=master)
[![Coverage Status](https://coveralls.io/repos/github/OpenClassrooms/FrontDeskBundle/badge.svg?branch=master)](https://coveralls.io/github/OpenClassrooms/FrontDeskBundle?branch=master)

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

### Pack
```php
$packService = $container->get('openclassrooms.frontdesk.service.pack');
```
#### Create Pack 
```php
$packService->create(new PackStub());
```
#### Delete Pack by id
```php
$packService->deletePack($packId); 
```

### Person
```php 
$personService = $container->get('openclassrooms.frontdesk.service.person');
```
#### Post Person
```php 
$personService->create(new PersonStub());
```
#### Put Person
```php 
$personService->update(new PersonStub());
```
#### Get Person by id
```php 
$personService->find($personId);
```
#### Get All People
```php 
$personService->findAll($page);
```
#### Get person by query
```php 
$personService->search($query);
```

### Plan
####Get Plan by Person id 
```php
$planService = $container->get('openclassrooms.frontdesk.service.plan');
$planService->getPlans($personId);
```

### Visit
#### Get Visits by person id 
```php
$visitService = $container->get('openclassrooms.frontdesk.service.visit');
$visitService->getVisits($personId, $from, $to);
```
#### Delete Visit by id 
```php
$visitService = $container->get('openclassrooms.frontdesk.service.visit');
$visitService->deleteVisit($visitId);
```
