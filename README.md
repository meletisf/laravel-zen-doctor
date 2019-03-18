# Laravel Zen Doctor

Zen Doctor is a package that is unsed in conjuction with a load balancer's health check functionality in order to ensure that no Zen Doctor is a package that is used in conjunction with a load balancer's health check functionality in order to ensure that no dysfunctional node attempts to serve traffic to the end users.

The vast majority of load balancers are sending an HTTP request to a designated route (for every node) and it that route happens to return back
a response with an HTTP status of 500 (Internal Server Error) the node will be isolated from the pool and based on the configuration will stay
like that for a designated period.

Read the **Wiki** for more information on how to setup the package, use in along with load balancers and different tools, and write your own checks.

### Warning

At this point in time the package is under heavy development and breaking changes may occur.
