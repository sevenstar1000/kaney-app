# Kanye app

## Features Added

-   The API we want you to connect to is https://kanye.rest/
-   A rest API that shows 5 random Kayne West quotes
-   There should be an endpoint to refresh the quotes and fetch the next 5 random quotes
-   Authentication for these APIs should be done with an API token, not using any package
-   The above features are tested with Feature
-   Provide a README on how we can set up and test the application

# Create environemnt file

Create a `.env` file on root directory and add the following content:

```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:BDrxM+xrJf01npQXSR0/0+EONN8sSmHMCv6JlG+Oyxg=
APP_DEBUG=true
APP_URL=http://localhost

API_URI=https://api.kanye.rest
API_TOKEN=pxEg2hXTgIqqMt9brRSPrj22KzEiJWMmDsyiEIOdcbm0ix5cXdfZiqIXSvUZumdX
```

## Install dependencies

```
composer install
```

or

## Run docker container and install from within container

```
docker-compose up -d

docker exec -it kanye-west-quotes composer install
```

Server should now be running and you can view laravel project from browser on localhost

```
http://localhost
```

# Test the application

The API entry point had been tested on `Postman` for HTTP requests

GET request for 5 Kanye West Quotes entry point

```
http://localhost/api/quotes
```

and result should look similar to below:

```
{
    "quotes": [
        "I am the head of Adidas. I will bring Adidas and Puma back together and bring me and jay back together",
        "Life is the ultimate gift",
        "Artists are founders",
        "We are here to complete the revolution. We are building the future",
        "My first pillar when I'm on the board of adidas will be an adidas Nike collaboration to support community growth"
    ]
}
```

Make a POST request with the 5 quotes to be replaced with the next 5 unique quotes

```
http://localhost/api/quotes/refresh
```

Resulting in the next 5

```
{
    "quotes": [
        "I need an army of angels to cover me while I pull this sword out of the stone",
        "We will heal. We will cure.",
        "I've known my mom since I was zero years old. She is quite dope.",
        "I'm on the pursuit of awesomeness, excellence is the bare minimum.",
        "I'll say things that are serious and put them in a joke form so people can enjoy them. We laugh to keep from crying."
    ]
}
```

# Run Tests

```
php artisan test
```

or

```
docker exec -it kanye-west-quotes php artisan test
```
