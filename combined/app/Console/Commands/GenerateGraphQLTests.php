<?php

namespace App\Console\Commands;

use App\Console\Commands\Templates\InterfaceTestTemplate;
use App\Console\Commands\Templates\MutationTestTemplate;
use App\Console\Commands\Templates\QueryTestTemplate;
use Illuminate\Console\Command;
use App\Console\Commands\Templates\TypeTestTemplate;

/**
 * @codeCoverageIgnore
 */
class GenerateGraphQLTests extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tests:generate-graphql';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate missing GraphQL unit tests for types and fields.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        // only run command in local environment
        if (env('APP_ENV') !== 'local') {
            exit(0);
        }

        $graphs = array_merge(
            config('graphql.types'),
            config('graphql.schemas.default.query'),
            config('graphql.schemas.default.mutation'),
            config('graphql.schemas.default.subscription')
        );

        $this->line('<fg=red;bg=yellow>Generating GraphQL tests files:</>');

        foreach ($graphs as $type => $class) {
            $test_file = $this->testFile($class);

            if (is_file($test_file) == false) {
                $template_content = null;

                if ($this->isType($class)) {
                    $template_content = (string) new TypeTestTemplate($class);
                } elseif ($this->isQuery($class)) {
                    $template_content = (string) new QueryTestTemplate($class);
                } elseif ($this->isMutation($class)) {
                    $template_content = (string) new MutationTestTemplate($class);
                } elseif ($this->isInterface($class)) {
                    $template_content = (string) new InterfaceTestTemplate($class);
                }

                if ($template_content) {
                    $this->line('');
                    $this->line($test_file . ' : <info>Created</info></>');
                    $this->createTestFile($test_file, $template_content);
                }
            }
        }
    }

    private function isType($class)
    {
        $class_name = class_basename($class);
        return strpos($class_name, 'Type') !== false;
    }

    private function isMutation($class)
    {
        $class_name = class_basename($class);
        return strpos($class_name, 'Mutation') !== false;
    }

    private function isInterface($class)
    {
        $class_name = class_basename($class);
        return strpos($class_name, 'Interface') !== false;
    }

    private function isQuery($class)
    {
        $class_name = class_basename($class);
        return strpos($class_name, 'Query') !== false;
    }

    private function testFile($class)
    {
        $tests_path = base_path('tests');
        return $tests_path . '/' . $class . 'Test.php';
    }

    private function createTestFile($file, $content)
    {
        file_put_contents($file, $content);
    }
}
