# Laravel Zen Doctor

ZenDoctor is a package that is used in conjunction with a load balancer's 
health check feature in order to ensure that no dysfunctional node attempts to serve
the user.

## Installation

```bash
composer require laravel/framework
```

The package will automatically register itself. 

## Issues

If something doesn't work as indented or you want to suggest a change, please open an issue.

## TODO

+ Improve the test coverage
+ Add the ability to pass custom valued to the check from the config file

---

Read the **[Wiki](https://github.com/meletisf/laravel-zen-doctor/wiki)** for more information on how to setup the package, use in along with load balancers and different tools, and write your own checks.

**It is not tested with Lumen!**