# Laravel API Project: Country Details and States


This is a Laravel API project that leverages a 3rd-party API to retrieve and display details about a specific country, including its basic information and a list of its states or provinces. This README file will guide you through the setup and usage of this API project.

## Table of Contents

- [Prerequisites](#prerequisites)
- [Getting Started](#getting-started)
  - [Clone the Repository](#clone-the-repository)
  - [Install Dependencies](#install-dependencies)
  - [Environment Configuration](#environment-configuration)
  - [Database Setup](#database-setup)
  - [Running the Application](#running-the-application)
- [API Endpoints](#api-endpoints)
  - [Get Country Details](#get-country-details)
  - [Get States of a Country](#get-states-of-a-country)



## Prerequisites

Before you begin, ensure you have met the following requirements:

- PHP 8.0 or higher
- Composer (https://getcomposer.org/)
- Laravel (https://laravel.com/docs/8.x/installation)
- MySQL or another compatible database system

## Getting Started

Follow these steps to get the Laravel API project up and running on your local development environment.

### Clone the Repository

```bash
git clone https://github.com/JsmediaGP/3rdpartyAPI.git
cd 3rdpartyAPI
```

### Install Dependencies

Run the following command to install the project dependencies:

```bash
composer install
```

### Environment Configuration

Create a copy of the `.env.example` file and rename it to `.env`. Update the database and other relevant environment variables in the `.env` file.

```bash
cp .env.example .env
```

### Database Setup

1. Create a new database in your MySQL server for this project.
2. Update the `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` variables in the `.env` file with your database configuration.

Next, run the following command to migrate the database tables:

```bash
php artisan migrate
```

### Running the Application

You can start the development server using the following command:

```bash
php artisan serve
```

Your Laravel application will be available at `http://localhost:8000`.

## API Endpoints

This Laravel API provides the following endpoints:

### Get Country Details

**Endpoint:** `/country/details/{country}`

**Method:** GET

**Example Request:**

```http
GET /api/country/details/Nigeria
```

**Example Response:**

```json

[
    {
        "Population": 206139587,
        "Capital City": [
            "Abuja"
        ],
        "Currency": {
            "NGN": {
                "name": "Nigerian naira",
                "symbol": "₦"
            }
        },
        "Location": [
            10,
            8
        ],
        "ISO2": "NG",
        "ISO3": "NGA"
    }
]
```

### Get States of a Country

**Endpoint:** `/api/country/states`

**Method:** GET

**Description:** 
Send a GET request to the `/api/country/states` endpoint with the following parameters:

- `country`: accept the name of the country.


**Example Request:**

```json
POST /api/country/states
Content-Type: application/json

{
    "country": "Nigeria"
}
```


**Example Response:**

```json
    {
        "error": false,
        "msg": "states in Nigeria retrieved",
        "data": {
            "name": "Nigeria",
            "iso3": "NGA",
            "iso2": "NG",
            "states": [
                {
                    "name": "Abia State",
                    "state_code": "AB"
                },
                {
                    "name": "Adamawa State",
                    "state_code": "AD"
                },
                {
                    "name": "Akwa Ibom State",
                    "state_code": "AK"
                },
                {
                    "name": "Anambra State",
                    "state_code": "AN"
                },
                {
                    "name": "Bauchi State",
                    "state_code": "BA"
                },
                

                // ... more states ...
                
            ]
        }
    }
