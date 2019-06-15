<?php

namespace ConsoleComponent\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HelloWorldCommand extends Command{
    protected function configure(){
        $this->setName('Hello:world')
            ->setDescription('Outputs \'Hello World\'');
    }

    protected function execute(InputInterface $input, OutputInterface $output){
        $a=2;
        $b=2;
        $output->writeln($a+$b);
    }
}