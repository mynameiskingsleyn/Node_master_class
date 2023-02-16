<?php

namespace App\Modules\Search\Type;

use App\Modules\Shared\Formatters\LexIDFormatter;
use Rebing\GraphQL\Support\PaginationType;
use App\Services\User\AccountService;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Illuminate\Pagination\LengthAwarePaginator;
use GraphQL\Type\Definition\Type as GraphQLType;
use Illuminate\Support\Facades\App;

class PaginationSearchType extends PaginationType
{
    protected function getPaginationFields($typeName): array
    {
        return [
            'data' => [
                'type'          => GraphQLType::listOf(GraphQL::type($typeName)),
                'description'   => 'List of items on the current page',
                'resolve'       => function (LengthAwarePaginator $data) {
                    return $this->data($data->getCollection());
                },
            ],
            'total' => [
                'type'          => GraphQLType::nonNull(GraphQLType::int()),
                'description'   => 'Number of total items selected by the query',
                'resolve'       => function (LengthAwarePaginator $data) {
                    return $data->total();
                },
                'selectable'    => false,
            ],
            'per_page' => [
                'type'          => GraphQLType::nonNull(GraphQLType::int()),
                'description'   => 'Number of items returned per page',
                'resolve'       => function (LengthAwarePaginator $data) {
                    return $data->perPage();
                },
                'selectable'    => false,
            ],
            'current_page' => [
                'type'          => GraphQLType::nonNull(GraphQLType::int()),
                'description'   => 'Current page of the cursor',
                'resolve'       => function (LengthAwarePaginator $data) {
                    return $data->currentPage();
                },
                'selectable'    => false,
            ],
            'from' => [
                'type'          => GraphQLType::int(),
                'description'   => 'Number of the first item returned',
                'resolve'       => function (LengthAwarePaginator $data) {
                    return $data->firstItem();
                },
                'selectable'    => false,
            ],
            'to' => [
                'type'          => GraphQLType::int(),
                'description'   => 'Number of the last item returned',
                'resolve'       => function (LengthAwarePaginator $data) {
                    return $data->lastItem();
                },
                'selectable'    => false,
            ],
            'last_page' => [
                'type'          => GraphQLType::nonNull(GraphQLType::int()),
                'description'   => 'The last page (number of pages)',
                'resolve'       => function (LengthAwarePaginator $data) {
                    return $data->lastPage();
                },
                'selectable'    => false,
            ],
            'has_more_pages' => [
                'type'          => GraphQLType::nonNull(GraphQLType::boolean()),
                'description'   => 'Determines if cursor has more pages after the current page',
                'resolve'       => function (LengthAwarePaginator $data) {
                    return $data->hasMorePages();
                },
                'selectable'    => false,
            ],
            'can_enroll' => [
                'type'          => GraphQLType::nonNull(GraphQLType::boolean()),
                'description'   => 'Determines if cursor has more pages after the current page',
                'resolve'       => function (LengthAwarePaginator $data) {
                    return $this->checkEnroll($data->getCollection());
                },
                'selectable'    => false,
            ],
        ];
    }

    public function data($data)
    {
        $employeeId = App::make(AccountService::class)->employeeId();

        if ($employeeId) {
            $filtered = $data->filter(function ($item, $key) use ($employeeId) {
                $employeeIdPadded = LexIDFormatter::format($employeeId);
                $lexIdPadded = LexIDFormatter::format(\data_get($item, 'lexid', ''));
                return $employeeIdPadded !== $lexIdPadded;
            });

            return $filtered;
        } else {
            return $data;
        }
    }

    public function checkEnroll($data)
    {
        if ($data->count() === 1) {
            $employeeId = App::make(AccountService::class)->employeeId();

            if ($employeeId) {
                $noEnroll = $data->search(function ($item, $key) use ($employeeId) {
                    $employeeIdPadded = LexIDFormatter::format($employeeId);
                    $lexIdPadded = LexIDFormatter::format(\data_get($item, 'lexid', ''));
                    return $employeeIdPadded !== $lexIdPadded;
                });
                return $noEnroll === false;
            }
        }

        return $data->count() === 0;
    }
}
