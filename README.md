## BIGCOMMERCE INTEGRATION API

### Description
This package is for interacting with the BigCommerce platform. The package can be used to:
1. **Manage store/merchant**
    + Fetch store/merchant information from BigCommerce

2. **Manage products**
    + Import the full list of products (including categories, variants, and images) from a store on BigCommerce
    + Export a collection of products to a store on BigCommerce
    + Update existing products on a store on BigCommerce
    + Delete products from a store on BigCommerce
3. **Manage orders**
    + Import all orders from a store on BigCommerce
    + Import orders made within two dates
    + Update order status on BigCommerce store
4. **Manage customers**
    + Import customers from a store on BigCommerce
    + Add one or more customer to a store on BigCommerce
    + Update customer information for a store on BigCommerce

The package comes with repositories for the individual entities (Merchant, Category, Product, Order, Customer). It also comes with a class that combines all the other repositories into one.

### Requirements
This package requires PHP version 7.1 and above.

### Installation
Add the code below to your composer.json file and update it.
```
{
    "repositories": [
     {
            "type": "vcs",
            "url":  "https://bitbucket.org/maverickslab/bigcommerce"
        },
        {
            "type": "vcs",
            "url": "https://bitbucket.org/maverickslab/bigcommerce-laravel"
        }
    ],
    "require": {
        "mavericks-lab/bigcommerce": "dev-master",
        "mavericks-lab/bigcommerce-integration": "dev-master"
    }
}
```

### Usage [basic]

#### Initialization

```
<?php
use Maverickslab\Integration\BigCommerce\BigCommerceIntegrator;

$authToken = '';
$clientId = '';
$clientSecret = '';
$storeId = '';

$integrator = new BigCommerceIntegrator($authToken, $clientId, $clientSecret, $storeId);
```

#### Fetch store/merchant information
```
<?php 
$merchant = $integrator->merchant()->details();
```
`$merchant` is an instance of `Maverickslab\Integration\BigCommerce\Store\Model\Merchant`. You can now access merchant details as follows.

```
    // Get store Id
    echo $merchant->getId(), PHP_EOL;
    
    // Get store plan name
    echo $merchant->getPlanName(), PHP_EOL;
    
    // Get store plan level
    echo $merchant->getPlanLevel(), PHP_EOL;
    
    // Get merchant/store name
    echo $merchant->getName(), PHP_EOL;
    
    // Get merchant first name
    echo $merchant->getFirstName(), PHP_EOL;
    
    // Get merchant last name
    echo $merchant->getLastName(), PHP_EOL;
    
    // Get store admin email
    echo $merchant->getAdminEmail(), PHP_EOL;
    
    // Get store address
    echo $merchant->getAddress(), PHP_EOL;
    
    // Get country name
    echo $merchant->getCountry(), PHP_EOL;
    
    // Get currency
    echo $merchant->getCurrency(), PHP_EOL;
```
 Refer to `Maverickslab\Integration\BigCommerce\Store\Model\Merchant` for other details.

 #### Importing all product categories

```
$categories = $integrator->category()->import();
```
 `$categories` is an array of Categories, `Maverickslab\Integration\BigCommerce\Store\Model\Category[]`. You can access details of individual categories as follows.
```
 foreach ($categories as $category) {
     //Get id
    echo $category->getId(), PHP_EOL;
    //Get name
    echo $category->getName(), PHP_EOL;
    //Get description
    echo $category->getDescription(), PHP_EOL;
    //Get image url
    echo $category->getImageUrl(), PHP_EOL;
    //Get number of times a category has been views
    echo $category->getViews(), PHP_EOL;
}

```
Refer to `Maverickslab\Integration\BigCommerce\Store\Model\Category` on how to access other properties of a category.

#### Creating categories
##### Single category
```
$category = new Maverickslab\Integration\BigCommerce\Store\Model\Category();
$category->setName('Cloths');

$newCategories = $integrator->category()->export($category);

```
 ##### Multiple categories
```
 use Maverickslab\Integration\BigCommerce\Store\Model\Category;

$category1 = new Category();
$category1->setName('Cars');
$category1->setDescription('Description for cars');

$category2 = new Category();
$category2->setName('Planes');
$category2->setPageTitle('Page title for planes');

$category3 = new Category();
$category3->setName('Phones');
//Assign a parent to this category
$category3->setParentId(1);

$newCategories = $integrator->category()->export($category1, $category2, $category3);

```
`$newCategories` will is an array of Categories, `Maverickslab\Integration\BigCommerce\Store\Model\Category[]`, both when creating single and multiple categories.

#### Updating existing categories
**NOTE: Only categories with non-zero IDs will be sent to BigCommerce for update**
```
$categoryToUpdate = new Category();
$categoryToUpdate->setId(2); //REQUIRED
$categoryToUpdate->setName('Aeroplanes');

$updatedCategories = $integrator->category()->exportUpdate($categoryToUpdate);
```
**TIP: You can pass as many categories as like. They will all be updated and returned.**

#### Deleting categories
##### Deleting by Id
```
//Single deletion
$deleteCounts = $integrator->category()->deleteByIds(1);

//Multiple deletion
$deleteCounts = $integrator->category()->deleteByIds(1, 2, 3, 4, 5);

//OR

$ids = [1, 2, 3, 4, 5];
$deleteCounts = $integrator->category()->deleteByIds(...$ids);
```
 ##### Deleting by instance

 **NOTE: Only categories with non-zero IDs will be sent to BigCommerce for deletion**

```
 $categories = [new Category(), new Category(), new Category()];

 $deleteCounts = $integrator->category()->delete(...$categories);
  ```
#### Importing products
```
$allProducts = $integrator->product()->import();
```
 `$allProducts` is an array products,`Maverickslab\Integration\BigCommerce\Store\Model\Product[]`, of all products in the store.

 