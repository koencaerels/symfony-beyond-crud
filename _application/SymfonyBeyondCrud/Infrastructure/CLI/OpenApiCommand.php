<?php

declare(strict_types=1);

namespace App\SymfonyBeyondCrud\Infrastructure\CLI;

use Nelmio\ApiDocBundle\ApiDocGenerator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class OpenApiCommand extends Command
{
    private ApiDocGenerator $apiDocGenerator;

    public function __construct(
        ApiDocGenerator $apiDocGenerator,
    ) {
        parent::__construct();
        $this->apiDocGenerator = $apiDocGenerator;
    }

    protected function configure(): void
    {
        $this
            ->setName('openapi:generate')
            ->setDescription('Create OPENAPI schema from annotated PHP controllers');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $documentation = $this->apiDocGenerator->generate();
        $json = json_encode($documentation, \JSON_PRETTY_PRINT);

        $frontendPath = './_frontend/src/api/schema.json';
        file_put_contents($frontendPath, $json);

        $documentationPath = './public/api/doc/schema.json';
        file_put_contents($documentationPath, $json);

        return 0;
    }
}
