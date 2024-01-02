# Laravel E-commerce Product API (Nitin Kumar)

This project consists of a rebust API built using Laravel, designed to manage and provide functionalities for e-commerce 
 
 
## Prerequisites

Before you begin, ensure you have met the following requirements:

- **PHP 8.0 or higher:** Make sure you have PHP installed on your system. You can download it from the [official PHP website](https://www.php.net/).

- **Composer:** This project uses Composer for dependency management. If you haven't installed Composer, you can get it from [getcomposer.org](https://getcomposer.org/).

- **MySQL 5.7 / MariaDB 10.0 or higher:** Ensure you have a MySQL or MariaDB database server installed. You can download MySQL from [mysql.com](https://dev.mysql.com/downloads/) or MariaDB from [mariadb.org](https://mariadb.org/).

- **XAMPP or equivalent (optional):** If you prefer using a local development environment, you can install XAMPP or another similar solution. XAMPP provides an easy way to set up Apache, MySQL, PHP, and more.

- **Laravel 9.19:** This project is built with Laravel. Make sure you have Laravel 9.19 installed. You can find Laravel installation instructions in the [official Laravel documentation](https://laravel.com/docs/9.x/installation).

Once you have these prerequisites in place, you'll be ready to clone the repository and set up the project.

  
## Getting Started

1. Clone the repository:

    
    git clone https://github.com/Nitin-Kumar7/ecom_laravel_product_api.git
    ```

2. Navigate to the project directory:

  

 **Install Dependencies:**
   ```bash
   composer install
   ```

1. **Configure the Environment:**
   - Create a copy of the `.env.example` file and save it as `.env`.
   - Update the `.env` file with your database connection details.

  
Edit the following lines in the bottom of the file "`.env`":

    $config = new Config([
        'username' => 'root',
        'password' => '',
        'database' => 'products',
]);

2. **Generate Application Key:**
   ```bash
   php artisan key:generate
   ```

3. **Run Migrations:**
   ```bash
   php artisan migrate
   ```

4. **Start the Development Server:**
   ```bash
   php artisan serve
   ```
5. **Access Your Laravel Application:**
   Open your web browser and go to [http://localhost:8000](http://localhost:8000) to see your Laravel application.

## Additional Configuration

  
- **Database Seeder:**
  You can seed the database with sample data using the following command:
  ```bash
 php artisan db:seed --class=ProductSeeder
  ```

  

### 7. Start the Development Server
 
php artisan serve
```

Your Laravel application should now be accessible at [http://localhost:8000](http://localhost:8000).

 



 
 
 
### Development

You can access the non-compiled code at the URL:

    http://localhost:8080/api/products/1
 
 
### CRUD + List

The example product table has only a a few fields:

    id     
    name  
    product_price   
    selling_price
    quantity 
    image   
    description
    created_at
    updated_at

The CRUD + List operations below act on this table.

#### Create

If you want to create a record the request can be written in URL format as: 

   Get api/products/add

You have to send a body containing:

    {
    "name":"name of product",
    "description":"product description",
    "product_price":"product price ",
    "selling_price":"product selling price",
    "quantity":70
     "image":" "null if on test mode"
    }

And it will return the response like this:
{
    "status": true,
    "message": "Product added successfully.",
    "data": {
        "name": "Accusamus ss",
        "description": "this is the test",
        "product_price": "43.80",
        "selling_price": "80.78",
        "quantity": 70,
        "updated_at": "2024-01-01T17:31:22.000000Z",
        "created_at": "2024-01-01T17:31:22.000000Z",
        "id": 102
    }
}
 

#### Read

To read a record from this table the request can be written in URL format as:

    GET products/show/2

Where "1" is the value of the primary key of the record that you want to read. It will return:

   {
    "status": true,
    "message": "Product fetched successfully.",
    "data": {
        "id": 2,
        "name": "Eveniet vero provident impedit autem.",
        "description": "Eos architecto odio quidem corporis odio. Et aspernatur et recusandae. Et velit quos qui ut. Aspernatur id illo et et.",
        "product_price": "43.93",
        "selling_price": "90.59",
        "quantity": 70,
        "created_at": "2023-12-31T12:16:10.000000Z",
        "updated_at": "2023-12-31T12:16:10.000000Z"
    }
}

 

#### Update

To update a record in this table the request can be written in URL format as:

    PUT api/products/update/5

Where "5" is the value of the primary key of the record that you want to update. Send as a body:

    {
    "name":"Accusamus dis updated",
    "description":"this is the test",
    "product_price":"43.80",
    "selling_price":"80.78",
    "quantity":70
    }

This adjusts the title of the post. And the return value is the number of rows that are set:

  {
    "status": true,
    "message": "Product updated successfully.",
    "data": {
        "id": 100,
        "name": "Accusamus dis updated",
        "description": "this is the test",
        "quantity": 70,
        "image": null,
        "product_price": "43.80",
        "selling_price": "80.78",
        "created_at": "2023-12-31T19:27:39.000000Z",
        "updated_at": "2023-12-31T19:30:43.000000Z"
    }
}

#### Delete

If you want to delete a record from this table the request can be written in URL format as:

    DELETE api/products/delete/5

And it will return response:

   {
    "status": true,
    "message": "Product deleted successfully.",
    "data": []
}

#### List

To list records from this table the request can be written in URL format as:

    GET /api/products

It will return:

    {
    "status": true,
    "message": "Products fetched successfully.",
    "data": [
        {
            "id": 1,
            "name": "test",
            "description": "Aut minus iste culpa in vitae necessitatibus dolores. Et ea deserunt ea tempora sunt. Fugit id eligendi ut expedita eum. Officiis eaque facere est accusantium.",
            "product_price": "43.80",
            "selling_price": "80.78",
            "quantity": 70,
            "created_at": "2023-12-31T12:16:10.000000Z",
            "updated_at": "2023-12-31T12:16:10.000000Z"
        },]
        },...

  #### search 
  To get the product via saerch use the following request:

   Get api/products/search

   body parameters: 

   {
    "search": "test"
   }

   It will return :
   {
    "status": true,
    "message": "Search successful.",
    "data": [
        {
            "id": 1,
            "name": "test",
            "description": "Aut minus iste culpa in vitae necessitatibus dolores. Et ea deserunt ea tempora sunt. Fugit id eligendi ut expedita eum. Officiis eaque facere est accusantium.",
            "product_price": "43.80",
            "selling_price": "80.78",
            "quantity": 70,
            "created_at": "2023-12-31T12:16:10.000000Z",
            "updated_at": "2023-12-31T12:16:10.000000Z"
        }
    ]
}

 

   
 
 
 
### Docker compose

This repository also contains a `docker-compose.yml` file that you can install/build/run using:

    apt install docker-compose
    docker-compose build
    docker-compose up

This will setup a database (MySQL) and a webserver (Apache) and runs the application using the blog example data used in the tests.

Test the script (running in the container) by opening the following URL:

    http://localhost:8080/product/api/
 
 
Enjoy!
