#!/usr/bin/env php
<?php

require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console\Application;
use ConsoleComponent\Command\HelloWorldCommand;
use ConsoleComponent\Command\DayOfTheWeekCommand;
use ConsoleComponent\Command\DaysOfTheWeekCommand;
use ConsoleComponent\Command\LengthStringCommand;
use ConsoleComponent\Command\ColorCommand;
use ConsoleComponent\Command\AgeControlCommand;

$application = new Application("Test App","1.0.0");
$application->add(new HelloWorldCommand());
$application->add(new DayOfTheWeekCommand());
$application->add(new DaysOfTheWeekCommand());
$application->add(new LengthStringCommand());
$application->add(new ColorCommand());
$application->add(new AgeControlCommand());
$application->run();