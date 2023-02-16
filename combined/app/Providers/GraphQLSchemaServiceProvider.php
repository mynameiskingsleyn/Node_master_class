<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use ReflectionClass;

/**
 * GraphQL Schema Service Provider
 *
 * @category Service_Provider
 */
class GraphQLSchemaServiceProvider extends ServiceProvider
{
    /**
     * Types collection, contains also Inputs and Interfaces
     *
     * @var array
     */
    protected $types = [];

    /**
     * Queries collection
     *
     * @var array
     */
    protected $queries = [];

    /**
     * Mutations collection
     *
     * @var array
     */
    protected $mutations = [];

    /**
     * Subscriptions collection
     *
     * @var array
     */
    protected $subscriptions = [];

    /**
     * Modules of the application
     *
     * @var array
     */
    protected $modules = [];


    /**
     * Predefined config files containing schema types
     */
    public const TYPES_CONFIG_FILE = 'Types';
    public const INPUTS_CONFIG_FILE = 'Inputs';
    public const INTERFACES_CONFIG_FILE = 'Interfaces';
    public const QUERIES_CONFIG_FILE = 'Queries';
    public const MUTATIONS_CONFIG_FILE = 'Mutations';
    public const SUBSCRIPTIONS_CONFIG_FILE = 'Subscriptions';

    /**
     * Schema namespace folder
     *
     * @var string
     */
    protected $schemaNamespace = 'Schema';

    /**
     * Bootstrap the service.
     *
     * @return void
     */
    public function boot(): void
    {

        // Bootstrap modules configuration
        $this->bootModulesSchema();

        // Set GraphQL configuration at runtime
        // TODO - Add support for caching
        $this->app->make('config')->set(
            [
            'graphql.schemas' => [
                'default' => [
                    'query' => $this->queries,
                    'mutation' => $this->mutations,
                    'subscription' => $this->subscriptions,
                ]
            ],
            'graphql.types' => $this->types
            ]
        );
    }

    /**
     * Get modules from configuration files and load schema
     *
     * @return void
     */
    protected function bootModulesSchema(): void
    {
        $this->modules = $this->app->make('config')->get('modules.active', []);
        foreach ($this->modules as $module) {
            $this->loadSchemaFromModule($module);
        }
    }

    /**
     * Check config file exists and returns the full path
     */
    protected function getConfigFile(string $module, string $config_file)
    {
        $fullPathConfigFile =  base_path($this->app->make('config')->get('modules.path'))
                               . $module . '/'
                               . ($this->schemaNamespace ? $this->schemaNamespace . '/' : '')
                               . $config_file      // config file type
                               . '.php';           // file extension
        // check if exist and if is a file no a directory
        return is_file($fullPathConfigFile)
                    ? $fullPathConfigFile
                    : false;
    }

    /**
     * Load GraphQL types from module files
     *
     * @param string $module
     * @return void
     */
    protected function loadSchemaFromModule(string $module): void
    {
        $this->loadTypes($this->getConfigFile($module, self::TYPES_CONFIG_FILE))

            ->loadInterfaces($this->getConfigFile($module, self::INTERFACES_CONFIG_FILE))

            ->loadInputs($this->getConfigFile($module, self::INPUTS_CONFIG_FILE))

            ->loadQueries($this->getConfigFile($module, self::QUERIES_CONFIG_FILE))

            ->loadMutations($this->getConfigFile($module, self::MUTATIONS_CONFIG_FILE))

            ->loadSubscriptions($this->getConfigFile($module, self::SUBSCRIPTIONS_CONFIG_FILE));
    }

    /**
     * Load Types from configuration file per module
     *
     * @return object
     */
    protected function loadTypes($typesFile): object
    {
        if ($typesFile) {
            $types = require $typesFile;

            $loadedTypes = $this->initializeTypes($types);

            // merging one array avoid collision, previous value is overwritten
            $this->types = array_merge($this->types, $loadedTypes);
        }

        return $this;
    }

    /**
     * Load Interfaces
     *
     * @return void
     */
    protected function loadInterfaces($typesFile)
    {
        $this->loadTypes($typesFile);

        return $this;
    }

    /**
     * Load Inputs
     *
     * @return void
     */
    protected function loadInputs($typesFile)
    {
        $this->loadTypes($typesFile);

        return $this;
    }

    /**
     * Load Queries
     *
     * @return void
     */
    protected function loadQueries($typesFile)
    {
        if ($typesFile) {
            $types = require $typesFile;

            $loadedQueries = $this->initializeTypes($types);

            // merging one array avoid collision, but last value is taken
            $this->queries = array_merge($this->queries, $loadedQueries);
        }

        return $this;
    }

    /**
     * Load mutations
     *
     * @return void
     */
    protected function loadMutations($typesFile)
    {
        if ($typesFile) {
            $types = require $typesFile;

            $loadedMutations = $this->initializeTypes($types);

            // mergin one array avoid collision, but last value is taken
            $this->mutations = array_merge($this->mutations, $loadedMutations);
        }

        return $this;
    }

    /**
     * Load subscriptions
     *
     * @return void
     */
    protected function loadSubscriptions($typesFile)
    {
        if ($typesFile) {
            $types = require $typesFile;

            $loadedSubscriptions = $this->initializeTypes($types);

            // mergin one array avoid collision, but last value is taken
            $this->subscriptions = array_merge($this->subscriptions, $loadedSubscriptions);
        }

        return $this;
    }

    protected function initializeTypes($types): array
    {
        $loadedTypes = [];

        if (is_array($types)) {
            foreach ($types as $typeClass) {
                $type = new ReflectionClass($typeClass);
                $props = $type->getDefaultProperties();

                if (isset($props['attributes']) && isset($props['attributes']['name'])) {
                    $name = $props['attributes']['name'];
                } else {
                    $name = $this->resolveTypeName($typeClass) ?? $type->getShortName();
                }

                $loadedTypes[ $name ] = $typeClass;
            }
        }

        return $loadedTypes;
    }

    public function resolveTypeName($class)
    {
        $type = is_object($class) ? $class : $this->app->make($class);
        $name = $type->name;
        return $name;
    }
}
