<?php

namespace Travellar\Service;

class ConfigurationService {
    /*
     * Database configuration
     */
    const DB_TYPE = 'mysql';
    const DB_HOST = 'localhost';
    const DB_USER = 'root';
    const DB_PASS = 'root';
    const DB_NAME = 'devine_rmd2_opdracht_tripit';

    /*
     * Salt
     */
    const SALT = 'f293a8cef625a930265e6856bc4ba3d2e968240d171e918829e51636ccd1c833';

    /*
     * Project state
     */
    const PRODUCTION = false;
}