<?php 

namespace ConsoleComponent\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ColorCommand extends Command {
    protected function configure() {
        $this->setName('color:list') // categoría:nombre del comando para ser ejecutado desde la terminal
             ->setDescription('List styles')
             ->setHidden(true); //Esta opción oculta el comando en la terminal pero sigue siendo ejecutable
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $output->writeln('<info>Info - green</info>');
        $output->writeln('<comment>comment - yellow</comment>');
        $output->writeln('<question>question - black text on a cyan background</question>');
        $output->writeln('<error>error - red</error>');
        $outputStyle = new OutputFormatterStyle('red', 'yellow', array('bold'));
        $output->getFormatter()->setStyle('fire', $outputStyle);
        $output->writeln('<fire>foo</fire>');
        //green text
        $output->writeln('<fg=green>foo</>');
        //black text on a cyan background
        $output->writeln('<fg=black;bg=cyan>foo</>');
        //bold text on a yellow background
        $output->writeln('<bg=yellow;options=bold>foo</>');
        //bold text with underscore
        $output->writeln('<options=bold,underscore>foo</>');
    }
}