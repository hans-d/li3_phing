li3_phing
=========

Tasks to access li3 during phing actions. Not for usage in the application.
Intended to place among the other li3 plugins in your app or main librarie.

Usage
-----
Include in your `build.xml` a refence to the tasks defined here:
```
<taskdef name="li3" classname="Li3Task" classpath="path/libraries/li3_phing" />
```

The task is child of the `ExecTask`, so all of its properties can be used:

- `executable`: not to be used

- `command`: to command to pass to li3, eg `test tests/cases`.

Additional properties:

- `php`: reference to the php binarie. Defaults to `php`. Set if `php` needs to
  called in a speciic way

- `li3php`: reference to the location of `lithium.php`. Defaults to `lithium/console/lithium.php`.
  Normally needs no modification, see the next property.

- `li3pathprefix`: will be placed in front of `li3php`, to easy adjust the location of
  `li3php`. Defaults to ``, can be set to `../libraries/` when the li3 task is run
  from the application context and lithium is nearby.


License etc.
------------

Distributed under MIT license.

Copyright (c) Hans Donner, 2012.

Feel free to fork, create pull requests etc.