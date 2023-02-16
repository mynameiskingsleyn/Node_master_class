<?php

namespace App\Modules\Search\Type\AssociateRecord;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;

class AssociateRecordType extends GraphQLType
{
    protected $attributes = [
        'name' => 'AssociateRecord',
        'description' => 'AssociateRecord',
    ];

    public function fields(): array
    {
        return [
            'asso_title_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_first_name_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_middle_name_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_last_name_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_name_suffix_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_address_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_city_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_state_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_zipcode_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_phone_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_ssn_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_dob_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_dod_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_relationship_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_relationship_type_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_relationship_confidence_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_title_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_first_name_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_middle_name_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_last_name_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_name_suffix_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_address_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_city_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_state_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_zipcode_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_phone_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_ssn_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_dob_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_dod_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_relationship_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_relationship_type_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_relationship_confidence_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_title_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_first_name_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_middle_name_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_last_name_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_name_suffix_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_address_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_city_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_state_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_zipcode_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_phone_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_ssn_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_dob_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_dod_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_relationship_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_relationship_type_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_relationship_confidence_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_title_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_first_name_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_middle_name_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_last_name_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_name_suffix_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_address_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_city_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_state_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_zipcode_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_phone_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_ssn_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_dob_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_dod_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_relationship_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_relationship_type_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_relationship_confidence_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_title_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_first_name_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_middle_name_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_last_name_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_name_suffix_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_address_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_city_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_state_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_zipcode_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_phone_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_ssn_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_dob_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_dod_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_relationship_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_relationship_type_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_relationship_confidence_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_title_6' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_first_name_6' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_middle_name_6' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_last_name_6' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_name_suffix_6' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_address_6' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_city_6' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_state_6' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_zipcode_6' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_phone_6' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_ssn_6' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_dob_6' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_dod_6' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_relationship_6' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_relationship_type_6' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_relationship_confidence_6' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_title_7' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_first_name_7' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_middle_name_7' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_last_name_7' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_name_suffix_7' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_address_7' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_city_7' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_state_7' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_zipcode_7' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_phone_7' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_ssn_7' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_dob_7' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_dod_7' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_relationship_7' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_relationship_type_7' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_relationship_confidence_7' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_title_8' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_first_name_8' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_middle_name_8' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_last_name_8' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_name_suffix_8' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_address_8' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_city_8' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_state_8' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_zipcode_8' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_phone_8' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_ssn_8' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_dob_8' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_dod_8' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_relationship_8' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_relationship_type_8' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_relationship_confidence_8' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_title_9' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_first_name_9' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_middle_name_9' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_last_name_9' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_name_suffix_9' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_address_9' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_city_9' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_state_9' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_zipcode_9' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_phone_9' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_ssn_9' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_dob_9' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_dod_9' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_relationship_9' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_relationship_type_9' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_relationship_confidence_9' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_title_10' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_first_name_10' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_middle_name_10' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_last_name_10' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_name_suffix_10' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_address_10' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_city_10' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_state_10' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_zipcode_10' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_phone_10' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_ssn_10' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_dob_10' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_dod_10' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_relationship_10' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_relationship_type_10' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'asso_relationship_confidence_10' => [
                'type' => Type::string(),
                'description' => '',
            ],
        ];
    }
}
