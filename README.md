[![Build Status](https://secure.travis-ci.org/ddeboer/DdeboerSalesforceMapperBundle.png?branch=master)](http://travis-ci.org/ddeboer/DdeboerSalesforceMapperBundle)

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

Documentation
-------------

Documentation is included in the [Resources/doc directory](http://github.com/ddeboer/DdeboerSalesforceMapperBundle/tree/master/Resources/doc/index.md).