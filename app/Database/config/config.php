<?php

use App\Database\Database;

/**
 * Setup eloquent capsule.
 */

$database = new Database;
$database->setupCapsule();