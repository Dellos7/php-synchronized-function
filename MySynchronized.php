<?php
/**
 * Created by PhpStorm.
 * User: dlopez
 * Date: 6/09/17
 * Time: 9:55
 * Product name: PhpStorm
 * File name: MySynchronized.php
 * Project name: desguaceparis_backup_2017-09-04_104603
 */

class MySynchronized {

    /**
     * Helper function to execute a piece of code concurrently
     *
     * @param $synchronized enable or disable concurrent execution for multiple threads
     * @var callable $executeFnc piece of code to execute concurrently
     * @param array ...$params params to pass to the $executeFnc
     */
    public static function executeSynchronizedFunction( $synchronized, $key, $executeFnc, ...$params ) {
        if( $synchronized ) {
            $sem = sem_get( $key, 1);
            if( $sem ) {
                sem_acquire($sem);
                $executeFnc(...$params);
                sem_release($sem);
            }
        }
        else {
            $executeFnc(...$params);
        }
    }

}