# Laravel E-commerce Product API (Nitin Kumar)

This project consists of a rebust API built using Laravel, designed to manage and provide functionalities for e-commerce product data. It serves as a single-file PHP script that seamlessly adds a REST API to your MySQL/MariaDB, PostgreSQL, SQL Server, or SQLite database.

## Features

- **Full-Featured REST API:** Instantly gain access to a comprehensive REST API  

- **Laravel and PHP Compatibility:** Developed using Laravel 9.19.0 and PHP 8.0, ensuring the latest features and enhancements are leveraged.

- **Requirements:**
  
- PHP 8.0 or higher
- MySQL 5.7 / MariaDB 10.0 or higher (spatial features supported in MySQL)
- [Composer](https://getcomposer.org/) (Install this dependency management tool for PHP)
- [XAMPP](https://www.apachefriends.org/index.html) or any other web server stack
- Laravel 9.19.0 (A PHP web application framework, install using Composer)

 
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

    
    cd ecom_laravel_product_api
    ```

3. Install dependencies using Composer:

    
    composer install
    ```

For more details on Laravel, please visit [Laravel Documentation](https://laravel.com/docs/9.x).


 
 **Install Dependencies:**
   ```bash
   composer install
   ```

1. **Configure the Environment:**
   - Create a copy of the `.env.example` file and save it as `.env`.
   - Update the `.env` file with your database connection details.

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
  php artisan db:seed --product_
  ```

 
 ## Setting Up the Project

Follow these steps to set up the project after cloning the repository:

### 1. Clone the Repository

```bash
git clone https://github.com/Nitin-Kumar7/ecom_laravel_product_api.git

 Certainly! Here's a guide for users on setting up the project after cloning the repository:

```markdown
## Setting Up the Project

Follow these steps to set up the project after cloning the repository:

### 1. Clone the Repository

```bash
git clone https://github.com/Nitin-Kumar7/ecom_laravel_product_api.git
```

### 2. Install Dependencies

Navigate to the project directory and install the required dependencies using Composer:

```bash
cd ecom_laravel_product_api
composer install
```

### 3. Create .env File

Duplicate the `.env.example` file and rename it to `.env`. Update the database connection details in the `.env` file according to your setup.

```bash
cp .env.example .env
```

### 4. Generate Application Key

Generate the application key with Artisan:

```bash
php artisan key:generate
```

### 5. Run Migrations

Run database migrations to create the necessary tables:


php artisan migrate
```

### 6. Run Seeders (Optional)

If there are seeders for the project, you can run them to populate the database with sample data:

 
php artisan db:seed --class=ProductSeeder
 

### 7. Start the Development Server

Start the Laravel development server:


php artisan serve
```

Your Laravel application should now be accessible at [http://localhost:8000](http://localhost:8000).

### 8. Additional Configuration (if needed)

Depending on your specific project requirements, you might need to perform additional configuration steps. Refer to the project documentation for any specific instructions.

Now you're all set! You have successfully set up the Laravel project.
```

Make sure to tailor the instructions based on your project's specific requirements and configurations.

## Notes

- Make sure to keep sensitive information secure, especially in the `.env` file.
- Customize the configuration based on your project requirements.

Feel free to explore the Laravel documentation for more in-depth information: [Laravel Documentation](https://laravel.com/docs).

Happy coding!
```

Replace `your-username` and `your-laravel-project` with your GitHub username and the name of your Laravel project repository, respectively. This README provides basic instructions for setting up a Laravel project and includes additional configuration options.
## Configuration

Edit the following lines in the bottom of the file "`api.php`":

    $config = new Config([
        'username' => 'root',
        'password' => '',
        'database' => 'products',
    ]);

 
 
 
### Development

You can access the non-compiled code at the URL:

    http://localhost:8080/api/product/1
 
 
### CRUD + List

The example posts table has only a a few fields:

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

   Get api/product/add

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
