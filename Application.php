#!/usr/bin/env php
<?php
// application.php

require __DIR__.'/vendor/autoload.php';

use Edionme\Console\Command\EmailPermutatorCommand;
use Symfony\Component\Console\Application;

$application = new Application();
$application->add(new EmailPermutatorCommand());
$application->run();