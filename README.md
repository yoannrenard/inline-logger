# inline-logger
Stdout your logs directly!

## Installation

Use [Composer][composer] and run :

```bash
$> composer require yoannrenard/inline-logger
```

## Requirements

* [Composer][composer]
* PHP >=5.5.9

## Example

```php
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class RandomClass
{
    /** @var LoggerInterface */
    protected $logger;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger = null)
    {
        $this->logger = $logger ?: new NullLogger();
    }

    public function randomMethod()
    {
        $this->logger->info('My random log');
    }
}
```

A proper LoggerInterface should always be injected into the RandomClass class when running in production.

But imagine you wanna, for some reason, play with it in a dummy command line, without [Monolog][monolog], without anything J

```php
$randomClass = new RandomClass(new InlineLogger());
$randomClass->randomMethod();
```

This dummy InlineLogger class will print in your stdout all your beloved logs
```bash
[2017-02-13 16:07:30] php.INFO: My random log
```

[composer]: https://getcomposer.org
[monolog]: https://github.com/Seldaek/monolog
