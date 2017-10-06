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
5. **Writing to local application database**
    + Write products and related information to application database
    + Write order and related information to application database
    + Write customer and related information to application database

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

### Usage

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

##### All products

```
$allProducts = $integrator->product()->import();
```
`$allProducts` is an arrays of products,`Maverickslab\Integration\BigCommerce\Store\Model\Product[]`, of all products in the store.

##### Products matching a set of filters
```
$filters = array(
    'type' => 'physical' //Import only physical products
);

$filteredProducts = $integrator->product()->import($filters);
```
`$filteredProducts` is an arrays of products,`Maverickslab\Integration\BigCommerce\Store\Model\Product[]`, matching the specified filters.

##### Import a single product by Id
```
 $id = 90;
 $product = $integrator->product()->importById($id);
```

#### Exporting products
 New products can be imported one at a time or as a collection.

##### Single product
```
 use Maverickslab\Integration\BigCommerce\Store\Model\Product;
 
$newProduct = new Product();
$newProduct->setName('Google pixel 2');
$newProduct->setCondition(Product::CONDITION_NEW);
$newProduct->setSKU('GOOPIX2');
$newProduct->setPrice(880.50);
$newProduct->setCategoryIds(1, 3);
$newProduct->setWeight(2.4);
$newProduct->setType(Product::TYPE_PHYSICAL);

 $exportedProducts = $integrator->product()->export($newProduct);
```
##### Multiple products
```
use Maverickslab\Integration\BigCommerce\Store\Model\Product;
$product1 = new Product();
$product1->setName('Google pixel 2');
$product1->setSKU('GOOPIX2');
$product1->setPrice(880.50);
$product1->setCategoryIds(1, 3);
$product1->setWeight(2.4);
$product1->setType(Product::TYPE_PHYSICAL);

$product2 = new Product();
$product2->setName('Google Nexus 5');
$product2->setPrice(580);
$product2->setCategoryIds(3);
$product2->setWeight(4);
$product2->setType(Product::TYPE_PHYSICAL);

$product3 = new Product();
$product3->setName('McAFEE Antivirus Plus');
$product3->setPrice(80.50);
$product3->setCategoryIds(1);
$product3->setWeight(1.4);
$product3->setType(Product::TYPE_DIGITAL);

$exportedProducts = $integrator->product()->export($product1, $product2, $product3);
```
##### Products with variations

```
use Maverickslab\Integration\BigCommerce\Store\Model\{Product, ProductVariant, ProductOptionValue);

//Create product
$product = new Product();
$product->setName('Google pixel 3');
$product->setSKU('GOOPIX2');
$product->setPrice(880.50);
$product->setCategoryIds(1, 3);
$product->setWeight(2.4);
$product->setType(Product::TYPE_PHYSICAL);

//Create variant
$variant = new ProductVariant();
$variant->setSKU('GOOPIX2-PLUS');
$variant->setPrice(890);

//Create option values for variant
$optionValue = new ProductOptionValue();
$optionValue->setOptionDisplayName('Colour');
$optionValue->setLabel('Red');

//Add option value to variant
$variant->addOptionValues($optionValue);//You can add more than option value

//Add variant to product
$product->addVariants($variant); //You can add more than one variant

//Export the product
$createdProducts = $integrator->product()->export($product);
```
#### Updating existing products on BigCommerce

**NOTE: Only products with non-zero IDs will be sent to BigCommerce for update.**

```
$products = [
    new Product(),
    new Product(),
    new Product()
];

$updatedProducts = $integrator->product()->exportUpdate(...$products);
```
#### Deleting products
##### Deleting by IDs
```
$productIds = [2, 3, 5];
$deleteCounts = $integrator->product()->deleteByIds(...$productIds);
```
##### Deleting by instances
**NOTE: Products without valid Ids will be ignored**
```
$products = [new Product(), new Product(), new Product()];

$deleteCounts = $integrator->product()->delete(...$products);
```
##### Deleting by filters
```
$filters = ['type' => 'digital', 'condition' => 'used'];

$integrator->product()->deleteByFilter($filters);1
```
#### Importing orders
##### Importing all orders
```
$orders = $integrator->order()->import();

foreach($orders as $order) {
    //Get ordered products
    //Each ordered product is an instances of Maverickslab\Integration\BigCommerce\Store\Model\OrderedProduct
    foreach($order->getProducts() as $orderedProduct) {
        //Get product name
        $orderedProduct->getName();

        //Get quantity
        $orderedProduct->getQuantity();
    }

    //Get customer information
    //A customer is an instances of Maverickslab\Integration\BigCommerce\Store\Model\Customer
    $order->getCustomer();

    //Get billing address
    //A billing address is an instance of Maverickslab\Integration\BigCommerce\Store\Model\BillingAddress
    $order->getBillingAddress();

    //Get shipping addresses
    //Each shipping address is an instance of Maverickslab\Integration\BigCommerce\Store\Model\ShippingAddress
    $order->getShippingAddresses();

    //Get total items in order
    $order->getItemsTotal();

    //Get total cost of order excluding tax
    $order->getTotalExcludingTax();

    //Get total cost of order including tax
    $order->getTotalIncludingTax();
}
```
Refer to `Maverickslab\Integration\BigCommerce\Store\Model\Order` for more information on how to access other properties of an order.

You may also filter order by passing an array of filters to the `import()` method as shown below.
```
//Import orders that are pending
$filters = ['status_id' => 1];

$orders = $integrator->order()->import($filters);
```

#### Importing order that were made between two dates
The code below will import all orders that were made 30 days ago.

```
$startDateTime = new DateTime('30 days ago');
$endDateTime = new DateTime();
$orders = $integrator->order()->importBetweenDates($startDateTime, $endDateTime);

//OR
//If the second parameter is omitted, the current date and time will be used
$orders = $integrator->order()->importBetweenDates($startDateTime);

```
**TIP: You may also pass an array of filters as a third parameter to the `importBetweenDates()` method.**

#### Importing order status
```
$statuses = $integrator->order()->importStatuses();

foreach($statuses as $status) {
    //Get status Id
    $status->getId();

    //Get status name
    $status->getName();

    //Get status description
    $status->getSystemDescription();

    //Get custom label 
    $status->getCustomLabel();
}
```
Each order status is an instance of `Maverickslab\Integration\BigCommerce\Store\Model\OrderStatus`.

#### Updating status of orders

**NOTE: The only properties required to update an order's status are the Id and the status Id.**

```
$order1 = new Order();
$order1->setId(1);
$order1->setStatusId(0);//Incomplete

$order2 = new Order();
$order2->setId(1);
$order2->setStatusId(10); //Completed

$order3 = new Order();
$order3->setId(3);
$order3->setStatusId(11); //Awaiting Fulfillment

$numberOfOrdersUpdate = $integrator->order()->exportUpdateOrderStatus($order1, $order2, $order3);
```
#### Importing customers

```
//Import all customers
$customers = $integrator->customer()->import();

//Read customer properties
foreach($customers as $customer) {
    //Get customer Id
    $customer->getId();

    //Get customer first name
    $customer->getFirstName();

    //Get customer last name
    $customer->getLastName();

    //Get customer's compoany
    $customer->getCompany();

    //Get customer email address
    $customer->getEmail();

    //Get customer phone number
    $customer->getPhone();

    //Get customer store credit
    $customer->getStoreCredit();

    //Get customer group Id
    $customer->getGroupId();

    //Read customer's addresses
    foreach($customer->getAddresses() as $address) {
        //Get country
        $address->getCountry();

        //Get state
        $address->getState();

        //Get city
        $address->getCity();

        //Get streets
        $address->getStreetOne();
        $address->getStreetTwo();

        //Get address type
        $address->getType();
    }

}
```
See `Maverickslab\Integration\BigCommerce\Store\Model\Customer` for more information on how to access other properties of a customer.

#### Exporting customers

```
use Maverickslab\Integration\BigCommerce\Store\Model\Customer;

$customer = new Customer();
$customer->setFirstName('George');
$customer->setLastName('Smith');
$customer->setEmail('smithgeorge@somedomain.com');
$customer->setPhone('+2337885788575');
//Add more properties

$exportedCustomers = $integrator->customer()->export($customer);
```
#### Updating existing customers

**NOTE: Only customers with non-zero IDs will sent to BigCommerce for update.**
```
$customers = [new Customer(), new Customer(), new Customer()];

$updatedCustomers = $integrator->customer()->exportUpdate(...$customers);
```
#### Deleting existing customers
```
//Delete a single customer by Id
$id = 3;
$deleteCounts = $integrator->customer()->deleteByIds($id);

//Deleting multiple customers by Ids
$ids = [3, 4, 5, 1];
$deleteCounts = $integrator->customer()->deleteByIds(...$ids);
```
#### Writing to local application database
You don't need this library to write to your application database for you. However, if you wish to do so, you must implement or extend a class the implements the`Maverickslab\Integration\BigCommerce\Store\Repository\Writer\RepositoryWriterInterface` interface.

To make it easy to use the library to write models to your local database, there's an empty implementation of the `RepositoryWriterInterface`, `Maverickslab\Integration\BigCommerce\Store\Repository\Writer\RepositoryWriter`, that you  can extend and override the methods that you need to work with your database. Below is an example of how to write products to a local database.

```
use Maverickslab\Integration\BigCommerce\Store\Repository\Writer\RepositoryWriter;
use Maverickslab\Integration\BigCommerce\Store\Model\Product;

class SyncommerceRepositoryWriter extends RepositoryWriter {

    /**
     * 
     * {@inheritDoc}
     * @see \Maverickslab\Integration\BigCommerce\Store\Repository\Writer\RepositoryWriter::createProducts()
     */
    public function createProducts(Product ...$products): array {
        //Format product
        $formattedProductsArray = array_map(function(Product $product){
            return $product->toArray();
        }, $products);

        //Save products to database
        DB::table('products')->insert($formattedProductsArray);

        //Returns the saved products or an empty array
        return [];
    }
}
```
The newly create repository writer can be used as shown below.
```
use Maverickslab\Integration\BigCommerce\BigCommerceIntegrator;

$authToken = '';
$clientId = '';
$clientSecret = '';
$storeId = '';
$repositoryWriter = new SyncommerceRepositoryWriter();

//Pass the repository writer as the fifth parameter
$integrator = new BigCommerceIntegrator($authToken, $clientId, $clientSecret, $storeId, $repositoryWriter);

//Import products from BigCommerce 
$importedProducts = $integrator->product()->import();

//Save imported products locally
$savedProducts = $integrator->product()->save(...$importedProducts);
```



