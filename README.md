[![Packagist](https://img.shields.io/packagist/v/BekoDesign/versioAPI.svg)]()

# Versio-PHP-API
PHP implementation of the new Restfull Versio API (https://www.versio.nl/RESTapidoc/)

## Installation

### Composer (recommended)

Installation through composer:
````
composer require BekoDesign\VersioAPI
````

**@Todo:** Submit project to composer

### Alternative

Download [release](https://github.com/bekodesign/Versio-PHP-API/releases "Github releases").

## Usage

**@Todo:** Write documentation

## Testing

This library is using [PHP dotenv](https://github.com/vlucas/phpdotenv) for enviroment variables. 
Since Versio is using Basic Auth and does not provide a demo account the tests need access to your full username and password.

In order to run the provided tests:
1. Clone this repository
2. Create a new ``.env`` file in the root of the repository with the following contents:

````
VERSIO_HOST=versio.nl
VERSIO_USERNAME={YOUR VERSIO USERNAME}
VERSIO_PASSWORD={YOUR VERSIO PASSWORD}
````
Replace **{YOUR VERSIO USERNAME}** and **{YOUR VERSIO PASSWORD}** with the credentials you use to sign in at https://www.versio.nl/login?uri=/customer/

You can also change the host to versio.uk, versio.nl, versio.be, versio.eu. But the default fallback is versio.nl. 

## License

This project is released under the [MIT][link-license] License.

## Issues

Please report any problems via: [GitHub issues](https://github.com/BekoDesign/Versio-PHP-API/issues)

## Contributors
Feel free to create Pull Request.

**Contributors:**
 - [Beko1997](https://github.com/beko1997)