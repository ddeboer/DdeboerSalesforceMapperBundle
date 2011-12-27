Ddeboer Salesforce Mapper Bundle
================================

Introduction
------------

This bundle provides transparent, object-oriented access to your Salesforce
data. 

### Features

* Easily fetch records from Salesforce, and save these same records back to
  Salesforce: read-only fields are automatically ignored when saving.
* Find by criteria, so you don’t have to roll your own SOQL queries.
* Fetch related records in one go, so you save on
[API calls](http://www.salesforce.com/us/developer/docs/api/Content/implementation_considerations.htm#topic-title_request_metering).
* Adjust the mappings to retrieve and save records exactly like you want to.
* The MappedBulkSaver helps you stay within your Salesforce API limits by using
  bulk creates, deletes, updates and upserts for mapped objects.
* Completely unit tested (still working on that one).

Installation
------------

This bundle is available on [Packagist](http://packagist.org/packages/ddeboer/salesforce-mapper-bundle).

### 1. To add this bundle to your project, add the following to your `composer.json`:

```
{
    ...
    "require": {
        ...,
        "ddeboer/salesforce-mapper-bundle": "*"
    }
    ...
}
```

### 2. Install it:

```
$ composer.phar update
```

### 3. Finally, add the bundle to your kernel:

Add the following to `AppKernel.php`:

```
    public function registerBundles()
    {
        $bundles = array(
            ...
            new Ddeboer\Salesforce\ClientBundle\DdeboerSalesforceClientBundle(),
            new Ddeboer\Salesforce\ClientBundle\DdeboerSalesforceMapperBundle(),
            ...
        );
    }
```

Usage
-----

Once installed, the bundle offers several services:

* a mapper: `ddeboer_salesforce_mapper`
* a bulk saver: `ddeboer_salesforce_mapper.bulk_saver`.

Use the mapper to fetch records from and save them to your organisation’s
Salesforce data. An example:

```
use Ddeboer\Salesforce\MapperBundle\Model;

$result = $this->container->get('ddeboer_salesforce_mapper')->findBy(array(
    new Model\Opportunity(),
    array(
        'Name'  => 'Just an opportunity'
    )
));
```

This will fetch all opportunities with the name ‘Just an opportunity’ from
Salesforce. The mapper returns a `$result` as a `MappedRecordIterator`. You can
iterate over this. Every element in the iterator is a full-fledged
`Model\Opportunity` object.

```
foreach ($result as $opportunity) {
    echo 'Opportunity id: ' . $opportunity->getId();
}
```

You can even fetch related records automatically:

```
echo 'The opportunity belongs to: ' . $opportunity->getAccount()->getName();
```

Or save them back:

```
$account = $opportunity->getAccount();
$account->setName('Name change!');
$mapper->save($account);
```

### Fetching records

#### Fetch all records

```
$results = $mapper->findAll('Ddeboer\Salesforce\MapperBundle\Model\Task');
```

### Custom objects and properties

In the `Model` folder you will find several standard Salesforce objects. As this
is a generic client bundle, this directory does not contain custom objects, nor
do the objects in it have custom properties. If you would like to add custom
objects or properties, please extend from AbstractModel or the models provided
respectively. 