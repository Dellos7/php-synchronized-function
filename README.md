## PHP Class that allows to execute concurrent-syncrhonized code ##

**Requirements**

 - To have installed the PHP sysvsem extension
 - Does not work on Windows
 
**Install sysvsem extension on CentOS:**

    sudo yum install php-sysvsem

**Edit php.ini and add extension path. Add the following:**

    [sysvsem]
    extension=/usr/lib64/php/modules/sysvsem.so
