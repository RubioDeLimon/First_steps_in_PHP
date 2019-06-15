<?php

namespace ConsoleComponent\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;


class LengthStringCommand extends Command{

    protected function configure(){
        $this->setName('length:string')
            ->setDescription("Returns the length of a text string")
            ->addArgument('str', InputArgument::REQUIRED, 'The string to read.');
    }

    protected function execute(InputInterface $input, OutputInterface $output){
        $str = $input->getArgument('str');
        $output->writeln("The length of this string is: " . strlen($str)); 
        ;
    }
}