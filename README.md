[![Packagist](https://img.shields.io/packagist/dt/bekodesign/versio-php-api.svg)](https://packagist.org/packages/bekodesign/versio-php-api)
[![Build Status](https://travis-ci.org/BekoDesign/versio-php-api.svg?branch=master)](https://travis-ci.org/BekoDesign/versio-php-api)
[![GitHub tag](https://img.shields.io/github/tag/bekodesign/versio-php-api.svg)](https://github.com/BekoDesign/versio-php-api/releases)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

# Versio PHP API
This is a PHP library for the new rest API of Versio (Hostingprovider) as described here: https://www.versio.nl/RESTapidoc/.

This library can manage Domains, Reseller Hosting Accounts, WebHosting Accounts and SSL certificates as well as managing 
and viewing the Categories, TLDS and Products of Versio.

## Installation

### Composer (recommended)

Installation through composer:
````
composer require bekodesign/versio-php-api
````


### Alternative

Download [release](https://github.com/bekodesign/Versio-PHP-API/releases "Github releases").

## Usage

Please reference the [Wiki pages](https://github.com/BekoDesign/Versio-PHP-API/wiki) for the documentation.

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
Replace **{YOUR VERSIO USERNAME}** and **{YOUR VERSIO PASSWORD}** with the credentials you use to sign in 
at https://www.versio.nl/login?uri=/customer/

You can also change the host to versio.uk, versio.nl, versio.be, versio.eu. But the default fallback is versio.nl. 

## License

This project is released under the [MIT](https://github.com/beko1997/Versio-PHP-API/blob/master/LICENSE) License.

## Issues

Please report any problems via: [GitHub issues](https://github.com/BekoDesign/Versio-PHP-API/issues)

## Contributors
Feel free to create a Pull Request.

**Contributors:**
 - [Beko1997](https://github.com/beko1997)
