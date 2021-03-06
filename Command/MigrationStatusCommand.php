<?php

namespace Propel\PropelBundle\Command;

use Propel\PropelBundle\Command\PhingCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * MigrationStatusCommand.
 *
 * @author William DURAND <william.durand1@gmail.com>
 */
class MigrationStatusCommand extends PhingCommand
{
    /**
     * @see Command
     */
    protected function configure()
    {
        $this
            ->setDescription('Lists the migrations yet to be executed')
            ->setHelp(<<<EOT
The <info>propel:migration:status</info> command checks the version of the database structure, and looks for migration files not yet executed (i.e. with a greater version timestamp).

  <info>php app/console propel:migration:status</info>
EOT
            )
            ->setName('propel:migration:status')
        ;
    }

    /**
     * @see Command
     *
     * @throws \InvalidArgumentException When the target directory does not exist
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->callPhing('status');

        $this->summary($output, 'propel-migration-status');
    }
}
