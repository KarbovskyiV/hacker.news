Hey, let's build a simple news board API.

We will start with a simple MVP. It will have a list of news with functionality to upvote and comment on them. Similar
platform to [HackerNews](https://news.ycombinator.com/).

## **Functional Requirements**

- Create CRUD API to manage news posts. The post will have the next fields: title, link, creation date, amount of
  upvotes, author-name

- Posts should have CRUD API to manage comments on them. The comment will have the next fields: author-name, content,
  creation date

- There should be an endpoint to upvote the post

- We should have a recurring job running once a day to reset post upvotes count

## **Technical Requirements**

- Code should be written with PHP 8

- REST API should be Laravel or Symfony based

- API should be well documented with Postman collection. Make sure to
  use [Postman environments and variables](https://learning.postman.com/docs/postman/variables-and-environments/variables/#understanding-variables-and-environments)
  , so you can switch between local API and deployed version. Add Postman collection link to the README
  https://api.postman.com/collections/24308097-bd04b065-b298-4289-bd63-b28099282fee?access_key=PMAT-01GZZYXF1WE8M3XFMGEY3N2PQJ


- API has to run as a Docker container. API + Postgres / MySQL should be launched with docker-compose

- Necessary to make sure that code passes [PSR-12](https://www.php-fig.org/psr/psr-12/) checks
  using [CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer)

- The project should have clear README with steps to run it

- The code should be clean, passing linter checks and simple to understand. Code quality matters a lot

- Deploy API for testing to [Heroku](https://www.heroku.com/) or similar service. Add deployment link to the README

## **Conditions**

- Task usually takes **from 4 to 6 hours**. If you need more time, you're good to take it and it's appreciated, but
  results should be sent **no later than 48 hours after the start**

- Skills to write clean business logic and apply best practices are important

- The challenge code should be pushed to the **GitHub** repository.

## Follow Up

If you have any questions regarding the task, contact our HR manager.

Cheers! 😊
