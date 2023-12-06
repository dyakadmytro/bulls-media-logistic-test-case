# Laravel Online Shop Delivery System

## Project Overview

This project demonstrates a robust implementation of a delivery system for an online shop using Laravel. It showcases my proficiency in Laravel development, focusing on scalable and flexible design principles.

## Features

- **Extensible Delivery Service Integration**:
    - Central to the project is the implementation of a flexible delivery system that can be easily expanded to accommodate future external delivery services.
    - Achieved through a `DeliveryServiceContract` interface and its concrete implementations in various delivery services, such as `NovaposhtaDeliveryService`.
    - Designed for easy integration of additional services like `UkrposhtaDeliveryService` or `JustinDeliveryService`, each with their own unique implementations but conforming to the shared interface.

- **Adherence to SOLID Principles**:
    - The design is a classic example of polymorphism, utilizing both the Dependency Inversion Principle (DIP) and the Interface Segregation Principle (ISP).
    - Allows for easy expansion and modification of delivery services without impacting the core functionality of the application.

- **Future-Proofing and Enhanced Control**:
    - Anticipating future needs, methods such as `cancelDelivery` and `trackDelivery` are included in the `DeliveryServiceContract`.
    - Lays the groundwork for advanced delivery management and control features.

- **Comprehensive Laravel Feature Utilization**:
    - Highlights expertise in various aspects of basic Laravel development processes, including:
        - Test-Driven Development (TDD)
        - Working with models, relationships, and migrations
        - Developing controllers and Jobs

## Setup and Configuration

Clone repository
```
git clone https://github.com/dyakadmytro/bulls-media-logistic-test-case.git
```
Configure database
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

run migrations

```
php artisan migrate
```

run seeders 
```
php artisan db:seed UnitSeeder 
```

## Usage

Check tests and their workflow
```
php artisan test
```
