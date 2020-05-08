<?php
$memcache = new \Memcache();
$memcache->connect('172.1.14.11', 11211) or die ("Could not connect NFS server");
$memcache->set('key', 'Memcache connect OK');
$get = $memcache->get('key');
echo $get;