<?php

namespace App\Enums;

enum SignatureStatus: int
{
    case ACTIVE = 1; 
    case DEACTIVED = 2;
    case SUSPENDED = 3;
    case CANCELED = 0; 
}
