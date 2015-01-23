# Base64 Url Safe

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Spomky-Labs/base64url/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Spomky-Labs/base64url/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/Spomky-Labs/base64url/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/Spomky-Labs/base64url/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/Spomky-Labs/base64url/badges/build.png?b=master)](https://scrutinizer-ci.com/g/Spomky-Labs/base64url/build-status/master)
[![HHVM Status](http://hhvm.h4cc.de/badge/Spomky-Labs/base64url.png)](http://hhvm.h4cc.de/package/Spomky-Labs/base64url)

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/0f8f9b12-2076-4d0e-a34e-c6f097c61b16/big.png)](https://insight.sensiolabs.com/projects/0f8f9b12-2076-4d0e-a34e-c6f097c61b16)

[![Latest Stable Version](https://poser.pugx.org/Spomky-Labs/base64url/v/stable.png)](https://packagist.org/packages/Spomky-Labs/base64url) [![Total Downloads](https://poser.pugx.org/Spomky-Labs/base64url/downloads.png)](https://packagist.org/packages/Spomky-Labs/base64url) [![Latest Unstable Version](https://poser.pugx.org/Spomky-Labs/base64url/v/unstable.png)](https://packagist.org/packages/Spomky-Labs/base64url) [![License](https://poser.pugx.org/Spomky-Labs/base64url/license.png)](https://packagist.org/packages/Spomky-Labs/base64url)

This library aims to provide a fast Base64 URL Safe encoder/decoder as described by the [RFC 4648](https://tools.ietf.org/html/rfc4648).

## The Release Process

We manage the releases of the library through features and time-based models.

- A new patch version comes out every month when you made backwards-compatible bug fixes.
- A new minor version comes every six months when we added functionality in a backwards-compatible manner.
- A new major version comes every year when we make incompatible API changes.

The meaning of "patch" "minor" and "major" comes from the Semantic [Versioning strategy](http://semver.org/).

This release process applies for all versions.

### Backwards Compatibility

We allow developers to upgrade with confidence from one minor version to the next one.

Whenever keeping backward compatibility is not possible, the feature, the enhancement or the bug fix will be scheduled for the next major version.

## Prerequisites

This library needs at least

* `PHP 5.3`.

It has been successfully tested using `PHP 5.3` to `PHP 5.6` and `HHVM`.

## Installation

The preferred way to install this library is to rely on Composer:

    {
        "require": {
            // ...
            "spomky-labs/base64url": "*"
        }
    }

## How to use


    <?php

    use Base64Url\Base64Url;

    $message = "Hello World!";

	$encoded = Base64Url::encode($message); //Result must be "SGVsbG8gV29ybGQh"
    $decoded = Base64Url::decode($encoded); //Result must be "Hello World!"

## Contributing

Requests for new features, bug fixed and all other ideas to make this library usefull are welcome. [Please follow these best practices](doc/Contributing.md).

## Licence

This software is release under [MIT licence](LICENSE).
