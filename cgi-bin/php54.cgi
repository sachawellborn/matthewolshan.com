#!/bin/sh
export PHP_FCGI_CHILDREN=3
exec /hsphere/shared/php54/bin/php-cgi /home/mdolshan//matthewolshan.com/cgi-bin/php.ini