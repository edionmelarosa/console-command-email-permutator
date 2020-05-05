## Email permutator Console Command

### Description
This is a simple command line tool that generates email based on given name and domain.

This uses [symfony/console package.](https://packagist.org/packages/symfony/console)

### Inspiration
When testing, there are times I got stuck thinking of email so most of the time I put rubbish email like *akldsfklasdlf@ldfjl.com*.

So why not create a tool that generates real like emails and make testing beautiful :)

### Installation
1) Clone repo.
2) `cd` to project `cd console-command-email-permutator`
3) Install packages by running `composer install`


### Using command
To generate run:
`php Application.php tool:permutate {domain} {firstName} {lastName}`

Help:
`php Application.php -h tool:permutate`
