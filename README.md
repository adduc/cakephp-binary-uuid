CakePHP Binary UUID Support
===

CakePHP 2.x treats BINARY(36) fields as UUID automatically. CakePHP 3.x treats
BINARY(36) as binary. This library adds support to CakePHP 3.x to treat
BINARY(36) fields as UUID.


Installation
---

Add the following to the require section in your composer.json and run `composer update`:

```
"adduc/cakephp-binary-uuid": "^1.0"
```

In app.php, change all applicable datasource drivers from
`Cake\Database\Driver\Mysql` to `Adduc\Cake\BinaryUuid\Mysql`.

At this point, your application should now have support for BINARY(36) fields.
