<?php

return [
    // Custom Scalar Types
    \App\Modules\Shared\Type\EmailType::class,
    \App\Modules\Shared\Type\URIType::class,
    // Types
    \App\Modules\Shared\Type\IdentityType::class,
    \App\Modules\Shared\Type\User\UserType::class,
    \App\Modules\Shared\Type\User\PermissionsType::class,
    \App\Modules\Shared\Type\User\RolesType::class,
    \App\Modules\Shared\Type\User\UserInfoType::class,
    \App\Modules\Shared\Type\FilterType::class,
];
