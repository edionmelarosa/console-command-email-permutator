## Email permutator Console Command

### Description
This is a simple command line tool that generates email based on given name and domain.

This uses [symfony/console package.](https://packagist.org/packages/symfony/console)

### Install
1) Clone repo.
2) `cd` to project `cd console-command-email-permutator`
3) Install packages by running `composer install`


### Using command console
To generate run:
`php Application.php tool:permutate {domain} {firstName} {lastName}`

Help:
`php Application.php -h tool:permutate`
