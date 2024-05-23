# Example: Symfony Service Subscriber and Locator with Doctrine Inheritance Mapping

In this example, I show how the creation of 3 types of contract between a customer and a provider can be done using a lazy loading approach through different commands to create the same abstraction of data but with different strategies. Also, although this data could end up in the same database table, it could assume different behavior when hydrated into different domain models.

## References
To follow the concept applyed inside `App\Command`, check the documentation links:
  - [Command Pattern](https://refactoring.guru/design-patterns/command)
  - [Symfony Service Subscribers & Locators](https://symfony.com/doc/current/service_container/service_subscribers_locators.html#defining-a-service-subscriber)

About segregating entities and mapping database tables with Doctrine:
  - [Martin Fowler about Table Inheritance](https://martinfowler.com/eaaCatalog/classTableInheritance.html)
  - [Doctrine Inheritance Mapping](https://www.doctrine-project.org/projects/doctrine-orm/en/3.1/reference/inheritance-mapping.html)

## Disclaimer
This is by no means production-ready code. The intention here is only to propose a way avoid invoking unnecessary services and promoting more concision in the domain layer.

## Setup
`docker compose up -d`

`bin/console doctrine:database:create`

`bin/console doctrine:schema:create`

`symfony server:start`

3 possible requests:
`http POST http://localhost:8000/contract/?type=power`

`http POST http://localhost:8000/contract/?type=water`

```
http POST http://localhost:8000/contract/?type=gas
HTTP/1.1 201 Created
Cache-Control: no-cache, private
Content-Length: 29
Content-Type: application/json
X-Powered-By: PHP/8.3.7
X-Robots-Tag: noindex
{
    "status": "Contract created"
}
```
