<?php

namespace App\Modules\Verify\Type;

use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;

class FileUploadResultType extends GraphQLType
{
    protected $attributes = [
        'name' => 'FileUploadResult',
        'description' => 'File Uploaded result'
    ];

    public function fields(): array
    {
        return [
          'file_name' => [
              'type'          => Type::string(),
              'description'   => 'Name of file loaded',
              'resolve'       => function ($data) {
                if ($data && isset($data->file_name)) {
                    return  $data->file_name;
                }
              }
          ],
          'number_of_records' => [
              'type'          => Type::string(),
              'description'   => 'Name of file loaded',
              'resolve'       => function ($data) {
                if ($data && isset($data->number_of_records)) {
                    return  $data->number_of_records;
                }
              }
          ],
          'status' => [
              'type'          => Type::boolean(),
              'description'   => 'Status of the resultset',
              'resolve'       => function ($data) {
                if ($data && isset($data->Status) && isset($data->Status)) {
                    return (bool) $data->Status;
                }

                return null;
              },
          ],
        ];
    }
}
